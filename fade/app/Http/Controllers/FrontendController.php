<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
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
        $available_colors = Inventory::where('product_id',$productSluginfo->first()->id)->groupBy('color_id')->selectRaw('sum(color_id) as sum, color_id')->get();
    //    echo $available_colors;
    
        return view('frontend.product_details',[
            'productSluginfo' => $productSluginfo,
            'thumbnails'=> $thumbnails,
            'related_products' => $related_products,
            'available_colors'=>$available_colors,
        ]);
    }



    function getsize(Request $request){
        $str = '<option value="">Choose A Option</option>';
        $sizes = Inventory::where('product_id',$request->product_id)->where('color_id',$request->color_id)->get();
        foreach($sizes as $size){
            $str .= '<option value="'.$size->rel_to_size->id.'">'.$size->rel_to_size->color_size.'</option>';
        }
        echo $str;
    }
}
