<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm Kết Quả Khám Bệnh</title>
<!-- Link đến thư viện Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<h2 style="text-align: center; color: #090;">Thêm Kết Quả Khám Bệnh</h2>
<!-- Nút quay lại trang trước -->
<a href="#" onclick="history.go(-1);" style="text-decoration: none; color: #000;">
    <i class="fas fa-arrow-left"></i> Quay lại
</a>
<br><br>
<form name="form1" method="post" action="../appointments/handleAddAppointment.php" enctype="multipart/form-data ">
  <table width="446" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
      <td width="155">Bệnh Nhân</td>
      <td width="271">
        <select name="patientId" id="patientId" >
        <option value="0">Chọn Bệnh Nhân</option>
        <?php
          require_once("../../database/fnCSDL.php");
          require_once("../Thuvien.php");
          echo "Before TaoSelect<br>";
          TaoSelect("patients","patient_id","patient_name",0);
          echo "After TaoSelect<br>";
        ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Ngày Khám</td>
      <td><input type="date" name="aDob" id="aDob"></td>
      <!-- <img src="../../uploads/images/obito.jpg" alt=""> -->
    </tr>
    <tr>
      <td>Bác sĩ</td>
      <td>
      <input type="text" name="doctorName" id="doctorName">
      </td>
    </tr>
    <tr>
      <td>Chuẩn đoán</td>
      <td>
      <textarea name="diagnosis" id="diagnosis"></textarea>
      </td>
    </tr>
    <tr>
      <td>Đơn thuốc</td>
      <td><textarea name="prescription" id="prescription"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="b1" id="b1" value="Đồng ý">
      &nbsp;&nbsp;
      <input type="reset" name="b2" id="b2" value="Nhập lại">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
