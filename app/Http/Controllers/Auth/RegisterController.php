<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function showRegistrationForm($userType = null)
    {
        if (!in_array($userType, ['mahasiswa', 'siswa', 'umum'])) {
            abort(404);
        }
        
        return view("auth.daftar-{$userType}");
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = $this->create($request->all());
        
        event(new Registered($user));

        \Illuminate\Support\Facades\Auth::login($user);

        return $this->registered($request, $user);
    }

    protected function validator(array $data)
    {
        $rules = [
            'user_type' => 'required|in:mahasiswa,siswa,umum',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ];

        switch ($data['user_type'] ?? '') {
            case 'mahasiswa':
                $rules['name'] = 'required|string|max:255';
                $rules['nim'] = 'required|string|max:20|unique:users,nim';
                break;
                
            case 'siswa':
                $rules['name'] = 'required|string|max:255';
                $rules['nisn'] = 'required|string|max:20|unique:users,nisn';
                break;
                
            case 'umum':
                $rules['name'] = 'required|string|max:255';
                $rules['pekerjaan'] = 'nullable|string|max:100';
                break;
        }

        return Validator::make($data, $rules, [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'name.required' => 'Nama lengkap wajib diisi',
            'nim.required' => 'NIM wajib diisi',
            'nim.unique' => 'NIM sudah terdaftar',
            'nisn.required' => 'NISN wajib diisi',
            'nisn.unique' => 'NISN sudah terdaftar',
            'no_hp.required' => 'Nomor HP wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
        ]);
    }

    protected function create(array $data)
    {
        $userData = [
            'user_type' => $data['user_type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];

        switch ($data['user_type']) {
            case 'mahasiswa':
                $userData['nim'] = $data['nim'];
                break;
                
            case 'siswa':
                $userData['nisn'] = $data['nisn'];
                break;
                
            case 'umum':
                $userData['pekerjaan'] = $data['pekerjaan'] ?? null;
                break;
        }

        return User::create($userData);
    }

    protected function registered(Request $request, $user)
    {
        switch ($user->user_type) {
            case 'mahasiswa':
                return redirect()->route('mahasiswa.dashboard')
                    ->with('success', 'Registrasi berhasil! Selamat datang.');
            case 'siswa':
                return redirect()->route('siswa.dashboard')
                    ->with('success', 'Registrasi berhasil! Selamat datang.');
            case 'umum':
                return redirect()->route('umum.dashboard')
                    ->with('success', 'Registrasi berhasil! Selamat datang.');
            default:
                return redirect('/home');
        }
    }
}
