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
                    <li class="active">Pending Orders</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="panel-title">
                          Pending Orders Information
                          <a class = " btn btn-sm btn-info pull-right" href="{{route('success-order')}}">Success Order</a>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Order Date</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                         <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                </thead>

                             
                            <tbody>
                            @foreach($pending as $row)
                                <tr>
                                   <td>{{$row -> name}}</td>
                                   <td>{{$row -> order_date}}</td>
                                   <td>{{$row -> total_product}}</td>
                                   <td>{{$row -> total}}</td>
                                   <td>{{$row -> payment_status}}</td>
                                   <td><span class="badge badge-danger">{{$row -> order_status}}</span></td>
                                   
                                <td>
								<a href="{{ URL :: to ('view-orders/'.$row -> id)}}" class = "btn btn-sm btn-primary">View</a>
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