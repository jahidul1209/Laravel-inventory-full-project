<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
   

   public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function AddEmployee(){
		return view('add-employee'); 
   }

//insert Employe data 
   public function StoreEmployee(Request $request)
	{
    $validatedData = $request->validate([
        'name' => 'required|max:55',
        'email' => 'required|unique:employees',
        'phone' => 'required|max:11',
        'nid_no' => 'required|unique:employees',
        'address' => 'required|max:55',
        'experience' => 'required',
         'photo' => 'required',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
    ]);

       	$employeedata = array();
   		$employeedata['name'] = $request->name;
   		$employeedata['email'] = $request->email;
   		$employeedata['phone'] = $request->phone;
   		$employeedata['nid_no'] = $request->nid_no;
   		$employeedata['address'] = $request->address;
   		$employeedata['experience'] = $request->experience;
   		$employeedata['salary'] = $request->salary;
   		$employeedata['vacation'] = $request->vacation;
   		$employeedata['city'] = $request->city;

   		 $image=$request->file('photo');

          if ($image){
            $image_name= $request->name;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$ext;
            $upload_path= 'public/employee-image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $employeedata['photo'] = $image_url;
                $emdata = DB::table('employees')->insert($employeedata);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Inserted Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-employee')->with($notification);
                }else{
                    return redirect()->back()->with($notification);
                }
            }
            
            }else{
                return redirect()->back();
         }
	}

// Show all Employee record
	public function AllEmployee(){

		$showeploye = DB:: table('employees')->get();
		return view ('all-employee', compact('showeploye'));
		
	}
	 public function DeleteEmployee($id){

        $dltimg =DB::table('employees')->where('id' ,$id)->first();
        $image_path = $dltimg->photo;
        unlink( $image_path);

        $detetenews = DB::table('employees')->where('id',$id)->delete();
        if($detetenews){
                    $notification=array(
                        'message' => 'Data Delated Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-employee')->with($notification);
   }
 }

  public function EditEmployee($id){
          $edt= DB::table('employees')->where('id', $id)->first();
        return view ('edit-employee',compact('edt'));
   }

    public function UpdateEmployee(Request $request, $id){

       $validatedData = $request->validate([
        'name' => 'required|max:55',
        'email' => 'required',
        'phone' => 'required|max:11',
        'nid_no' => 'required',
        'address' => 'required|max:55',
        'experience' => 'required',
         'photo' => 'required',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
    ]);

      $updatedata = array();
      $updatedata['name'] = $request->name;
      $updatedata['email'] = $request->email;
      $updatedata['phone'] = $request->phone;
      $updatedata['nid_no'] = $request->nid_no;
      $updatedata['address'] = $request->address;
      $updatedata['experience'] = $request->experience;
      $updatedata['salary'] = $request->salary;
      $updatedata['vacation'] = $request->vacation;
      $updatedata['city'] = $request->city;

       $image=$request->photo;

          if ($image){
            $dltimg =DB::table('employees')->where('id' ,$id)->first();
            $image_path = $dltimg->photo;
            unlink( $image_path);

            $image_name= $request->name.str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name =$image_name.'.'.$ext;
            $upload_path= 'public/employee-image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $updatedata['photo'] = $image_url;
                $emdata = DB::table('employees')->where('id', $id)->update($updatedata);
                if($emdata){
                    $notification=array(
                        'message' => 'Data Successfully Updated',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-employee')->with($notification);
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
        public function ViewEmployee($id){
          $view= DB::table('employees')->where('id', $id)->first();
        return view ('view-employee',compact('view'));
   }

}
