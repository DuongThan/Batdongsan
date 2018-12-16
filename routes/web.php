<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'BaiDangController@getTrangChu')->name('trang-chu');

Route::get('nha-dat-ban', 'BaiDangController@getNhaDatBan')->name('nha-dat-ban');

Route::get('nha-dat-cho-thue', 'BaiDangController@getNhaDatChoThue')->name('nha-dat-cho-thue');

Route::get('bai-dang-chi-tiet/{id}', 'BaiDangController@getBaiDangChiTiet')->name('bai-dang-chi-tiet');

Route::get('tim-kiem', 'BaiDangController@getTimKiem')->name('tim-kiem');

Route::get('dang-ky', 'ThanhVienController@getDangKy')->name('dang-ky');

Route::post('dang-ky', 'ThanhVienController@postDangKy')->name('dang-ky');

Route::get('dang-nhap', 'ThanhVienController@getDangNhap')->name('dang-nhap');

Route::post('dang-nhap', 'ThanhVienController@postDangNhap')->name('dang-nhap');

Route::get('dang-xuat', 'ThanhVienController@getDangXuat')->name('dang-xuat');

Route::get('dang-tin', 'BaiDangController@getDangTin')->name('dang-tin');

Route::post('dang-tin', 'BaiDangController@postDangTin')->name('dang-tin');

Route::get('mua-ban-dat-theo-tinh/{tinh}', 'BaiDangController@getMuaBanDatTheoTinh')->name('mua-ban-dat-theo-tinh');

Route::get('cho-thue-dat-theo-tinh/{tinh}', 'BaiDangController@getChoThueDatTheoTinh')->name('cho-thue-dat-theo-tinh');

Route::get('quan-ly-bai-dang', 'BaiDangController@getQuanLyBaiDang')->name('quan-ly-bai-dang');

Route::get('quan-ly-bai-dang-chi-tiet/{id}', 'BaiDangController@getQuanLyBaiDangChiTiet')->name('quan-ly-bai-dang-chi-tiet');

Route::get('duyet-bai-dang-chi-tiet/{id}', 'BaiDangController@getDuyetBaiDangChiTiet')->name('duyet-bai-dang-chi-tiet');

Route::post('sua-bai-dang-chi-tiet/{id}', 'BaiDangController@postSuaBaiDangChiTiet')->name('sua-bai-dang-chi-tiet');

Route::get('sua-bai-dang-chi-tiet/{id}', 'BaiDangController@getSuaBaiDangChiTiet')->name('sua-bai-dang-chi-tiet');

Route::get('xoa-bai-dang-chi-tiet/{id}', 'BaiDangController@getXoaBaiDangChiTiet')->name('xoa-bai-dang-chi-tiet');

Route::get('quan-ly-thanh-vien', 'ThanhVienController@getQuanLyThanhVien')->name('quan-ly-thanh-vien');

Route::get('xoa-thanh-vien-chi-tiet/{id}', 'ThanhVienController@getXoaThanhVienChiTiet')->name('xoa-thanh-vien-chi-tiet');

Route::get('them-thanh-vien', 'ThanhVienController@getThemThanhVien')->name('them-thanh-vien');
Route::post('them-thanh-vien', 'ThanhVienController@postThemThanhVien')->name('them-thanh-vien');


// Liên hệ
Route::get('lien-he', 'LienheController@getLienhe')->name('lien-he');
Route::get('danh-sach-lien-he', 'LienheController@getDanhsachLienhe')->name('lien-he');
Route::post('them-lien-he', 'LienheController@postLienhe')->name('them-lien-he');
Route::get('xoa-lien-he/{id}', 'LienheController@deleteLienhe')->name('xoa-lien-he');
Route::get('chi-tiet-lien-he/{id}', 'LienheController@detailLienhe')->name('chi-tiet-lien-he');

// Slide
Route::get('slide', 'SlideController@getSlide')->name('slide');
Route::get('sua-slide/{id}', 'SlideController@editSlide')->name('sua-slide');
Route::post('cap-nhat-slide/{id}', 'SlideController@putSlide')->name('cap-nhat-slide');
Route::get('xoa-slide/{id}', 'SlideController@deleteSlide')->name('xoa-slide');

// Bỏ phiêu 
Route::post('bo-phieu', 'BophieuController@postBophieu')->name('bo-phieu');
Route::get('danh-sach-bo-phieu', 'BophieuController@getBophieu')->name('danh-sach-bo-phieu');
