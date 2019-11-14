<?php

namespace App\Http\Controllers;
use App\product;
use App\slide;
use App\category;
use App\info_company;
use App\comment;
use App\banner;
use App\promotionNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
     function __construct(){
               


               $new=product::where('status',3)->get();
                view()->share('new',$new);
            	$banner=banner::all();
            	view()->share('banner',$banner);
            	$category=category::all();
            	view()->share('header',$category);
            	$phone=product::where('id_category',1)->get();
            	view()->share('phone',$phone);

            	$tablet=product::where('id_category',62)->get();
            	view()->share('tablet',$tablet);


                $new=product::where('status',3)->get();
                view()->share('product',$new);

            	$phukien=product::where('id_category',70)->get();
            	view()->share('phukien',$phukien);
            	$laptop=product::where('id_category',63)->get();
            	view()->share('laptop',$laptop);

            	$footer=info_company::all();
            	view()->share('footer',$footer);
             //     if(Auth::check()){
             // view()->share('nguoidung',Auth::user());
             //     }
        }

    public function trangchu(){

    	return view('pages.trangchu');
    }
    public function showproduct($id)
    {
    	$phone=product::where('id_category',$id)->get();
    	return view('pages.showproduct',['products'=>$phone]);
    }
    public function News()
    {
    	$news =promotionNews::all();

    	return view('pages.tintuc',['listNews'=>$news]);
    }
}
