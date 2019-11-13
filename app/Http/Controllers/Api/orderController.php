<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\order;
use App\User;

use App\product;
use Illuminate\Support\Facades\DB;
class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order=order::all();
        $users=User::all();
        $order=order::paginate(5);
        return view('admin.order.list',['order'=>$order,'users'=>$users]);
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
        $list = order::find($id);
        $listOrder = DB::table('products')        
        ->select('products.name', 'products.image', 'products.quantity','products.price_sales','products.price_origin','products.id_promotion','promotion.name')
        ->from('order_product')
        ->where('order_id', $id)
        ->leftjoin('products','order_product.product_id','=','products.id')
       ->leftjoin('promotion', 'promotion.id','=','products.id_promotion')
        ->get();

   //     dd($listOrder);
        
    // $listOrder=  product::with('promotion')->where('id_promotion','id')->get();

    //   $listOrder = product::with(['promotion' => function ($query) {
    //     $query->where('id','=','id_promotion');
    // }])->get();
        
    //   print_r($listOrder);
    //   die();
    
    return view('admin.order.viewDetail',['listOrder'=>$listOrder,'list'=>$list]);
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
