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
    return view('admin.category.index');
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

}
