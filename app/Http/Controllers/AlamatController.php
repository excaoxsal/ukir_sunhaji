<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Order;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = \Auth::user()->id;
        
        $alamat = Alamat::latest()
        ->join('provinsi','provinsi.id','=','alamat.id_provinsi')
        ->select('alamat.id','provinsi.nama_provinsi','alamat.nama','alamat.fulladdress','alamat.region','alamat.phonenumber','alamat.email','alamat.created_at')
        ->where('alamat.consument_id','=',$iduser)->get();
        // dd($alamat);
        return view('alamat.index',compact('alamat'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::get();
        // dd($provinsi);
        return view('alamat.alamat',['provinsi' => $provinsi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
        $iduser = \Auth::user()->id;
        // dd($request);
        $nameproduct=$request->name;
        $status = "yes";
        $alamat = Alamat::create([
            'consument_id'=>$iduser, 
            'id_provinsi'=>$request->provinsi, 
            'region'=>$request->region,
            'nama'=>$request->name,
            'email'=>$request->email,
            'phonenumber'=>$request->phonenumber,
            'fulladdress'=>$request->fulladdress,
            'status'=>$status
            ]
        );
        if($alamat==true){
            return redirect()->route('alamat.index')
                        ->with('success','Product created successfully.');
        }
        else{
            return \Redirect::back()->withErrors(['Product sudah ada, mohon diganti.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function show(Alamat $alamat)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit(Alamat $alamat)
    {
        $provinsi = Provinsi::get();
        $almat=Alamat::select('*')->where('id','=',$alamat->id)->get();
        // dd($almat);
        return view('alamat.edit',compact('almat','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $iduser = \Auth::user()->id;
        $status='Succes';
        // dd($request);
        // DB::update('update alamat set nama = 100 where name = ?', ['John']);
        $alamat = DB::update('UPDATE alamat SET alamat.nama = :nama,alamat.id_provinsi = :id_provinsi, alamat.region = :region, 
        alamat.email = :email, alamat.phonenumber = :phonenumber, alamat.fulladdress = :fulladdress 
        where alamat.id = :id', ['nama'=>$request->name, 'id_provinsi'=>$request->provinsi,'region'=>$request->region,'email'=>$request->email,
        'phonenumber'=>$request->phonenumber,'fulladdress'=>$request->fulladdress,'id'=>$request->alamat]);
        // dd($alamat);
        // Alamat::where('id', $request->input('id'))->update([
        //     'consument_id'=>$iduser, 
        //     'id_provinsi'=>$request->provinsi, 
        //     'region'=>$request->region,
        //     'nama'=>$request->name,
        //     'email'=>$request->email,
        //     'phonenumber'=>$request->phonenumber,
        //     'fulladdress'=>$request->fulladdress,
        //     'status'=>$status
        // ]);
        return redirect()->route('alamat.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alamat $alamat)
    {
        //
    }
}
