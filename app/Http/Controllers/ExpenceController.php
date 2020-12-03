<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function AddExpence(){
    	return view('expence/add-expence');
    }

    public function StoreExpence(request $request){

    	$data = array();
   		$data['details'] = $request->details;
   	    $data['amount'] = $request->amount;
   	    $data['date'] = $request->date;
   	    $data['month'] = $request->month;



          $expence = DB::table('expences')->insert($data);
            if($expence){
                $notification=array(
                    'message' => ' Add Successfully',
                    'alert-type' =>'success'
                );
                return redirect()->back()->with($notification);
            }else{
                return redirect()->back()->with($notification);
            }

    }
        public function TodayExpence(){
        	date_default_timezone_set("Asia/Dhaka");
		    $date = date("d/m/y");
			$today = DB:: table('expences')->where('date' , $date )->get();
			return view('expence/today-expence',compact('today'));
    }
        public function EditExpence($id){
			$edt= DB::table('expences')->where('id', $id)->first();
	        return view ('expence/edit-today-expence',compact('edt'));
    }
        public function DeleteExpence($id){

        $expence = DB::table('expences')->where('id',$id)->delete();
        if($expence){
                    $notification=array(
                        'message' => 'Data Delated Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('today-expence')->with($notification);
    				}
    	}

        public function UpdateExpence(request $request , $id){

		$data = array();
   		$data['details'] = $request->details;
   	    $data['amount'] = $request->amount;
   	    $data['date'] = $request->date;
   	    $data['month'] = $request->month;

          $expence = DB::table('expences')->where('id' ,$id)->update($data);
            if($expence){
                $notification=array(
                    'message' => ' Updated Successfully',
                    'alert-type' =>'success'
                );
                return redirect()->route('today-expence')->with($notification);
            }else{
                return redirect()->back()->with($notification);
            }
    }
     public function ViewExpence($id){
          $view= DB::table('expences')->where('id', $id)->first();
        return view ('expence/view-today-expence',compact('view'));
   }
           public function MonthlyExpence(){
        	date_default_timezone_set("Asia/Dhaka");
		    $month = date("F");
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
         public function ViewMonthly($id){
          $view= DB::table('expences')->where('id', $id)->first();
        return view ('expence/view-monthly-expence',compact('view'));
   }
           
        public function JanuaryExpence(){
           	$month = "January";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
            public function FebruaryExpence(){
           	$month = "February";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
    		public function MarchExpence(){
           	$month = "March";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function AprilExpence(){
           	$month = "April";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function MayExpence(){
           	$month = "May";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function JuneExpence(){
           	$month = "June";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function JulyExpence(){
           	$month = "July";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function AugustExpence(){
           	$month = "August";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function SeptemberExpence(){
           	$month = "September";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function OctoberExpence(){
           	$month = "October";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function NovemberExpence(){
           	$month = "November";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
        		public function DecemberExpence(){
           	$month = "December";
			$monthly = DB:: table('expences')->where('month' , $month )->get();
			return view('expence/monthly-expence',compact('monthly'));
    }
}
