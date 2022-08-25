<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
   function category(){
    $all_category = Category::all();
    $trashed_category= Category::onlyTrashed()->get();
    return view('admin.category.index',[
        'all_category' =>$all_category,
        'trashed_category' =>$trashed_category,
    ]);
   }

   function store(CategoryRequest $request){
    $category_id = Category::insertGetId([
        'category_name'=> $request->category_name,
        'added_by'=> Auth::id(),
        'created_at'=> Carbon::now(),
    ]);

    $category_image = $request->category_image;
    $extension = $category_image->getClientOriginalExtension();
    $filename= $category_id. ".". $extension;
    Image::make($category_image )->save(public_path('uploads/categories/'.$filename));

    //category update

    Category::where('id',$category_id )->update([
        'category_image' => $filename,
    ]);
    return back()->with('category_image','category has been updated');
   }

   //Delete
   function category_delete($category_id){
    Category::find($category_id)->delete();
   return back()->with('category_delete', 'Category softdelete has been successfully');
   }

   //hard delete
   function category_hard_delete($category_id){
    Category::onlyTrashed()->find($category_id)->forceDelete();
    return back()->with('category_hard_delete', 'Category  delete has been successfully');
    }

    //restore
    function category_restore($category_id){
        Category::onlyTrashed()->find($category_id)->restore();
        return back()->with('category_restore', 'Category  restore has been successfully');
    }

    //Edit
    function category_edit($category_id){

    }

}
