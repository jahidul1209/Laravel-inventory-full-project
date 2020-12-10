<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

        public function AddCustomer(){
		return view('add-customer'); 
   }
 // Show all Customer record
	public function AllCustomer(){

		$showcus = DB:: table('customers')->get();
		return view ('all-customer', compact('showcus'));
		
	}
	//insert Customer data 
   public function StoreCustomer(Request $request)
	{
    $validatedData = $request->validate([
        'name' => 'required|max:55',
        'email' => 'required|unique:customers',
        'phone' => 'required|max:11',
        'nid_no' => 'required|unique:customers',
        'address' => 'required|max:55',
        'account_no' => 'required',
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
   		$cusdata['city'] = $request->city;

   		 $image=$request->file('photo');

          if ($image){
            $image_name= $request->name;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$ext;
            $upload_path= 'public/customer-image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $cusdata['photo'] = $image_url;
                $emdata = DB::table('customers')->insert($cusdata);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Inserted Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    return redirect()->back()->with($notification);
                }
            }
            
            }else{
                return redirect()->back();
         }
	}

	public function DeleteCustomer($id){

        $dltimg =DB::table('customers')->where('id' ,$id)->first();
        $image_path = $dltimg->photo;
        unlink( $image_path);

        $detetenews = DB::table('customers')->where('id',$id)->delete();
        if($detetenews){
                    $notification=array(
                        'message' => 'Data Delated Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-customer')->with($notification);
   }
 }
	        public function ViewCustomer($id){
          $view= DB::table('customers')->where('id', $id)->first();
        return view ('view-customer',compact('view'));
   }
    public function EditCustomer($id){
          $edt= DB::table('customers')->where('id', $id)->first();
        return view ('edit-customer',compact('edt'));
   }

    public function UpdateCustomer(Request $request, $id){

       $validatedData = $request->validate([
        'name' => 'required|max:55',
        'email' => 'required',
        'phone' => 'required|max:11',
        'nid_no' => 'required',
        'address' => 'required|max:55',
         'photo' => 'required',
        'account_no' => 'required',
        'city' => 'required',
    ]);

      $updatedata = array();
      $updatedata['name'] = $request->name;
      $updatedata['email'] = $request->email;
      $updatedata['phone'] = $request->phone;
      $updatedata['nid_no'] = $request->nid_no;
      $updatedata['address'] = $request->address;
      $updatedata['account_no'] = $request->account_no;
      $updatedata['city'] = $request->city;

       $image=$request->photo;

          if ($image){
            $dltimg =DB::table('customers')->where('id' ,$id)->first();
            $image_path = $dltimg->photo;
            unlink( $image_path);

            $image_name= $request->name.str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$ext;
            $upload_path= 'public/customer-image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $updatedata['photo'] = $image_url;
                $emdata = DB::table('customers')->where('id', $id)->update($updatedata);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Successfully Updated',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-customer')->with($notification);
                }else{
                  $notification=array(
                        'message' => 'Data Updated Fail',
                        'alert-type' =>'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
            
            }else{
                return redirect()->back();
         }
   }


}
