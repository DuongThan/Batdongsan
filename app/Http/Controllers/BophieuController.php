<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bophieu;
use Session;
use App\ThanhvienBophieu;
use Carbon\Carbon;
use App\ThanhVien;

class BophieuController extends Controller
{
    public function postBophieu(Request $request){
        $idThanhvien =  Session::get('id_thanh_vien');
        if($idThanhvien == null || $idThanhvien == false)
            return redirect('/')->with("thongbao","Bạn phải đăng nhập để có thể bỏ phiếu");
        $kiemtradabophieu = ThanhvienBophieu::where('id_thanh_vien',$idThanhvien)->first();
        if($kiemtradabophieu != null)
            return redirect('/')->with("thongbao","Bạn đã bỏ phiếu");

        $idBophieu = $request->bophieu;
        $bophieu = Bophieu::find($idBophieu);
        $bophieu->so_luong +=1;
        $bophieu->save();
        $thanhvienbophieu = new ThanhvienBophieu();
        $thanhvienbophieu->id_thanh_vien = $idThanhvien;
        $thanhvienbophieu->id_phieu = $idBophieu;
        $thanhvienbophieu->date = Carbon::now()->format('Y-m-d H:i:s');
        $thanhvienbophieu->save();
        return redirect('/')->with("thongbao","Bỏ phiếu thành công");
   }
   public function getBophieu(){
        $bophieus = ThanhvienBophieu::join('thanh_vien', 'thanh_vien.id', '=', 'thanhvien_bophieu.id_thanh_vien')
                            ->join('bo_phieu', 'bo_phieu.id', '=', 'thanhvien_bophieu.id_phieu')
                            ->select('thanhvien_bophieu.*', 'thanh_vien.ho_ten', 'bo_phieu.hinh_thuc')->get();
       return view('danh-sach-bo-phieu',['bophieus'=>$bophieus]);
   }
}
