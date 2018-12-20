@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    @if(session('canhbao'))
                        <div class="alert alert-danger">
                            {{session('canhbao')}}
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th>Block</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr class="odd gradeX" align="center">
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>
                                    @if($u->quyen == 1)
                                        {{"Admin"}}
                                    @elseif($u->quyen == 2)
                                        {{"Moderator"}}
                                    @else
                                        {{"Thường"}}
                                    @endif
                                </td>
                                <td>
                                    @if($u->status == 1)
                                        {{"Bình thường"}}
                                    @else
                                        {{"Bị Block"}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$u->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$u->id}}">Edit</a></td>
                                @if($u->quyen == 1)
                                    <td class="center"></td>
                                @elseif($u->status == 0)
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/remove_block/{{$u->id}}">Xóa Block</a></td>
                                @else
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/block/{{$u->id}}">Block</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection