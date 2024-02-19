<?php
require_once("./handleAppointment.php");
// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường dữ liệu có được điền đầy đủ không
    if (isset($_POST["patientId"]) && isset($_POST["aDob"]) && isset($_POST["doctorName"]) && isset($_POST["diagnosis"]) && isset($_POST["prescription"])) {
        // Lấy dữ liệu được gửi từ form
        $patientId = $_POST["patientId"];
        $aDob = $_POST["aDob"];
        $doctorName = $_POST["doctorName"];
        $diagnosis = $_POST["diagnosis"];
        $prescription = $_POST["prescription"];

        // Kiểm tra xem ngày khám có hợp lệ không (không để trống)
        if (empty($aDob)) {
            echo "Ngày khám không được để trống";
            exit();
        }

        // Thực hiện kiểm tra xem cuộc hẹn đã tồn tại hay chưa
        require_once("../../database/fnCSDL.php");
        require_once("../Thuvien.php");

        // Truy vấn CSDL để kiểm tra cuộc hẹn đã tồn tại hay chưa
        $existingAppointment = getExistingAppointment($patientId, $aDob);

        // Nếu cuộc hẹn đã tồn tại, thực hiện cập nhật thông tin cuộc hẹn
        if ($existingAppointment) {
            // Cập nhật cuộc hẹn
            $result = UpdateAppointment($existingAppointment['appointment_id'], $patientId, $aDob, $doctorName, $diagnosis, $prescription);
            if ($result) {
                echo " alert('Cập nhật thông tin kết quả khám thành công.');";
                header("Location: appointmentsList.php");
            } else {
                echo "Đã xảy ra lỗi khi cập nhật cuộc hẹn";
            }
        } else {
            // Thêm cuộc hẹn mới nếu chưa tồn tại
            $result = addAppointment($patientId, $aDob, $doctorName, $diagnosis, $prescription);
            if ($result) {
                echo " alert('Thêm thông tin kết quả khám thành công.');";
                // Nếu thêm mới thành công, chuyển hướng người dùng đến trang danh sách bệnh nhân
                header("Location: appointmentsList.php");
            } else {
                echo "Đã xảy ra lỗi khi thêm cuộc hẹn";
            }
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin vào form";
    }
} else {
    echo "Phương thức không hợp lệ";
}

// Hàm kiểm tra xem cuộc hẹn đã tồn tại hay chưa
function getExistingAppointment($patientId, $aDob)
{
    // Chuẩn bị truy vấn SQL
    $sql = "SELECT * FROM appointments WHERE patient_id = ? AND appointment_date = ?";

    // Thực hiện truy vấn
    $conn = ConnectDB();
    $pdo_smt = $conn->prepare($sql);
    $pdo_smt->execute([$patientId, $aDob]);

    // Trả về kết quả dưới dạng mảng kết hợp
    return $pdo_smt->fetch(PDO::FETCH_ASSOC);
}
