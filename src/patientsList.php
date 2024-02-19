<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Bệnh Nhân</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</head>
<body>
<?php $activePage = 'patientsList'; ?>
<?php include 'navbar.php'; ?>
<!-- Nội dung của trang -->
<h1 style="text-align: center; color: #090;">DANH SÁCH BỆNH NHÂN</h1>
<p><a href="addPatient.php">Thêm Bệnh Nhân</a></p>
<table width="1009" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="87" bgcolor="#FF9900">ID</th>
    <th width="212" bgcolor="#FF9900">HỌ TÊN</th>
    <th width="150" bgcolor="#FF9900">ĐIỆN THOẠI</th>
    <th width="150" bgcolor="#FF9900">NĂM SINH</th>
    <th width="165" bgcolor="#FF9900">GIỚI TÍNH</th>
    <th width="209" bgcolor="#FF9900">ĐỊA CHỈ</th>
    <th width="209" bgcolor="#FF9900">HÌNH ẢNH</th>
    <th width="172" bgcolor="#FF9900">XỬ LÝ</th>
  </tr>
<?php
    require_once("handlePatient.php");
    $rows = getListPatients();
    if($rows==NULL)
        die("<h3>Lỗi csdl</h3>");
    foreach($rows as $row)//lặp từng dòng từ mảng rows lưu vào biến row
    {
      $hinhanh = ($row["patient_image"]!="")?$row["patient_image"]:'noimage.jpg' ;
?>
  <tr>
    <td><?=$row["patient_id"]?></td>
    <td><?=$row["patient_name"]?></td>
    <td><?=$row["patient_phone"]?></td>
    <td><?=$row["patient_dob"]?></td>
    <td><?=$row["patient_gender"]?></td>
    <td><?=$row["patient_address"]?></td>
    <td><img src="<?=$hinhanh?>" width="80"></td>
    <td>
    <a href="updatePatient.php?patient_id=<?=$row["patient_id"]?>">Sửa</a>
    -
    <a href="deletePatient.php?patient_id=<?=$row["patient_id"]?>" onclick="return confirm('Chắc chắn xóa không?');">Xóa</a>
    </td>
  </tr>
<?php
    }
?>
 </table>
</body>
</html>