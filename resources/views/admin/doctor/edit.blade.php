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
    <form role="form" action="{{ route('doctor.update',$doctor->id)}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('PATCH')}}

      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="name">Doctor Name</label>
            <input type="text" class="form-control"  placeholder="Doctor Name" name="name" value="{{$doctor->name}}">
            </div>
    
            <div class="form-group">
              <label for="occupation">Occupation</label>
              <select name="occupation" id="" class="form-control">
                @foreach($occupations as $occupation)
                <option value="{{$occupation->id}}" @if($doctor->doctor_type_id == $occupation->id)selected="selected"@endif>{{$occupation->name}}</option>
                @endforeach
              </select>  
            </div>

          </div>
  
          <div class="col-lg-6 pl-5">         
            <div class="row">

              <div class="col-lg-3">
                <label  >Doctor Image</label>
                <img src="{{$doctor->photo}}" alt="" width="300" class="img-fluid img-thumbnail  rounded">
              </div>

              <div class="col-lg-9 mt-5 pl-5">   
                 <div class="form-group">
                  <input type="file"  name="image">
                  <label for="image" >Input Doctor Image</label>
                </div>

                <div class="form-check">
                  <input value="1" type="checkbox" class="form-check-input" name="status" 
                  @if($doctor->status==1) checked @endif>
                  <label class="form-check-label" for="status" >Pulish</label>
                </div>
               
              </div> 
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
                    {{$doctor->description}}      
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