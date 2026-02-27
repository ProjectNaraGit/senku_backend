<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard user
     */
    public function index(Request $request)
    {
        // Query layanan dengan filter kategori
        $query = Layanan::query();
        
        // Filter berdasarkan kategori jika ada parameter
        if ($request->has('kategori') && $request->kategori != 'semua') {
            $query->where('kategori', $request->kategori);
            $layanan = $query->orderBy('id', 'asc')->limit(8)->get();
        } else {
            // Tampilkan semua layanan jika kategori = semua atau tidak ada filter
            $layanan = $query->orderBy('id', 'asc')->get();
        }
        
        // Ambil semua kategori yang tersedia
        $kategoris = Layanan::whereNotNull('kategori')
            ->where('kategori', '!=', '')
            ->distinct()
            ->pluck('kategori');
        
        // Jika belum ada data layanan di database, gunakan data alternatif
        if ($layanan->isEmpty()) {
            $layanan = collect([
                (object)[
                    'id' => 1,
                    'nama_layanan' => 'Konsultasi Personal Development',
                    'deskripsi_layanan' => 'nisl. maximus venenatis malesuada tincidunt commodo In nulla, elit Cras at, non ex in Lorem laoreet Donec elementum nisl. tincidunt efficitur. nec nec amet,',
                    'gambar_layanan' => null,
                ],
                (object)[
                    'id' => 2,
                    'nama_layanan' => 'Konsultasi Akademik & Komprehensif',
                    'deskripsi_layanan' => 'nisl. maximus venenatis malesuada tincidunt commodo In nulla, elit Cras at, non ex in Lorem laoreet Donec elementum nisl. tincidunt efficitur. nec nec amet,',
                    'gambar_layanan' => null,
                ],
                (object)[
                    'id' => 3,
                    'nama_layanan' => 'Bantuan & Bimbingan Akademik',
                    'deskripsi_layanan' => 'nisl. maximus venenatis malesuada tincidunt commodo In nulla, elit Cras at, non ex in Lorem laoreet Donec elementum nisl. tincidunt efficitur. nec nec amet,',
                    'gambar_layanan' => null,
                ],
                (object)[
                    'id' => 4,
                    'nama_layanan' => 'Konsultasi Personal Development',
                    'deskripsi_layanan' => 'nisl. maximus venenatis malesuada tincidunt commodo In nulla, elit Cras at, non ex in Lorem laoreet Donec elementum nisl. tincidunt efficitur. nec nec amet,',
                    'gambar_layanan' => null,
                ],
                (object)[
                    'id' => 5,
                    'nama_layanan' => 'Konsultasi Personal Development',
                    'deskripsi_layanan' => 'nisl. maximus venenatis malesuada tincidunt commodo In nulla, elit Cras at, non ex in Lorem laoreet Donec elementum nisl. tincidunt efficitur. nec nec amet,',
                    'gambar_layanan' => null,
                ],
                (object)[
                    'id' => 6,
                    'nama_layanan' => 'Konsultasi Akademik & Komprehensif',
                    'deskripsi_layanan' => 'nisl. maximus venenatis malesuada tincidunt commodo In nulla, elit Cras at, non ex in Lorem laoreet Donec elementum nisl. tincidunt efficitur. nec nec amet,',
                    'gambar_layanan' => null,
                ],
                (object)[
                    'id' => 7,
                    'nama_layanan' => 'Bantuan & Bimbingan Akademik',
                    'deskripsi_layanan' => 'nisl. maximus venenatis malesuada tincidunt commodo In nulla, elit Cras at, non ex in Lorem laoreet Donec elementum nisl. tincidunt efficitur. nec nec amet,',
                    'gambar_layanan' => null,
                ],
                (object)[
                    'id' => 8,
                    'nama_layanan' => 'Konsultasi Personal Development',
                    'deskripsi_layanan' => 'nisl. maximus venenatis malesuada tincidunt commodo In nulla, elit Cras at, non ex in Lorem laoreet Donec elementum nisl. tincidunt efficitur. nec nec amet,',
                    'gambar_layanan' => null,
                ],
            ]);
        }
        
        $notificationCount = 0;

        if (Auth::check()) {
            $notificationCount = Pesanan::query()
                ->where('user_id', Auth::id())
                ->whereNull('status_seen_at')
                ->whereNotNull('status')
                ->count();
        }

        return view('user.dashboard', compact('layanan', 'kategoris', 'notificationCount'));
    }
}
