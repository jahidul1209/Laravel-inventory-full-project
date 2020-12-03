<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SupplierController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

        public function AddSupplier(){
		return view('supplier/add-supplier'); 
   }
 // Show all Customer record
	public function AllSupplier(){

		$showcus = DB:: table('suppliers')->get();
		return view ('supplier/all-supplier', compact('showcus'));
		
	}
	//insert Customer data 
   public function StoreSupplier(Request $request)
	{
    $validatedData = $request->validate([
        'name' => 'required|max:55',
        'email' => 'required|unique:suppliers',
        'phone' => 'required|max:11',
        'nid_no' => 'required|unique:suppliers',
        'type' => 'required',
        'address' => 'required|max:55',
        'account_no' => 'required',
        'Shop' => 'required',
         'photo' => 'required',
        'city' => 'required',
    ]);

       	$cusdata = array();
   		$cusdata['name'] = $request->name;
   		$cusdata['email'] = $request->email;
   		$cusdata['phone'] = $request->phone;
   		$cusdata['nid_no'] = $request->nid_no;
   		$cusdata['address'] = $request->address;
   		$cusdata['account_no'] = $request->account_no;
   		$cusdata['type'] = $request->type;
	    $cusdata['Shop'] = $request->Shop;
		$cusdata['city'] = $request->city;
   		 $image=$request->file('photo');

          if ($image){
            $image_name= $request->name;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$ext;
            $upload_path= 'public/supplier-image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $cusdata['photo'] = $image_url;
                $emdata = DB::table('suppliers')->insert($cusdata);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Inserted Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-supplier')->with($notification);
                }else{
                    return redirect()->back()->with($notification);
                }
            }
            
            }else{
                return redirect()->back();
         }
	}

	public function DeleteSupplier($id){

        $dltimg =DB::table('suppliers')->where('id' ,$id)->first();
        $image_path = $dltimg->photo;
        unlink( $image_path);

        $detetenews = DB::table('suppliers')->where('id',$id)->delete();
        if($detetenews){
                    $notification=array(
                        'message' => 'Data Delated Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-supplier')->with($notification);
   }
 }
	        public function ViewSupplier($id){
          $view= DB::table('suppliers')->where('id', $id)->first();
        return view ('supplier/view-supplier',compact('view'));
   }
    public function EditSupplier($id){
          $edt= DB::table('suppliers')->where('id', $id)->first();
        return view ('supplier/edit-supplier',compact('edt'));
   }

    public function UpdateSupplier(Request $request, $id){

       $validatedData = $request->validate([
        'name' => 'required|max:55',
        'email' => 'required',
        'phone' => 'required|max:11',
        'nid_no' => 'required',
        'type' => 'required',
        'address' => 'required|max:55',
        'account_no' => 'required',
        // 'photo' => 'required',
        'Shop' => 'required',
        'city' => 'required',
    ]);

      $updatedata = array();
      $updatedata['name'] = $request->name;
      $updatedata['email'] = $request->email;
      $updatedata['phone'] = $request->phone;
      $updatedata['nid_no'] = $request->nid_no;
      $updatedata['address'] = $request->address;
      $updatedata['account_no'] = $request->account_no;
      $updatedata['type'] = $request->type;
      $updatedata['Shop'] = $request->Shop;
      $updatedata['city'] = $request->city;

       $image=$request->photo;

          if ($image){
            $image_name= $request->name.str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$ext;
            $upload_path= 'public/supplier-image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
	           $updatedata['photo'] = $image_url;
	           $dltimg =DB::table('suppliers')->where('id' ,$id)->first();
	            $image_path = $dltimg->photo;
            	unlink( $image_path);
                $emdata = DB::table('suppliers')->where('id', $id)->update($updatedata);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Successfully Updated',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-supplier')->with($notification);
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
	           $updatedata['photo'] = $oldphoto; 
                $emdata = DB::table('suppliers')->where('id', $id)->update($updatedata);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Successfully Updated',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-supplier')->with($notification);
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


}

