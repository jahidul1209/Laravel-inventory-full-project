<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }


     public function AllProduct(){
     	$products = DB:: table('products')->get();
		return view ('product/all-product', compact('products'));
    }

    public function AddProduct(){

    	return view ('product/add-product');
    }

    public function StoreProduct(request $request){

		$validatedData = $request->validate([
        'product_code' => 'required|unique:products|max:10',
        'product_name' => 'required',

    ]);

		$data = array();
   		$data['product_code'] = $request->product_code;
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_place'] = $request->product_place;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $image=$request->file('product_image');

          if ($image){
            $image_name= $request->product_name;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$ext;
            $upload_path= 'public/product-image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['product_image'] = $image_url;
                $pru_data = DB::table('products')->insert($data);
                if($pru_data){
                    $notification=array(
                        'message' => 'Data Inserted Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-product')->with($notification);
                }else{
                    return redirect()->back()->with($notification);
                }
            }
            
            }else{
                return redirect()->back();
         }

    }
     public function DeleteProduct($id){

        $dltimg =DB::table('products')->where('id' ,$id)->first();
        $image_path = $dltimg->product_image;
        unlink( $image_path);

        $det_pro = DB::table('products')->where('id',$id)->delete();
        if($det_pro){
                    $notification=array(
                        'message' => 'Data Delated Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-product')->with($notification);
   }
 }

  public function EditProduct($id){
          $edt= DB::table('products')->where('id', $id)->first();
        return view ('product/edit-product',compact('edt'));
   }

    public function UpdateProduct(Request $request, $id){

		$validatedData = $request->validate([
        'product_code' => 'required|max:10',
        'product_name' => 'required',

    ]);

		$data = array();
   		$data['product_code'] = $request->product_code;
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_place'] = $request->product_place;
        $data['product_route'] = $request->product_route;
        $data['buy_date'] = $request->buy_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

         $image=$request->product_image;

          if ($image){
            $dltimg =DB::table('products')->where('id' ,$id)->first();
            $image_path = $dltimg->product_image;
            unlink( $image_path);

            $image_name= $request->product_name.str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$ext;
            $upload_path= 'public/product-image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $data['product_image'] = $image_url;
                $emdata = DB::table('products')->where('id', $id)->update($data);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Successfully Updated',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-product')->with($notification);
                }else{
                  $notification=array(
                        'message' => 'Data Updated Fail',
                        'alert-type' =>'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
            
            }else{

                $oldphoto = $request->old_image;
                if($oldphoto){
	           $data['product_image'] = $oldphoto; 
                $emdata = DB::table('products')->where('id', $id)->update($data);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Successfully Updated',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-product')->with($notification);
                }else{
                  $notification=array(
                        'message' => 'Data Updated Fail',
                        'alert-type' =>'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
         }
     }
        public function ViewProduct($id){


          $view= DB::table('products')
          			// ->join('categories','products.category_id' , 'categories.id')
          			// ->join('suppliers','products.supplier_id','suppliers.id')
          			// ->select('categories.cat_name','products.*','suppliers.name')
          			->where('id', $id)
          			->first();

          return view ('product/view-product',compact('view'));
   }

}
