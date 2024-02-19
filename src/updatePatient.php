<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sửa nhân viên</title>
    <!-- Link đến thư viện Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<script src="Script.js"></script>
</head>

<body>
    <h2 style="text-align: center; color: #090;">Sửa Bệnh Nhân</h2>
    <!-- Nút quay lại trang trước -->
    <a href="#" onclick="history.go(-1);" style="text-decoration: none; color: #000;">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
    <br><br>
    <?php
    if (isset($_REQUEST["patient_id"]) == false)
        die("<p>chưa có id nhân viên</p>");
    $id = $_REQUEST["patient_id"]; //lấy id nhân viên
    if ($id == "" || is_numeric($id) == false)
        die("<p>id không được rỗng và phải là số</p>");
    require_once("handlePatient.php");
    $row = getPatients($id); //lấy thông tin nhân viên theo id   
    ?>
    <form name="form1" method="post" action="handleUpdatePatient.php" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $row["patient_id"] ?>">
        <table width="446" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td width="155">Họ tên</td>
                <td width="271"><input type="text" name="tHoten" id="tHoten" value="<?= $row["patient_name"] ?>"></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="text" name="tDienthoai" id="tDienthoai" value="<?= $row["patient_phone"] ?>"></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <label for="r1">Male</label>
                    <input type="radio" name="rGioitinh" id="r1" value="Male" <?= $row["patient_gender"] == "Male" ? "checked" : "" ?>>
                    <label for="r2">Female</label>
                    <input type="radio" name="rGioitinh" id="r2" value="Female" <?= $row["patient_gender"] == "Female" ? "checked" : "" ?>>
                    <label for="r3">Other</label>
                    <input type="radio" name="rGioitinh" id="r3" value="Other" <?= $row["patient_gender"] == "Other" ? "checked" : "" ?>>
                </td>
            </tr>
            <tr>
                <td>Năm sinh</td>
                <td>
                    <input type="date" name="tdob" id="tdob" value="<?= $row["patient_dob"] ?>">
                </td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="tAddress" id="tAddress" value="<?= $row["patient_address"] ?>"></td>
            </tr>
            <tr>
                <td>Hình ảnh hiện tại</td>
                <td>
                    <?php $hinhanh = $row["patient_image"] == "" ? "no-image.png" : $row["patient_image"]; ?>
                    <img src="<?= $hinhanh ?>" width="80"><br>
                    <input type="text" name="tAnhhienthai" id="tAnhhienthai" value="<?= $row["patient_image"] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh mới</td>
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