<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subcategory;

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
}
