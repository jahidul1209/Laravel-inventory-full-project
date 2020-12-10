@extends('layouts.app')
@section('content')

<!-- @php 
date_default_timezone_set("Asia/Dhaka");
$today = date('d-m-y');
@endphp -->

<div class="content-page">
                <!-- Start content -->
<div class="content">
  <div class="container">

      <!-- Page-Title -->
      <div class="row">
          <div class="col-sm-12">
              <h4 class="pull-left page-title">Invoice</h4>
              <ol class="breadcrumb pull-right">
                  <li><a href="{{route('pending-order')}}">Pending Order</a></li>
                  <li><a href="{{route('success-order')}}">Success Order</a></li>
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
                                  <strong style="font-size: 20px; text-transform: uppercase;">{{ $orders->name}}</strong>

                                  <br>
                                  <strong>Phone : </strong> {{ $orders->phone}}
                                  <br>
                                  <strong>Email : </strong>{{ $orders->email}}
                                  <br>
                                  <strong>Address : </strong>{{ $orders->address}}
                                  </address>
                                  
                              </div>
                              <div class="pull-right m-t-10">
                                  <p><strong>Today: </strong>{{date('d M Y')}}</p>
                                  <p class="m-t-10"><strong>Order Status: </strong>

                                  @if ($orders->order_status == 'Success')
                                      <span class="label label-success">{{$orders->order_status}}</span>
                                  @else
                                  <span class="label label-pink">{{$orders->order_status}}</span>
                                  @endif


                                 </p>
                                  <p class="m-t-10"><strong>Order ID: </strong> {{$orders->id}}</p>
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
                                      
                                        @foreach($orderdetails as $cont)
                                          <tr>
                                            <td>{{$SL++}}</td>
                                            <td>{{$cont->product_name}}</td>
                                            <td>{{$cont->quantity}}</td>
                                            <td>{{$cont->unitcost}}</td>
                                            <td>{{$cont->unitcost*$cont->quantity}}</td>
                                         </tr>
                                        @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>




                      <div class="row" style="border-radius: 0px;">
                        <div class="col-md-7">
                          <h3>Payment By : <span class="text-success">{{$orders->payment_status}}</span></h3>
                          <h4>Pay : {{$orders->pay}}</h4> 
                          <h4>Due : {{$orders->due}}</h4>
                        </div>


                          <div class="col-md-5"  style="font-size: 20px">
                              <p class="text-right"><b>Sub-total:</b> {{$orders->sub_total}}</p>
                              <!-- <p class="text-right">Discout: 12.9%</p> -->
                              <p class="text-right">VAT: {{$orders->vat}}</p>
                              <hr>
                              <h3 class="text-right">Total Price : {{$orders->total}} Tk</h3>
                          </div>
                      </div>
                      <hr>

                      @if ($orders->order_status == 'Success')
                      @else
                      <div class="hidden-print">
                          <div class="pull-right">
                              <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                              <a href="{{URL::to ('pos-done/'.$orders->id)}}" class="btn btn-primary waves-effect waves-light">Submit</a>
                          </div>
                      </div>
                    @endif
                  </div>
              </div>

          </div>

      </div>

  </div>
</div>

</div> 

@endsection
