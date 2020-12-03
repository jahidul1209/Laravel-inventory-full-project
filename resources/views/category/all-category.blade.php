@extends('layouts.app')
@section('content')


<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome !</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('home')}}">Product Category</a></li>
                    <li class="active">All Category</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="panel-title">
                          All Product Category 
                          <a class = " btn btn-sm btn-info pull-right" href="{{route('add-category')}}">Add Category</a>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<th>Serial No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                </thead>

                            <tbody>
                            @foreach($category as $row)
                                <tr>
                                   <td>{{$row -> id}}</td>
                                   <td>{{$row -> cat_name}}</td>
                                <td>
								<a href="{{ URL :: to ('edit-category/'.$row -> id)}}" class = "btn btn-sm btn-primary">Edit</a>
								<a href="{{ URL :: to ('delete-category/'.$row -> id)}}" id = "delete"class = "btn btn-sm btn-danger">Delete</a>
								</td>
                                </tr>
                               @endforeach()
                            </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



      </div>
   </div>
</div>

@endsection