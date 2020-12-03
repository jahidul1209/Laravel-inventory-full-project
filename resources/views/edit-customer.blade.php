
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
                                    <li><a href="{{route('all-customer')}}">All Customer</a></li>
                                    <li class="active">Edit Customer Data</li>
                                </ol>
                            </div>
                        </div>
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
                                        <form role="form" method = "POST" action = "{{ url ('/update-customer/'.$edt ->id)}}" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                                <input type="text" name = "name" class="form-control" id="exampleInputEmail1"  value ="{{$edt ->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name ="email" class="form-control" id="exampleInputEmail1"  value ="{{$edt ->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone No</label>
                                                <input type="tel" name = "phone" class="form-control" id="exampleInputEmail1" required value ="{{$edt ->phone}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">NID Number</label>
                                                <input type="text" name = "nid_no" class="form-control" id="exampleInputEmail1"  value ="{{$edt ->nid_no}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account No</label>
                                                <input type="text" name= "account_no" class="form-control" id="exampleInputPassword1"  value ="{{$edt ->account_no}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" name = "address" class="form-control" id="exampleInputEmail1"  value ="{{$edt ->address}}">
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Current City</label>
                                                <input type="text" name= "city" class="form-control" id="exampleInputPassword1"  value ="{{$edt ->city}}">
                                            </div>
                                              <div class="form-group">
                                              	<img id = "image" src="#"/>
                                                <label for="exampleInputPassword1">New Photo</label>
                                                <input type="file" name= "photo" accept ="image/*" class ="upload" onchange="readURL(this)" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{ URL :: to ($edt ->photo)}}"  name ="old_image" style="height: 80px; width: 80px;">
                                                
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