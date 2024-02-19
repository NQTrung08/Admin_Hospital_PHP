<?php
require_once("handlePatient.php");
require_once("Thuvien.php");

// Kiểm tra xem form đã được submit chưa
if (isset($_POST["b1"])) {
    // Lấy dữ liệu từ form
    $patient_name = $_POST["tHoten"];
    $patient_phone = $_POST["tDienthoai"];
    $patient_dob = $_POST["tdob"];
    $patient_address = $_POST["tAddress"];
    $patient_gender = isset($_POST["rGioitinh"]) ? $_POST["rGioitinh"] : "";
    // Xử lý upload ảnh
    // $patient_image = UploadFile("fHinhanh", "uploads/images");



    $patient_image = $_POST["fHinhanh"];

    // Kiểm tra dữ liệu hợp lệ từng trường
    if (empty($patient_name) || empty($patient_phone) || empty($patient_dob) || empty($patient_address) || empty($patient_gender)) {
        echo "<h3>Thông tin bệnh nhân không hợp lệ:</h3>";
        echo "<p>Vui lòng nhập đầy đủ thông tin bệnh nhân.</p>";
        echo "<a href='javascript:history.go(-1)'>Quay lại trang trước</a>";
        exit();
    }

    // Kiểm tra nếu bệnh nhân đã tồn tại bằng cách sử dụng tên và số điện thoại làm điều kiện
    $existing_patient = getPatientByNamePhone($patient_name, $patient_phone);

    if ($existing_patient) {
        // Hiển thị hộp thoại confirm
        echo "<script>";
        echo "var result = confirm('Bệnh nhân đã tồn tại. Bạn có muốn cập nhật thông tin bệnh nhân không?');";
        echo "if (result) {";
        // Gọi hàm UpdatePatient để cập nhật thông tin bệnh nhân
        echo "  var updateResult = '" . UpdatePatient($existing_patient['patient_id'], $patient_name, $patient_dob, $patient_gender, $patient_address, $patient_phone, $patient_image) . "';";
        // Kiểm tra kết quả cập nhật
        echo "  if (updateResult) {";
        echo "    alert('Cập nhật thông tin bệnh nhân thành công.');";
        echo "    window.location.href = 'patientsList.php';";
        echo "  } else {";
        echo "    alert('Cập nhật thông tin bệnh nhân thất bại.');";
        echo "  }";
        echo "} else {";
        echo "  window.location.href = 'patientsList.php';";
        echo "}";
        echo "</script>";
    } else {
        // Nếu bệnh nhân chưa tồn tại, thêm mới thông tin của bệnh nhân
        $insert_result = AddPatient($patient_name, $patient_dob, $patient_gender, $patient_address, $patient_phone, $patient_image);

        if ($insert_result) {
            // Nếu thêm mới thành công, chuyển hướng người dùng đến trang danh sách bệnh nhân
            header("Location: navbar.php");
            exit();
        } else {
            echo "<h3> LỖI THÊM MỚI DỮ LIỆU</h3>";
        }
    }
}
