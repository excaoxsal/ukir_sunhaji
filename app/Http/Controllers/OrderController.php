<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = \Auth::user()->id;
        $orders = Order::latest()
        ->join('products','products.id','=','orders.products_id')
        ->select('products.name','orders.status','products.weight','products.created_at','products.price','products.id')
        ->where('consument_id','=',$iduser)->paginate(10);
        return view('orders.show',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
        return view('orders.show', compact('orders'));
    }


    public function cart(Request $request)
    {
        // dd($request->order);
        $iduser = \Auth::user()->id;
        // $product=DB::table('products')->where('id','=',$request->order)->get();
        // $idproduct = $product->id;
        $idprod=$request->order;
        // dd($idprod);
        Order::create([
                'consument_id'=>$iduser,
                'products_id'=>$idprod,
                'status'=>'Checking Order',
                ]
            );
        // dd($product);
        $orders = Order::latest()
        ->join('products','products.id','=','orders.products_id')
        ->select('products.name','orders.status','products.weight','products.created_at','products.price','products.id')
        ->where('consument_id','=',$iduser)->paginate(10);
        $timezone = 'Asia/Jakarta'; $date = new DateTime('now', new DateTimeZone($timezone)); $localtime = $date->format('Y m d h:i:s a');
        // dd($date->format('Y/m/d h:i:s a'));
        return view('orders.show', compact('orders'));
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        // $id=$request;
        // // dd($id);
        // $product=DB::table('product')->where('id','=',$order);
        
        return view('order.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
