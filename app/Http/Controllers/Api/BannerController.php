<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banner = Banner::all();
        $banner = Banner::paginate(4);
        return view('admin.banner.list', ['banner' => $banner]);
    }

    public function getedit($id)
    {
        $banner = Banner::find($id);

        return view('admin.banner.edit', ['banner' => $banner]);
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
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->image = $request->image->getClientOriginalName();
        $banner->content = $request->content;
        $banner->link = $request->link;
        $banner->type = $request->type;
        $banner->status = $request->status;

        $banner->save();

        return redirect('admin/banner/them')->with('message', 'Added Successful');
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
        $promotion = Banner::find($id);
        $promotion->name = $request->name;
        $promotion->image = $request->image->getClientOriginalName();
        $promotion->content = $request->content;
        $promotion->link = $request->link;
        $promotion->type = $request->type;
        $promotion->status = $request->status;

        $promotion->save();

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

        return redirect("admin/banner/sua/$id")->with('message', 'Updated Successful');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect('admin/banner/danhsach')->with('message', 'Deleted Succesful');
    }
}
