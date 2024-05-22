<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


/**
 * File Controller
 *
 * @author João Victor Costa <joaovictorcosta@sysout.com.br>
 * @since 22/05/2024
 * @version 1.0.0
 */
class FileController extends Controller
{
    function getImage(int $id){
        $f = File::find($id);
        $image = Storage::get($f->path);
        return $image;
    }
}
