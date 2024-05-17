<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\File;
use App\Models\Material;
use App\Models\Tshirt;
use App\Models\Type;
use Exception;
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
    function create()
    {
        $tshirt = new Tshirt();
        return $this->form($tshirt);
    }

    function edit(int $id)
    {
        $tshirt = Tshirt::find($id);

        $data = ['tshirt' => $tshirt];

        return view('pages.home.form',$data);
    }

    /**
     * Formulário adicionar t-shirt
     * @param Tshirt $tshirt
     * @return void
     */
    function form(Tshirt $tshirt)
    {

        $colors = Color::all();

        $material = Material::all();

        $types = Type::all();

        $data = [
            "tshirt" => $tshirt,
            "colors" => $colors,
            "materials" => $material,
            "types" => $types,
        ];

        return view('pages.home.form', $data);
    }

    /**
     * Recebe dados do usuário para post
     *
     * @param Request $request
     * @return void
     */
    function insert(Request $request)
    {
        $this->store($request);
        return redirect('admin/home/tshirts');
    }
    /**
     * Store
     *
     * @param Request $request
     * @return void
     */
    function store(Request $request)
    {
        $validator = $this->validation($request);
        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withInput()->withErrors($error);
        } else {
            $request->session()->flash('success', 'Usuário foi salvo');
            $tshirt = $request->id ? Tshirt::find($request->id) : new Tshirt();
            $this->save($tshirt, $request);
        }
    }
    /**
     * Salva arquivo no storage e salva no banco
     *
     * @param [type] $tshirt
     * @param [type] $request
     * @return void
     */
    /**
     * Salva a imagem no storage e banco de dados;
     *
     * @param Request $request
     * @return string
     */
    function saveFile(Request $request)
    {
        $f = $request->file;
        $hash = md5_file($f->path());
        $extension = $f->extension();
        $filename = $hash . '.' . $extension;
        $dir = 'files/' . date('Y/m/d');
        $storepath = $dir . '/' . $filename;
        Storage::putFileAs($dir, $f, $filename);
        $file = new File();
        $file->path = $storepath;
        $file->mime = $f->getMimeType();
        $file->extension = $extension;
        $file->size = $f->getsize();
        $file->created_at = now();
        $file->save();
        return $file->id;
    }

    /**
     * Salva Tshirt no banco de dados
     * Undocumented function
     *
     * @param Tshirt $tshirt
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    private function save(Tshirt $tshirt, Request $request)
    {
        //Salva a imagem passada no form, seu retorno é storepath.
        $idImage = $this->saveFile($request);
        //Salva dados da tshirt na banco
        $tshirt->name = $request->name;
        $tshirt->quantity = $request->quantity;
        $tshirt->image_id = $idImage;
        $tshirt->material_id = $request->material_id;
        $tshirt->color_id = $request->color_id;
        $tshirt->type_id = $request->type_id;
        $tshirt->save();
    }

    function delete(Request $request)
    {
        $tshirt = Tshirt::find($request->id);
        $file = File::find($tshirt->image_id);
        if ($tshirt) {
            Storage::delete($file->path);
            $tshirt->delete($tshirt->image_id);
        }

        return redirect('admin/home/tshirts');
    }

    /**
     * Validator requests
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator $validator
     */
    private function validation(Request $request)
    {
        $rules = [
            "name" => ['required', 'string', 'max:20'],
            "quantity" => ['required', 'integer', 'min:1'],
            "file" => ['required', 'image', 'max:1000'],
            "color_id" => ['required', 'integer', 'exists:colors,id'],
            "material_id" => ['required', 'integer', 'exists:materials,id'],
        ];

        $method = $request->method();

        if ($method == 'PUT') {
            $rules['id'] = ['required', 'integer', 'exists:tshirts:id'];
        }

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }
}
