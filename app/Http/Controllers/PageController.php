<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.index');
    }

    public function contact()
    {
        return view('pages.kontak');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function tutorial()
    {
        return view('pages.tutorial');
    }
}
