@extends('admin/layouts/app')

@section('head-section')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header text-center">      
          @include('admin.includes.messages')
            <h3 class="card-title">Doctors Manager</h3>
        <a class="btn btn-success text-white" href="{{route('doctor.create')}}">Add New Doctor</a>      
       
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Doctor Name</th>
                  <th>Occupation</th>
                  <th>Photo</th>       
                  <th>Description</th>    
                  <th>Status</th>       
                  <th>Edit</th>    
                  <th>Delete</th>      
                </tr>
                </thead>
                <tbody>
                  @foreach($doctors as $doctor)
                  <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$doctor->name}}</td>
                    <td>
                      {{
                         Illuminate\Support\Facades\DB::table('doctor_types')->find($doctor->doctor_type_id)->name                    
                        }}
                    </td>
                    <td class="text-center">
                      <img src="{{$doctor->photo}}" alt="" width="150" class="img-fluid img-thumbnail  rounded">
                      
                    </td>
                    <td>{{$doctor->description}}</td>
                    <td>
                      @if($doctor->status)
                      Pulish
                      @else
                      Private
                      @endif
                    </td>
                    <td>
                      <a href="{{route('doctor.edit', $doctor->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>            
                    </td>
                  
                  
                    <td class="text-center">
                      <form id="delete-form-{{$doctor->id}}" action="{{route('doctor.destroy',$doctor->id)}}" style="display:none" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      </form>
                    <a href="" onclick="
                    if(confirm('Are you sure, you want to delete this ?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{$doctor->id}}').submit();
                    }else{
                      event.preventDefault();
                    }"><i class="fa fa-trash  text-danger" aria-hidden="true"></i></a>
                      </td>
                  </tr>    
                  @endforeach
                   
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Doctor Name</th>
                  <th>Occupation</th>
                  <th>Photo</th>  
                  <th>Description</th>   
                  <th>Status</th>       
                  <th>Edit</th>    
                  <th>Delete</th>   
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection
