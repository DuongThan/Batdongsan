<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lienhe;
use Carbon\Carbon;

class LienheController extends Controller
{
    public function getLienhe()
    {
		return view('lien-he');
    }
    public function getDanhsachLienhe()
    {
        $lienhes = Lienhe::all();
		return view('danh-sach-lien-he',['lienhes'=>$lienhes]);
    }
    
    public function postLienhe(Request $request){
        $this->validate($request,
        [
            'ho_ten'=>'required',
            'email'=>'required',
            'so_dien_thoai'=>'required'
        ],
        [
            'ho_ten.required'=>'Họ tên không được để trống',
            'email.required'=>'Email không được để trống',
            'so_dien_thoai.required'=>'Số điện thoại không được để trống'
        ]);
        $lienhe = new Lienhe();
        $lienhe->ho_ten = $request->ho_ten;
        $lienhe->email = $request->email;
        $lienhe->so_dien_thoai = $request->so_dien_thoai;
        $lienhe->yeu_cau = $request->yeu_cau;
        $lienhe->ngay_lien_he = Carbon::now()->format('Y-m-d H:i:s');
        $lienhe->save();
        return redirect('/lien-he')->with('thongbao','Thành công. Chúng tôi sẽ liên hệ với bạn ngay khi nhận được yêu cầu.');
    }

    public function detailLienhe($id){
        $lienhe = Lienhe::find($id);
        return view('chi-tiet-lien-he',['lienhe'=>$lienhe]);
    }
    public function deleteLienhe($id){
        $lienhe = Lienhe::find($id);
        $lienhe->delete();
        return redirect('danh-sach-lien-he')->with('thongbao','Xóa thành công');
    }
}
