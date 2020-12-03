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
                    <li><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="active">All Supplier</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="panel-title">
                          All Supplier Information
                          <a class = " btn btn-sm btn-info pull-right" href="{{route('add-supplier')}}">Add Supplier</a>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	 <th>ID</th>
                                        <th>Name</th>
                                   <!--      <th>Email</th> -->
                                        <th>Phone</th>
                                        <th>NID No</th>
                                        <th>Shop</th>
                                         <th>Address</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                </thead>

                             
                            <tbody>
                            @foreach($showcus as $row)
                                <tr>
                                   <td>{{$row -> id}}</td>
                                   <td>{{$row -> name}}</td>
                                <!--    <td>{{$row -> email}}</td> -->
                                   <td>{{$row -> phone}}</td>
                                   <td>{{$row -> nid_no}}</td>
                                   <td>{{$row -> Shop}}</td>
                                   <td>{{$row -> address}}</td>
                                   <td><img src = "{{URL :: to ($row->photo)}}" style ="height:80px;width:80px"/></td>
                                <td>
								<a href="{{ URL :: to ('edit-supplier/'.$row -> id)}}" class = "btn btn-sm btn-primary">Edit</a>
								<a href="{{ URL :: to ('delete-supplier/'.$row -> id)}}" id = "delete" class = "btn btn-sm btn-danger">Delete</a>

								<a href="{{ URL :: to ('view-supplier/'.$row -> id)}}" class = "btn btn-sm btn-success">View</a>
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