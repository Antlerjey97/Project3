<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\promotion;
use App\category;
use App\comment;
use App\product;
use App\User;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $product = product::all();
        $category = category::all();
        $product = product::paginate(5);
        return view('admin.product.list', ['product' => $product, 'category' => $category]);
    }

    public function add()
    {
        $promotion = promotion::all();

        $category = category::all();
        return view('admin.product.add', ['promotion' => $promotion, 'category' => $category]);
    }

    public function getedit($id)
    {


        $product = product::find($id);
        // $product = (array)$product;
        // chuyển hết các cái object này thành array. t k nhớ cú pháp lắm. k đc thử search xem. t làm đã ok
        $promotion = promotion::all();
        $category = category::all();
        // $comt=$product->comment;
        // $comt=comment::all();
        //$comt=$product->comment;
        // dd(array_value($product);

        $comt = DB::table('comment')
            ->select('comment.content', 'comment.id', 'comment.status', 'comment.time_created', 'comment.user_id',
                'users.username')
            // ->join('products','product_id','=','id') nos bao ko hieu id la gi
            ->leftjoin('users', 'users.id', '=', 'comment.user_id')
            ->where('product_id', $id)
            ->get();
        // nãy m tìm comment của th product không có comment nào. Query trên mk bảng product nên k cần join
        $comt = (array)$comt;
        // dd($comt);
        // var_dump(json_decode($comt));
        //     //     echo "<pre>";
        //       dd($comt);
        //     echo "</pre>";

        return view('admin.product.edit',
            ['product' => $product, 'promotion' => $promotion, 'category' => $category, 'comt' => $comt]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new product();
        $product->name = $request->name;
        $product->id_category = $request->id_category;
        $product->label = $request->label;
        $product->image = $request->image->getClientOriginalName();
        $product->price_origin = $request->price_origin;
        $product->price_sales = $request->price_sales;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->id_promotion = $request->id_promotion;
        $product->status = $request->status;
        $product->save();

        return redirect("admin/Product/them")->with('thongbao', 'Added Successful');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = product::find($id);
        $this->validate($request, [
                'name' => 'required|unique:product,name|min:3|max:100',
                'label' => 'required:product,name|min:3|max:100'
            ]
            , [
                'name.required' => 'Bạn chưa nhập tên Product',
                'name.unique' => 'Tên Product đã tồn tại',
                'name.min' => 'Tên Product phải có độ dài 3 đến 100 kí tự',
                'name.max' => 'Tên Product phải có độ dài từ 3 đến 100 kí tự',
                'label.required' => 'Bạn chưa nhập tên label',
                'label.min' => 'Tên Label phải có độ dài 3 đến 100 kí tự',
                'label.max' => 'Tên label phải có độ dài từ 3 đến 100 kí tự'
            ]);

        $product->name = $request->name;

        $product->id_category = $request->id_category;
        $product->label = $request->label;
        $product->image = $request->image_old;
        $product->price_origin = $request->price_origin;
        $product->description = $request->description;
        $product->id_promotion = $request->id_promotion;
        $product->status = $request->status;

        $product->save();


        return redirect("admin/Product/sua/$id")->with('thongbao', 'Sửa Product Thành công');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect("admin/Product/danhsach")->with('thongbao', 'Deleted Succesful');

    }
}
