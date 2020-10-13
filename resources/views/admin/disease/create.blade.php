@extends('admin/layouts/app')

@section('admin-content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Disease Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Disease Editors</li>
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
      <h3 class="card-title">Disease Information</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @include('admin.includes.messages')
    <form role="form" action="{{ route('disease.store')}}" method="POST">
      {{csrf_field()}}

      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="name">Disease Name</label>
            <input type="text" class="form-control"  placeholder="Disease" name="name" >
            </div>

            
            <div class="form-group">
              <label for="type">Disease Type</label>
              <select name="type" id="" class="form-control">
                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="description">Disease  Description</label>
              <textarea class="textarea" placeholder="Place some text here" name="description"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      
              </textarea>
            </div>

            <div class="mb-3">
              <label for="statistics">Disease  Statistics</label>
              <textarea class="textarea" placeholder="Place some text here" name="statistics"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                   
              </textarea>
            </div>
            </div>

            <div class="col-lg-6">
             

              <div class="mb-3">
                <label for="causes">Disease  Causes</label>
                <textarea class="textarea" placeholder="Place some text here" name="causes"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                       
                </textarea>
              </div>

              <div class="mb-3">
                <label for="symptoms">Disease  Symptoms</label>
                <textarea class="textarea" placeholder="Place some text here" name="symptoms"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  
                </textarea>
              </div>

              <div class="mb-3">
                <label for="preventions">Disease  Preventions</label>
                <textarea class="textarea" placeholder="Place some text here" name="preventions"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    
                </textarea>
              </div>

            </div>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-warning" href="{{route('disease.index')}}">Back</a>
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