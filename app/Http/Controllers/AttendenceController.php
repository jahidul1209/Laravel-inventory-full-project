<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendence;
class AttendenceController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddAttendence(){
    	$atenc = DB::table ('employees')->get();
    	return view ('attendence/add-attendence',compact('atenc'));
    }
    
    public function AllAttendence(){

    	$all_att = DB:: table ('attendences') -> select('att_date' ) -> groupBy('att_date')-> get();
    	return view ('attendence/all-attendence', compact('all_att'));
    }

    public function StoreAttendence(request $request){

    	// return $request->all();
 		

 		 $date = $request->att_date;
 		 $att_date  = DB::table('attendences') ->where('att_date' , $date)->first();
 		 if($att_date){
 		 	$notification=array(
                        'message' => 'Attendence Allready Updated',
                        'alert-type' =>'error'
                    );
 		 	return redirect()->back()->with($notification);
 		 }else{
 		 	$uderid = $request->user_id;
 		    foreach ($uderid as $id) {

 			$data[]=[
 				'user_id' => $id,
 				'att_date' => $request->att_date,
 				'att_year' => $request->att_year,
 				'attendence' => $request->attendence[$id],

 			];
 		}
 		     $attan = DB::table('attendences')->insert($data);
 		        if($attan){
                    $notification=array(
                        'message' => 'Attendence Successfully Updated',
                        'alert-type' =>'success'
                    );
                    return redirect()->back()->with($notification);
                }else{

                    return redirect()->back()->with($notification);
                }

 		 }


    }
        public function EditAttendence( $att_date){
        $date = DB::table('attendences')->where('att_date' ,$att_date)	->first();
    	$edit_att = DB:: table ('attendences') 
    				->join('employees' , 'attendences.user_id', 'employees.id')
    				->select('employees.name','employees.photo','attendences.*')
    				-> where('att_date' , $att_date) 
    				->get();

    	return view ('attendence/edit-attendence' ,compact('edit_att','date'));
    }

        public function DeleteAttendence($att_date){


        $att_up = DB::table('attendences')->where('att_date' , $att_date)->delete();
             if($att_up){
                    $notification=array(
                        'message' => 'Attendence Delated Successfully',
                        'alert-type' =>'success'
                    );
                return redirect()->back()->with($notification);
   			}
    }

     public function UpdateAttendence(request $request){

 	    $uderid = $request->id;
		foreach ($uderid as $id) {
        	$data=[
 				'att_date' => $request->att_date,
 				'att_year' => $request->att_year,
 				'attendence' => $request->attendence[$id],

 			];

          $att_up = Attendence::where(['att_date' => $request->att_date, 'id'=> $id ]  )->first();
           $att_up->update($data);
            if($att_up){
                $notification=array(
                    'message' => ' Attendence Successfully Updated',
                    'alert-type' =>'success'
                );
                return redirect()->route('all-attendence')->with($notification);
            }else{
                return redirect()->back()->with($notification);
            }

    }

}

        public function ViewAttendence( $att_date){
        $date = DB::table('attendences')->where('att_date' ,$att_date)	->first();
    	$edit_att = DB:: table ('attendences') 
    				->join('employees' , 'attendences.user_id', 'employees.id')
    				->select('employees.name','employees.photo','attendences.*')
    				-> where('att_date' , $att_date) 
    				->get();

    	return view ('attendence/view-attendence' ,compact('edit_att','date'));
    }
}
