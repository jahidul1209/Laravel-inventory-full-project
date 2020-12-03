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
                                    <li class="active">Advanced Salary</li>
                                </ol>
                            </div>
                        </div>
               <div class="col-md-2"></div>
                      <div class="col-md-8">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Advanced Salary Provide</h3></div>

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
                                        <form role="form" method = "POST" action = "{{ url ('insert-advanced-salary')}}" enctype="multipart/form-data">
                                        	@csrf

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee Name</label>
                                            @php
                                             $empsalary = DB::table('employees')->get();
                                        	@endphp
                                        	
                                            <select  name = "emp_id" class="form-control" id="exampleInputEmail1"> 
                                                <option disabled="" selected=""></option>
                                                @foreach($empsalary as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Month</label>
                                              <select  name = "month" class="form-control" id="exampleInputEmail1"> 
                                                    <option disabled="" selected=""></option>
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
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Year</label>
                                              <select  name = "year" class="form-control" id="exampleInputEmail1"> 
                                                    <option disabled="" selected=""></option>

                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
											</select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Advanced Salary</label>
                                                <input type="text" name = "advanced_salary" class="form-control" id="exampleInputEmail1" placeholder="Advanced Salary"required>
                                            </div>

                                            <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                </div> 
                            </div>  
                      </div>
                   </div>
              </div>

@endsection