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
                            <li><a href="{{route('all-product')}}">All Product</a></li>
                            <li class="active">Add Product</li>
                        </ol>
                    </div>
                </div>
       <div class="col-md-2"></div>
              <div class="col-md-8">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h3 class="panel-title text-white">Add Product  </h3></div>

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
                                <form role="form" method = "POST" action = "{{ route ('import')}}" enctype="multipart/form-data">
                                	@csrf


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Import File </label>
                                        <input type="file" name = "import_file"  id="exampleInputEmail1"required>
                                    </div>

                                    <button type="submit" class="btn btn-info waves-effect waves-light">Upload</button>

                                    <a class = " btn btn-danger pull-right" href="{{route('export')}}">Download File</a>
                                </form>
                            </div>
                        </div> 
                    </div>  
              </div>
          </div>
     </div>

@endsection