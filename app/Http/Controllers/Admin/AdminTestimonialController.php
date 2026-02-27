<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderByDesc('id')->get();

        return view('admin.testimoni', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $storedPath = $request->file('image')->store('testimonials', 'public');

        Testimonial::create([
            'image_path' => 'storage/' . $storedPath,
        ]);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $path = $testimonial->image_path;

        if ($path) {
            if (Str::startsWith($path, 'storage/')) {
                $storagePath = Str::after($path, 'storage/');

                if (Storage::disk('public')->exists($storagePath)) {
                    Storage::disk('public')->delete($storagePath);
                }
            } else {
                $publicPath = public_path($path);

                if (file_exists($publicPath)) {
                    @unlink($publicPath);
                }
            }
        }

        $testimonial->delete();

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}
