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
                            <li><a href="{{route('today-expence')}}">Today Expence</a></li>
                            <li class="active">Add Expence</li>
                        </ol>
                    </div>
                </div>
<!--                 @php 
                date_default_timezone_set("Asia/Dhaka");
                @endphp -->
       <div class="col-md-2"></div>
              <div class="col-md-8">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h3 class="panel-title text-white">Add Expence 
                            <a href="{{route('monthly-expence')}}" class = "btn btn-success pull-right">This Month</a>
                            <a href="{{route('today-expence')}}" class = "btn btn-danger pull-right">Today</a></h3>
                        </div>

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
                                <form role="form" method = "POST" action = "{{ url ('insert-expence')}}" enctype="multipart/form-data">
                                	@csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expence Details</label>
                                        <textarea  type="text" rows ="4" name = "details" class="form-control" id="exampleInputEmail1"  required > </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="text" name = "amount" class="form-control" id="exampleInputEmail1" placeholder="Amount"required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name = "date" class="form-control" id="exampleInputEmail1" value = "{{date('d/m/y')}}" required>
                                    </div> 
                                    <div class="form-group">
                                        <input type="hidden" name = "month" class="form-control" id="exampleInputEmail1" value = "{{date('F')}}" required>
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