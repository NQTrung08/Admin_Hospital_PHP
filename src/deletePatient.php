<?php
require_once("handlePatient.php");
//lấy dữ liệu từ request
if(isset($_REQUEST["patient_id"])==false)
	die("<p>chưa có id nhân viên</p>");
$patient_id = $_REQUEST["patient_id"];//lấy id nhân viên
if($patient_id=="" || is_numeric($patient_id)==false)
	die("<p>id không được rỗng và phải là số</p>");
    
$ketqua = DeletePatient($patient_id);
if($ketqua==TRUE)
	echo "<H3> THÀNH CÔNG </H3>";
else
	echo "<h3> LỖI Xóa DỮ LIỆU</h3>";
?>
<a href="patientsList.php"> DANH SÁCH NV </a>