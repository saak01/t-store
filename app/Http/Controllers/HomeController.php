<?php

namespace App\Http\Controllers;

use App\Models\Tshirt;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Listas Tshirts
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    function index() {

        $query = Tshirt::search();

        $list = $query->paginate(10);

        $data = ["tshirts" => $list];

        return view('pages.home.index', $data);
    }
}
