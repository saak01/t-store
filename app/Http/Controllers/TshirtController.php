<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Material;
use App\Models\Tshirt;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Recebe dados do usuário para post
     *
     * @param Request $request
     * @return void
     */
    function insert(Request $request){
        $this->store($request);
    }

    /**
     * Store
     *
     * @param Request $request
     * @return void
     */
    function store(Request $request) {
        $validator = $this->validation($request);
        if($validator->fails()){
            $error = $validator->errors();
            return back()->withInput()->withErrors($error);
        }
        else{
            $request->session()->flash('success', 'Usuário foi salvo');
            $tshirt = $request->id ? Tshirt::find($request->id) : new Tshirt();
            $this->save($tshirt,$request);
        }
    }

    private function save($tshirt, $request){
        $f = $request->file;

        $hash = md5_file($f->path());

        $extension = $f->extension();

        $filename = $hash.'.'.$extension;

        $dir = 'files/'.date('Y/m/d');
    }

    /**
     * Validator requests
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator $validator
     */
    private function validation (Request $request){
        $rules = [
            "name" => ['required', 'string', 'max:20'],
            "quantity" => ['required','integer', 'min:1'],
            "file" => ['required', 'image','max:1000'],
            "color_id" => ['required', 'integer', 'exists:colors,id'],
            "material_id" => ['required', 'integer', 'exists:materials,id'],
        ];

        $method = $request->method();

        if($method == 'PUT'){
            $rules['id'] = ['required', 'integer', 'exists:tshirts:id'];
        }

        $validator = Validator::make($request->all(),$rules);

        return $validator;
    }
}
