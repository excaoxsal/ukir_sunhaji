<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $fillable = [
        'consument_id', 'id_provinsi', 'region','nama','email','phonenumber','fulladdress','status'
    ];
    protected $table="alamat";
    public function alamat ()
    {
        return $this-> belongsTo('App\Models\provinsi','id','id_provinsi');
    }
}
