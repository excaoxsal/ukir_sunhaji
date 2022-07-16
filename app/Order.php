<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'consument_id', 'products_id', 'status'
    ];
    protected $table="orders";
    public function orders ()
    {
        return $this-> belongsTo('App\product','id','products_id');
    }
}
