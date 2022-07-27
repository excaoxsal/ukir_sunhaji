<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_provinsi', 'price'
    ];
    protected $table="provinsi";
    public function provinsi()
    {
        return $this-> hasMany('App\Models\alamat','id_provinsi','id');
    }
}
