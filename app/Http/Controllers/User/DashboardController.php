<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard user
     */
    public function index()
    {
        // Ambil data layanan dari database, maksimal 8 untuk ditampilkan di grid 4x2
        $layanan = Layanan::orderBy('id', 'asc')->limit(8)->get();
        
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
        
        return view('user.dashboard', compact('layanan'));
    }
}
