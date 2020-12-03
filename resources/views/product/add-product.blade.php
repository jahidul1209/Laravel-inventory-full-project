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
                                    <li><a href="{{route('home')}}">Dashboard</a></li>
                                    <li class="active">Add Product</li>
                                </ol>
                            </div>
                        </div>
                      <div class="col-md-12 ">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title text-white">Add Product <span><a class="btn btn-primary pull-right" href="{{route('all-product')}}">All Product</a> </span></h3></div>

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
                                    <form role="form" method = "POST" action = "{{ url ('insert-product')}}" enctype="multipart/form-data">
                                    	@csrf
                            <div class="row">
                            <div class="col-md-6 ">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Code</label>
                                            <input type="text" name = "product_code" class="form-control" id="exampleInputEmail1" placeholder="Product Code"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" name ="product_name" class="form-control" id="exampleInputEmail1" placeholder="Product Name"required>
                                        </div>
                                        @php
                                        $cat_id = DB::table('categories')->get();
                                        @endphp

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Category</label>
                                            <select  name = "category_id" class="form-control" id="exampleInputEmail1"> 
                                            <option disabled="" selected="">Select....</option>
                                            @foreach( $cat_id as $row)
                                            <option value="{{$row->cat_name}}">{{$row->cat_name}}</option>
                                            @endforeach
                                            </select>
                                      </div>
                                       @php
                                        $supp_name = DB::table('suppliers')->get();
                                        @endphp
                                      <div class="form-group">
                                                <label for="exampleInputEmail1">Supplier Name</label>
                                                <select  name = "supplier_id" class="form-control" id="exampleInputEmail1" placeholder="Supplier Name"required>
                                                    <option disabled="" selected="">Select....</option>
                                                    @foreach( $supp_name as $row)
                                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                        </div>

                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Product Place </label>
                                                <input type="text" name = "product_place" class="form-control" id="exampleInputEmail1" placeholder="Product Place"required>
                                        </div>
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Product Route</label>
                                                <select  name = "product_route" class="form-control" id="exampleInputEmail1"> 
                                                <option disabled="" selected="">Select....</option>
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
                                                <input type="date" name = "buy_date" class="form-control" id="exampleInputEmail1" required>
                                            </div>       
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Expire Date</label>
                                                <input type="date" name= "expire_date" class="form-control" id="exampleInputPassword1" required>
                                            </div>
                                          <div class="form-group">
                                                <label for="exampleInputEmail1">Buying Price</label>
                                                <input type="text" name = "buying_price" class="form-control" id="exampleInputEmail1" placeholder="Buying Price" required>
                                            </div>       
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Selling Price</label>
                                                <input type="text" name= "selling_price" class="form-control" id="exampleInputPassword1" placeholder="Selling Price"required>
                                            </div>
                                              <div class="form-group">
                                              	<img id = "image" src="#"/>
                                                <label for="exampleInputPassword1">Product Image</label>
                                                <input type="file" name= "product_image" accept ="image/*" class ="upload" required onchange="readURL(this)" id="exampleInputPassword1" >
                                            </div>
                                        </div>
                                    </div>

                                            <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                </div> 
                            </div>  
                      </div>
                   </div>
              </div>

@endsection