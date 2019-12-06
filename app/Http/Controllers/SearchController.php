<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    public function Timkiem(Request $request) {
				$keySearch = $request['keySearch'];

				$data=DB::table('products')
  				->select('products.*','promotion.name AS promotion')
  				->leftjoin('promotion','promotion.id','=','products.id_promotion')
  				->where('products.name', 'like', $keySearch.'%')
  				->get()->toArray();
				$data = array('data' => $data, 'keySearch' => $keySearch);
				 
		  return view('pages.resultsearch',['data'=>$data]);
	}
}
