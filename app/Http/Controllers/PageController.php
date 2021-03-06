<?php

namespace App\Http\Controllers;

use App\product;
use App\slide;
use App\Category;
use App\info_company;
use App\Comment;
use App\Banner;
use App\User;
use App\promotionNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\config\session;

class PageController extends Controller
{
    function __construct()
    {

        $phone = DB::table('products')
            ->select('products.*', 'promotion.name AS promotion')
            ->where('products.id_category', 1)
            ->leftjoin('promotion', 'promotion.id', '=', 'products.id_promotion')
            ->get();
        $phone = (array)$phone;
        view()->share('phone', $phone);
        $tablet = product::where('id_category', 62)->get();
        view()->share('tablet', $tablet);
        $electric = product::where('id_category', 70)->get();
        view()->share('phukien', $electric);
        $laptop = product::where('id_category', 63)->get();
        view()->share('laptop', $laptop);
        $new = $new = Db::table('products')
            ->select('products.*', 'promotion.name AS promotion')
            ->where('products.status', 3)
            ->leftjoin('promotion', 'promotion.id', '=', 'products.id_promotion')
            ->get();
        $new = (array)$new;
        view()->share('product', $new);
        view()->share('new', $new);
        $banner = Banner::all();
        view()->share('banner', $banner);
        $category = Category::all();
        view()->share('header', $category);

        $footer = info_company::all();
        view()->share('footer', $footer);

    }

    public function trangchu()
    {
        return view('pages.trangchu');
    }

    public function showproduct($id)
    {
        $phone = DB::table('products')
            ->select('products.*', 'promotion.name AS promotion')
            ->where('products.id_category', $id)
            ->leftjoin('promotion', 'promotion.id', '=', 'products.id_promotion')
            ->get();
        $phone = (array)$phone;
        $product = product::where('id_category', $id)->get();
        return view('pages.showproduct', ['product' => $phone, 'products' => $product]);
    }

    public function News()
    {
        $news = promotionNews::all();
        return view('pages.tintuc', ['listNews' => $news]);


    }

    public function newdetail($id)
    {
        $promotionNews = promotionNews::where('id', $id)->get();
        return view('pages.tintucdetail', ['tintuc' => $promotionNews]);
    }

    public function singleProduct($id, $a)
    {
        $data = DB::table('products')
            ->select('products.*', 'promotion.name AS promotion')
            ->where('products.id', $a)
            ->leftjoin('promotion', 'promotion.id', '=', 'products.id_promotion')
            ->get();
        $data = (array)$data;

        $dl = product::where('id', $a)->get();
        $listCmt = DB::table('users')
            ->select('users.*', 'comment.content As content')
            ->where('comment.product_id', $a)
            ->leftjoin('comment', 'comment.user_id', '=', 'users.id')
            ->get();
        $listCmt = (array)$listCmt;

        $spSame = product::where('id_category', $id)->get();
        return view('pages.singleproduct', ['dl' => $dl, 'data' => $data, 'spSame' => $spSame, 'listCmt' => $listCmt]);
    }

    public function getcart(Request $request)
    {
        $data = $request->input('dl');


        return view('pages.cart', ['data' => $data]);
    }

    public function postcart(Request $request)
    {
        $data = $request->input('dl');
        dd(session()->put('cart', $data));
        $cart = session()->put('cart', $data);
        return response()->json($data);

    }

    public function Timkiem(Request $request)
    {
        $keySearch = $request['keySearch'];

        $data = DB::table('products')
            ->select('products.*', 'promotion.name AS promotion')
            ->leftjoin('promotion', 'promotion.id', '=', 'products.id_promotion')
            ->where('products.name', 'like', $keySearch . '%')
            ->get()->toArray();

        return view('pages.resultsearch', ['data' => $data, 'keySearch' => $keySearch]);
    }

    public function TimkiemAjax(Request $request)
    {
        $key = $request->input('key');
        $data = DB::table('products')->select('*')->where('products.name', 'like', $key . '%')->offset(0)
            ->limit(6)
            ->get()->toArray();


        return view('pages.searchajax', ['data' => $data]);


    }

    public function signUp(Request $request)
    {
        $accountNew = new User();

        $accountNew->email = $email = $request->input('email');
        $accountNew->password = $password = bcrypt($request->input('password'));
        $accountNew->fullname = $fullname = $request->input('fullname');
        $accountNew->username = $username = $request->input('username');
        $accountNew->phone = $phone = $request->input('phone');
        $data['status'] = '';
        $data['idAcc'] = 0;

        $data = DB::table('users')->select('*')->where('username', $username)->get()->toArray();

        if (count($data) == 0) {

            $idAcc = $accountNew->save();

            $data['status'] = 'success';
            $data['idAcc'] = $idAcc;
        } else {
            $data['status'] = 'isset';
        }
        echo json_encode($data);
    }

    public function createSession()
    {
        $email = $this->input->post('email');
        $password = bcrypt($this->input->post('password'));
        $fullname = $this->input->post('fullname');
        $username = $this->input->post('username');
        $phone = $this->input->post('phone');
        $idUser = $this->input->post('idUser');
        $account = array(
            'fullname' => $fullname,
            'password' => $password,
            'email' => $email,
            'username' => $username,
            'phone' => $phone,
            'level' => 0,
            'id' => $idUser
        );
        $this->session->set_userdata($account);
    }


    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = bcrypt($request->input('password'));
        $data = DB::table('users')->select('*')->where('username', $username)->where('password',
            $password)->where('status', 1)->get()->toArray();

        dd($username);

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $data = DB::table('users')->select('*')->where('username', $username)->where('password',
                $password)->where('status', 1)->get()->toArray();
            $email = $data[0]['email'];
            $password = md5($data[0]['password']);
            $fullname = $data[0]['fullname'];
            $phone = $data[0]['phone'];
            $username = $data[0]['username'];
            $level = $data[0]['level'];
            $id = $data[0]['id'];
            $account = array(
                'fullname' => $fullname,
                'password' => $password,
                'email' => $email,
                'username' => $username,
                'phone' => $phone,
                'level' => $level,
                'id' => $id
            );
            $dl = session()->put($account);
            echo json_encode('success');

        } else {
            echo json_encode('notfound');
        }

    }


}
