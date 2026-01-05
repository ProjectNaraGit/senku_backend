<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Pesanan::with(['user', 'layanan'])->get();
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = Pesanan::with(['user', 'layanan'])->findOrFail($id);
        return response()->json($order);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Pesanan::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);
        return response()->json($order);
    }

    public function getSalesStats()
    {
        $stats = [
            'total_sales' => Pesanan::where('status', 'completed')->count(),
            'revenue' => Pesanan::where('status', 'completed')
                              ->select(DB::raw('SUM(harga_layanan) as total'))
                              ->first()->total ?? 0,
            'pending_orders' => Pesanan::where('status', 'pending')->count(),
            'completed_orders' => Pesanan::where('status', 'completed')->count(),
            'monthly_sales' => $this->getMonthlySales(),
        ];

        return response()->json($stats);
    }

    protected function getMonthlySales()
    {
        return Pesanan::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('SUM(harga_layanan) as total_revenue')
        )
        ->where('status', 'completed')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();
    }
}
