<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user_type' => 'required|in:mahasiswa,siswa,umum',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required_if:user_type,umum|string|max:255',
            'nim' => 'required_if:user_type,mahasiswa|string|max:20|unique:users,nim',
            'nisn' => 'required_if:user_type,siswa|string|max:20|unique:users,nisn',
            'nama_lengkap' => 'required_if:user_type,siswa|string|max:255',
            'jurusan' => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $userData = [
            'user_type' => $request->user_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ];

        // Tambahkan field sesuai tipe user
        switch ($request->user_type) {
            case 'mahasiswa':
                $userData['nim'] = $request->nim;
                $userData['name'] = $request->nama_lengkap ?? $request->name;
                if (isset($request->jurusan)) {
                    $userData['jurusan'] = $request->jurusan;
                }
                break;
                
            case 'siswa':
                $userData['nisn'] = $request->nisn;
                $userData['name'] = $request->nama_lengkap;
                $userData['sekolah_asal'] = $request->sekolah_asal ?? null;
                break;
                
            case 'umum':
                $userData['name'] = $request->name;
                $userData['pekerjaan'] = $request->pekerjaan ?? null;
                break;
        }

        $user = User::create($userData);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi berhasil',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
