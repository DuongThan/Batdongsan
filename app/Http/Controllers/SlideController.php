<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getSlide()
    {
        $slide = Slide::all();
		return view('slide',['slide'=>$slide]);
    }
    public function editSlide($id){
        $slide = Slide::find($id);
        return view('editSlide',['slide'=>$slide]);
    }
    public function putSlide($id,Request $request){
        if ($request->hasFile('hinhanh')) {
            $slide = Slide::find($id);
	       	$file_hinhanh = $request->file('hinhanh');
	        $file_name_hinhanh = $file_hinhanh->getClientOriginalName('hinhanh');
	        $file_hinhanh->move('img/slide', $file_name_hinhanh);
            $slide->hinh_anh = $file_name_hinhanh;
            $slide->save();
    	}
        return redirect('/slide')->with('thongbao','Cập nhật thành công');
    }
    public function deleteSlide($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('/slide')->with('thongbao','Xóa thành công');
    }
}
