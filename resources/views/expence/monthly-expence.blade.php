@extends('layouts.app')
@section('content')


<div class="content-page">
<!-- Start content -->
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Welcome ! {{date("Y")}}</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('today-expence')}}">Today Expence</a></li>
                    <li class="active">Monthly Expence</li>
                </ol>
            </div>
        </div>

        <a class="btn btn-primary" href="{{route('january-expence')}}">January</a>
        <a class ="btn btn-primary" href="{{route('february-expence')}}">February</a>
        <a class="btn btn-primary" href="{{route('march-expence')}}">March</a>
        <a class ="btn btn-primary" href="{{route('april-expence')}}">April</a>
        <a class="btn btn-primary" href="{{route('may-expence')}}">May</a>
        <a class ="btn btn-primary" href="{{route('june-expence')}}">June</a>
        <a class="btn btn-primary " href="{{route('july-expence')}}">July</a>
        <a class ="btn btn-primary" href="{{route('august-expence')}}">August</a>
        <a class="btn btn-primary" href="{{route('september-expence')}}">September</a>
        <a class ="btn btn-primary" href="{{route('october-expence')}}">October</a>
        <a class="btn btn-primary " href="{{route('november-expence')}}">November</a>
        <a class ="btn btn-primary" href="{{route('december-expence')}}">December</a>
 @foreach($monthly as $row)
        @php      
        $montha = $row->month;
        $expence = DB:: table('expences')->where('month' , $montha )->sum('amount'); 
        @endphp
 @endforeach()
        <div class="row">
            <div class="col-sm-12">
               <div class="panel panel-default">
                    <div class="panel-heading">
                    <h2 style="color:red ;text-align: center;">Monthly || Total Expence : {{$expence}} TK</h2><p style="text-align: center; font-size: 20px">Month : {{$montha}}</p>
                        <div class="panel-title">
                          Today Informaion
                          <a class = " btn btn-sm btn-success pull-right" href="{{route('today-expence')}}">Today</a>
                          <a class = " btn btn-sm btn-info pull-right" href="{{route('add-expence')}}">Add Expence</a>
                         </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                         <th>Date</th>
                                        <th>Action</th>  
                                    </tr>
                                </thead>

                             
                            <tbody>
                            @foreach($monthly as $row)
                                <tr>
                                   <td>{{$row -> details}}</td>
                                   <td>{{$row -> amount}}</td>
                                    <td>{{$row -> updated_at}}</td>
                                    <td>{{$row -> date}}</td>
                             <td>

                            <a href="{{ URL :: to ('view-monthly-expence/'.$row -> id)}}" class = "btn btn-sm btn-success">View</a>
                            </td>
                                </tr>
                               @endforeach()
                            </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



      </div>
   </div>
</div>
<script>
document.getElementById('my_selection').onchange = function() {
    window.location.href = this.children[this.selectedIndex].getAttribute('href');
}
</script>
@endsection