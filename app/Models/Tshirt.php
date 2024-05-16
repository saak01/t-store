<?php

namespace App\Models;

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
     * Relação
     *
     * @return void
     */
    public function scopeSearch(){
        //Todo
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



}
