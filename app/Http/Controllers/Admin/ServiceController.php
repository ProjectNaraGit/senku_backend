<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    // Menampilkan semua layanan
    public function index()
    {
        $layanan = Layanan::orderBy('urutan')->get();
        return view('admin.services.index', compact('layanan'));
    }
    
    // Menampilkan form tambah layanan
    public function create()
    {
        return view('admin.services.create');
    }
    
    // Menyimpan layanan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deskripsi_lengkap' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'estimasi_waktu' => 'nullable|integer|min:1',
            'kategori' => 'required|string|max:100',
            'icon' => 'nullable|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer',
        ]);
        
        $layanan = new Layanan();
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->slug = Str::slug($request->nama_layanan);
        $layanan->deskripsi = $request->deskripsi;
        $layanan->deskripsi_lengkap = $request->deskripsi_lengkap;
        $layanan->harga = $request->harga;
        $layanan->estimasi_waktu = $request->estimasi_waktu;
        $layanan->kategori = $request->kategori;
        $layanan->icon = $request->icon;
        $layanan->is_featured = $request->boolean('is_featured');
        $layanan->is_active = $request->boolean('is_active');
        $layanan->urutan = $request->urutan ?? 0;
        
        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('layanan', 'public');
            $layanan->gambar = $path;
        }
        
        $layanan->save();
        
        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }
    
    // Menampilkan form edit layanan
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.services.edit', compact('layanan'));
    }
    
    // Update layanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deskripsi_lengkap' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'estimasi_waktu' => 'nullable|integer|min:1',
            'kategori' => 'required|string|max:100',
            'icon' => 'nullable|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer',
        ]);
        
        $layanan = Layanan::findOrFail($id);
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->slug = Str::slug($request->nama_layanan);
        $layanan->deskripsi = $request->deskripsi;
        $layanan->deskripsi_lengkap = $request->deskripsi_lengkap;
        $layanan->harga = $request->harga;
        $layanan->estimasi_waktu = $request->estimasi_waktu;
        $layanan->kategori = $request->kategori;
        $layanan->icon = $request->icon;
        $layanan->is_featured = $request->boolean('is_featured');
        $layanan->is_active = $request->boolean('is_active');
        $layanan->urutan = $request->urutan ?? $layanan->urutan;
        
        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            
            $path = $request->file('gambar')->store('layanan', 'public');
            $layanan->gambar = $path;
        }
        
        $layanan->save();
        
        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }
    
    // Menghapus layanan
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }
        
        $layanan->delete();
        
        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}