<?php
require_once("handlePatient.php");
require_once("Thuvien.php");
//lấy dữ liệu từ form
if(isset($_REQUEST["b1"])==FALSE)//nếu chưa submit form
 die("<h3> Chưa nhập form</h3>");
$patient_id = $_REQUEST["id"];
$patient_name = $_REQUEST["tHoten"];
$patient_phone = $_REQUEST["tDienthoai"];
$patient_dob = $_REQUEST["tdob"];
$patient_address = $_REQUEST["tAddress"];
$patient_gender="";
if(isset($_REQUEST["rGioitinh"])==TRUE)//nếu chọn radio
	$patient_gender = $_REQUEST["rGioitinh"];
//$hinhanh = $_REQUEST["tHinhanh"];
$patient_image = $_REQUEST["fHinhanh"];//lấy tên ảnh upload
//nếu không có ảnh Upload mới thì lấy tên ảnh cũ
if($patient_image=="")
	$patient_image = $_REQUEST["tAnhhienthai"];

//THỰC HIỆN CÂU LỆNH INSERT,UPDATE, DELETE
$ketqua = UpdatePatient($patient_id,$patient_name,$patient_dob,$patient_gender,$patient_address,$patient_phone, $patient_image);
if($ketqua==TRUE)
	echo "<H3> THÀNH CÔNG </H3>";
else
	echo "<h3> LỖI Sửa DỮ LIỆU</h3>";
?>
<a href="navbar.php"> DANH SÁCH NV </a>