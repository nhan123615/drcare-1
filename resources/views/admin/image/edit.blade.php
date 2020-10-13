@extends('admin/layouts/app')

@section('head-section')
<link rel="stylesheet" href="{{asset('admin/css/thumnail-img.css')}}">
@endsection

@section('admin-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Image Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Image Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

             <!-- general form elements -->
   <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Image Information</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @include('admin.includes.messages')
    <form role="form" action="{{ route('image.update',$image->id)}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('PATCH')}}

      <div class="card-body mb-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="product_id">Product Name</label>
              <select name="product_id" id="" class="form-control">
                @foreach($products as $product)
                <option value="{{$product->id}}" @if($image->product_id == $product->id)selected="selected"@endif>{{$product->name}}</option>
                @endforeach
              </select>
            </div>

        

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                  <label for="image_main">Image Main</label>
                  <input type="file" name="image_main">             
                </div>
    
                <div class="form-group">
                  <label for="image_front">Image Front</label>
                  <input type="file" name="image_front">             
                </div>
  
                <div class="form-group">
                  <label for="image_back">Image Back</label>
                  <input type="file" name="image_back">             
                </div>
              </div>  
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="image_left">Image Left</label>
                    <input type="file" name="image_left">             
                  </div>
      
                  <div class="form-group">
                    <label for="image_right">Image Right</label>
                    <input type="file" name="image_right">             
                  </div>
                </div>
              </div>  
          </div>
  
          <div class="col-lg-6 p-4" >       
            <div class="pics pl-3">
              <span class="main-img"><img src="{{$image->image_main}}" class="main"></span>
                <div class="additional-img"  >
                  <img src="{{$image->image_main}}" class="details">
                  <img src="{{$image->image_front}}" class="details">
                  <img src="{{$image->image_back}}"  class="details">
                  <img src="{{$image->image_right}}" class="details">
                  <img src="{{$image->image_left}}" class="details">
                </div>
              </div>
          </div>
      </div> 
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-warning" href="{{route('image.index')}}">Back</a>
      </div>
    </form>
  </div>
  <!-- /.card -->

          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footer-section')
<script>
  $(document).ready(function(){
       $('.details').click(function(){
        $('.main').attr('src', $(this).attr('src'));       
       })
     
});
</script>
@endsection