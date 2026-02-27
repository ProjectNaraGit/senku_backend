<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Rate limiting untuk mencegah brute force
        $this->checkTooManyFailedAttempts($request);

        // Validasi input
        $this->validateLogin($request);

        // Coba login
        if (Auth::attempt($this->credentials($request), $request->filled('remember'))) {
            // Reset rate limiter jika berhasil
            RateLimiter::clear($this->throttleKey($request));

            // Regenerate session
            $request->session()->regenerate();

            // Redirect berdasarkan tipe user
            return $this->authenticated($request, Auth::user());
        }

        // Jika gagal login
        $this->incrementLoginAttempts($request);
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    // Validasi input login
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'user_type' => 'required|in:mahasiswa,umum,siswa',
        ]);
    }

    // Menyiapkan credentials untuk login
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'user_type' => $request->user_type,
        ];
    }

    // Redirect setelah login berhasil
    protected function authenticated(Request $request, $user)
    {
        // Redirect berdasarkan tipe user
        switch ($user->user_type) {
            case 'mahasiswa':
                return redirect()->route('mahasiswa.dashboard');
            case 'siswa':
                return redirect()->route('siswa.dashboard');
            case 'umum':
                return redirect()->route('umum.dashboard');
            default:
                return redirect('/home');
        }
    }

    // Rate Limiting Methods
    protected function checkTooManyFailedAttempts(Request $request)
    {
        $key = $this->throttleKey($request);
        
        if (! RateLimiter::tooManyAttempts($key, 5)) {
            return;
        }

        throw ValidationException::withMessages([
            'email' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . RateLimiter::availableIn($key) . ' detik.',
        ]);
    }

    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit($this->throttleKey($request), 60); // 60 detik decay
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}