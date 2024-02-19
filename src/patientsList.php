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
  <?php $activePage = 'patientsList'; ?>
  <?php include 'navbar.php'; ?>
  <!-- Nội dung của trang -->
  <h1 style="text-align: center; color: #090;">DANH SÁCH BỆNH NHÂN</h1>
  <button onclick="window.location.href='addPatient.php'" class="btn-custom btn-add-patient">Thêm Bệnh Nhân</button>
  <table width="1009" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th width="87" bgcolor="#FF9900">ID</th>
      <th width="212" bgcolor="#FF9900">HỌ TÊN</th>
      <th width="150" bgcolor="#FF9900">ĐIỆN THOẠI</th>
      <th width="150" bgcolor="#FF9900">NĂM SINH</th>
      <th width="165" bgcolor="#FF9900">GIỚI TÍNH</th>
      <th width="209" bgcolor="#FF9900">ĐỊA CHỈ</th>
      <th width="160" bgcolor="#FF9900">HÌNH ẢNH</th>
      <th width="240" bgcolor="#FF9900">XỬ LÝ</th>
    </tr>
    <?php
    require_once("handlePatient.php");
    $rows = getListPatients();
    if ($rows == NULL)
      die("<h3>Lỗi csdl</h3>");
    foreach ($rows as $row) //lặp từng dòng từ mảng rows lưu vào biến row
    {
      $hinhanh = ($row["patient_image"] != "") ? $row["patient_image"] : 'noimage.jpg';
    ?>
      <tr>
        <td><?= $row["patient_id"] ?></td>
        <td><?= $row["patient_name"] ?></td>
        <td><?= $row["patient_phone"] ?></td>
        <td><?= $row["patient_dob"] ?></td>
        <td><?= $row["patient_gender"] ?></td>
        <td><?= $row["patient_address"] ?></td>
        <td><img src="<?= $hinhanh ?>" width="80"></td>
        <td>
          <button class="btn-edit bg-warning" onclick="window.location.href='updatePatient.php?patient_id=<?= $row['patient_id'] ?>'">Sửa</button>
          -
          <button class="btn-delete" onclick="if(confirm('Chắc chắn xóa không?')) { window.location.href='deletePatient.php?patient_id=<?= $row['patient_id'] ?>' }">Xóa</button>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>
