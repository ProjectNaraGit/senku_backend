<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman checkout detail dengan data layanan
     */
    public function showDetail($id)
    {
        // Ambil data layanan berdasarkan ID
        $layanan = Layanan::findOrFail($id);
        
        // Ambil layanan lain sebagai additional products (exclude layanan yang dipilih)
        $additionalLayanan = Layanan::where('id', '!=', $id)
            ->limit(5)
            ->get();
        
        return view('order.detail-layanan', compact('layanan', 'additionalLayanan'));
    }

    /**
     * Menampilkan halaman checkout dengan data layanan
     */
    public function showCheckout($id)
    {
        // Ambil data layanan berdasarkan ID
        $layanan = Layanan::findOrFail($id);
        
        // Ambil layanan lain sebagai additional products (exclude layanan yang dipilih)
        $additionalLayanan = Layanan::where('id', '!=', $id)
            ->limit(5)
            ->get();
        
        return view('order.co-detail', compact('layanan', 'additionalLayanan'));
    }

    /**
     * Menampilkan halaman verification dengan data checkout
     */
    public function showVerification(Request $request)
    {
        // Simpan data checkout ke session dari query params
        $checkoutData = [
            'items' => $request->input('items', []),
            'total' => $request->input('total', 0),
            'from_cart' => $request->input('from_cart', false)
        ];
        
        session(['checkout_data' => $checkoutData]);
        
        // Decode JSON items jika masih dalam bentuk string
        $items = is_string($checkoutData['items']) 
            ? json_decode($checkoutData['items'], true) 
            : $checkoutData['items'];
        
        return view('order.co-verif', [
            'items' => $items,
            'total' => $checkoutData['total'],
            'from_cart' => $checkoutData['from_cart'] ?? false
        ]);
    }

    /**
     * Proses checkout dan redirect ke payment
     */
    public function processCheckout(Request $request)
    {
        // Data sudah ada di session dari verification
        return redirect()->route('order.co-payment');
    }

    /**
     * Menampilkan halaman payment dengan data checkout
     */
    public function showPayment()
    {
        // Ambil data checkout dari session
        $checkoutData = session('checkout_data');
        
        if (!$checkoutData) {
            return redirect()->route('user.cart')->with('error', 'Data checkout tidak ditemukan');
        }
        
        // Decode JSON items jika masih dalam bentuk string
        $items = is_string($checkoutData['items']) 
            ? json_decode($checkoutData['items'], true) 
            : $checkoutData['items'];
        
        return view('order.co-bayar', [
            'items' => $items,
            'total' => $checkoutData['total'],
            'from_cart' => $checkoutData['from_cart'] ?? false
        ]);
    }

    /**
     * Upload bukti pembayaran dan simpan pesanan ke database
     */
    public function uploadPaymentProof(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:5120', // max 5MB
                'payment_method' => 'required|string',
                'total' => 'required|numeric',
                'items' => 'required|string'
            ]);

            // Ambil data checkout dari session
            $checkoutData = session('checkout_data');
            
            if (!$checkoutData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data checkout tidak ditemukan'
                ], 400);
            }

            // Decode items
            $items = json_decode($request->items, true);
            
            if (empty($items)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data items tidak valid'
                ], 400);
            }

            // Upload file bukti pembayaran
            if (!$request->hasFile('payment_proof')) {
                return response()->json([
                    'success' => false,
                    'message' => 'File bukti pembayaran tidak ditemukan'
                ], 400);
            }

            $file = $request->file('payment_proof');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/payment_proofs'), $filename);

            // Mulai database transaction
            DB::beginTransaction();

            try {
                // Ambil layanan utama (item pertama)
                $mainItem = $items[0];
                
                // Buat pesanan utama
                $pesanan = Pesanan::create([
                    'kode_pesanan' => Pesanan::generateKodePesanan(),
                    'user_id' => Auth::id() ?? 1, // Default ke user ID 1 jika belum login
                    'layanan_id' => $mainItem['id'],
                    'nama_pemesan' => Auth::user()->name ?? 'Guest',
                    'email_pemesan' => Auth::user()->email ?? 'guest@example.com',
                    'telepon' => '-',
                    'deskripsi_tugas' => 'Pesanan melalui checkout online',
                    'deadline' => now()->addDays(7), // Default 7 hari dari sekarang
                    'total_harga' => $request->total,
                    'harga_layanan' => $mainItem['price'],
                    'status' => 'pending',
                    'payment_method' => $request->payment_method,
                    'payment_proof' => $filename,
                    'payment_uploaded_at' => now()
                ]);

                // Simpan semua items ke order_items
                foreach ($items as $item) {
                    OrderItem::create([
                        'pesanan_id' => $pesanan->id,
                        'layanan_id' => $item['id'],
                        'layanan_name' => $item['name'],
                        'quantity' => $item['qty'],
                        'price' => $item['price'],
                        'subtotal' => $item['subtotal']
                    ]);
                }

                // Commit transaction
                DB::commit();

                // Clear checkout data dari session
                session()->forget(['checkout_data', 'payment_data']);

                return response()->json([
                    'success' => true,
                    'message' => 'Pesanan berhasil dibuat dan bukti pembayaran telah diupload',
                    'data' => [
                        'order_code' => $pesanan->kode_pesanan,
                        'order_id' => $pesanan->id,
                        'payment_method' => $request->payment_method,
                        'total' => $request->total
                    ]
                ]);

            } catch (\Exception $e) {
                // Rollback transaction jika ada error
                DB::rollBack();
                
                // Hapus file yang sudah diupload
                if (file_exists(public_path('images/payment_proofs/' . $filename))) {
                    unlink(public_path('images/payment_proofs/' . $filename));
                }
                
                throw $e;
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
