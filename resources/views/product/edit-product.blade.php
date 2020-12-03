
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
                    <li><a href="{{route('all-product')}}">All Product</a></li>
                    <li class="active">Edit Product</li>
                </ol>
            </div>
        </div>

      <div class="col-md-12">
                <div class="panel panel-default">
                	<div class="panel-heading"><h3 class="panel-title ">Edit Product Information <span><a class="btn btn-sm btn-primary pull-right" href="{{route('all-product')}}">All Product</a> </span></h3></div>
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
                        <form role="form" method = "POST" action = "{{ url ('/update-product/'.$edt ->id)}}" enctype="multipart/form-data">
                        	@csrf
                            <div class="row">
            <div class="col-md-6 ">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Code</label>
                            <input type="text" name = "product_code" class="form-control" id="exampleInputEmail1" value = "{{$edt->product_code}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" name ="product_name" class="form-control" id="exampleInputEmail1"  value = "{{$edt->product_name}}">
                        </div>
                        @php
                        $cat_id = DB::table('categories')->get();
                        @endphp

                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Category</label>
                            <select  name = "category_id" class="form-control" id="exampleInputEmail1"> 
                            @foreach( $cat_id as $row)
                            <option value="{{$row->cat_name}}" <?php if($edt->category_id == $row->id){
                            	echo "selected";} ?> >{{$row->cat_name}}</option>
                            @endforeach
                            </select>
                      </div>
                       @php
                        $supp_name = DB::table('suppliers')->get();
                        @endphp
                      <div class="form-group">
                                <label for="exampleInputEmail1">Supplier Name</label>
                                <select  name = "supplier_id" class="form-control" id="exampleInputEmail1" >
                                    @foreach( $supp_name as $row)
                                    <option value="{{$row->name}}"<?php if ($edt->supplier_id == $row->id){echo"selected";}?>>{{$row->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                         <div class="form-group">
                                <label for="exampleInputEmail1">Product Place</label>
                                <input type="text" name = "product_place" class="form-control" id="exampleInputEmail1" value="{{$edt->product_place}}">
                        </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Product Route</label>
                                <select  name = "product_route" class="form-control" id="exampleInputEmail1"> 
                               <option value="{{$edt->product_route}}">{{$edt->product_route}}</option>
                                <option value="Block A">Block A</option>
                                <option value="Block B">Block B</option>
                                <option value="Block C">Block C</option>
                                <option value="Block D">Block D</option>
                                </select>
                          </div>
                      </div>
                      <div class="col-md-6 ">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Buy Date</label>
                                <input type="date" name = "buy_date" class="form-control" id="exampleInputEmail1" value="{{$edt->buy_date}}">
                            </div>       
                            <div class="form-group">
                                <label for="exampleInputPassword1">Expire Date</label>
                                <input type="date" name= "expire_date" class="form-control" id="exampleInputPassword1" value="{{$edt->expire_date}}">
                            </div>
                          <div class="form-group">
                                <label for="exampleInputEmail1">Buying Price</label>
                                <input type="text" name = "buying_price" class="form-control" id="exampleInputEmail1"  value="{{$edt->buying_price}}">
                            </div>       
                            <div class="form-group">
                                <label for="exampleInputPassword1">Selling Price</label>
                                <input type="text" name= "selling_price" class="form-control" id="exampleInputPassword1"  value="{{$edt->selling_price}}">
                            </div>
                              <div class="form-group">
                              	<img id = "image" src="#"/>
                                <label for="exampleInputPassword1">Product Image</label>
                                <input type="file" name= "product_image" accept ="image/*" class ="upload" onchange="readURL(this)" id="exampleInputPassword1" >
                            </div>
                             <div class="form-group">
                                <img src="{{ URL :: to ($edt ->product_image)}}"  name ="old_image" style="height: 80px; width: 80px;">
                                <input type="hidden" name="old_image" value="{{$edt ->product_image}}">
                                
                            </div>
                        </div>
                    </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                        </form>
                    </div>
                </div> 
            </div>  
      </div>
   </div>
</div>
 @endsection