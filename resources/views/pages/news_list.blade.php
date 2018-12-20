@extends('layout.index')

@section('title', 'My News')

@section('content')
<!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
				  	<div class="panel-heading" style="background-color:#337AB7; color:white;">
                       <center><h4><b>Danh sách bài viết</b></h4></center> 
                    </div>
                    <br>
                    
                    @foreach($tintuc as $tt)
                    <div class="row-item row">
                        <div class="col-md-3">
                            <a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html">
                                <img class="img-responsive" src="upload/tintuc/{{$tt['Hinh']}}" alt="" style="width: 200px ;height: 100px ">
                            </a>
                        </div>
                        
                        <div class="col-md-9">
                            <a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html"><h3>{{$tt['TieuDe']}}</h3></a>
                            <p>{{$tt['TomTat']}}</p>
                            <a class="btn btn-primary" href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html">Xem Thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>  
                    </div>
                    @endforeach
                    
				</div>
            </div>  

            <div class="col-md-2">
            </div>
            
        </div>
        <center>{{$tintuc->links()}}</center>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection