@extends('layouts/dashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>        
        <li class="breadcrumb-item active"><a href="">Inventory</a></li>
    </ol>
</div>
<div class="row">
    
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h3>Inventory List</h3></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SI</th>
                            <th>Product Name</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($inventoryData as $key=> $inventory)
                         <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product_info->product_name }}</td>
                            <td>{{ $inventory->rel_to_color->color_name }}</td>
                            <td>{{ $inventory->rel_to_size->color_size }}</td>
                            <td>{{ $inventory->quantity }}</td>
                            
                            <td><a href="" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a></td>
                            </tr>   
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
   
    <div class="col-lg-4">
        <div class="card border border-primary">
            <div class="card-header bg-primary"><h3 class="text-white">Add Inventory</h3></div>
            <div class="card-body">
                <form action="{{ route('store.inventory', $product_info->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>                        
                            <input type="text" class="form-control " readonly value="{{ $product_info->product_name }}" name="product_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Color</label>                        
                            <select name="color_id" class="form-control"> 
                                <option value="">--Select Color--</option>                               
                                @foreach ($colorData as $color )
                                 <option value="{{ $color->id }}">{{ $color->color_name }}</option>   
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Size</label>                        
                            <select name="size_id" class="form-control"> 
                                <option value="">--Select Size--</option>                                
                                @foreach ($sizeData as $size )
                                 <option value="{{ $size->id }}">{{ $size->color_size }}</option>   
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label> 
                            <input type="text" name="quantity" class="form-control">  
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('product.list') }}" class="btn btn-primary">Product list</a>
                            <button type="submit" class="btn btn-primary">Add Inventory</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection