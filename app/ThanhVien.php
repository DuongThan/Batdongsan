<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThanhVien extends Model
{
    protected $table = 'thanh_vien';
    public $timestamps = false;

    public static function dangKyThanhVien($kieu_thanh_vien, $email, $mat_khau, $ho_ten, $so_dien_thoai, $dia_chi) {
    	DB::table('thanh_vien')->insert([
    		['kieu_thanh_vien' => $kieu_thanh_vien, 'email' => "$email", 'mat_khau' => "$mat_khau", 'ho_ten' => "$ho_ten", 'so_dien_thoai' => "$so_dien_thoai", 'dia_chi' => "$dia_chi"]
		]);
    }

    public static function kiemTraDangNhap($email, $mat_khau) {
    	$kt = DB::table('thanh_vien')
            ->where('email', '=', "$email")
            ->where('mat_khau', '=', "$mat_khau")
            ->count();
        return $kt;
    }

    public static function layThongTinDangNhap($email, $mat_khau) {
    	$tt = DB::table('thanh_vien')
    		->select('id', 'email', 'kieu_thanh_vien')
            ->where('email', '=', "$email")
            ->where('mat_khau', '=', "$mat_khau")
            ->first();
        return $tt;
    }

    public static function danhSachThanhVien() {
        $danh_sach_thanh_vien = DB::table('thanh_vien')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return $danh_sach_thanh_vien;
    }

    public static function xoaThanhVienChiTiet($id) {
        DB::table('thanh_vien')
        ->where('id', '=', $id)
        ->delete();
    }
}
