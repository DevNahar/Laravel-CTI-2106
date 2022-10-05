<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Thumbnail;
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

    function p_details($productSlug){
      $productSluginfo= Product::where('slug',$productSlug)->get();
        $thumbnails = Thumbnail::where('product_id',$productSluginfo->first()->id)->get();
        $related_products = Product::where('category_id', $productSluginfo->first()->category_id)-> where('id', '!=', $productSluginfo->first()->id)->get();
        
    
        return view('frontend.product_details',[
            'productSluginfo' => $productSluginfo,
            'thumbnails'=> $thumbnails,
            'related_products' => $related_products,
        ]);
    }
}
