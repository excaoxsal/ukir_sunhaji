<?php

namespace App\Http\Controllers;

use App\Models\BuktiBayar;
use App\Order;
use Illuminate\Http\Request;
use DB;

class BuktiBayarController extends Controller
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
    public function create(Request $myorder)
    {
        // dd($myorder->order);
        $cekOrder = BuktiBayar::where('orders_id','=',$myorder->order)->first();
        if ($cekOrder == true) {
            return \Redirect::back()->withErrors(['Anda sudah mengupload Struk']);
        } else {
            $order = Order::where('id','=',$myorder->order)->first();
            // dd($order);
            return view('buktibayar.create',['order' => $order]);
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $iduser = \Auth::user()->id;
        $orderId = $request->orderId;
        
        $file = $request->file('file');
        // dd($request->orderId);
        $file_name = $file->getClientOriginalName();
        $data = $file_name;
        // dd($value);
        // isi dengan nama folder tempat kemana file diupload
        $massa=$request->weight;
        $upload_path = 'product_files';
        $file->move($upload_path,$file->getClientOriginalName());
        $path= $upload_path.DIRECTORY_SEPARATOR.$file->getClientOriginalName();
        // $bukti = DB::insert('insert into buktibayar (consument_id, orders_id, picture) values (?, ?,?)', [$iduser, $request->id,$path]);
        $bukti= BuktiBayar::create([
            'consument_id'=>$iduser,
            'orders_id'=>$orderId,
            'picture'=>$path
        ]);
        // dd($path);
        
        if($bukti==true){
            DB::update('update orders set status = "Bukti Pembayaran Telah Ditambahkan" where id = ?', [$orderId]);
            return redirect()->route('myorder')
                        ->with('success','Bukti Telah ditambahkan berhasil ditambahkan.');
        }
        else{
            return \Redirect::back()->withErrors(['Alamat tidak berhasil ditambahkan.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuktiBayar  $buktiBayar
     * @return \Illuminate\Http\Response
     */
    public function show($bukti)
    {
        $buktibayar = BuktiBayar::where('orders_id','=',$bukti)->first();
        if ($buktibayar==true) {
            return view ('buktibayar.show',compact('buktibayar'));
        } else {
            $buktibayar = "not_found.gif";
            return view ('buktibayar.show',compact('buktibayar'));
        }
        
        // $buktibayar = DB::select('select * from buktibayar where orders_id = ?', [$bukti]);
        // dd($buktibayar);
        
    }
    public function showbukti(Request $request)
    {
        dd($request);
        DB::select('select * from buktibayar where orders_id = ?', [1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuktiBayar  $buktiBayar
     * @return \Illuminate\Http\Response
     */
    public function edit(BuktiBayar $buktiBayar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuktiBayar  $buktiBayar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuktiBayar $buktiBayar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuktiBayar  $buktiBayar
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuktiBayar $buktiBayar)
    {
        //
    }
}
