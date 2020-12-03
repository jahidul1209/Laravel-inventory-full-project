<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function AllCategory(){
     	$category = DB:: table('categories')->get();
		return view ('category/all-category', compact('category'));
    }

    public function AddCategory(){

    	return view ('category/add-category');
    }
    public function StoreCategory(request $request){

    	$data = array();
   		$data['cat_name'] = $request->cat_name;

          $category = DB::table('categories')->insert($data);
            if($category){
                $notification=array(
                    'message' => ' Category Add Successfully',
                    'alert-type' =>'success'
                );
                return redirect()->back()->with($notification);
            }else{
                return redirect()->back()->with($notification);
            }

    }
        public function EditCategory($id){
          $edt= DB::table('categories')->where('id', $id)->first();
           return view ('category/edit-category',compact('edt'));

    }
        public function UpdateCategory(request $request, $id){
        	$data = array();
   		    $data['cat_name'] = $request->cat_name;

          $cat_up = DB::table('categories')->where('id', $id)->update($data);
            if($cat_up){
                $notification=array(
                    'message' => ' Category Successfully Updated',
                    'alert-type' =>'success'
                );
                return redirect()->route('all-category')->with($notification);
            }else{
                return redirect()->back()->with($notification);
            }

    }
    	 public function DeleteCategory($id){

        // $dlt_cat =DB::table('categories')->where('id' ,$id)->first();

        $cat_up = DB::table('categories')->where('id',$id)->delete();
             if($cat_up){
                    $notification=array(
                        'message' => 'Data Delated Successfully',
                        'alert-type' =>'success'
                    );
                    return redirect()->route('all-category')->with($notification);
   }
 }


}
