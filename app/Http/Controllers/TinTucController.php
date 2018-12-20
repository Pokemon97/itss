<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Slide;
class TinTucController extends Controller
{
    //

    public function getDanhSach() {
       $tintuc = TinTuc::orderBy('id','ASC')->get();
       return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }

    public function getUploadPost() {
        if(Auth::user()->quyen == 1)
            return view('admin.tintuc.them');
        else if(Auth::user()->quyen == 2)
            return view('pages.vietbai');
    }

    public function postUploadPost(Request $request) {
        $this->validate($request,
            [
                'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
                'TomTat'=>'required',
                'NoiDung'=>'required',
            ],
            [
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề.',
                'TieuDe.min'=>'Tiêu đề phải có ít nhất 3 kí tự.',
                'TieuDe.unique'=>'Tiêu đề đã tồn tại.',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt.',
                'NoiDung.required'=>'Bạn chưa nhập nội dung.',
            ]);

        $tintuc = new TinTuc();
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTiTle($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        if($request->NoiBat)
            $tintuc->NoiBat = $request->NoiBat;
        else
            $tintuc->NoiBat = 0;
        $tintuc->idUser = Auth::user()->id;
        $tintuc->SoLuotXem = 0;

        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'bmp'){
               return redirect('admin/tintuc/them')->with('loi', 'Chỉ được chọn file jpg, png, jpeg, bmp'); 
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/tintuc', $Hinh);
            $tintuc->Hinh = $Hinh;
        }
        else{
            $tintuc->Hinh = "";
        }

        $tintuc->save();

        return redirect()->back()->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id) {
        $tintuc = TinTuc::findOrFail($id);
        if(Auth::user()->quyen == 1)
            return view('admin.tintuc.sua', ['tintuc'=>$tintuc]);
        else if(Auth::user()->quyen == 2)
            return view('pages.suabai', ['tintuc'=>$tintuc]);
    }

    public function postSua(Request $request, $id) {
        $tintuc = TinTuc::findOrFail($id);
        $this->validate($request,
            [
                'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe,'.$id,
                'TomTat'=>'required',
                'NoiDung'=>'required',
            ],
            [
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề.',
                'TieuDe.unique'=>'Tiêu đề đã tồn tại.',
                'TieuDe.min'=>'Tiêu đề phải có ít nhất 3 kí tự.',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt.',
                'NoiDung.required'=>'Bạn chưa nhập nội dung.',
            ]);
            

        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTiTle($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        if($request->NoiBat)
            $tintuc->NoiBat = $request->NoiBat;
        else
            $tintuc->NoiBat = 0;

        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'bmp'){
               return redirect('admin/tintuc/sua/'.$id)->with('loi', 'Chỉ được chọn file jpg, png, jpeg, bmp'); 
            }

            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/tintuc', $Hinh);
            
            if($tintuc->Hinh != "") 
                unlink("upload/tintuc/".$tintuc->Hinh);

            $tintuc->Hinh = $Hinh;
        }

        $tintuc->save();

        return redirect()->back()->with('thongbao','Sửa thành công.');
    }

    public function getXoa($id) {
        $tintuc = TinTuc::findOrFail($id);
        foreach ($tintuc->comment as $cm) {
            $cm->delete();
        }
        $tintuc->delete();
        
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xóa thành công.');
    }

    public function getLike($id){
        $tintuc = TinTuc::findOrFail($id);
        Auth::user()->addLike($tintuc);
        return redirect()->back();
    }

    public function getRemoveLike($id){
        $tintuc = TinTuc::findOrFail($id);
        Auth::user()->removeLike($tintuc);
        return redirect()->back();
    }
}
