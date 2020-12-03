@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('all-attendence')}}">All Attendence</a></li>
                            <li class="active">Add Attendence</li>
                        </ol>
                    </div>
                </div>
    <div class="text-center"><h3 class=" text-success">Today || Date : {{date('d M Y')}} ( {{date('D')}} )</h3></div>
              <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h3 class="panel-title text-white">Add Employee Attendence </h3></div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                  <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Image</th>
                                         <th>Attendence</th>
                                      
                                    </tr>
                                </thead>

		                     <tbody>
                        <form role="form" method = "POST" action = "{{ url ('insert-attendence')}}" enctype="multipart/form-data">
                        	@csrf
								 @foreach($atenc as $row)
		                                <tr>
		                                   <td>{{$row -> name}}</td>
		                                   <td>	<img src = "{{URL :: to ($row->photo)}}" style="height: 80px; width: 80px;"/></td>
		                                   <input type="hidden" name="user_id" value="{{$row -> id}}">
										   <td> 
										   	<input type="radio" for="Present" name="attendence" value="present" name = "present"> 
										   	<label for="Present">Present</label><br>
										   <input type="radio" name="attendence" value="absence" name="absence">
										   	<label for="Absence">Absence</label>
										   </td>
										   <input type="hidden" name="att_date" value="{{date('d/m/y')}}">
										   <input type="hidden" name="att_year" value="{{date('Y')}}">
		                                </tr>
		                               @endforeach()

		                 </tbody>
					</table>
         
		          <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
		                       </form>
                   </div>
                     </div>


                            </div>
                        </div> 
                    </div>  
              </div>
          </div>
     </div>

@endsection
