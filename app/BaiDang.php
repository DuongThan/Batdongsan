<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaiDang extends Model
{
    protected $table = 'bai_dang';
    public $timestamps = false;

    public static function baiDangDaDuyet() {
        $bai_dang_da_duyet = DB::table('bai_dang')
        ->where('trang_thai', '=', 1)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $bai_dang_da_duyet;
    }

    public static function baiDangNhaDatBan() {
        $bai_dang_da_duyet = DB::table('bai_dang')
        ->where('loai_tin', '=', 'Cần bán')
        ->where('trang_thai', '=', 1)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $bai_dang_da_duyet;
    }

    public static function baiDangNhaDatChoThue() {
        $bai_dang_da_duyet = DB::table('bai_dang')
        ->where('loai_tin', '=', 'Cho thuê')
        ->where('trang_thai', '=', 1)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $bai_dang_da_duyet;
    }

    public static function dangTin($id_thanh_vien, $trang_thai, $tieu_de, $noi_dung, $loai_tin, $loai_bat_dong_san, $tinh_thanh, $gia, $dien_tich, $huong, $ten_lien_he, $so_dien_thoai, $dia_chi, $anh_chinh, $anh_phu_1, $anh_phu_2, $anh_phu_3) {
    	DB::table('bai_dang')
        ->insert([
    		['id_thanh_vien' => $id_thanh_vien, 'trang_thai'=>$trang_thai, 'tieu_de' => "$tieu_de", 'noi_dung' => "$noi_dung", 'loai_tin' => "$loai_tin", 'loai_bat_dong_san' => "$loai_bat_dong_san", 'tinh_thanh' => "$tinh_thanh", 'gia' => "$gia", 'dien_tich' => $dien_tich, 'huong' => "$huong", 'ten_lien_he' => "$ten_lien_he",  'so_dien_thoai' => "$so_dien_thoai", 'dia_chi' => "$dia_chi", 'anh_chinh' => "$anh_chinh", 'anh_phu_1' => "$anh_phu_1", 'anh_phu_2' => "$anh_phu_2", 'anh_phu_3' => "$anh_phu_3"]
		]);
    }

    public static function danhSachBaiDang() {
        $danh_sach_bai_dang = DB::table('bai_dang')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $danh_sach_bai_dang;
    }

     public static function danhSachBaiDangMuaBanDatTheoTinh($tinh) {
        $danh_sach_bai_dang = DB::table('bai_dang')
        ->where('loai_tin', '=', 'Cần bán')
        ->where('tinh_thanh', '=', "$tinh")
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $danh_sach_bai_dang;
    }

     public static function danhSachBaiDangChoThueDatTheoTinh($tinh) {
        $danh_sach_bai_dang = DB::table('bai_dang')
        ->where('loai_tin', '=', 'Cho Thuê')
        ->where('tinh_thanh', '=', "$tinh")
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $danh_sach_bai_dang;
    }

    public static function baiDangChiTiet($id) {
        $bai_dang = DB::table('bai_dang')
        ->where('id', '=', $id)
        ->first();
        return $bai_dang;
    }

    public static function timKiemBaiDang($tu_khoa) {
        $bai_dang = DB::table('bai_dang')
        ->where('tieu_de', 'like', "%$tu_khoa%")
        ->where('trang_thai', '=', 1)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $bai_dang;
    }

    public static function duyetBaiDangChiTiet($id) {
        $bai_dang = DB::table('bai_dang')
        ->where('id', '=', $id)
        ->update(['trang_thai' => 1]);
    }

    public static function suaBaiDangChiTiet($id) {
        $bai_dang = DB::table('bai_dang')
        ->where('id', '=', $id)
        ->first();
        return $bai_dang;
    }

    public static function xoaBaiDangChiTiet($id) {
        DB::table('bai_dang')
        ->where('id', '=', $id)
        ->delete();
    }
}
