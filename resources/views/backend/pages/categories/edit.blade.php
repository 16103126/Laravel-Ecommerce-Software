@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Edit Category</h2>      
      </div>
      <div class="card-body">

        <form method="post" action="{{route('admin.category.update', $category->id)}}" enctype="multipart/form-data">
          {{csrf_field()}}

          @include('backend.partials.message')
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{$category->name}}" class="form-control">
          </div>

          <div class="form-group">
            <label>Description (optional)</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$category->description}}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Parent Category (optional)</label>
            <select class="from-control" name="parent_id">
              <option value="">Please select a primary category</option>
              @foreach ($main_categories as $cat)
              <option value="{{$cat->id}}" {{$cat->id==$category->parent_id ? 'selected' : ''}}>{{$cat->name}} </option>
              @endforeach  
            </select>
          </div>
          
         

      <div class="form-group"> 
        <label for="oldimage">Category Old Image</label> <br>
         
          <img src="{!! asset('images/categories/'.$category->image) !!}" width="100"><br>

          <label for="newimage">Category New Image (optional)</label> 
          <input type="file" name="image" id="newimage" class="form-control">
      
          <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection