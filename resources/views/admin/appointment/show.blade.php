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
            <h1>Contact Manager</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
           {{--    <li class="breadcrumb-item active"></li> --}}
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
            <h3 class="card-title">Contact Details</h3>
       {{--  <a class="btn btn-success text-white" href="">Add New Tag</a>       --}}
       
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          
          <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Doctor</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Message</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($appointments as $appointment)
                  <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$appointment->first_name}}</td>
                    <td>{{$appointment->last_name}}</td>
                    <td>{{
                    Illuminate\Support\Facades\DB::table('doctors')->find($appointment->doctor_id)->name
                    }}
                    </td>
                    <td>{{$appointment->phone}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>{{$appointment->time}}</td>
                    <td>{{$appointment->message}}</td>
                    <td class="text-center">
                      <form id="delete-form-{{$appointment->id}}" action="{{route('appointment.destroy',$appointment->id)}}" style="display:none" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      </form>
                    <a href="" onclick="
                    if(confirm('Are you sure, you want to delete this ?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{$appointment->id}}').submit();
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
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Doctor</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Message</th>
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
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection
