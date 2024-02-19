<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Bệnh Nhân</title>
</head>
<body>
<?php $activePage = 'appointmentsList'; ?>
<?php include '../navbar.php'; ?>
<h1 style="text-align: center; color: #090;">DANH SÁCH Kết Quả Thăm Khám</h1>
<p><a href="./addAppointment.php">Thêm Kết Qủa Thăm Khám</a></p>
<table width="1009" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="87" bgcolor="#FF9900">ID</th>
    <th width="212" bgcolor="#FF9900">HỌ TÊN BỆNH NHÂN</th>
    <th width="150" bgcolor="#FF9900">NGÀY KHÁM</th>
    <th width="150" bgcolor="#FF9900">BÁC SĨ</th>
    <th width="165" bgcolor="#FF9900">CHUẨN ĐOÁN</th>
    <th width="209" bgcolor="#FF9900">ĐƠN THUỐC</th>
    <th width="172" bgcolor="#FF9900">XỬ LÝ</th>
  </tr>
<?php
    require_once("../appointments/handleAppointment.php");
    $rows = getListAppointments();
    if($rows==NULL)
        die("<h3>Lỗi csdl</h3>");
    foreach($rows as $row)//lặp từng dòng từ mảng rows lưu vào biến row
    {
?>
  <tr>
    <td><?=$row["appointment_id"]?></td>
    <td><?=$row["patient_name"]?></td>
    <td><?=$row["appointment_date"]?></td>
    <td><?=$row["doctor_name"]?></td>
    <td><?=$row["diagnosis"]?></td>
    <td><?=$row["prescription"]?></td>
    <td>
    <a href="updateAppointment.php?appointment_id=<?=$row["appointment_id"]?>">Sửa</a>
    -
    <a href="deleteAppointment.php?appointment_id=<?=$row["appointment_id"]?>" onclick="return confirm('Chắc chắn xóa không?');">Xóa</a>
    </td>
  </tr>
<?php
    }
?>
 </table>
</body>
</html>