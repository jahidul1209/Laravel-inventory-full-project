
@extends('layouts.app')
@section('content')

<div class="content-page">
           
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{route('all-attendence')}}">All Attendence</a></li>
                                    <li class="active">view Attendence</li>
                                </ol>
                            </div>
                        </div>
                 @php 
                date_default_timezone_set("Asia/Dhaka");
                @endphp

                <h2 class = "text-center text-primary"> View Attendence || {{$date->att_date}}</h2>
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
                        <form role="form" method = "POST" action = "" enctype="multipart/form-data">

                        	@csrf
								 @foreach($edit_att as $row)
		                                <tr>
		                                   <td>{{$row -> name}}</td>
		                                   <td>	<img src = "{{URL :: to ($row->photo)}}" style="height: 80px; width: 80px;"/></td>
		                                   <input type="hidden" name="id[]" value="{{$row -> id}}">
										   <td> 
										   	<input type="radio" for="Present" name="attendence[{{$row -> id}}]" value="present" required="" name = "present" <?php if ( $row->attendence == 'present'){
										   		echo 'checked';}?>> 
										   	<label for="Present">Present</label><br>
										   <input type="radio" name="attendence[{{$row -> id}}]" value="absence" required="" name="absence" <?php if ( $row->attendence == 'absence'){
										   		echo 'checked';}?>>
										   	<label for="Absence">Absence</label>
										   </td>
										   <input type="hidden" name="att_date" value="{{date('d-m-y')}}">
										   <input type="hidden" name="att_year" value="{{date('Y')}}">
		                                </tr>
		                               @endforeach()

		                 </tbody>
					</table>
		            </form>
                   </div>
                     </div>


                    </div> 
                      </div>
                   </div>
              </div>

 @endsection