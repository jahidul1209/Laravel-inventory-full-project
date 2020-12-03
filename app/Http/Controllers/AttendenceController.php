<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
    	return view ('attendence/all-attendence');
    }
            public function StoreAttendence(request $request){

            $data = array();
            $data['att_date'] = $request->att_date;
            $data['att_year'] = $request->att_year;

            echo "<pre>";
            print_r( $data);
    	// return view ('attendence/all-attendence');
    }

}
