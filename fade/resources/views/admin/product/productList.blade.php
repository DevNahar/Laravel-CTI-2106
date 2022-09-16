@extends('layouts.dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="">Product List</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Product List</h3> </div>
            <div class="card-body">
                {{-- @if (session('category_delete'))
                <div class="alert alert-success">{{ session('category_delete') }}</div>
            @endif
            @if (session('category_restore'))
                    <div class="alert alert-success">{{ session('category_restore') }}</div>
                @endif --}}
                <table class="table table-striped ">
                    <tr>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Brand</th>

                        {{-- <th>Short Desp</th> --}}
                        {{-- <th>Long Desp</th> --}}
                        <th>Preview</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($products as $key=> $product)
                    <tr>

                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->rel_to_category->category_name }}</td>
                            <td>{{ $product->rel_to_subcategory->subcategory_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->discount }}</td>
                            <td>{{ $product->brand }}</td>
                            {{-- <td>{{ $product->short_desp }}</td> --}}
                            {{-- <td>{!! $product->long_desp !!}</td> --}}
                            <td><img width="50" src="{{ asset('/uploads/products/preview_image') }}/{{ $product->preview }}" alt=""></td>
                            <td style="display: flex;" >
                                <a href="#" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-archive"></i></a>
                                <a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>

                    </tr>
                    @endforeach
                    {{-- @foreach ($all_category as $key=> $category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td><img width="50" src="{{asset('uploads/categories')}}/{{$category->category_image }}" alt=""> </td>
                        <td>{{ $category->rel_to_user->name }}</td>
                        <td>

                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                    </tr>
                    @endforeach --}}
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
