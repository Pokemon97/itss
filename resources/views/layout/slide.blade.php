<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-10">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i = 0; ?>
                        @foreach($slide as $sl)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" 
                            @if($i == 0)
                                class="active"
                            @endif
                            ></li>
                            <?php $i++; ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        <?php $i = 0; ?>
                        @foreach($slide as $sl)
                            <div 
                            @if($i == 0)
                                class="item active"
                            @else
                                class="item"
                            @endif
                            >
                                <img class="slide-image" src="upload/slide/{{$sl->Hinh}}" alt="{{$sl->NoiDung}}" style="height:350px">
                            </div>
                            <?php $i++; ?>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-2 right-sidebar hidden-sm hidden-xs" style="position:fixed; right:10px; ">
                <h3 align="center">Bạn Bè</h3>
                @if(Auth::check())
                    @foreach(Auth::user()->friends as $user)
                        @if($user->isOnline())
                            {{$user->name}} <i class="fa fa-circle pull-right" style="color: green"></i>
                        @else
                            {{$user->name}} <i class="fa fa-circle pull-right"></i>
                        @endif
                        <br><hr>
                    @endforeach
                @endif

            </div>
        </div>
<!-- end slide -->