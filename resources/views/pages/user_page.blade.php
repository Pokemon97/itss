@extends('layout.index')

@section('title', 'Trang cá nhân')

@section('content')
<!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading"><center>Trang cá nhân</center></div>
                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
	                       <form>
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="{{$user->name}}" readonly="">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" value="{{$user->email}}"
							  	readonly 
							  	>
							</div>
							<br>
                            <div>
                                <label>Level</label>
                                <input type="text" class="form-control" placeholder="Level" name="level" aria-describedby="basic-addon1" 
                                @if($user->quyen == 1)
                                    value="Admin" 
                                @elseif($user->quyen == 0)
                                    value="User"
                                @else
                                    value="Moderator"
                                @endif
                                readonly="">
                            </div>
                            <br>
                            @if(Auth::check())
                            @if(Auth::user()->id == $user->id)
                            @elseif(Auth::user()->isFriend($user) == 0)
                            <center><p><a href="add_friend/{{$user->id}}" class="btn btn-success">Kết Bạn</a></p></center>
                            @elseif(Auth::user()->isFriend($user) == 1)
                            <center><p><a href="unfriend/{{$user->id}}" class="btn btn-success">Hủy Kết Bạn</a></p></center>
                            @endif
                            @endif
                           </form>
                           
                            
				  	</div>
                        <div class="break"></div>
                    <div>
                        
                    @foreach($user->tintuc as $tintuc)
                        <div class="col-md-12 border-right">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tintuc['Hinh']}}" alt="" style="width: 200px ;height: 100px ">
                                </a>
                            </div>
                            
                            <div class="col-md-7">
                                <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html"><h3>{{$tintuc['TieuDe']}}</h3></a>
                                <p>{{$tintuc['TomTat']}}</p>
                                <a class="btn btn-primary" href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">Xem Thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>  
                        </div>
                            <div class="break"></div>
                    @endforeach

                    </div>
				</div>
            </div>

                
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection