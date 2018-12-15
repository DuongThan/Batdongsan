<?php

namespace App\Http\Controllers;
use App\BaiDang;
use Illuminate\Http\Request;

class BaiDangController extends Controller
{
    public function getTrangChu()
    {
		$bai_dang_da_duyet = BaiDang::baiDangDaDuyet();
		return view('trang-chu', ['bai_dang_da_duyet' => $bai_dang_da_duyet]);
    }

    public function getNhaDatBan()
    {
        $bai_dang_da_duyet = BaiDang::baiDangNhaDatBan();
        return view('nha-dat-ban', ['bai_dang_da_duyet' => $bai_dang_da_duyet]);
    }

    public function getNhaDatChoThue()
    {
        $bai_dang_da_duyet = BaiDang::baiDangNhaDatChoThue();
        return view('nha-dat-cho-thue', ['bai_dang_da_duyet' => $bai_dang_da_duyet]);
    }

    public function getBaiDangChiTiet($id)
    {
		$bai_dang = BaiDang::baiDangChiTiet($id);
		return view('bai-dang-chi-tiet', ['bai_dang' => $bai_dang]);
    }

    public function getTimKiem(Request $request)
    {
        $tu_khoa = $request->tu_khoa;
        $bai_dang_da_duyet = BaiDang::timKiemBaiDang($tu_khoa);
        return view('tim-kiem', ['bai_dang_da_duyet' => $bai_dang_da_duyet]);
    }

    public function getDangTin()
    {
		return view('dang-tin');
    }

    public function postDangTin(Request $request)
    {
		$this->validate($request, 
            [
                'tieu_de' => 'required',
                'noi_dung' => 'required',
                'loai_tin' => 'required',
                'loai_bat_dong_san' => 'required',
                'tinh_thanh' => 'required',
                'gia' => 'required',
                'dien_tich' => 'required|numeric',
                'ten_lien_he' => 'required',
                'so_dien_thoai' => 'required',
                'anh_chinh' => 'required'
            ], 
            [
                'tieu_de.required' => 'Chưa nhập tiêu đề!',
                'noi_dung.required' => 'Chưa nhập nội dung!',
                'loai_tin.required' => 'Chưa chọn loại tin!',
                'loai_bat_dong_san.required' => 'Chưa chọn loại bất động sản!',
                'tinh_thanh.required' => 'Chưa nhập tỉnh thành!',
    			'gia.required' => 'Chưa nhập giá!',
    			'dien_tich.required' => 'Chưa nhập diện tích!',
    			'dien_tich.numeric' => 'Diện tích phải là số!',
    			'ten_lien_he.required' => 'Chưa nhập tên liên hệ!',
    			'so_dien_thoai.required' => 'Chưa nhập số điện thoại!',
    			'anh_chinh.required' => 'Chưa thêm ảnh chính!'
            ]
        );
	
		$id_thanh_vien = session('id_thanh_vien'); 

		// Nếu là admin thì trạng thái là 1 (đã duyệt) nếu không trạng thái là 2 (chưa duyệt)
		
    	if(session('kieu_thanh_vien') == 1) 
    		$trang_thai = 1;
    	else
    		$trang_thai = 2;

    	$tieu_de = $request->tieu_de;
    	$noi_dung = $request->noi_dung;
    	$loai_tin = $request->loai_tin;
       	$loai_bat_dong_san = $request->loai_bat_dong_san;
       	$tinh_thanh = $request->tinh_thanh;
       	$gia = $request->gia;
       	$dien_tich = $request->dien_tich;
       	$huong = $request->huong;
       	$ten_lien_he = $request->ten_lien_he;
       	$so_dien_thoai = $request->so_dien_thoai;
       	$dia_chi = $request->dia_chi;
       	//ảnh chính
       	$file_anh_chinh = $request->file('anh_chinh'); // lấy file ảnh từ form
        $file_name_anh_chinh = $file_anh_chinh->getClientOriginalName('anh_chinh'); // lấy tên ảnh giống tên file
        $file_anh_chinh->move('img/anh-bai-dang', $file_name_anh_chinh); // chuyển ảnh vào thư mục img/anh-bai-dang
        $anh_chinh = $file_name_anh_chinh; // gán tên ảnh cho biến để lưu vào csdl
        //ảnh phụ 1
        $anh_phu_1 = '';
        if ($request->hasFile('anh_phu_1')) {
	       	$file_anh_phu_1 = $request->file('anh_phu_1');
	        $file_name_anh_phu_1 = $file_anh_phu_1->getClientOriginalName('anh_phu_1');
	        $file_anh_phu_1->move('img/anh-bai-dang', $file_name_anh_phu_1);
	        $anh_phu_1 = $file_name_anh_phu_1;
    	}
        //ảnh phụ 2
        $anh_phu_2 = '';
	    if ($request->hasFile('anh_phu_2')) {
	       	$file_anh_phu_2 = $request->file('anh_phu_2');
	        $file_name_anh_phu_2 = $file_anh_phu_2->getClientOriginalName('anh_phu_2');
	        $file_anh_phu_2->move('img/anh-bai-dang', $file_name_anh_phu_2);
	        $anh_phu_2 = $file_name_anh_phu_2;
    	}
        //ảnh phụ 3
        $anh_phu_3 = '';
	    if ($request->hasFile('anh_phu_3')) {
	       	$file_anh_phu_3 = $request->file('anh_phu_3');
	        $file_name_anh_phu_3 = $file_anh_phu_3->getClientOriginalName('anh_phu_3');
	        $file_anh_phu_3->move('img/anh-bai-dang', $file_name_anh_phu_3);
	        $anh_phu_3 = $file_name_anh_phu_3;
	    }    
		BaiDang::dangTin($id_thanh_vien, $trang_thai, $tieu_de, $noi_dung, $loai_tin, $loai_bat_dong_san, $tinh_thanh, $gia, $dien_tich, $huong, $ten_lien_he, $so_dien_thoai, $dia_chi, $anh_chinh, $anh_phu_1, $anh_phu_2, $anh_phu_3);
        if(session('kieu_thanh_vien') == 1)
        	return redirect('dang-tin')->with('thongbao', 'Đăng tin thành công!');
        else
        	return redirect('dang-tin')->with('thongbao', 'Đăng tin thành công! Chúng tôi sẽ xem xét và duyệt bài đăng của bạn sớm nhất có thể! Cảm ơn bạn!');
    }

    public function getMuaBanDatTheoTinh($tinh)
    {
        $bai_dang_da_duyet = BaiDang::danhSachBaiDangMuaBanDatTheoTinh($tinh);
        return view('mua-ban-dat-theo-tinh', ['bai_dang_da_duyet' => $bai_dang_da_duyet, 'tinh' => $tinh]);
    }

    public function getChoThueDatTheoTinh($tinh)
    {
        $bai_dang_da_duyet = BaiDang::danhSachBaiDangChoThueDatTheoTinh($tinh);
        return view('cho-thue-dat-theo-tinh', ['bai_dang_da_duyet' => $bai_dang_da_duyet, 'tinh' => $tinh]);
    }

    public function getQuanLyBaiDang()
    {
		$bai_dang = BaiDang::danhSachBaiDang();
		return view('quan-ly-bai-dang', ['bai_dang' => $bai_dang]);
    }

    public function getQuanLyBaiDangChiTiet($id)
    {
        $bai_dang = BaiDang::baiDangChiTiet($id);
        return view('quan-ly-bai-dang-chi-tiet', ['bai_dang' => $bai_dang]);
    }

    public function getDuyetBaiDangChiTiet($id)
    {
        $bai_dang = BaiDang::duyetBaiDangChiTiet($id);
        return redirect('quan-ly-bai-dang-chi-tiet/'.$id)->with('thongbao', 'Duyệt bài đăng thành công!');
    }

    public function getSuaBaiDangChiTiet($id)
    {
        $bai_dang = BaiDang::suaBaiDangChiTiet($id);
        return view('sua-bai-dang-chi-tiet', ['bai_dang' => $bai_dang]);
    }

     public function postSuaBaiDangChiTiet(Request $request, $id)
    {
        $this->validate($request, 
            [
                'tieu_de' => 'required',
                'noi_dung' => 'required',
                'loai_tin' => 'required',
                'loai_bat_dong_san' => 'required',
                'tinh_thanh' => 'required',
                'gia' => 'required',
                'dien_tich' => 'required|numeric',
                'ten_lien_he' => 'required',
                'so_dien_thoai' => 'required'
            ], 
            [
                'tieu_de.required' => 'Chưa nhập tiêu đề!',
                'noi_dung.required' => 'Chưa nhập nội dung!',
                'loai_tin.required' => 'Chưa chọn loại tin!',
                'loai_bat_dong_san.required' => 'Chưa chọn loại bất động sản!',
                'tinh_thanh.required' => 'Chưa nhập tỉnh thành!',
                'gia.required' => 'Chưa nhập giá!',
                'dien_tich.required' => 'Chưa nhập diện tích!',
                'dien_tich.numeric' => 'Diện tích phải là số!',
                'ten_lien_he.required' => 'Chưa nhập tên liên hệ!',
                'so_dien_thoai.required' => 'Chưa nhập số điện thoại!'
            ]
        );
    
        $id_thanh_vien = session('id_thanh_vien'); 

        // Nếu là admin thì trạng thái là 1 (đã duyệt) nếu không trạng thái là 2 (chưa duyệt)

        $bai_dang = BaiDang::find($id)->first();

        $bai_dang->tieu_de = $request->tieu_de;
        $bai_dang->noi_dung = $request->noi_dung;
        $bai_dang->loai_tin = $request->loai_tin;
        $bai_dang->loai_bat_dong_san = $request->loai_bat_dong_san;
        $bai_dang->tinh_thanh = $request->tinh_thanh;
        $bai_dang->gia = $request->gia;
        $bai_dang->dien_tich = $request->dien_tich;
        $bai_dang->huong = $request->huong;
        $bai_dang->ten_lien_he = $request->ten_lien_he;
        $bai_dang->so_dien_thoai = $request->so_dien_thoai;
        $bai_dang->dia_chi = $request->dia_chi;
        
        $bai_dang->save();
        return redirect('sua-bai-dang-chi-tiet/'.$id)->with('thongbao', 'Sửa tin thành công!');
    }
    public function getXoaBaiDangChiTiet($id)
    {
        $bai_dang = BaiDang::xoaBaiDangChiTiet($id);
        return redirect('quan-ly-bai-dang')->with('thongbao', 'Xóa bài đăng thành công!');
    }
}
