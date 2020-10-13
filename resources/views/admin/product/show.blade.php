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
            <h1>Products</h1>
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
            <h3 class="card-title">Products Manager</h3>
        <a class="btn btn-success text-white" href="{{route('product.create')}}">Add New Product</a>      
       
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
                  <th>Category</th>
                  <th>Name</th>     
                  <th>Description</th>   
                  <th>Price</th> 
                  <th>Status</th>       
                  <th>Edit</th>    
                  <th>Delete</th>      
                </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>
                      {{
                         Illuminate\Support\Facades\DB::table('categories')->find($product->category_id)->name                    
                        }}
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                      @if($product->status)
                      Pulish
                      @else
                      Private
                      @endif
                    </td>
                    <td>
                      <a href="{{route('product.edit', $product->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>            
                    </td>
                  
                  
                    <td class="text-center">
                      <form id="delete-form-{{$product->id}}" action="{{route('product.destroy',$product->id)}}" style="display:none" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      </form>
                    <a href="" onclick="
                    if(confirm('Are you sure, you want to delete this ?')){
                      event.preventDefault();
                      document.getElementById('delete-form-{{$product->id}}').submit();
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
                  <th>Category</th>
                  <th>Name</th>     
                  <th>Description</th>   
                  <th>Price</th> 
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
