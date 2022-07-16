<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'picture', 'price','weight', 'detail','stock'
    ];
    protected $table="products";
    public function product()
    {
        return $this-> hasMany('App\order','products_id','id');
    }
}