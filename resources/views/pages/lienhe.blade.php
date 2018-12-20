@extends('layout.index')

@section('title', 'Liên hệ')
@section('content')
<div class="container">

        @include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
            {{--@include('layout.menu')--}}
           
            <div class="col-md-10">
                <div class="panel panel-default">            
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
                        
                        <div class="break"></div>
                        <h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Ngõ Trại Cá - Trương Định - Hai Bà Trưng - Hà Nội</p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>tuananh77717@gmail.com</p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>0961582848</p>



                        <br><br>
                        
                        

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection