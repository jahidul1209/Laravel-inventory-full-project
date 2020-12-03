
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
                           View Product  Details 
						<a href="{{route('all-product')}}" class = "btn btn-sm btn-default pull-right">All Product</a>
						<a href="{{ URL :: to ('home')}}" class = "btn btn-sm btn-default pull-right">Home</a>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                          <div class="col-md-1"></div>
                            <div class="col-md-7 col-sm-12 col-xs-12">

                            		<h3>Product Code : <span style="font-weight: 400 ; font-size: 22px">{{$view->product_code}}</span></h3>
									<h3>Product Name : <span style="font-weight: 400 ; font-size: 20px">{{$view->product_name}}</span></h3>
									<h3>Product Category : <span style="font-weight: 400 ; font-size: 20px">{{$view->category_id}}</span></h3>
									<h3>Supplier Name  : <span style="font-weight: 400 ; font-size: 20px">{{$view->supplier_id}}</span></h3>
									<h3>Product Storage : <span style="font-weight: 400 ; font-size: 20px">{{$view->product_place}}</span></h3>
									<h3>Product Route : <span style="font-weight: 400 ; font-size: 20px">{{$view->product_route}}</span></h3>
									<h3>Buying Date : <span style="font-weight: 400 ; font-size: 20px">{{$view->buy_date}}</span></h3>

									<h3>Expire Date : <span style="font-weight: 400 ; font-size: 20px">{{$view->expire_date}}</span></h3>
									<h3>Buying Price : <span style="font-weight: 400 ; font-size: 20px">{{$view->buying_price}}</span></h3>
									<h3>Selling Price : <span style="font-weight: 400 ; font-size: 20px">{{$view->selling_price}}</span></h3>

									
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">

								<span style="font-weight: 400 ; font-size: 20px">{{$view->product_name}}</span>
								<img src = "{{URL :: to ($view->product_image)}}" style="height: auto; width: 100%;"/>
								
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
