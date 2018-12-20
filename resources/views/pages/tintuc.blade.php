@extends('layout.index')

@section('title', 'News')
@section('content')
<!-- Page Content -->
<div id="app">
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="user_page/{{$tintuc->user->id}}">{{$tintuc->user->name}}</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
                <br>
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{!!$tintuc->NoiDung!!}</p>

                <hr>
                @if(Auth::check())
                    @if($tintuc->idUser == Auth::user()->id)
                        <form action="moderator/edit_post/{{$tintuc->id}}" method="GET" role="form">
                        <button type="submit" class="btn btn-primary">Sửa Bài</button>
                        </form>
                    @endif
                @endif
                <hr>

                @if(Auth::check())
                    @if(!Auth::user()->hasLiked($tintuc))
                    <p style="color: #4b4f56; font-weight:bold; cursor: pointer;">
                        <i  class="fa fa-thumbs-up likeBtn"><a href="likePost/{{$tintuc->id}}">Like ({{$tintuc->likeByUser()->count()}} người)</a></i>
                        
                    </p>
                    
                    @else
                    <p style="color: #0000ff; font-weight:bold; cursor: pointer;" align="padding-left">
                        <i  class="fa fa-thumbs-up likeBtn"><a href="removeLikePost/{{$tintuc->id}}">Like ({{$tintuc->likeByUser()->count()}} người)</a></i>
                    </p>
                    
                    @endif
                    <p>
                        <small><?php if(($friend = Auth::user()->oneFriendLikePost($tintuc))) echo $friend->name." đã thích nội dung này" ; ?></small>
                    </p>
                    @endif
                    
                    <small><p align="right">Số lượt xem: {{$tintuc->SoLuotXem}}</p></small>

                <!-- Blog Comments -->
                 @if(Auth::check())
                    <!-- Comments Form -->
                    <div class="well">
                        @if(session('thongbao'))
                            <div class="alert alert-sucess">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form action="comment/{{$tintuc->id}}" method="POST" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <textarea class="form-control" name="NoiDung" rows="1" required=""></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                    <hr>
                @endif
                

                <!-- Posted Comments -->
    
                <!-- Comment -->
               
                @foreach($tintuc->comment as $cm)
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="user_page/{{$cm->user->id}}">{{$cm->user->name}}</a>
                                <small>{{$cm->created_at}}</small>
                                
                            </h4>
                            {{$cm->NoiDung}}
                        </div>
                    </div>
                @endforeach
                
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin tức nổi bật</b></div>
                    <div class="panel-body">
                        @foreach($tinnoibat as $tt)
                        
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 5px">{!!$tt->TomTat!!}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        
                        @endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
</div>
@endsection