@extends('admin/layouts/app')

@section('admin-content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Research Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Research Editors</li>
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
      <h3 class="card-title">Research Information</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @include('admin.includes.messages')
    <form role="form" action="{{ route('research.store')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">

            <div class="form-group">
              <label for="type">Disease Type</label>
              <select name="type" id="" class="form-control">
                <option value="">Select Disease Type</option>
                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="title">Research Tile</label>
            <input type="text" class="form-control"  placeholder="Title" name="title" >
            </div>

            <div class="form-group">
              <label for="author">Author</label>
            <input type="text" class="form-control"  placeholder="Title" name="author">
            </div>

            <div class="form-group">
              <label for="subtitle">Subtitle</label>
            <input type="text" class="form-control"  placeholder="Title" name="subtitle" >
            </div>
          </div>
  
          <div class="col-lg-6 pt-4 pl-5">         
            <div class="form-group pt-3">
                  <input type="file" name="image">
                  <label  for="image" >Research Image</label>       
            </div>

            <div class="form-group pt-4">
                  <input type="file" name="video">
                  <label  for="video" name="video">Video Image</label>
            </div>

              <br>
              <br>
            <div class="form-check">
              <input value="1" type="checkbox" class="form-check-input" name="status" 
              >
              <label class="form-check-label" for="status" >Pulish</label>
            </div>
          </div>     
        </div>
        
      </div>
      <!-- /.card-body -->
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Write Research Content Here
          </h3>
          <!-- tools box -->
          <div class="card-tools">
            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fas fa-minus bg-light"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body pad">
          <div class="mb-3">
            <textarea class="textarea" placeholder="Place some text here" name="content"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
               
            </textarea>
          </div>
        
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-warning" href="{{route('research.index')}}">Back</a>
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