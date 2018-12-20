<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach(){
        $slide = Slide::all();
        return view('admin.slide.danhsach', ['slide' => $slide]);
    }

    public function getThem(){
        return view('admin.slide.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'Ten'=>'required',
                'Hinh'=>'required',
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên',
                'Hinh.required'=>'Bạn chưa nhập hình ảnh',
            ]);
        $slide = new Slide();
        $slide->Ten = $request->Ten;
        if($request->NoiDung)
            $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
            $slide->link = $request->link;

        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
               return redirect('admin/slide/them')->with('loi', 'Chỉ được chọn file jpg, png, jpeg'); 
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/slide/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/slide', $Hinh);
            $slide->Hinh = $Hinh;
        }
        else{
            $slide->Hinh = "";
        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id) {
        $slide = Slide::findOrFail($id);
        return view('admin.slide.sua', ['slide'=>$slide]);
    }

    public function postSua(Request $request, $id){
        $slide = Slide::findOrFail($id);
        $this->validate($request,
            [
                'Ten'=>'required',
                'Hinh'=>'required',
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tên',
                'Hinh.required'=>'Bạn chưa nhập hình ảnh',
            ]);
        $slide->Ten = $request->Ten;
        if($request->NoiDung)
            $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
            $slide->link = $request->link;

        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
               return redirect('admin/slide/sua/'.$id)->with('loi', 'Chỉ được chọn file jpg, png, jpeg'); 
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/slide/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/slide', $Hinh);
            
            if($slide->Hinh != "") 
                unlink("upload/slide/".$slide->Hinh);

            $slide->Hinh = $Hinh;
        }
        $slide->save();

        return redirect('admin/slide/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
        $slide = Slide::findOrFail($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
