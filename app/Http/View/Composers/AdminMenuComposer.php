<?php

namespace App\Http\View\Composers;

use App\Models\Pesanan;
use Illuminate\View\View;

class AdminMenuComposer
{
    public function compose(View $view)
    {
        $pendingOrdersCount = Pesanan::whereNotIn('status', ['completed', 'cancelled', 'selesai'])
            ->count();
        
        $view->with('pendingOrdersCount', $pendingOrdersCount);
    }
}
