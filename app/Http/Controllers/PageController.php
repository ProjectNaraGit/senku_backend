<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.index');
    }
    public function cara_order()
    {
        return view('pages.cara_order');
    }
    public function testimoni()
    {
        return view('pages.testimoni');
    }
    public function faq()
    {
        return view('pages.faq');
    }
    public function kontak()
    {
        return view('pages.kontak');
    }
}
