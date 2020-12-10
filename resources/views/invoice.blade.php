@extends('layouts.app')
@section('content')
@php
date_default_timezone_set("Asia/Dhaka");
@endphp
<div class="content-page">
                <!-- Start content -->
<div class="content">
  <div class="container">

      <!-- Page-Title -->
      <div class="row">
          <div class="col-sm-12">
              <h4 class="pull-left page-title">Invoice</h4>
              <ol class="breadcrumb pull-right">
                  <li><a href="#">Md.Pavel</a></li>
                  <li><a href="#">Pages</a></li>
                  <li class="active">Invoice</li>
              </ol>
          </div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-10">
              <div class="panel panel-default">
                  <div class="panel-body">
                      <div class="clearfix">
                          <div class="pull-left">
                              <h3 class="text-right">All Product Details</h3>
                              
                          </div>
                          <div class="pull-right">
                        <h3><strong>{{date('D M Y')}}</strong></h3>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-12">
                              
                              <div class="pull-left m-t-10">
                              
                                <address>
                                  <strong style="font-size: 20px; text-transform: uppercase;">{{ $customer->name}}</strong>

                                  <br>
                                  <strong>Phone : </strong> {{ $customer->phone}}
                                  <br>
                                  <strong>Email : </strong>{{ $customer->email}}
                                  <br>
                                  <strong>Address : </strong>{{ $customer->address}}
                                  </address>
                                  
                              </div>
                              <div class="pull-right m-t-10">
                                  <p><strong>Order Date: </strong>{{date('d M Y')}}</p>
                                  <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                  <p class="m-t-10"><strong>Order ID: </strong> #12345</p>
                              </div>
                          </div>
                      </div>
                      <!-- <div class="m-h-10"></div> -->
                      <div class="row">
                          <div class="col-md-12">
                              <div class="table-responsive">
                                  <table class="table m-t-10">
                                      <thead>
                                        <tr>
                                          <th>SL</th>
                                          <th>Name</th>
                                          <th>Quantity</th>
                                          <th>Unit Cost</th>
                                          <th>Total</th>
                                      </tr></thead>
                                
                                      <tbody>
                                      @php
                                      $SL = 1;
                                      @endphp
                                      
                                        @foreach($content as $cont)
                                          <tr>
                                            <td>{{$SL++}}</td>
                                            <td>{{$cont->name}}</td>
                                            <td>{{$cont->qty}}</td>
                                            <td>{{$cont->price}}</td>
                                            <td>{{$cont->price*$cont->qty}}</td>
                                         </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>




                      <div class="row" style="border-radius: 0px;">
                          <div class="col-md-5 col-md-offset-7"  style="font-size: 20px">
                              <p class="text-right"><b>Sub-total:</b> {{Cart::subtotal()}}</p>
                              <!-- <p class="text-right">Discout: 12.9%</p> -->
                              <p class="text-right">VAT: {{Cart::tax()}}</p>
                              <hr>
                              <h3 class="text-right">Total Price : {{Cart::total()}} Tk</h3>
                          </div>
                      </div>
                      <hr>
                      <div class="hidden-print">
                          <div class="pull-right">
                              <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                              <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                          </div>
                      </div>
                  </div>
              </div>

          </div>

      </div>

  </div>
</div>

</div> 
    <!-- Modal -->
  <form action="{{route('invoice-details')}}" method="post">
    @csrf
  <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h3 class="panel-title text-success">Invoice Of {{$customer->name}}<span class="pull-right">{{Cart::total()}} Tk</span></h3> 
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
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-1" class="control-label">Payment Method</label> 
                         <select class="form-control" name ="payment_status"> 
                          <option value="HandCash">HandCash</option>
                          <option value="Bkash">Bkash</option>
                          <option value="Due">Due</option>
                        </select>
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Pay</label> 
                            <input type="text" name= "pay" class="form-control" id="field-2" placeholder="Pay"> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Due</label> 
                            <input type="text" name= "due" class="form-control" id="field-2" placeholder="Due"> 
                        </div> 
                    </div>
                </div> 
            </div> 
           
<input type="hidden" name="customer_id" value="{{ $customer->id}}">
<input type="hidden" name="order_date" value="{{ date('d-m-y')}}">
<input type="hidden" name="order_status" value="Pending">
<input type="hidden" name="total_product" value="{{Cart::count()}}">
<input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
<input type="hidden" name="vat" value="{{Cart::tax()}}">
<input type="hidden" name="customer_id" value="{{ $customer->id}}">
<input type="hidden" name="total" value="{{Cart::total()}}">


            <div class="modal-footer"> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                 <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
            </div> 
             </div> 
        </div> 
    </div>
  </form>
  <!-- Button trigger modal -->
@endsection
