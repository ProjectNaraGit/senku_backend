<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman profile dengan daftar pesanan user
     */
    public function index()
    {
        $user = Auth::user();
        
        // Ambil semua pesanan milik user yang sedang login
        $pesanans = Pesanan::with('layanan')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        Pesanan::where('user_id', Auth::id())
            ->whereNull('status_seen_at')
            ->update(['status_seen_at' => now()]);
        
        return view('user.profile', compact('user', 'pesanans'));
    }
    
    /**
     * Update profile photo
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,jpg,png|max:10240' // max 10MB
        ]);

        $user = Auth::user();

        // Delete old photo if exists
        if ($user->foto_profil && file_exists(public_path('storage/' . $user->foto_profil))) {
            unlink(public_path('storage/' . $user->foto_profil));
        }

        // Upload new photo
        $path = $request->file('foto_profil')->store('profile-photos', 'public');
        
        $user->update([
            'foto_profil' => $path
        ]);

        return redirect()->route('user.profile')->with('success', 'Foto profile berhasil diupdate!');
    }

    /**
     * Update name
     */
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $user = Auth::user();
        
        $user->update([
            'name' => $request->name
        ]);

        return redirect()->route('user.profile')->with('success', 'Nama berhasil diupdate!');
    }

    /**
     * Update birth date
     */
    public function updateBirthDate(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|numeric|min:1|max:31',
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:1900|max:' . date('Y')
        ]);

        $user = Auth::user();
        
        // Format tanggal lahir
        $tanggalLahir = sprintf('%04d-%02d-%02d', $request->tahun, $request->bulan, $request->tanggal);
        
        $user->update([
            'tanggal_lahir' => $tanggalLahir
        ]);

        return redirect()->route('user.profile')->with('success', 'Tanggal lahir berhasil diupdate!');
    }
    
    /**
     * Menampilkan detail pesanan
     */
    public function showPesanan($id)
    {
        $pesanan = Pesanan::with('layanan')
            ->where('user_id', Auth::id())
            ->findOrFail($id);
        
        return view('user.pesanan-detail', compact('pesanan'));
    }
}
