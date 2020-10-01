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
            <h1>Researches</h1>
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
            <h3 class="card-title">Researches Manager</h3>
        <a class="btn btn-success text-white" href="{{route('research.create')}}">Add New Researches</a>      
       
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
                  <th>Disease Type</th>
                  <th>Image</th>
                  <th>Video</th>       
                  <th>Title</th>    
                  <th>Author</th>       
                  <th>Subtitle</th>  
                  <th>Edit</th>  
                  <th>Delete</th>      
                </tr>
                </thead>
                <tbody>
                  @foreach($researches as $research)
                  <tr>
                    <td>{{$loop->index + 1}}</td>                   
                    <td>
                      {{
                         Illuminate\Support\Facades\DB::table('disease_types')->find($research->disease_type_id)->name                    
                        }}
                    </td>
                    <td>{{$research->thumbnail}}</td>
                    <td>{{$research->video}}</td>
                    <td>{{$research->title}}</td>
                    <td>{{$research->author}}</td>
                    <td>{{$research->subtitle}}</td>
                    <td>
                      <a href="{{route('research.edit', $research->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>            
                    </td>
                  
                  
                    <td class="text-center">
                      <form id="delete-form-{{$research->id}}" action="{{route('research.destroy',$research->id)}}" style="display:none" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      </form>
                    <a href="" onclick="
                    if(confirm('Are you sure, you want to delete this ?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{$research->id}}').submit();
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
                  <th>Disease Type</th>
                  <th>Image</th>
                  <th>Video</th>       
                  <th>Title</th>    
                  <th>Author</th>       
                  <th>Subtitle</th>  
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
