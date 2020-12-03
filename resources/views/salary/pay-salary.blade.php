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
                    <li><a href="{{route('home')}}">Employee Salary</a></li>
                    <li class="active">Pay Salary</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="panel-title">
                          Pay Salary 
                          <span class = "pull-right text-info"> {{date("F Y")}}</span>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Salary</th>
                                        <th>Advanced</th>
                                         <th>Month</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                </thead>

                             
                            <tbody>
                            @foreach($adsalary as $row)
                                <tr>
                                   <td>{{$row -> name}}</td>
                                   <td>{{$row -> salary}}</td>
                                   <td>{{$row -> advanced_salary}}</td>
                                   <td><span class = "badge badge-info">{{date("F", strtotime('-1 months'))}}</span></td>

                                   <td><img src = "{{URL :: to ($row->photo)}}" style ="height:80px;width:80px"/></td>
                                <td>
								<a href="{{ URL :: to ('edit-advanced-salary/'.$row -> id)}}" class = "btn btn-sm btn-primary">Pay Now</a>
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