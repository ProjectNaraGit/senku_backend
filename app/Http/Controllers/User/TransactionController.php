<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    // Menampilkan semua transaksi user
    public function index()
    {
        $user = Auth::user();
        $pesanan = Pesanan::where('user_id', $user->id)
            ->orWhere('email_pemesan', $user->email)
            ->with('layanan')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('user.transactions.index', compact('pesanan'));
    }
    
    // Menampilkan detail transaksi
    public function show($id)
    {
        $pesanan = Pesanan::with('layanan')->findOrFail($id);
        
        // Cek apakah pesanan milik user yang login
        $user = Auth::user();
        if ($pesanan->user_id != $user->id && $pesanan->email_pemesan != $user->email) {
            abort(403, 'Akses ditolak.');
        }
        
        return view('user.transactions.show', compact('pesanan'));
    }
    
    // Menampilkan form pembuatan pesanan baru
    public function create($layanan_slug = null)
    {
        $layanan = null;
        
        if ($layanan_slug) {
            $layanan = Layanan::where('slug', $layanan_slug)
                ->active()
                ->firstOrFail();
        }
        
        $semuaLayanan = Layanan::active()
            ->ordered()
            ->get();
            
        return view('user.transactions.create', compact('layanan', 'semuaLayanan'));
    }
    
    // Menyimpan pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'nama_pemesan' => 'required|string|max:255',
            'email_pemesan' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'deskripsi_tugas' => 'required|string|min:10',
            'deadline' => 'required|date|after:today',
            'file_pendukung' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
        ]);
        
        $user = Auth::user();
        $layanan = Layanan::findOrFail($request->layanan_id);
        
        // Buat pesanan
        $pesanan = new Pesanan();
        $pesanan->kode_pesanan = $pesanan->generateKodePesanan();
        $pesanan->user_id = $user->id;
        $pesanan->layanan_id = $request->layanan_id;
        $pesanan->nama_pemesan = $request->nama_pemesan;
        $pesanan->email_pemesan = $request->email_pemesan;
        $pesanan->telepon = $request->telepon;
        $pesanan->deskripsi_tugas = $request->deskripsi_tugas;
        $pesanan->deadline = $request->deadline;
        $pesanan->total_harga = $layanan->harga;
        $pesanan->status = 'pending';
        
        // Upload file pendukung jika ada
        if ($request->hasFile('file_pendukung')) {
            $path = $request->file('file_pendukung')->store('pesanan_files', 'public');
            $pesanan->file_pendukung = $path;
        }
        
        $pesanan->save();
        
        // Kirim notifikasi email (opsional)
        // Mail::to($request->email_pemesan)->send(new PesananDibuat($pesanan));
        
        return redirect()->route('user.transactions.show', $pesanan->id)
            ->with('success', 'Pesanan berhasil dibuat! Kode Pesanan: ' . $pesanan->kode_pesanan);
    }
    
    // Upload file tambahan untuk pesanan
    public function uploadFile(Request $request, $id)
    {
        $request->validate([
            'file_tambahan' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
        ]);
        
        $pesanan = Pesanan::findOrFail($id);
        
        // Cek apakah pesanan milik user yang login
        $user = Auth::user();
        if ($pesanan->user_id != $user->id && $pesanan->email_pemesan != $user->email) {
            abort(403, 'Akses ditolak.');
        }
        
        // Upload file tambahan
        if ($request->hasFile('file_tambahan')) {
            $path = $request->file('file_tambahan')->store('pesanan_tambahan', 'public');
            
            // Simpan path ke catatan admin atau kolom khusus
            $pesanan->catatan_admin = $pesanan->catatan_admin . "\n\n[File tambahan diupload: " . now()->format('d/m/Y H:i') . "] Path: " . $path;
            $pesanan->save();
        }
        
        return redirect()->back()->with('success', 'File berhasil diupload.');
    }
    
    // Memberikan rating dan ulasan
    public function submitReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|min:10|max:500',
        ]);
        
        $pesanan = Pesanan::findOrFail($id);
        
        // Cek apakah pesanan sudah selesai
        if ($pesanan->status != 'selesai') {
            return redirect()->back()->with('error', 'Hanya pesanan yang sudah selesai yang dapat diberi rating.');
        }
        
        // Cek apakah pesanan milik user yang login
        $user = Auth::user();
        if ($pesanan->user_id != $user->id && $pesanan->email_pemesan != $user->email) {
            abort(403, 'Akses ditolak.');
        }
        
        // Cek apakah sudah memberikan rating
        if ($pesanan->rating) {
            return redirect()->back()->with('error', 'Anda sudah memberikan rating untuk pesanan ini.');
        }
        
        $pesanan->rating = $request->rating;
        $pesanan->ulasan = $request->ulasan;
        $pesanan->save();
        
        // Update rating layanan
        $this->updateLayananRating($pesanan->layanan_id);
        
        return redirect()->back()->with('success', 'Terima kasih atas rating dan ulasan Anda!');
    }
    
    // Update rating layanan berdasarkan semua rating
    private function updateLayananRating($layanan_id)
    {
        $layanan = Layanan::findOrFail($layanan_id);
        $averageRating = Pesanan::where('layanan_id', $layanan_id)
            ->whereNotNull('rating')
            ->avg('rating');
        
        // Simpan rating rata-rata ke cache atau kolom khusus
        // Anda bisa menambahkan kolom 'rating' ke tabel layanans jika perlu
    }
}