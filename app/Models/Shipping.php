<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'consument_id', 'id_alamat','status'
    ];
    protected $table="shipping";
    public function shipping()
    {
        return $this-> belongsTo('App\Models\alamat','id','id_alamat');
    }
}
