@extends('layout.index')

@section('title', 'Trang chủ')
@section('content')
	<div class="container">

    	@include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
            {{--@include('layout.menu')--}}

            <div class="col-md-10">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;"><center>New Feed</center></h2>
	            	</div>

	            	<div class="panel-body">
	            		
		            		
	            		<!-- item -->
					    
					    	@if(Auth::check())
					    		<?php  
					    			$news = Auth::user()->tintuc->merge(Auth::user()->likes);
					    		?>
					    		@foreach(Auth::user()->friends as $friend)
					    			<?php  
					    				$news = $news->merge($friend->tintuc)->merge($friend->likes);
					    			?>
					    		@endforeach
					    			<?php  
					    				$news = $news->merge($tintuc);
					    			?>
					    		@foreach($news as $tin1)
					    			<div class="row-item row">
				    				<a href="user_page/{{$tin1->user->id}}"><h3>{{$tin1->user->name}}</h3></a>
				                	<div class="col-md-12 border-right">
				                		<div class="col-md-5">
					                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
					                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="" style="width: 200px ;height: 100px ">
					                        </a>
					                    </div>
					                    
						                <div class="col-md-7">

						                    <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html"><h3>{{$tin1['TieuDe']}}</h3></a>
						                    <p>{{$tin1['TomTat']}}</p>
						                    <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem Thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>	
										
				                	</div>
				                	<div class="break"></div>
				                	</div>
				    			@endforeach
					    	
				    		@else
			                	@foreach($tintuc as $tin1)
			                	<div class="row-item row">
			                	<a href="user_page/{{$tin1->user->id}}"><h3>{{$tin1->user->name}}</h3></a>
			                	<div class="col-md-12 border-right">
			                		<div class="col-md-5">
				                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
				                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="" style="width: 200px ;height: 100px ">
				                        </a>
				                    </div>
				                    
					                <div class="col-md-7">

					                    <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html"><h3>{{$tin1['TieuDe']}}</h3></a>
					                    <p>{{$tin1['TomTat']}}</p>
					                    <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem Thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>	
									
			                	</div>
			                	<div class="break"></div>
			                	</div>
			                    @endforeach

							@endif
							<div class="break"></div>
							
		                <!-- end item -->

					</div>
	            </div>
        	</div>


        </div>
        <!-- /.row -->
    </div>
@endsection

