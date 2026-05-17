<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Halaman Home (index)
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Halaman About
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Halaman Portfolio
     */
    public function portfolio()
    {
        return view('pages.portfolio');
    }

    /**
     * Halaman Contact (Form)
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
