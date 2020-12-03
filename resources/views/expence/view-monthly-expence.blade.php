
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
                    <li class="active">Monthly Expence</li>
                </ol>
            </div>
        </div>
        <div class="row">
       <div class="col-md-2"></div>
              <div class="col-md-8">
               <div class="panel panel-info">
                    <div class="panel-heading">

                        <div class="panel-title text-white">
                           Expence  Details 
                          <a href="{{ route ('add-expence')}}" class = "btn btn-sm btn-success pull-right">Add Expence</a>

						<a href="{{route('today-expence')}}" class = "btn btn-sm btn-danger pull-right">Today</a>
						
                         </div>
                    </div>
                    <div class="panel-body">
                    	       <div class="col-md-8">

                                	<h4>Expence Details :</h4>
                                	<p>{{$view->details}}</p>
                                	<h4>Tolal Amount :</h4>
                                	<p>{{$view->amount}}</p>
                                	<h4>Time :</h4>
                                	<p>{{$view->updated_at}}</p>
                                	<h4>Date :</h4>
                                	<p>{{$view->date}}</p>
                                	<h4>Month :</h4>
                                	<p>{{$view->month}}</p>	

                </div></div>
            </div>
        </div>

      </div>
   </div>
</div>
</div>

@endsection
