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
        $subrequest->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
            // 'subcategory_name'=> 'unique:subcategories',

        ]);

        if(Subcategory::where('category_id',$subrequest->category_id)->where('subcategory_name',$subrequest->subcategory_name)->exists()){
            return back()->with('exists', 'Subcategory name already exist in this category');
        }

        subcategory::insert([
            'category_id' =>$subrequest->category_id,
            'subcategory_name' =>$subrequest->subcategory_name,
            'created_at'=> Carbon::now(),
        ]);
        return back()->with('subcategoryadd','Subcategory Added!!');

   }

   //edite
   function subcategory_edit($subcategory_id){
        $categories = Category::all();
        // return $categories;
        $subcategories = Subcategory::find($subcategory_id);
        // return $subcategories;
       return  view('admin.subcategory.edit',[
        'categories' => $categories ,
        'allsubcategories' => $subcategories ,
       ]);
   }



   //update
   function subcategory_update(Request $subupdate){
    // return $subupdate;
        if(Subcategory::where('category_id',$subupdate->category_id)->where('subcategory_name', $subupdate->subcategory_name)->exists()){
             return back()->with('exists', 'Subcategory name already exist in this category');
        }
        else{
            Subcategory::where('id',$subupdate->subcategory_id)->update([
                'category_id'=> $subupdate->category_id,
                'subcategory_name'=> $subupdate->subcategory_name,
            ]);
            return redirect('/subcategory')->with('subupdate', 'Subcategory has been updated');
        }
    }


    //subcategory delete

    function subcategory_delete($subcategory_id){
        Subcategory::find($subcategory_id)->delete();
        return back()->with('subcategory_delete', 'Sobcategory softdelete has been successfully');
    }

}
