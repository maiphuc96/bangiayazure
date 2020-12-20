<?php
	//trang chu - gioi thieu
	function mnGioiThieu() {
		$qr ="SELECT * FROM gioithieu";
		return mysql_query($qr);
	}

	//hien thi tat ca cac loai san pham
	function mnSanPhamTrangChu() {
		$qr ="SELECT * FROM loaisanpham";
		return mysql_query($qr);
	}

	//hien thi danh sach san pham
	function dsSanPham() {
		$qr ="
			SELECT * 
			FROM sanpham 
			WHERE kinh_doanh =1
			ORDER BY ten_san_pham ASC
		";
		return mysql_query($qr);
	}

	//hien thi san pham moi theo thoi gian tao
	function SanPhamMoi($from,$sospmottrang) {
		$qr ="
			SELECT *
			FROM sanpham
			WHERE kinh_doanh =1
			ORDER BY ngay_dang DESC
			limit $from,$sospmottrang
		";
		return mysql_query($qr);
	}

	//hien thi san pham mua nhieu(desc)
	function dsSanPhamMuaNhieu(){
		$qr="
			SELECT * 
			FROM sanpham sp 
			WHERE kinh_doanh =1
			ORDER BY sp.so_luot_mua DESC 
		";
		return mysql_query($qr);
	}

	
	//hien thi cac san pham theo tung loai
	function dsSanPhamTheoLoai($idLoai){
		$qr="
			SELECT * 
			FROM sanpham sp 
			WHERE sp.id_loai_san_pham =$idLoai and kinh_doanh=1
			ORDER BY so_luot_mua DESC 
		
		";
		return mysql_query($qr);
	}

	//hien thi thong tin cua loai san pham theo idloai san pham
	function LoaiSanPham($idLoai) {
		$qr ="SELECT * FROM loaisanpham WHERE id_loai_san_pham=$idLoai ";
		return mysql_query($qr);
	}

	//tim kiem san pham theo gia : khuyen mai va khong khuyen mai
	function timkiemSanPhamTheoGia($gia1,$gia2){
		 $qr="
			(SELECT * FROM sanpham WHERE sanpham.san_pham_khuyen_mai=1  and kinh_doanh=1 AND (sanpham.gia_khuyen_mai >= $gia1 and sanpham.gia_khuyen_mai<=$gia2)) UNION
			(SELECT * FROM sanpham WHERE sanpham.san_pham_khuyen_mai=0 and kinh_doanh=1 AND (sanpham.gia_ban_dau >= $gia1 and sanpham.gia_ban_dau<=$gia2)) 
		";
		return mysql_query($qr);
	}
 
 	//tim kiem san pham theo ten (Full Text Search)
	function timkiemSanPhamTheoTen($ten){
		//full text search
		$qr="
			SELECT * FROM sanpham WHERE MATCH(ten_san_pham) against('$ten') and kinh_doanh=1
		";
		return mysql_query($qr);
	
	}


	//chi tiet san pham
	function chitietSanPham($idSanPham)
	{
		$qr ="
			SELECT * FROM sanpham sp
			WHERE sp.id_san_pham =$idSanPham and kinh_doanh=1
		";
		return mysql_query($qr);

	}

	//hien thi san pham theo loai
	function sanphamLoai($idsp){
		$qr="
			SELECT * FROM loaisanpham lsp, sanpham sp 
			WHERE lsp.id_loai_san_pham = sp.id_loai_san_pham and sp.id_san_pham=$idsp
		";
		return mysql_query($qr);
	}

	//hien thi tat ca size cua san pham len select option
	function sizeSanPham($idSanPham){
		$qr="SELECT size FROM sizesoluong s, sanpham sp
		WHERE s.id_san_pham=sp.id_san_pham and sp.id_san_pham=$idSanPham";
		return mysql_query($qr);
	}

	//tinh trang cua san pham : con hang or het hang
	function tinhTrangSanPham($idsp,$size) {
		$qr="SELECT * FROM sizesoluong s, sanpham sp WHERE s.id_san_pham=sp.id_san_pham AND sp.id_san_pham=$idsp and size=$size";
		return mysql_query($qr);
	}

	//hien thi tat ca cac binh luan theo san pham
	function idSPBinhLuan($idsp,$from,$sobinhluan) {
		$qr="SELECT * FROM binhluan bl,nguoidung nd 
		WHERE bl.id_nguoi_dung = nd.id_nguoi_dung and id_san_pham=$idsp
		limit $from,$sobinhluan";
		return mysql_query($qr);
	}

	//Them nguoi dung moi
	function addNguoiDung($taikhoan,$hoten,$sodt,$matkhau,$diachi){
		$qr="INSERT INTO `nguoidung` (`id_nguoi_dung`, `tai_khoan`, `ho_ten`, `anh_nguoi_dung`, `gioi_tinh`, `so_dien_thoai`, `mat_khau`, `level`, `dia_chi`,`code`) 
			VALUES (NULL, '$taikhoan', '$hoten', '', '1', '$sodt', '$matkhau', '0', '$diachi','');";
		return mysql_query($qr);
	}

	//Kiem tra tai khoan nguoi dung
	function checkTaiKhoan($email){
		$qr="
			SELECT * FROM `nguoidung` WHERE tai_khoan='$email'
		";
		return mysql_num_rows(mysql_query($qr));
	}

	//Kiem tra code
	function checkCode($email,$code){
		$qr="
			SELECT * FROM `nguoidung` WHERE tai_khoan='$email' and code='$code'
		";
		return mysql_num_rows(mysql_query($qr));
	}

	//Hien thi thong tin san pham
	function thongtinSanPham($idsp)
	{
		 $qr = "SELECT id_san_pham as id,anh_san_pham,ten_san_pham as ten,gia_ban_dau as gia
			FROM sanpham WHERE san_pham_khuyen_mai=0 AND id_san_pham=$idsp
			UNION
			SELECT id_san_pham as id,anh_san_pham,ten_san_pham as ten,gia_khuyen_mai as gia
			FROM sanpham WHERE san_pham_khuyen_mai=1 AND id_san_pham=$idsp";
		return mysql_query($qr);
	}

	//Hien thi tat ca size
	function hienthiSize(){
		$qr ="SELECT DISTINCT(size) from sanpham ORDER BY size ASC";
		return mysql_query($qr);
	}

	//Hien thi san pham theo size
	function hienthiSanPhamSize($size){
		$qr="select * from sanpham WHERE size=$size";
		return mysql_query($qr);
	}

	//Them don hang moi
	function themDonHang($code,$taikhoan,$tenKH,$sodtKH,$emailKH,$diachiKH,$tenNN,$emailNN,$sodtNN,$diachiNN){
		 $qr="INSERT INTO `donhang` (`id_don_hang`, `code`, `tai_khoan`, `ten_khach_hang`, `so_dien_thoai_khach_hang`, `email_khach_hang`, `ngay_dat_hang`, `dia_chi_khach_hang`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `so_dien_thoai_nguoi_nhan`, `dia_chi_nguoi_nhan`, `thue_GTGT`, `tong_tien`, `trang_thai`) VALUES (NULL, '$code', '$taikhoan', '$tenKH', '$sodtKH', '$emailKH',CURDATE(), '$diachiKH', '$tenNN', '$emailNN', '$sodtNN', '$diachiNN','0', '0', 'dang_cho')";
		return mysql_query($qr);
	}

	function layidDonHang($code){
		$qr="SELECT id_don_hang FROM donhang WHERE code='$code'";
		return mysql_query($qr);
	
	}

	function themChiTietDonHang($idDH,$idSP,$sl,$gia,$thanhtien){
		//Moi thoi diem gia hang hoa se khac nhau, nen de dam bao tinh toan ven cua don hang
		//ta se luu gia dat hang tai thoi diem hien tai cua san pham
		$qr="INSERT INTO chitietdonhang (id_don_hang, id_san_pham, ctdh_so_luong, gia_dat_hang, thanh_tien) VALUES ('$idDH', '$idSP', '$sl', '$gia', '$thanhtien')";
		return mysql_query($qr);
	}

	function capnhatTongTienDH($idDH,$thue,$tongtien){
		 $qr="UPDATE donhang SET tong_tien='$tongtien',thue_GTGT='$thue' WHERE id_don_hang='$idDH'";
		return mysql_query($qr);
	}
	

	//Tra cuu don hang theo ma tra cuu
	
	//thong tin nguoi mua nguoi nhan cua tung don hang
	function tracuuttDonHang($matracuu){
		$qr="SELECT * FROM donhang dh
		WHERE dh.code='$matracuu'";
		return mysql_query($qr);
	}

	//hien thi trang thai cua don hang
	function traucuutrangthaiDonHang($matracuu){
		$qr="SELECT trang_thai FROM donhang 
		WHERE code='$matracuu'";
		return mysql_query($qr);
	}

	//hien thi cac san pham trong don hang cua nguoi dung
	function tracuuchitietDonHangNguoiDung($matracuu){
		$qr="SELECT * FROM donhang dh,chitietdonhang ct,sanpham sp 
		WHERE dh.id_don_hang = ct.id_don_hang AND 
		dh.code='$matracuu' and 
		sp.id_san_pham = ct.id_san_pham";
		return mysql_query($qr);
	}

	//thong tin cua don hang
	function tracuudonHang($matracuu){
		 $qr="SELECT * FROM `donhang` WHERE `code`='$matracuu'";
		return mysql_query($qr);
	}

	//Cap nhat lai so luong san pham
	function tracuucapnhatSoLuongSPctdh($matracuu,$idSP,$sl){
	  $qr="UPDATE chitietdonhang SET ctdh_so_luong=$sl WHERE id_san_pham=$idSP and id_don_hang=(SELECT id_don_hang FROM donhang WHERE code='$matracuu')";
	 
		return mysql_query($qr);
	}


	//Cap nhat thanh tien cua san pham
	function tracuucapnhatthanhtienctdh($matracuu,$idSP){
		$qr="UPDATE chitietdonhang SET thanh_tien=ctdh_so_luong*gia_dat_hang WHERE id_don_hang=(SELECT id_don_hang FROM donhang WHERE code='$matracuu') AND id_san_pham=$idSP";
		return mysql_query($qr);
	}

	//Cap nhat lai so tien cua don hang
	function tracuucapnhatDonHang($idDonHang){
		$qr="UPDATE donhang SET thue_GTGT=(SELECT SUM(thanh_tien)*0.1 FROM chitietdonhang WHERE id_don_hang=$idDonHang),tong_tien=(SELECT SUM(thanh_tien)*1.1 FROM chitietdonhang WHERE id_don_hang=$idDonHang) WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//lay id don hang theo ma xac nhan
	function layIDDH($matracuu){
		$qr="SELECT id_don_hang FROM donhang WHERE code='$matracuu'";
		return mysql_query($qr);
	}

	//xoa san pham trong don hang, trang thai : dang_cho
	function tracuuxoaSPDH($idDonHang,$idSP){
		$qr="DELETE FROM chitietdonhang WHERE id_don_hang=$idDonHang and id_san_pham=$idSP";
		return mysql_query($qr);
	}

	//Dem so luong san pham cua don hang
	function tracuucountSP($idDonHang){
		$qr="SELECT COUNT(*) as so_san_pham FROM chitietdonhang WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//Cap nhat thong tin nguoi mua, nguoi nhan
	function tracuucapnhatThongTin($idDonHang,$hotenKH,$emailKH,$sdtKH,$dchiKH,$hotenNN,$emailNN,$sdtNN,$dchiNN){
		$qr="UPDATE donhang SET ten_khach_hang='$hotenKH',email_khach_hang='$emailKH',so_dien_thoai_khach_hang='$sdtKH',dia_chi_khach_hang='$dchiKH',ten_nguoi_nhan='$hotenNN',email_nguoi_nhan='$emailNN',so_dien_thoai_nguoi_nhan='$sdtNN',dia_chi_nguoi_nhan='$dchiNN' WHERE id_don_hang=$idDonHang";

		return mysql_query($qr);

	}

	//kiem tra ma xac nhan tra cuu don hang
	function kiemtraCode($code){
		$qr="SELECT COUNT(*) as num from donhang WHERE code='$code'";
		return mysql_query($qr);
	}

	//xoa chi tiet don hang
	function tracuuxoachitietDH($idDonHang){
		$qr="DELETE FROM chitietdonhang WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//xoa don hang
	function tracuuxoaDH($idDonHang){
		$qr="DELETE FROM donhang WHERE id_don_hang=$idDonHang";
		return mysql_query($qr);
	}

	//Them binh luan moi cho san pham
	function themBinhLuan($taikhoan,$noidung,$idsp){
		$qr="INSERT INTO binhluan (id_binh_luan,id_nguoi_dung,noi_dung_binh_luan,id_san_pham, thoi_gian_tao, ngay_tao) VALUES (NULL, (SELECT id_nguoi_dung FROM nguoidung WHERE nguoidung.tai_khoan='$taikhoan'), '$noidung', $idsp, CURTIME(),CURDATE());";
		
		return mysql_query($qr);
	}

	//check quyen han user
	function checkQuyenHan($taikhoan){
		$qr="SELECT level FROM nguoidung WHERE tai_khoan='$taikhoan'";
		
		return mysql_query($qr);
	}


	//load thong tin lien he
	function thongtinLienHe(){
		$qr="SELECT noi_dung_thong_tin_lien_he FROM thongtinlienhe WHERE id=1";	
		return mysql_query($qr);
	}


	//them lien he cua khach hang 
	function themLienHe($hoten,$email,$chude,$noidung){
		$qr="INSERT INTO `lienhe` (`id_lien_he`, `ho_ten`, `email`, `chu_de`, `noi_dung_lien_he`, `ngay_tao`) VALUES (NULL, '$hoten', '$email', '$chude', '$noidung',CURDATE());";	
		return mysql_query($qr);
	}
	
?>
