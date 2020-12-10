<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
class PosController extends Controller
{
   public function __construct(){

        $this->middleware('auth');
    }

    public function StorePos(){

    	$products = DB::table('products')
    				// ->join('categories', 'products.category_id' ,'categories.id')
    				// ->select('categories.cat_name','products.*')
					->get();
		$customer = DB::table('customers')->get();
		$categories = DB::table('categories')->get();

    	 return view ('pos' ,compact('products','customer','categories'));
    }

    public function AddCart(request $request){
    	$data = array();
    	$data['id'] = $request->id;
    	$data['name'] = $request->name;
    	$data['qty'] = $request->qty;
    	$data['price'] = $request->price;
    	$data['weight'] = $request->weight;
    	$added  = Cart::add($data);
    	if($added){
                $notification=array(
                    'message' => 'Add Successfully',
                    'alert-type' =>'success'
                );
                return redirect()->back()->with($notification);
            }else{
                return redirect()->back()->with($notification);
            }
    }

    public function CartUpdate(request $request , $rowId){


    	$qty = $request->qty;
    	 $update = Cart::update($rowId, $qty );

    	 if($update){
                $notification=array(
                    'message' => 'Updated Successfully',
                    'alert-type' =>'success'
                );
                return redirect()->back()->with($notification);
            }else{
                return redirect()->back()->with($notification);
            }
    }

    public function CartDelete($rowId){
    	$remove =  Cart::remove($rowId);
    	 return redirect()->back();
    	 
    }
        public function CreateInvoice(request $request){

    	$request->validate([
		    'cus_id' => 'required'
		],
		[
		 'cus_id.required' => 'Please Select A Customer !',
	    ]);

	    $custom_id = $request->cus_id;
	    $customer = DB:: table('customers')->where('id' , $custom_id )->first();
	    $content = Cart::content();
	    return view('invoice' , compact('customer','content'));
    	 
    }

    public function InvoiceDetails(request $request){
     
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_product'] = $request->total_product;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::content();
        $ordata = array();
        foreach ( $contents  as $content) {
            $ordata['order_id'] = $order_id;
            $ordata['product_id'] = $content->id;
            $ordata['quantity'] =$content->qty;
            $ordata['unitcost'] = $content->price;
            $ordata['total'] =  $content->total;

            $insert = DB::table ('orderdetails')->insert( $ordata);
        }
        if($insert){
                $notification=array(
                    'message' => 'Insert Successfully',
                    'alert-type' =>'success'
                );
                Cart::destroy();
                return redirect()->route('pending-order')->with($notification);
            }else{
                return redirect()->back()->with($notification);
            }
    }

    

}
