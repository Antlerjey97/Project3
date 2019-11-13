<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category=category::all();
        return view('admin.category.list',['category'=>$category]);
    }
    public function add(){
        return view('admin.category.add');
        
    }

    public function getsua($id){

        $category=category::find($id);
        return view('admin.category.edit',['category'=>$category]);
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new category();
        $category->name=$request->name;
        $category->status=$request->status;
        $category->sort=$request->sort;
        $category->save();

        return redirect('admin/category/them')->with('thongbao','Add Successful');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $category=category::find($id);
        $this->validate($request,[
            'name'=>'required|unique:category,name|min:3|max:100'
        ]
        ,['name.required'=>'Bạn chưa nhập tên Danh Mục' ,
            'name.unique'=>'Tên Danh Mục đã tồn tại',
            'name.min'=>'Tên Danh Mục phải có độ dài 3 đến 100 kí tự',
            'name.max'=>'Tên Danh Mục phải có độ dài từ 3 đến 100 kí tự'
        ]);

        $category->name =$request->name;
        $category->status=$request->status;
        $category->sort=$request->sort;
        $category->save();
        return redirect("admin/category/sua/$id")->with('thongbao','Sửa Danh Mục Thành công');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =category::find($id);
        $category->delete();
        return redirect('admin/category/danhsach')->with('thongbao','Deleted Successful');
    }
}
