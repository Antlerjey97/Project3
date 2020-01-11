<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\promotionNews;

class PromotionNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function index()
    {
        //
        $promotionNews = promotionNews::all();

        $promotionNews = promotionNews::paginate(5);
        return view('admin.promotionNews.list', ['promotionNews' => $promotionNews]);
    }

    public function add()
    {
        return view('admin.promotionNews.add');
    }

    public function getedit($id)
    {

        $promotionNews = promotionNews::find($id);
        return view('admin.promotionNews.edit', ['promotionNews' => $promotionNews]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotionNews = new promotionNews();
        $promotionNews->title = $request->title;
        $promotionNews->summary = $request->summary;
        $promotionNews->content = $request->content;
        $promotionNews->image = $request->image->getClientOriginalName();
        $promotionNews->status = $request->status;

        $promotionNews->save();
        return redirect("admin/promotionNews/them")->with('message', 'Added Successful');
        //
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
        $promotionNews = promotionNews::find($id);


        $promotionNews->title = $request->title;
        $promotionNews->summary = $request->summary;
        $promotionNews->content = $request->content;
        $promotionNews->image = $request->image->getClientOriginalName();
        $promotionNews->status = $request->status;


        $this->validate($request,
            [
                'title' => 'required:promotion_news',
                'title|min:3|max:10000',
                'content' => 'unique:promotion_news',
                'content|min:3|max:100000'
            ], [
                'title.required' => 'Ban chua nhap title',
                'title.min' => 'title phải có độ dài 3 đến 10000 kí tự ',
                'title.max' => 'title  phải có độ dài 3 đến 10000 kí tự ',
                'content.unique' => 'Ban chua nhap content',
                'content.min' => 'content phải có độ dài 3 đến 10000 kí tự ',
                'content.max' => 'content  phải có độ dài 3 đến 10000 kí tự ',
            ]
        );

        $promotionNews->save();
        return redirect("admin/promotionNews/sua/$id")->with('message', 'Updated Succeccful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
