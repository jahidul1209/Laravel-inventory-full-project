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
                    <li><a href="{{route('home')}}">Expence</a></li>
                    <li class="active">Today Expence</li>
                </ol>
            </div>
        </div>

        @php
        $date = date("d/m/y");
        $expence = DB:: table('expences')->where('date' , $date )->sum('amount'); 
        @endphp
        <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-default">
                    <div class="panel-heading">
                    <h2 style="color:red ;text-align: center;">Today || Total Expence : {{ $expence }} TK</h2><p style="text-align: center; font-size: 20px">Date : {{$date}}</p>
                        <div class="panel-title">
                          Today Informaion
                          <a class = " btn btn-sm btn-success pull-right" href="{{route('monthly-expence')}}">Monthly</a>
                          <a class = " btn btn-sm btn-info pull-right" href="{{route('add-expence')}}">Add Expence</a>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Action</th>  
                                    </tr>
                                </thead>

                             
                            <tbody>
                            @foreach($today as $row)
                                <tr>
                                   <td>{{$row -> details}}</td>
                                   <td>{{$row -> amount}}</td>
                                    <td>{{$row -> updated_at}}</td>
                             <td>
                            <a href="{{ URL :: to ('edit-expence/'.$row -> id)}}" class = "btn btn-sm btn-primary">Edit</a>
                            <a href="{{ URL :: to ('delete-expence/'.$row -> id)}}" id = "delete" class = "btn btn-sm btn-danger">Delete</a>

                            <a href="{{ URL :: to ('view-expence/'.$row -> id)}}" class = "btn btn-sm btn-success">View</a>
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