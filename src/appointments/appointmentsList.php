<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Bệnh Nhân</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* CSS cho nút button */
    .btn-custom {
      background-color: #007bff;
      color: #fff;
      padding: 8px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.3s;
    }

    .btn-custom:hover {
      color: #fff;
      transform: scale(1.2);
      text-decoration: none;

    }

    /* CSS cho nút "Sửa" và "Xóa" */
    .btn-edit,
    .btn-delete {
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.3s;
      margin-bottom: 10px;
      display: inline;
    }

    .btn-edit {
      color: #fff;
    }

    .btn-delete {
      background-color: #dc3545;
      color: #fff;
    }

    .btn-edit:hover,
    .btn-delete:hover {
      transform: scale(1.1);
    }

    /* CSS cho bảng */
    table {

      /* width: 100%; */
      border-collapse: collapse;
      padding: 10px;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    /* CSS cho form */
    form {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    /* CSS cho nút button thêm bệnh nhân */
    .btn-add-patient {
      position: absolute;
      top: 100px;
      right: 20px;
    }
  </style>
</head>
<body>
<?php $activePage = 'appointmentsList'; ?>
<?php include '../navbar.php'; ?>
<h1 style="text-align: center; color: #090;">DANH SÁCH KẾT QUẢ KHÁM BỆNH</h1>
<!-- <p><a href="./addAppointment.php">Thêm Kết Qủa Thăm Khám</a></p> -->
<button onclick="window.location.href='./addAppointment.php'" class="btn-custom btn-add-patient">Thêm Kết Quả</button>
  <table width="1009" border="1" align="center" cellpadding="0" cellspacing="0">
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
    <button class="btn-edit bg-warning" onclick="window.location.href='updateAppointment.php?appointment_id=<?=$row['appointment_id']?>'">Sửa</button>
    -
    <button  class="btn-delete" onclick="if(confirm('Chắc chắn xóa không?')) { window.location.href='deleteAppointment.php?appointment_id=<?=$row['appointment_id']?>'}">Xóa</button>
    </td>
  </tr>
<?php
    }
?>
 </table>
</body>
</html>