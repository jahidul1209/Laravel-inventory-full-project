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
                    <li class="active">All Products</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="panel-title">
                          All Product Informaion
                          <a class = " btn btn-sm btn-info pull-right" href="{{route('add-product')}}">Add Supplier</a>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<!--  <th>ID</th> -->
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                   <!--      <th>Category Name</th> -->
                                     <!--    <th>Supplier Name</th> -->
                                        <th>Product Storage</th>
                                         <th>Product Route</th>
                                        <!-- <th>Buying Date</th> -->
                                       <!--  <th>Expire Date</th> -->
                                         <th>Buying Price</th>
                                       <!--  <th>Selling Price</th> -->
                                         <th>Product image</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                </thead>

                             
                            <tbody>
                            @foreach($products as $row)
                                <tr>
                                 <!--   <td>{{$row -> id}}</td> -->
                                   <td>{{$row -> product_code}}</td>
                                   <td>{{$row -> product_name}}</td>
                                 <!--   <td>{{$row -> category_id}}</td> -->
                                <!--    <td>{{$row -> supplier_id}}</td> -->
                                   <td>{{$row -> product_place}}</td>
                                   <td>{{$row -> product_route}}</td>
                                  <!--  <td>{{$row -> buy_date}}</td> -->
                                  <!--  <td>{{$row -> expire_date}}</td> -->
                                   <td>{{$row -> buying_price}}</td>
                                   <!-- <td>{{$row -> selling_price}}</td> -->
                                   <td><img src = "{{URL :: to ($row->product_image)}}" style ="height:80px;width:80px"/></td>
                             <td>
            								<a href="{{ URL :: to ('edit-product/'.$row -> id)}}" class = "btn btn-sm btn-primary">Edit</a>
            						    <a href="{{ URL :: to ('delete-product/'.$row -> id)}}" id = "delete" class = "btn btn-sm btn-danger">Delete</a>

            						    <a href="{{ URL :: to ('view-product/'.$row -> id)}}" class = "btn btn-sm btn-success">View</a>
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