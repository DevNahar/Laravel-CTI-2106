<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // function about()
    // {
    //     // return view('about');
    //     return view('about');

    // }
    // function contact(){
    //     return view('contact');
    // }
    function index()
    {
        $all_product = Product::orderBy('created_at', 'DESC')->get();
        $all_category = Category::all();
        $new_arrivals =Product::latest()->take(4)->get();
        return view('frontend.index', [
            'all_product'=>$all_product,
            'all_category'=>$all_category ,
            'new_arrivals'=> $new_arrivals,
        ]);
    }

    function p_details(){
        return view('frontend.product_details');
    }
}
