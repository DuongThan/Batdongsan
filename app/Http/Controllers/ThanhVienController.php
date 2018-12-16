<?php

namespace App\Http\Controllers;
use App\ThanhVien;
use Illuminate\Http\Request;
use Session;
class ThanhVienController extends Controller
{
    public function getDangKy()
    {
		return view('dang-ky');
    }
		
    public function postDangKy(Request $request)
    {
    	$this->validate($request, 
            [
                'email' => 'required|email',
                'mat_khau' => 'required',
    			'nhap_lai_mat_khau' => 'required'
            ], 
            [
                'email.required' => 'Chưa nhập email!',
                'email.email' => 'Email không hợp lệ!',
                'mat_khau.required' => 'Chưa nhập mật khẩu!',
    			'nhap_lai_mat_khau.required' => 'Chưa nhập lại mật khẩu!'
            ]
        );
    				
    	$email = $request->email;
        $mat_khau = $request->mat_khau;
        $nhap_lai_mat_khau = $request->nhap_lai_mat_khau;
        $ho_ten = $request->ho_ten;
        $so_dien_thoai = $request->so_dien_thoai;
        $dia_chi = $request->dia_chi;

        $loi = '';
        if($mat_khau != $nhap_lai_mat_khau)
            $loi = "Xác nhận mật khẩu không đúng!";

        if($loi == '') {
            ThanhVien::dangKyThanhVien(2, $email, $mat_khau, $ho_ten, $so_dien_thoai, $dia_chi);
            return redirect('dang-ky')->with('thongbao', 'Đăng ký thành công!');
        }
        else {
    	   return view('dang-ky', ['loi' => $loi]);
        }
    }

    public function getDangNhap()
    {
        return view('dang-nhap');
    }

    public function postDangNhap(Request $request)
    {
        $this->validate($request, 
            [
                'email' => 'required|email',
                'mat_khau' => 'required'
            ], 
            [
                'email.required' => 'Chưa nhập email!',
                'email.email' => 'Email không hợp lệ!',
                'mat_khau.required' => 'Chưa nhập mật khẩu!'
            ]
        );

        $email = $request->email;
        $mat_khau = $request->mat_khau;

        $kt = ThanhVien::kiemTraDangNhap($email, $mat_khau);
        if($kt == 1) {
            $tt = ThanhVien::layThongTinDangNhap($email, $mat_khau);
            session(['id_thanh_vien' => $tt->id]);
            session(['email' => $tt->email]);
            session(['kieu_thanh_vien' => $tt->kieu_thanh_vien]);
            return redirect('/');
        }
        else {
            return redirect('dang-nhap')->with('thongbao', 'Thông tin đăng nhập không chính xác!');
        }    
    }

    public function getDangXuat(Request $request)
    {
        Session::forget('id_thanh_vien');
        Session::forget('email');
        Session::forget('kieu_thanh_vien');
        return redirect('dang-nhap');
    }

    public function getQuanLyThanhVien()
    {
        $thanh_vien = ThanhVien::danhSachThanhVien();
        return view('quan-ly-thanh-vien', ['thanh_vien' => $thanh_vien]);
    }

    public function getThemThanhVien()
    {
        return view('them-thanh-vien');
    }
    public function postThemThanhVien(Request $request)
    {
        $this->validate($request, 
            [
                'kieu_thanh_vien' => 'required',
                'email' => 'required|email',
                'mat_khau' => 'required',
                'nhap_lai_mat_khau' => 'required'
            ], 
            [
                'kieu_thanh_vien.required' => 'Chưa chọn kiểu thành viên!',
                'email.required' => 'Chưa nhập email!',
                'email.email' => 'Email không hợp lệ!',
                'mat_khau.required' => 'Chưa nhập mật khẩu!',
                'nhap_lai_mat_khau.required' => 'Chưa nhập lại mật khẩu!'
            ]
        );
                    
        $kieu_thanh_vien = $request->kieu_thanh_vien;
        $email = $request->email;
        $mat_khau = $request->mat_khau;
        $nhap_lai_mat_khau = $request->nhap_lai_mat_khau;
        $ho_ten = $request->ho_ten;
        $so_dien_thoai = $request->so_dien_thoai;
        $dia_chi = $request->dia_chi;

        $loi = '';
        if($mat_khau != $nhap_lai_mat_khau)
            $loi = "Xác nhận mật khẩu không đúng!";

        if($loi == '') {
            ThanhVien::dangKyThanhVien($kieu_thanh_vien, $email, $mat_khau, $ho_ten, $so_dien_thoai, $dia_chi);
            return redirect('them-thanh-vien')->with('thongbao', 'Thêm thành viên thành công!');
        }
        else {
           return view('them-thanh-vien', ['loi' => $loi]);
        }
    }

    public function getXoaThanhVienChiTiet($id)
    {
        ThanhVien::xoaThanhVienChiTiet($id);
        return redirect('quan-ly-thanh-vien')->with('thongbao', 'Xóa thành viên thành công!');
    }
}
