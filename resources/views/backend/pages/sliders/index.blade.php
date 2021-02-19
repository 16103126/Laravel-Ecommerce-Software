@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      
    <div class="card">
      <div class="card-header">
        <h2>Manage Slider</h2>      
      </div>
      <div class="card-body">
          @include('backend.partials.message')

          <!--Add Slider -->

          <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2"><i class="fa fa-plus"></i>Add New Slider</a>
          <div class="clearfix"></div>

          
<div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{!! route('admin.slider.store') !!}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="title">Slider Title<small class="text-danger">(required)</small></label>
              <input type="text" name="title" class="form-control" id="title" placeholder="Slider Title" required>
            </div>

            <div class="form-group"> 
              <label for="image">Slider Image <small class="text-danger">(required)</small></label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
              <label for="button_text">Slider Button Text<small class="text-danger">(optional)</small></label>
              <input type="text" name="button_text" class="form-control" id="button_text" placeholder="Slider Button Text">
            </div>

            <div class="form-group">
              <label for="button_link">Slider Button Link<small class="text-danger">(optional)</small></label>
              <input type="url" name="button_link" class="form-control" id="button_link" placeholder="Slider Button Link">
            </div>

            <div class="form-group">
              <label for="priority">Slider Priority<small class="text-danger">(required)</small></label>
              <input type="text" name="priority" class="form-control" id="priority" placeholder="Slider Priority" required>
            </div>

            <button type="submit" class="btn btn-success">Add New</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>

    </div>
  </div>
</div>


      <table class="table table-hover table-striped" id="dataTable">

        <thead>
          <tr>
              <th>Sl.</th>
              <th>Slider Title</th>
              <th>Slider Image</th>
              <th>Slider Priority</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($sliders as $slider)
          <tr>
              <td>{{$loop->index +1}}</td>
              <td>{{$slider->title}}</td>
              <td>
                <img src="{{asset('images/sliders/'.$slider->image)}}" width="40">
              </td>
              <td>{{$slider->priority}}</td>
              
              <td>

               
      
              

<!--Delete Slider -->


              <a href="#deleteModal{{$slider->id}}" data-toggle="modal" class="btn btn-danger">delete</a>
              
              <!--Edit Slider -->

              <a href="#editSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2"><i class="fa fa-plus"></i>Edit Slider</a>
              <div class="clearfix"></div>
    
              
    <div class="modal fade" id="editSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{!! route('admin.slider.update', $slider->id) !!}" enctype="multipart/form-data">
                {{ csrf_field() }}
    
                <div class="form-group">
                  <label for="title">Slider Title<small class="text-danger">(required)</small></label><br>
                  <input type="text" name="title" class="form-control" id="title" required value="{{$slider->title}}">
                </div><br>
    
                <div class="form-group"> 
                  <label for="image">Slider Image 
                    <a href="{{asset('images/sliders/'.$slider->image)}}" target="_blank">Previous Image</a>
                    <small class="text-danger">(required)</small></label><br>
                    <input type="file" name="image" id="image" class="form-control">
                </div><br>
    
                <div class="form-group">
                  <label for="button_text">Slider Button Text<small class="text-danger">(optional)</small></label><br>
                  <input type="text" name="button_text" class="form-control" id="button_text" value="{{$slider->button_text}}">
                </div><br>
    
                <div class="form-group">
                  <label for="button_link">Slider Button Link<small class="text-danger">(optional)</small></label><br>
                  <input type="url" name="button_link" class="form-control" id="button_link" required value="{{$slider->button_link}}">
                </div><br>
    
                <div class="form-group">
                  <label for="priority">Slider Priority<small class="text-danger">(required)</small></label><br>
                  <input type="text" name="priority" class="form-control" id="priority" required value="{{$slider->priority}}">
                </div>
                <hr>
    
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
          </div>
    
        </div>
      </div>
    </div>

<div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{!! route('admin.slider.delete', $slider->id) !!}">
            {{ csrf_field() }}

            <button type="submit" class="btn btn-danger">Permanent Delete</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

            </td>
              
          </tr>

          @endforeach
          <tfoot>
            <tr>
                <th>Sl.</th>
                <th>Slider Title</th>
                <th>Slider Image</th>
                <th>Slider Priority</th>
                <th>Action</th>
            </tr>
          </tfoot>
        </tbody>
      </table>
       
      </div>
    </div>
  </div>
    </div>
  </div>
    
@endsection