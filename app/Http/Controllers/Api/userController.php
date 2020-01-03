<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $User = User::all();
        return view('admin.user.list', ['User' => $User]);
    }

    public function add()
    {
        return view('admin.user.create');
    }


    public function getdangnhapadmin()
    {
        return view('admin.login');

    }

    public function postdangnhapadmin(Request $request)
    {


        $email = $request['email'];
        $password = $request['password'];


        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1]))
            return view('admin/layout/index');

        else return view('admin/login');
    }

    public function dangxuat()
    {
        Auth::logout();
        return view('admin/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
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
