<?php

namespace App\Http\Controllers;
use App\Models\Provinsi;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = DB::select('select * from provinsi ', [1]);
        return view('provinsi.index',compact('provinsi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $provinsi= Provinsi::create([
            'nama_provinsi'=>$request->namaprovinsi,
            'price'=>$request->price
        ]);
        if($provinsi==true){
            return redirect()->route('provinsi.index')
                        ->with('success','Provinsi created successfully.');
        }
        else{
            return \Redirect::back()->withErrors(['Provinsi gagal ditambahkan']);
        }
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
        $provinsi = DB::select('select * from provinsi where id = ?', [$id]);
        return view('provinsi.edit',compact('provinsi'));
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
        $provinsi = DB::update('update provinsi set nama_provinsi = :nama_provinsi, price = :price where id = :id', ['nama_provinsi'=>$request->namaprovinsi,'price'=>$request->price,'id'=>$id]);
        if($provinsi==true){
            return redirect()->route('provinsi.index')
                        ->with('success','Provinsi berhasil diperbarui.');
        }
        else{
            return \Redirect::back()->withErrors(['Provinsi gagal diperbarui']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        if($provinsi==true){
            return redirect()->route('provinsi.index')
                        ->with('success','Provinsi berhasil dihapus.');
        }
        else{
            return \Redirect::back()->withErrors(['Provinsi gagal dihapus']);
        }
    }
}
