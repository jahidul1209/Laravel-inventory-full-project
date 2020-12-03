
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
                    <li><a href="#">All Employee</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-default">
                    <div class="panel-heading">

                        <div class="panel-title">
                           View Single Customer  Details 
						<a href="{{route('all-customer')}}" class = "btn btn-sm btn-default pull-right">All Customer</a>
						<a href="{{ URL :: to ('home')}}" class = "btn btn-sm btn-default pull-right">Home</a>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                          <div class="col-md-1"></div>
                            <div class="col-md-7 col-sm-12 col-xs-12">

                            		<h3>Name : <span style="font-weight: 400 ; font-size: 22px">{{$view->name}}</span></h3>
									<h3>Email : <span style="font-weight: 400 ; font-size: 20px">{{$view->email}}</span></h3>
									<h3>Phone : <span style="font-weight: 400 ; font-size: 20px">{{$view->phone}}</span></h3>
									<h3>NID No  : <span style="font-weight: 400 ; font-size: 20px">{{$view->nid_no}}</span></h3>
									<h3>Bank Account No : <span style="font-weight: 400 ; font-size: 20px">{{$view->account_no}}</span></h3>
									<h3>Address : <span style="font-weight: 400 ; font-size: 20px">{{$view->address}}</span></h3>
									<h3>City : <span style="font-weight: 400 ; font-size: 20px">{{$view->city}}</span></h3>
									
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">

								<span style="font-weight: 400 ; font-size: 20px">{{$view->name}}</span>
								<img src = "{{URL :: to ($view->photo)}}" style="height: auto; width: 100%;"/>
								
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
