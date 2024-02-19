<?php
require_once("../appointments/handleAppointment.php");
// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường dữ liệu có được điền đầy đủ không
    if (isset($_POST["appointment_id"]) && isset($_POST["patientId"]) && isset($_POST["appointmentDate"]) && isset($_POST["doctorName"]) && isset($_POST["diagnosis"]) && isset($_POST["prescription"])) {
        // Lấy dữ liệu được gửi từ form
        $appointment_id = $_POST["appointment_id"];
        $patientId = $_POST["patientId"];
        $appointmentDate = $_POST["appointmentDate"];
        $doctorName = $_POST["doctorName"];
        $diagnosis = $_POST["diagnosis"];
        $prescription = $_POST["prescription"];
        
        // Kiểm tra xem ngày khám có hợp lệ không (không để trống)
        if (empty($appointmentDate)) {
            echo "Ngày hẹn không được để trống";
            exit();
        }
        
        // Thực hiện cập nhật cuộc hẹn
        require_once("../../database/fnCSDL.php");
        require_once("../Thuvien.php");
        
        // Gọi hàm UpdateAppointment để cập nhật thông tin cuộc hẹn
        $result = UpdateAppointment($appointment_id, $patientId, $appointmentDate, $doctorName, $diagnosis, $prescription);
        
        // Kiểm tra kết quả cập nhật
        if ($result) {
            echo " alert('Cập nhật thông tin kết quả khám thành công.');";
            header("Location: appointmentsList.php");
        } else {
            echo "Đã xảy ra lỗi khi cập nhật thông tin cuộc hẹn";
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin vào form";
    }
} else {
    echo "Phương thức không hợp lệ";
}
?>
