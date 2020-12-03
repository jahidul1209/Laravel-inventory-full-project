<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SalaryController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllAdvancedSalary(){
      $adsalary = DB:: table('advanced_salaries')
                  ->join('employees','advanced_salaries.emp_id','employees.id')
                  ->select('advanced_salaries.*' , 'employees.name','employees.phone','employees.salary','employees.photo')
                  ->orderBy('id','DESC')
                  ->get();
    	return view ('salary/all-advanced-salary',compact('adsalary'));
    }

    public function AddAdvancedSalary(){
    	return view ('salary/add-advanced-salary');
    }

    public function StoreAdvancedSalary(request $request){

       $month = $request->month;
       $empid = $request->emp_id;

      $advance = DB::table('advanced_salaries')
                  ->where('month', $month)
                  ->where('emp_id' ,$empid)
                  ->first();

      if($advance===NULL){
              $data = array();
              $data['emp_id'] = $request->emp_id;
              $data['advanced_salary'] = $request->advanced_salary;
              $data['month'] = $request->month;
              $data['year'] = $request->year;

              $advance = DB::table('advanced_salaries')->insert($data);
                if($advance){
                    $notification=array(
                        'message' => ' Advance Paid Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    return redirect()->back()->with($notification);
                }
              }else{
                $notification=array(
                        'message' => 'Oopss !!  Already  Advanced Paid',
                        'alert-type' =>'error'
                    );
                    return redirect()->back()->with($notification);
              }

    }

    public function EditAdvancedSalary($id){
       $edt= DB::table('advanced_salaries')->where('id', $id)->first();
        return view ('salary/edit-advanced-salary',compact('edt'));

    }


        public function UpdateAdvancedSalary(Request $request, $id){


      $updatedata = array();
      $updatedata['advanced_salary'] = $request->advanced_salary;
      $updatedata['month'] = $request->month;

      $emdata = DB::table('advanced_salaries')->where('id', $id)->update($updatedata);
 
                if($emdata){
                    $notification=array(
                        'message' => 'Data Successfully Updated',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-advanced-salary')->with($notification);
                }else{
                    return redirect()->back()->with($notification);
                }
          }


      public function PaySalary(){
              $adsalary = DB:: table('advanced_salaries')
                  ->join('employees','advanced_salaries.emp_id','employees.id')
                  ->select('advanced_salaries.*' , 'employees.name','employees.phone','employees.salary','employees.photo')
                  ->orderBy('id','DESC')
                  ->get();
      return view ('salary/pay-salary',compact('adsalary'));
  
      }
            public function LastMonthSalary(){
        return view('salary/last-month-salary');
      }
}

