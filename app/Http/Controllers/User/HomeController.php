<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan landing page
     */
    public function index()
    {
        // Layanan yang ditampilkan di landing page
        $layananUtama = Layanan::active()
            ->featured()
            ->ordered()
            ->limit(6)
            ->get();
        
        // Layanan populer berdasarkan jumlah pesanan
        $layananPopuler = Layanan::active()
            ->withCount(['pesanan as jumlah_pesanan'])
            ->orderBy('jumlah_pesanan', 'desc')
            ->limit(6)
            ->get();
        
        // Layanan berdasarkan kategori
        $kategoriLayanan = Layanan::active()
            ->select('kategori')
            ->distinct()
            ->orderBy('kategori')
            ->get();
        
        // Statistik untuk ditampilkan
        $stats = [
            'total_layanan' => Layanan::active()->count(),
            'total_pesanan' => Pesanan::count(),
            'pesanan_selesai' => Pesanan::selesai()->count(),
            'rating_rata' => number_format(Pesanan::whereNotNull('rating')->avg('rating') ?? 0, 1),
        ];
        
        return view('home.index', compact(
            'layananUtama',
            'layananPopuler',
            'kategoriLayanan',
            'stats'
        ));
    }

    /**
     * Menampilkan semua layanan
     */
    public function services(Request $request)
    {
        $query = Layanan::active()->ordered();
        
        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != 'semua') {
            $query->where('kategori', $request->kategori);
        }
        
        $layanan = $query->paginate(12);
        $kategori = Layanan::active()->select('kategori')->distinct()->pluck('kategori');
        
        return view('home.services', compact('layanan', 'kategori'));
    }

    /**
     * Menampilkan detail layanan
     */
    public function serviceDetail($slug)
    {
        $layanan = Layanan::where('slug', $slug)->firstOrFail();
        $layananLain = Layanan::where('id', '!=', $layanan->id)
            ->active()
            ->inRandomOrder()
            ->limit(4)
            ->get();
            
        return view('home.service-detail', compact('layanan', 'layananLain'));
    }

    /**
     * Menampilkan halaman about
     */
    public function about()
    {
        return view('home.about');
    }

    /**
     * Menampilkan halaman contact
     */
    public function contact()
    {
        return view('home.contact');
    }
}
