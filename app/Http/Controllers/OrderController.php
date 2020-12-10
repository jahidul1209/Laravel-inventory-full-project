<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
       public function __construct(){

        $this->middleware('auth');
    }
    public function PendingOrder()
    {
    	$pending = DB::table('orders')
    			->join('customers' , 'orders.customer_id','customers.id')
    			->select('customers.name' , 'orders.*')
    			->where('order_status','pending')->get();
    	return view('orders/pending-order' , compact('pending'));
    }
    public function ViewOrder($id){
    	$orders = DB::table('orders')
    			->join('customers','orders.customer_id','customers.id')
    			 ->select('customers.*','orders.*')
    			->where('orders.id',$id)->first();

    	$orderdetails = DB::table('orderdetails')
    			->join('products','orderdetails.product_id','products.id')
    			->select('products.product_name','products.product_code','orderdetails.*')
    			->where('order_id',$id)->get();

			return view('orders/view-order' , compact('orders','orderdetails'));

    }

    public function PosDone($id){
    	   $approve = DB::table('orders')->where('id',$id)->update(['order_status'=>'Success']);
    	     if($approve){
                $notification=array(
                    'message' => 'Approve Successfully',
                    'alert-type' =>'success'
                );
                return redirect()->back()->with($notification);
            }else{
            	$notification=array(
                    'message' => 'Approve Failed',
                    'alert-type' =>'error'
                );
                return redirect()->back()->with($notification);
            }
		}

    public function SuccessOrder(){

    	$success = DB::table('orders')
    			->join('customers' , 'orders.customer_id','customers.id')
    			->select('customers.name' , 'orders.*')
    			->where('order_status','Success')->get();
    	return view('orders/success-order' , compact('success'));
    }
}
