<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminLayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::orderBy('created_at', 'desc')->get();
        return view('admin.layanan', compact('layanans'));
    }

    public function create()
    {
        return view('admin.tambah-layanan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi_layanan' => 'required|string',
            'harga_layanan' => 'required|numeric|min:0',
            'gambar_layanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $layanan = new Layanan();
        $layanan->nama_layanan = $validated['nama_layanan'];
        $layanan->slug = Str::slug($validated['nama_layanan']);
        $layanan->kategori = $validated['kategori'] ?? null;
        $layanan->deskripsi_layanan = $validated['deskripsi_layanan'];
        $layanan->harga_layanan = $validated['harga_layanan'];
        $layanan->is_active = $request->has('is_active') ? true : false;
        $layanan->order = $validated['order'] ?? 0;

        if ($request->hasFile('gambar_layanan')) {
            $file = $request->file('gambar_layanan');
            $filename = time() . '_' . Str::slug($validated['nama_layanan']) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('layanan', $filename, 'public');
            $layanan->gambar_layanan = $path;
        }

        $layanan->save();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.edit-layanan', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'deskripsi_layanan' => 'required|string',
            'harga_layanan' => 'required|numeric|min:0',
            'gambar_layanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $layanan->nama_layanan = $validated['nama_layanan'];
        $layanan->slug = Str::slug($validated['nama_layanan']);
        $layanan->kategori = $validated['kategori'] ?? null;
        $layanan->deskripsi_layanan = $validated['deskripsi_layanan'];
        $layanan->harga_layanan = $validated['harga_layanan'];
        $layanan->is_active = $request->has('is_active') ? true : false;
        $layanan->order = $validated['order'] ?? $layanan->order;

        if ($request->hasFile('gambar_layanan')) {
            if ($layanan->gambar_layanan && Storage::disk('public')->exists($layanan->gambar_layanan)) {
                Storage::disk('public')->delete($layanan->gambar_layanan);
            }

            $file = $request->file('gambar_layanan');
            $filename = time() . '_' . Str::slug($validated['nama_layanan']) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('layanan', $filename, 'public');
            $layanan->gambar_layanan = $path;
        }

        $layanan->save();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->gambar_layanan && Storage::disk('public')->exists($layanan->gambar_layanan)) {
            Storage::disk('public')->delete($layanan->gambar_layanan);
        }

        $layanan->delete();

        return redirect()->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }
}
