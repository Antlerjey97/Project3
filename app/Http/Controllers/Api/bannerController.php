<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\banner;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quangcao = banner::all();
        $quangcao = banner::paginate(4);
        return view('admin.banner.list', ['quangcao' => $quangcao]);
    }

    public function getedit($id)
    {
        $quangcao = banner::find($id);

        return view('admin.banner.edit', ['quangcao' => $quangcao]);
    }


    public function add()
    {
        return view('admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new banner();
        $banner->name = $request->name;
        $banner->image = $request->image->getClientOriginalName();
        $banner->content = $request->content;
        $banner->link = $request->link;
        $banner->type = $request->type;
        $banner->status = $request->status;

        $banner->save();

        return redirect('admin/banner/them')->with('thongbao', 'Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quangcao = banner::find($id);
        $quangcao->name = $request->name;
        $quangcao->image = $request->image->getClientOriginalName();
        $quangcao->content = $request->content;
        $quangcao->link = $request->link;
        $quangcao->type = $request->type;
        $quangcao->status = $request->status;

        $quangcao->save();

        $this->validate($request, [
                'name' => 'required:banner,name|min:3|max:100',
                'image' => 'required:banner,image|min:3|max:1000'
            ]
            , [
                'name.required' => 'Bạn chưa nhập tên Banner',
                'name.unique' => 'Tên Banner đã tồn tại',
                'name.min' => 'Tên Banner phải có độ dài 3 đến 100 kí tự',
                'name.max' => 'Tên Banner phải có độ dài từ 3 đến 100 kí tự',
                'image.required' => 'Bạn chưa Them image ',
                'image.min' => 'Tên image phải có độ dài 3 đến 100 kí tự',
                'image.max' => 'Tên image phải có độ dài từ 3 đến 100 kí tự'
            ]);

        //  dd(($request->image->getClientOriginalName()));
        //  die();

        return redirect("admin/banner/sua/$id")->with('thongbao', 'Updated Successful');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = banner::find($id);
        $banner->delete();
        return redirect('admin/banner/danhsach')->with('thongbao', 'Deleted Succesful');
    }
}
