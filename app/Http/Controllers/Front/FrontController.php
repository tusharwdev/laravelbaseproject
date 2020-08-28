<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home (){

        $data['featured_products'] = product::where('is_featured',1)->limit(8)->get();
        return view('front.home',$data);
    }
    public function product_details($id) {
        $data['product'] = product::where('id',$id)->get();

        return view('front.product_details',$data);
    }
}
