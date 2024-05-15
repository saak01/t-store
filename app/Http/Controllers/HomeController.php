<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Listas das camisetas
     *
     * @return void
     */
    function index() {
        return view('pages.home.index');
    }
}
