<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm Bệnh Nhân</title>
<!-- Link đến thư viện Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<h2 style="text-align: center; color: #090;">Thêm Bệnh Nhân</h2>
<!-- Nút quay lại trang trước -->
<a href="#" onclick="history.go(-1);" style="text-decoration: none; color: #000;">
    <i class="fas fa-arrow-left"></i> Quay lại
</a>
<br><br>
<form name="form1" method="post" action="handleAddPatient.php" enctype="multipart/form-data ">
  <table width="446" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="140">Họ tên</td>
      <td width="360"><input type="text" name="tHoten" id="tHoten"></td>
    </tr>
    <tr>
      <td>Điện thoại</td>
      <td><input type="text" name="tDienthoai" id="tDienthoai"></td>
    </tr>
    <tr>
      <td>Giới tính</td>
      <td>
      <label for="r1">Male</label>
      <input type="radio" name="rGioitinh" id="r1" value="Male" checked >
      <label for="r2">Female</label>
      <input type="radio" name="rGioitinh" id="r2" value="Female">
      <label for="r3">Other</label>
      <input type="radio" name="rGioitinh" id="r3" value="Other">
      </td>
    </tr>
    <tr>
      <td>Năm sinh</td>
      <td>
      <input type="date" name="tdob" id="tdob">
      </td>
    </tr>
    <tr>
      <td>Địa chỉ</td>
      <td><input type="text" name="tAddress" id="tAddress"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <!-- <td><input type="text" name="fHinhanh" id="fHinhanh"></td> -->
      <td><input type="text" name="fHinhanh" id="fHinhanh"></td>
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
