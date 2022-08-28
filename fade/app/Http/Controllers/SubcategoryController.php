<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\subcategory;
use Carbon\Carbon;

class SubcategoryController extends Controller
{
   function subcategory(){
    $categories= Category:: all();
    $subcategories = Subcategory::all();
    return view('admin.subcategory.index',[
        'allcategories' => $categories,
        'allsubcategories'=> $subcategories,
    ]);
   }

   function subcategory_store(Request $subrequest){
        subcategory::insert([
            'category_id' =>$subrequest->category_id,
            'subcategory_name' =>$subrequest->subcategory_name,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('subcategoryadd','Subcategory Added!!');

   }
}
