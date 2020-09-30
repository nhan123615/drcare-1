@extends('admin/layouts/app')

@section('admin-content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctor Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Doctor Editors</li>
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
      <h3 class="card-title">Doctor Information</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @include('admin.includes.messages')
    <form role="form" action="{{ route('doctor.update',$doctor->id)}}" method="POST">
      {{csrf_field()}}
      {{method_field('PATCH')}}

      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="title">Doctor Name</label>
            <input type="text" class="form-control"  placeholder="Title" name="name" value="{{$doctor->name}}">
            </div>
    
            <div class="form-group">
              {{-- <label for="subtitle">Occupation</label>
              <input type="text" class="form-control"  placeholder="Sub Title" name="occupation" value="{{$doctor->doctor_type_id}}"> --}}

              <label for="occupation">Occupation</label>
              <select name="occupation" id="">
                @foreach($occupations as $occupation)
                <option value="{{$occupation->id}}">{{$occupation->name}}</option>
                @endforeach
              </select>
               
         
            </div>

          </div>
  
          <div class="col-lg-6">         
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image">
                  <label class="custom-file-label" for="image" name="image">Input Doctor Image</label>
                </div>
              </div>
            </div>
              <br>
              <br>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status"
              @if($doctor->status==1) checked @endif>
              <label class="form-check-label" for="status" name="status">Pulish</label>
            </div>
          </div>     
        </div>
        
      </div>
      <!-- /.card-body -->
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Write Doctor Description Here
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
            <textarea class="textarea" placeholder="Place some text here" name="description"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{$doctor->body}}      
            </textarea>
          </div>
        
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-warning" href="{{route('doctor.index')}}">Back</a>
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