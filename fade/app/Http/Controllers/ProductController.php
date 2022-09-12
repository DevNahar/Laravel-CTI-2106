<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Thumbnail;
use App\Models\subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    function add_product(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.index',[
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    function getsubcategory(Request $c_id_received){
        $subcategories= Subcategory::where('category_id',$c_id_received->c_id)->get();
        $str= "<option>--Select Subcategory--</option>";
        foreach($subcategories as $subcategory){

            $str .= "<option value='$subcategory->id'>$subcategory->subcategory_name</option>";

        }
        echo $str;
    }

    //product_store
    function product_store(Request $product_data){


        $slug_name = str_replace(' ', '-',$product_data->product_name);
        $name = Str::lower($slug_name);
        $slug = $name.'-'. random_int(1000,100000);

       $product_id= Product::insertGetId([
            'category_id'=> $product_data->category_id,
            'subcategory_id'=> $product_data->subcategory_id,
            'product_name'=> $product_data->product_name,
            'slug'=> $slug,
            'product_price'=> $product_data->product_price,
            'discount'=> $product_data->discount,
            'after_discount'=> $product_data->product_price-($product_data->product_price * $product_data->discount/100),
            'brand'=> $product_data->brand,
            'short_desp'=> $product_data->short_desp,
            'long_desp'=> $product_data->long_desp,

        ]);

        $preview= $product_data->preview;
        $extension = $preview->getClientOriginalextension();
        $filename = $slug.'.'.$extension;
        Image::make($preview)->save(public_path('/uploads/products/preview_image/'.$filename));
        Product::find($product_id)->update([
            'preview'=>$filename,
        ]);
        $thumbnails = $product_data->thumbnails;

         foreach($thumbnails as $thumbnail){
            $thumbnail_extension = $thumbnail->getClientOriginalextension();
            $thum_filename =$name .'-'. random_int(1000,100000).'.'.$thumbnail_extension;

           Image::make($thumbnail)->save(public_path('/uploads/products/thumbnails/'. $thum_filename));

           Thumbnail::insert([
            'product_id'=> $product_id,
            'thumbnail' =>$thum_filename,
            'created_at' =>Carbon::now(),

           ]);

        }

        return back()->with('preview','Preview image Added!!');
    }


    //product_list
    function product_list(){
        view('admin.product.productList');
    }
}
