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
    $trash_info = Category::onlyTrashed()->find($category_id);
    $img_delete_path = public_path('uploads/categories/'. $trash_info->category_image);
    unlink($img_delete_path);
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
        $category_info= Category::Find($category_id);

        return view('admin.category.edit',[
            'category_info'=> $category_info,
        ]);

    }

    //update
    function category_update(Request $request){
        if($request->category_image == ''){
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,

            ]);

        }else{
            $delete_img = Category::find($request->category_id);
            $deleteimg_path = public_path('uploads/categories/'. $delete_img->category_image);
            unlink($deleteimg_path);
            $category_image= $request->category_image;
            $extension = $category_image->getClientOriginalExtension();

            $filename = $request->category_id . '.'. $extension;
            Image::make($category_image)->save(public_path('uploads/categories/'.$filename));
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
                'category_image' => $filename,
            ]);
        }
        // return back()->with('category_update', 'Category updated has been successfully ');
    }

}
