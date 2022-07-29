<?php

namespace App\Http\Controllers;

use App\Models\struk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StrukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function show($struk)
    {
        // dd($struk);
        $iduser = \Auth::user()->id;
        $alamat = DB::select('SELECT alamat.id as alamatID, alamat.nama, alamat.region, alamat.phonenumber, 
        alamat.fulladdress, provinsi.nama_provinsi, provinsi.price as ongkir, orders.id as orderID, orders.products_id, 
        products.name as product_name, alamat.email,products.picture,products.price as produkprice,products.detail, products.weight, orders.consument_id, 
        (products.price + provinsi.price) as total from orders INNER JOIN products ON orders.products_id = products.id 
        INNER JOIN users on users.id = orders.consument_id INNER JOIN alamat ON alamat.consument_id = users.id 
        INNER JOIN provinsi ON provinsi.id = alamat.id_provinsi WHERE orders.id = ? and users.id = ?', [$struk,$iduser]);
        // dd($products);
        return view ('konsumen.struk',compact('alamat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function edit(struk $struk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, struk $struk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function destroy(struk $struk)
    {
        //
    }
}
