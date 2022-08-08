<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiBayar extends Model
{
    use HasFactory;
    protected $fillable = [
        'consument_id', 'orders_id', 'picture'
    ];
    protected $table="buktibayar";
    public function buktibayar ()
    {
        return $this-> belongsTo('App\order','id','orders_id');
    }
}
