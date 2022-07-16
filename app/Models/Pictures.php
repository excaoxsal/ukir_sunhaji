<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'products_id', 'file'
    ];
}
