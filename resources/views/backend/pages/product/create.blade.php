@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Add Product</h2>      
      </div>
      <div class="card-body">

        <form method="post" action="{{route('admin.product.create.store')}}" enctype="multipart/form-data">
          {{csrf_field()}}

          @include('backend.partials.message')

          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
          </div>

          <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>
          
          <div class="form-group">
            <label>price</label>
            <input type="numbber" name="price" class="form-control">
          </div>
          
          <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control">
        </div>

        <div class="form-group">
          <label>Select Category</label>
          <select class="from-control" name="category_id">
            <option value="">Please select a category for the product</option>
            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
            <option value="{{$parent->id}}">{{$parent->name}}</option>

            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
            <option value="{{$child->id}}"> ---------> {{$child->name}}</option>    
            @endforeach
                
            @endforeach
          </select>
      </div>

      <div class="form-group">
        <label>Select Brand</label>
        <select class="from-control" name="brand_id">
          <option value="">Please select a brand for the product</option>
          @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
          <option value="{{$brand->id}}">{{$brand->name}}</option>    
          @endforeach
        </select>
    </div>

      <div class="form-group"> 
        <label for="product_image">Product Image</label>
        <div class="row">
        <div class="col-md-4">
          <input type="file" name="product_image[]" id="product_image" class="form-control">
        </div>
       
          <div class="col-md-4">
            <input type="file" name="product_image[]" id="product_image" class="form-control">
          </div>
         
            <div class="col-md-4">
              <input type="file" name="product_image[]" id="product_image" class="form-control">
            </div>
            
              <div class="col-md-4">
                <input type="file" name="product_image[]" id="product_image" class="form-control">
              </div>
              </div>
      </div> 
      
          <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection