@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{route('add.product')}}">Product</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white"> Add Product</h3></div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{-- <label class="form-label">Category Name</label>
                                <input type="text" name="category_name"  class="form-control">  --}}
                                <select name="category_id" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category)
                                    <option value="">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {{-- <label class="form-label">Category Name</label>
                                <input type="text" name="category_name"  class="form-control">  --}}
                                <select name="category_id" class="form-control">
                                    <option value="">--Select Subcategory--</option>
                                    @foreach ($subcategories as $subcategory)
                                    <option value="">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
