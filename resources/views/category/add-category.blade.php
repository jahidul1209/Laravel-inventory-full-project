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
                            <li><a href="{{route('all-category')}}">All Category</a></li>
                            <li class="active">Add Category</li>
                        </ol>
                    </div>
                </div>
       <div class="col-md-2"></div>
              <div class="col-md-8">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h3 class="panel-title text-white">Add Product Category </h3></div>

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
                                <form role="form" method = "POST" action = "{{ url ('insert-category')}}" enctype="multipart/form-data">
                                	@csrf


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" name = "cat_name" class="form-control" id="exampleInputEmail1" placeholder="Category Name"required>
                                    </div>

                                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>

                                    <a class = " btn btn-info pull-right" href="{{route('add-category')}}">Add Category</a>
                                </form>
                            </div>
                        </div> 
                    </div>  
              </div>
          </div>
     </div>

@endsection