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
                            <li><a href="#">Md.Pavel</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

<div class="row">
    <div class="col-sm-12">
       <div class="panel panel-info ">
            <div class="panel-heading">

                <div class="panel-title text-white">
                  Poin Of Sells
                 </div>
            </div>
            <!-- Button trigger modal -->


 <div class="panel-body">
         <div class = "row">

         	<div class = col-md-5>
      
						 <div class="pricing-plan " style="padding-top: 20px; padding-bottom: 0px">
                            <div class="price_card text-center " style="padding-bottom: 0px; border: 1px solid #317eeb;">
                                    <table class = "table">
                                    	<thead class="bg-primary">
                                    	<tr>
                                    		<th  class="text-white" >Name</th>
                                    		<th  class="text-white">Qty</th>
                                    		<th  class="text-white">Price</th>
                                    		<th  class="text-white">Total</th>
                                    		<th  class="text-white">Action</th>
                                    	</tr>
                                    	</thead>

                               @php
                               $cart_prod = Cart::content();
                               @endphp
                      
                                  <tbody style="padding: 20px">
                                  	@foreach($cart_prod as $prod)

                                	<tr style="color: black; font-size: 18px;border-bottom: 2px solid #317eeb">     
                                		<td>{{$prod->name}}</td>
                                		<td>
                                	<form role="form" method = "POST" action = "{{ url ('/cart-update/'.$prod->rowId)}}">
                        	             @csrf

                                			<input type="number" name="qty" value="{{$prod->qty}}" style="width: 45px">
                                			<button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px" ><i class=" md-done" style=" color :white ;font-size : 18px;" ></i></button>
										              </form>
                                		</td>
                                		<td>{{$prod->price}}</td>
                                		<td>{{$prod->price*$prod->qty}}</td>

                                		<td><a href="{{URL::to('cart-delete/'.$prod->rowId)}}"  class = "btn btn-sm btn-default"><i class="md-delete" style=" color :red ;font-size : 18px"></i></a></td>
									
                                	</tr>
                                	@endforeach
                                   </tbody>
                                </table>
                                
                                 <ul class="price-features" style="color: black; font-size: 25px;">
                                    <li>Quantity : {{Cart::count()}} </li>
                                    <li>Sub Total : {{Cart::subtotal()}}</li>
                                    <li>Vat : {{Cart::tax()}}</li>
                                </ul>
                                 <div class="pricing-footer bg-primary"  style="padding: 10px">
                                    <span  style=" font-size: 24px">Total Price : {{Cart::total()}} Tk</span>
                                </div>

                                </div>
                    </div> <!-- end Pricing_card -->
 				
            <div class = "panel has_sub"> 
                        <h3 class = "text-info ">Select Customer
                          <button class="btn btn-sm btn-primary pull-right " data-toggle="modal" data-target="#con-close-modal">Add New</button>
                          
                        </h3>

             @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                <form action="{{url('create-invoice')}}" method="POST"> 
                        <select class="form-control" name ="cus_id"> 
                          <option disabled="" selected="">Select Customer</option>
                          @foreach($customer as $cus) 
                          <option value="{{$cus -> id}}">{{$cus -> name}}</option>
                          @endforeach();
                          
                        </select>
          
    
                  @csrf
                  </div>
				<button type="submit" class="btn btn-primary pull-center">Create Invoice</button>
				
			</form>
</div>

         <div class = col-md-7>

                   		<table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            	
                                <th>Image</th>
                                <th>Product Code</th>
                                <th>Name</th>
                                <th>Category</th>
							</tr>
                        </thead>

                     
                    <tbody>
                    @foreach($products as $row)
                        <tr>
                        	<form action="{{route('add-cart')}}" method="POST">
                        		@csrf

                        	<input type="hidden" name="id" value="{{$row -> id}}">
                        	<input type="hidden" name="name" value="{{$row -> product_name}}">
                        	<input type="hidden" name="qty" value="1">
                        	<input type="hidden" name="price" value="{{$row -> selling_price}}">
							<input type="hidden" name="weight" value="550">
                        	<td>
                        		<button type ="submit" class="btn-default" ><i class = " md-add-box" style="font-size: 25px;"> </i>
                        		<img src = "{{URL :: to ($row->product_image)}}" style ="height:80px;width:80px"/></button>
						    </td>

                           <td > {{$row -> product_code}}</td>

                            <td>{{$row -> product_name}}</td>
                             <td>{{$row ->category_id}}</td>
                         </form>
                        </tr>
                       @endforeach()
                    </tbody>
                        </table>
                   	</div>
                   </div>

                </div> 
            </div> <!-- container -->
                               
            </div> <!-- content -->
        </div>
    </div>
       </div>
  </div>

    	<!-- Modal -->
  <form action="{{url('/insert-customer')}}" method="POST" enctype="multipart/form-data">
  	@csrf
	<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="panel-title">Add New Customer</h4> 
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
            <div class="modal-body"> 
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-1" class="control-label">Customer Name</label> 
                            <input type="text" name  = " name"  required class="form-control" id="field-1" placeholder="Name"> 
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Email No</label> 
                            <input type="text" name= "email" required class="form-control" id="field-2" placeholder="Eamil"> 
                        </div> 
                    </div> 
                </div> 
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-3" class="control-label">Phone No</label> 
                            <input type="text" name= "phone" class="form-control" required id="field-3" placeholder="Phone"> 
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-3" class="control-label">NID Number</label> 
                            <input type="text" name = " nid_no" class="form-control" id="field-3"  required placeholder="NID No"> 
                        </div> 
                    </div> 
                </div> 
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Account No </label> 
                            <input type="text" name= "account_no" class="form-control" id="field-4" required placeholder="Account No"> 
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Address</label> 
                            <input type="text" name = "address" class="form-control" id="field-4" required placeholder="Address"> 
                        </div> 
                    </div>
                </div> 
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Current City </label> 
                            <input type="text" required name= "city" class="form-control" id="field-4" placeholder="City"> 
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <img id = "image" src="#"/>
                                    <label for="exampleInputPassword1">Your Photo</label>
                                    <input type="file" name= "photo" accept ="image/*" class ="upload" required onchange="readURL(this)" id="exampleInputPassword1" >
                        </div> 
                    </div>
                </div> 
                </div> 
           
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                 <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
            </div> 
             </div> 
        </div> 
    </div>
  </form>
  <!-- Button trigger modal -->

<!-- Modal -->
@endsection

