<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Productmore extends Controller
{


    public function getLoadMore($id, $offset)
    {
        $data = DB::table('products')
            ->select('products.*', 'promotion.name AS promotion')
            ->where('products.id_category', $id)
            ->leftjoin('promotion', 'promotion.id', '=', 'products.id_promotion')
            ->limit(8)
            ->offset($offset)
            ->get();
        $data = (array)$data;
        return $data;

    }
    public function loadMore(Request $request)
    {
        $id_category = $request->input('idCartegory');
        $offset = $request->input('offset');
        $data = $this->getLoadMore($id_category, $offset);
        $res['status'] = '';
        $res['data'] = '';
        foreach ($data as $key => $val) {
            if (count($val) == 0) {
                $res['status'] = 'NULL';
            } else {
                $res['status'] = 'success';
                $htmlAdd = '';
                foreach ($val as $value) {
                    $value = (array)$value;
                    $htmlAdd .= '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><div class="product"><a href="pages/singleProduct/' . $value['id_category'] . '/' . $value['id'] . '">';
                    $htmlAdd .= '<img width="100%" src="/uploads/product/' . $value['image'] . '" alt="Lỗi"></a>';
                    $htmlAdd .= '<a href="pages/singleProduct/' . $value['id_category'] . '/' . $value['id'] . '">';
                    $htmlAdd .= '<div class="name">' . $value['name'] . '</div></a>';
                    if ($value['price_sales']) {
                        $htmlAdd .= '<div class="prices">';
                        $htmlAdd .= '<div class="span-group">';
                        $htmlAdd .= '<span class="price">' . number_format($value['price_origin'], 0, ".", ".") . '₫</span>';
                        $htmlAdd .= '<span class="priceSale">' . number_format($value['price_sales'], 0, ".", ".") . '₫</span>';
                        $htmlAdd .= '</div>';
                        $htmlAdd .= '</div>';
                    } else {
                        $htmlAdd .= '<div class="price">' . number_format($value['price_origin'], 0, ".", ".") . '₫</div>';
                    }
                    $htmlAdd .= '<div class="note">' . $value['promotion'] . '</div>';
                    $htmlAdd .= '<div class="addToCart"><button class="btn btn-danger" value="' . $value['id'] . '">Thêm vào giỏ hàng</button></div>';
                    $htmlAdd .= '</div>';
                    $htmlAdd .= '</div>';
                }
                $res['data'] = $htmlAdd;
            }
        }
        echo json_encode($res);
    }
}
