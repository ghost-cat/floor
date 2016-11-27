<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Products;
use App\Model\Cate;

class ProductsController extends Controller
{
    /**
     * 产品中心
     *
     * @return view
     **/
    public function index(Request $request)
    {
        $query = $request->all();
        $products = (new Products)->getProductList($query);
        $cate = (new Cate)->getCateList();

        return view('frontend.products')
            ->with('cate', $cate)
            ->with('products', $products);
    }
}
