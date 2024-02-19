<?php
require_once("./handleAppointment.php");
//lấy dữ liệu từ request
if(isset($_REQUEST["appointment_id"])==false)
    die("<p>chưa có id kết quả khám</p>");
$appointment_id = $_REQUEST["appointment_id"];//lấy id nhân viên
if($appointment_id=="" || is_numeric($appointment_id)==false)
    die("<p>id không được rỗng và phải là số</p>");
    
$ketqua = DeleteAppointment($appointment_id);
if($ketqua==TRUE)
    echo "<H3> THÀNH CÔNG </H3>";
else
    echo "<h3> LỖI Xóa DỮ LIỆU</h3>";
?>

<a href="./appointmentsList.php"> DANH SÁCH Kết quả khám bệnh </a>

