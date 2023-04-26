@extends('layouts.dashboard')
@section('content')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('product.list') }}">Product List</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('add.color.size') }}">Product Color & size</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header"><h3>Color List</h3></div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SI</th>
                        <th>Color Name</th>
                        <th>Color</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($colorData as $key=> $color)
                     <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $color->color_name }}</td>
                        <td><button class="p-2 mr-2" style="background-color: {{ $color->color_code }}; border:none;"></button>{{ $color->color_code }}</td>                        
                                              
                        <td><a href="" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a></td>
                        </tr>   
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border border-primary">
            <div class="card-header bg-primary"><h3 class="text-white">Add Colors</h3></div>
            <div class="card-body">
                <form action="{{ route('add.color') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Color Name</label>
                        <input type="text" class="form-control" name="color_name" >
                    </div>
                    <div class="form-group">
                        <label class="form-label">Color Code</label>
                        <input type="text" class="form-control" name="color_code">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Color</button>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
    <div class="col-lg-8 mt-5">
        <div class="card">
            <div class="card-header"><h3>Size List</h3></div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SI</th>
                        <th>Size Name</th>                        
                        <th>Action</th>
                    </tr>
                    @foreach ($sizeData as $key=> $size)
                     <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $size->color_size }}</td>                                              
                                              
                        <td><a href="" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a></td>
                        </tr>   
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-5">
        <div class="card border border-primary">
            <div class="card-header bg-primary"><h3 class="text-white">Add Size</h3></div>
            <div class="card-body">
                <form action="{{ route('add.size') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Size Name</label>
                        <input type="text" class="form-control" name="color_size" >
                    </div>
                   
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Size</button>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
</div>


@endsection