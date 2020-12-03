
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
                                    <li><a href="{{route('today-expence')}}">All Expence</a></li>
                                    <li class="active">Edit Expence Data</li>
                                </ol>
                            </div>
                        </div>
<!--                  @php 
                date_default_timezone_set("Asia/Dhaka");
                @endphp -->
               <div class="col-md-2"></div>
                      <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Information</h3></div>
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
                                        <form role="form" method = "POST" action = "{{ url ('/update-expence/'.$edt ->id)}}" enctype="multipart/form-data">
                                        	@csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expence Details</label>
                                        <textarea  type="text" rows ="4" name = "details" class="form-control" id="exampleInputEmail1" required > {{$edt ->details}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="text" name = "amount" class="form-control" id="exampleInputEmail1"value ="{{$edt ->amount}}" required>
                                    </div>
                                     <div class="form-group">
                                        <input type="hidden" name = "date" class="form-control" id="exampleInputEmail1" value = "{{date('d/m/y')}}" required>
                                    </div> 
                                    <div class="form-group">
                                        <input type="hidden" name = "month" class="form-control" id="exampleInputEmail1" value = "{{date('F Y')}}" required>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                </form>
                                    </div>
                                </div> 
                            </div>  
                      </div>
                   </div>
              </div>
 @endsection