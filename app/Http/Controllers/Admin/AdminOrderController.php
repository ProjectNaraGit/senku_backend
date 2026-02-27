<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with(['user', 'layanan'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.order', compact('pesanans'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::with(['user', 'layanan', 'orderItems'])
            ->findOrFail($id);
        
        return view('admin.order-detail', compact('pesanan'));
    }

    public function edit($id)
    {
        $pesanan = Pesanan::with(['user', 'layanan'])
            ->findOrFail($id);
        
        return view('admin.update-order', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled,selesai',
            'catatan_admin' => 'nullable|string',
        ]);

        $pesanan->status = $validated['status'];
        $pesanan->status_seen_at = null;
        
        if (isset($validated['catatan_admin'])) {
            $pesanan->catatan_admin = $validated['catatan_admin'];
        }

        $pesanan->save();

        return redirect()->route('admin.order.index')
            ->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled,selesai',
            'catatan_admin' => 'nullable|string',
            'total_harga' => 'nullable|numeric|min:0',
        ]);

        $pesanan->status = $validated['status'];
        
        if (isset($validated['catatan_admin'])) {
            $pesanan->catatan_admin = $validated['catatan_admin'];
        }

        if (isset($validated['total_harga'])) {
            $pesanan->total_harga = $validated['total_harga'];
        }

        $pesanan->save();

        return redirect()->route('admin.order.index')
            ->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('admin.order.index')
            ->with('success', 'Pesanan berhasil dihapus!');
    }

    public function dashboard()
    {
        $totalOrders = Pesanan::count();
        $pendingOrders = Pesanan::where('status', 'pending')->count();
        $processingOrders = Pesanan::where('status', 'processing')->count();
        $completedOrders = Pesanan::where('status', 'completed')->count();
        
        $totalRevenue = Pesanan::whereIn('status', ['completed', 'selesai'])
            ->sum('total_harga');
        
        $recentOrders = Pesanan::with(['user', 'layanan'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $monthlyStats = $this->getMonthlyStats();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'totalRevenue',
            'recentOrders',
            'monthlyStats'
        ));
    }

    protected function getMonthlyStats()
    {
        return Pesanan::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(total_harga) as total_revenue')
        )
        ->whereIn('status', ['completed', 'selesai'])
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->limit(12)
        ->get();
    }
}
