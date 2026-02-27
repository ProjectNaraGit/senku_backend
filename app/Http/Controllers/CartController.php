<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menampilkan halaman cart
     */
    public function index()
    {
        $cartItems = $this->getCartItems();
        $total = $cartItems->sum('subtotal');
        
        return view('user.cart', compact('cartItems', 'total'));
    }

    /**
     * Menambahkan item ke cart
     */
    public function addToCart(Request $request, $layananId)
    {
        $layanan = Layanan::findOrFail($layananId);
        $quantity = $request->input('quantity', 1);
        
        $userId = Auth::id();
        $sessionId = session()->getId();
        
        // Cek apakah item sudah ada di cart
        $cartItem = Cart::where('layanan_id', $layananId)
            ->where(function($query) use ($userId, $sessionId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->first();
        
        if ($cartItem) {
            // Update quantity jika sudah ada
            $cartItem->quantity += $quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->harga_satuan;
            $cartItem->save();
        } else {
            // Buat cart item baru
            Cart::create([
                'user_id' => $userId,
                'layanan_id' => $layananId,
                'quantity' => $quantity,
                'harga_satuan' => $layanan->harga_layanan,
                'subtotal' => $quantity * $layanan->harga_layanan,
                'session_id' => $sessionId
            ]);
        }
        
        return redirect()->route('user.cart')->with('success', 'Layanan berhasil ditambahkan ke keranjang!');
    }

    /**
     * Update quantity item di cart
     */
    public function updateQuantity(Request $request, $cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $quantity = $request->input('quantity', 1);
        
        if ($quantity > 0) {
            $cartItem->quantity = $quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->harga_satuan;
            $cartItem->save();
            
            return response()->json([
                'success' => true,
                'subtotal' => number_format($cartItem->subtotal, 0, ',', '.'),
                'total' => number_format($this->getCartItems()->sum('subtotal'), 0, ',', '.')
            ]);
        }
        
        return response()->json(['success' => false], 400);
    }

    /**
     * Hapus item dari cart
     */
    public function removeFromCart($cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $cartItem->delete();
        
        return redirect()->route('user.cart')->with('success', 'Item berhasil dihapus dari keranjang!');
    }

    /**
     * Proses checkout dari cart
     */
    public function checkout()
    {
        $cartItems = $this->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('user.cart')->with('error', 'Keranjang Anda kosong!');
        }
        
        $total = $cartItems->sum('subtotal');
        
        // Ambil layanan lain sebagai additional products (exclude yang sudah di cart)
        $cartLayananIds = $cartItems->pluck('layanan_id')->toArray();
        $additionalLayanan = Layanan::whereNotIn('id', $cartLayananIds)
            ->limit(5)
            ->get();
        
        // Gunakan view co-detail dengan data dari cart
        return view('order.co-detail', [
            'cartItems' => $cartItems,
            'total' => $total,
            'layanan' => null,
            'additionalLayanan' => $additionalLayanan
        ]);
    }

    /**
     * Helper untuk mendapatkan cart items
     */
    private function getCartItems()
    {
        $userId = Auth::id();
        $sessionId = session()->getId();
        
        return Cart::with('layanan')
            ->where(function($query) use ($userId, $sessionId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->get();
    }
}
