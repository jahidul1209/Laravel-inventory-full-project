
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
                                    <li><a href="{{route('all-advanced-salary')}}">All Advanced Salary</a></li>
                                    <li class="active">Edit Advanced Salary</li>
                                </ol>
                            </div>
                        </div>
               <div class="col-md-2"></div>
                      <div class="col-md-8">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Edit Advanced Salary</h3></div>
                                  @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="panel-body">
                                        <form role="form" method = "POST" action = "{{ url ('/update-advanced-salary/'.$edt ->id)}}" enctype="multipart/form-data">
                                        	@csrf

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Advanced</label>
                                                <input type="text" name= "advanced_salary" class="form-control" id="exampleInputPassword1"  value ="{{$edt ->advanced_salary}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Month</label>
                                                <select  name = "month" class="form-control" id="exampleInputEmail1">  
                                                 <option value="{{$edt ->month}}">{{$edt ->month}}</option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                        </form>
                                    </div>
                                </div> 
                            </div>  
                      </div>
                   </div>
              </div>
 @endsection