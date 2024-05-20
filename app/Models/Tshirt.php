<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Tshirt Model
 *
 * @author João Victor Costa <joaovictorcosta@sysout.com.br>
 * @since 16/05/2024
 * @version 1.0.0
 */
class Tshirt extends Model
{
    use HasFactory;

    /**
     * Função de escopo para listar todos as shirt
     *
     * @return void
     */
    public function scopeSearch($query){
        $query->from('tshirts as t');
        $query->join('types as ty', 'ty.id', 't.type_id');
        $query->join('colors as c', 'c.id', 't.color_id');
        $query->join('materials as mt', 'mt.id', 't.material_id');
        $query->join('files as fi', 'fi.id', 't.image_id');
        $query->select(
            't.*',
            'ty.name as type_name',
            'c.name as color_name',
            'mt.name as material_name',
            'fi.path as image_path'
        );
    }

        /**
     * Função de escopo
     *
     * @return void
     */
    public function scopeSearchById($query, int $id){
        $query->from('tshirts as t');
        $query->join('types as ty', 'ty.id', 't.type_id');
        $query->join('colors as c', 'c.id', 't.color_id');
        $query->join('materials as mt', 'mt.id', 't.material_id');
        $query->join('files as fi', 'fi.id', 't.image_id');
        $query->select(
            't.*',
            'ty.name as type_name',
            'c.name as color_name',
            'mt.name as material_name',
            'fi.path as image_path'
        );
        $query->where('t.id',$id);
    }



    /**
     * Relação "belongsTo" entre tabelas Tshirt e Color
     *
     * @return void
     */
    public function color(){
        $this->belongsTo(Color::class);
    }
    /**
     * Relação "belongsTo" entre tabelas Tshirt e Material
     *
     * @return void
     */
    public function material(){
        $this->belongsTo(Material::class);
    }
    /**
     * Relação "belongsTo" entre tabelas Tshirt e Type
     *
     * @return void
     */

    public function type(){
        $this->belongsTo(Material::class);
    }
    /**
     * Relação "belongsTo" entre tabelas Tshirt e File
     *
     * @return void
     */
    function file(){
        $this->belongsTo(File::class);
    }
}
