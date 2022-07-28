<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alamat;
use App\Order;
use App\Models\Provinsi;
use Illuminate\Support\Facades\DB;


class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('konsumen.home');
    }

    public function shipping()
    {  

        $products = DB::select('SELECT alamat.id as alamatID, alamat.nama, alamat.region, alamat.phonenumber, 
        alamat.fulladdress, provinsi.nama_provinsi, provinsi.price as ongkir, orders.id as orderID, orders.products_id, 
        products.name as productname, products.picture,products.price,products.detail, products.weight, orders.consument_id, 
        (products.price + provinsi.price) as harga from orders INNER JOIN products ON orders.products_id = products.id 
        INNER JOIN users on users.id = orders.consument_id INNER JOIN alamat ON alamat.consument_id = users.id 
        INNER JOIN provinsi ON provinsi.id = alamat.id_provinsi WHERE orders.id = ?', [1]);
        // dd($products);
        return view ('konsumen.shipping',compact('products'));
    }

    public function struk()
    {
        $iduser = \Auth::user()->id;
        $alamat = DB::select('SELECT alamat.id as alamatID, alamat.nama, alamat.region, alamat.phonenumber, 
        alamat.fulladdress, provinsi.nama_provinsi, provinsi.price as ongkir, orders.id as orderID, orders.products_id, 
        products.name as product_name, alamat.email,products.picture,products.price as produkprice,products.detail, products.weight, orders.consument_id, 
        (products.price + provinsi.price) as total from orders INNER JOIN products ON orders.products_id = products.id 
        INNER JOIN users on users.id = orders.consument_id INNER JOIN alamat ON alamat.consument_id = users.id 
        INNER JOIN provinsi ON provinsi.id = alamat.id_provinsi WHERE orders.id = ?', [1]);
        // dd($products);
        return view ('konsumen.struk',compact('alamat'));
    }

    public function myOrder()
    {
        $iduser = \Auth::user()->id;
        $myorder = DB::select('SELECT orders.id, orders.products_id, 
        products.name, products.picture,products.price,products.detail, products.weight, orders.consument_id, orders.created_at, orders.status
        from orders INNER JOIN products ON orders.products_id = products.id 
        INNER JOIN users on users.id = orders.consument_id WHERE users.id = ?', [$iduser]);
        return view ('konsumen.order',compact('myorder'));
    }
    public function shippingSave()
    {
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
