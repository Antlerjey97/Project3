<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\promotion;
class promotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion=promotion::all();

        $promotion=promotion::paginate(5);

      
        return view('admin.promotion.list',['promotion'=>$promotion]);
        //
    }

    public function add(){
        return view('admin.promotion.add');
    }

    public function getsua($id){
        $promotion=promotion::find($id);
        return view('admin.promotion.edit',['promotion'=>$promotion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotion =new promotion();
        $promotion->name=$request->name;
        $promotion->detail=$request->detail;
        $promotion->time_start=$request->timeStart;
        $promotion->time_end=$request->timeEnd;
        $promotion->status=$request->status;
      $promotion->save();
      return redirect("admin/promotion/them")->with('thongbao','Added Successful');
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

       
        $this->validate($request,[
            'name'=>'required|unique:promotion,name|min:3|max:100',
            'detail'=>'required:detail,name|min:3|max:100'
        ],['name.required'=>'Bạn chưa nhập tên Product' ,
        'name.unique'=>'Tên Promotion đã tồn tại',
        'name.min'=>'Tên Promotion phải có độ dài 3 đến 100 kí tự',
        'name.max'=>'Tên Promotion phải có độ dài từ 3 đến 100 kí tự',
        'detail.required'=>'Bạn chưa nhập Detail' ,
        'detail.min'=>' Detail phải có độ dài 3 đến 100 kí tự',
        'detail.max'=>'Detail phải có độ dài từ 3 đến 100 kí tự'
    ]);
                //     if (Input::get('nsfw')) {
                //         $nsfw = true;
                // } else {
                //         $nsfw = false;
                //         }
            $promotion=promotion::find($id);
            $promotion->name=$request->name;
            $promotion->detail=$request->detail;
            
            $promotion->time_start=$request['timeStart'];
            $promotion->time_end=$request['timeEnd'];
            $promotion->status=$request->status;
        //   print_r($cmt->User);
            //   die();

            // print_r($promotion);
            // die();

            // dd($nsfw);
            // die();
            // if ($nsfw == true) {
            //     $promotion->nsfw = 1;
            // } else {
            //     $promotion->nsfw = 0;
            // }
 
        $promotion->save();

        return redirect("admin/promotion/sua/$id")->with('thongbao','Đã Sửa Khuyến mãi thành công');
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
        $promotion=promotion::find($id);
        $promotion->delete();

        return redirect("admin/promotion/danhsach")->with('thongbao','Deleted Succesful');

    }
}
