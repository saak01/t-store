<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Material;
use App\Models\Tshirt;
use App\Models\Type;
use Illuminate\Http\Request;

/**
 * Tshirt Controller
 *
 * @author João Victor Costa <joaovictorcosta@sysout.com.br>
 * @since 16/05/2024
 * @version 1.0.0
 */
class TshirtController extends Controller
{
     /**
      * Redirecionamento para formulário
      * @return void
      */
    function create(){
        $tshirt = new Tshirt();
        return $this->form($tshirt);
    }
    /**
     * Formulário adicionar t-shirt
     * @param Tshirt $tshirt
     * @return void
     */
    function form(Tshirt $tshirt){

        $colors = Color::all();

        $material = Material::all();

        $types = Type::all();

        $data = [
            "tshirts" => $tshirt,
            "colors" => $colors,
            "materials" => $material,
            "types" => $types,
        ];

        return view('pages.home.form',$data);
    }
}
