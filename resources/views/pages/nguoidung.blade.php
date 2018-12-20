@extends('layout.index')

@section('title', 'Người dùng')

@section('content')
<!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				  		@if(count($errors) > 0)
                            <div class="alert alert-danger ">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif

				    	<form action="nguoidung" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="{{Auth::user()->name}}">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" value="{{Auth::user()->email}}"
							  	readonly 
							  	>
							</div>
							<br>
                            <div>
                                <label>Level</label>
                                <input type="text" class="form-control" placeholder="Level" name="level" aria-describedby="basic-addon1" 
                                @if(Auth::user()->quyen == 1)
                                    value="Admin" 
                                @elseif(Auth::user()->quyen == 0)
                                    value="User"
                                @else
                                    value="Moderator"
                                @endif
                                readonly="">
                            </div>	
                            <br>
							<div>
								<input type="checkbox" class="" name="changePassword" id="changePassword"/>
				    			<label>Đổi mật khẩu</label>
                            </div>
                            <div>
                                <label>Nhập mật khẩu</label>
                                <input type="password" class="form-control password" name="old_password" aria-describedby="basic-addon1" disabled="" required="">
                            </div>
                            <br>
                            <div>
                                <label>Nhập mật khẩu mới</label>
							  	<input type="password" class="form-control password" name="new_password" aria-describedby="basic-addon1" disabled="" required="">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled="" required="">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>

				    	</form>
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection