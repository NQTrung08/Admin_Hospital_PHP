<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin cuộc hẹn</title>
    <!-- Link đến thư viện Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <h2 style="text-align: center; color: #090;">Cập nhật thông tin cuộc hẹn</h2>
    <!-- Nút quay lại trang trước -->
    <a href="#" onclick="history.go(-1);" style="text-decoration: none; color: #000;">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
    <?php
    // Kiểm tra xem có tham số patient_id được gửi không
    if (isset($_REQUEST["appointment_id"])) {
        // Lấy appointment_id từ tham số gửi đến
        $appointment_id = $_REQUEST["appointment_id"];

        // Kiểm tra xem appointment_id có giá trị không
        if (!empty($appointment_id)) {
            // Lấy thông tin cuộc hẹn từ cơ sở dữ liệu dựa trên appointment_id
            require_once("handleAppointment.php");
            $appointment_info = getAppointments($appointment_id);

            // Kiểm tra xem có thông tin cuộc hẹn không
            if ($appointment_info) {
                // Hiển thị biểu mẫu cập nhật thông tin cuộc hẹn
    ?>
                <form name="updateAppointmentForm" method="post" action="../appointments/handleUpdateAppointment.php" align="center">
                    <input type="hidden" name="appointment_id" value="<?php echo $appointment_info['appointment_id']; ?>">
                    <label for="patientId">Bệnh Nhân:</label>

                    <select name="patientId" id="patientId">
                        <?php
                        require_once("../../database/fnCSDL.php");
                        require_once("../Thuvien.php");
                        echo "Before TaoSelect<br>";
                        TaoSelect("patients", "patient_id", "patient_name", 0);
                        echo "After TaoSelect<br>";
                        ?>
                        <option value="<?php echo $appointment_info['patient_id']; ?>"><?php echo $appointment_info['patient_name']; ?></option>
                    </select>
                    <br><br>
                    <label for="appointmentDate">Ngày Khám:</label>
                    <input type="date" name="appointmentDate" id="appointmentDate" value="<?php echo $appointment_info['appointment_date']; ?>">
                    <br><br>
                    <label for="doctorName">Bác sĩ:</label>
                    <input type="text" name="doctorName" id="doctorName" value="<?php echo $appointment_info['doctor_name']; ?>">
                    <br><br>
                    <label for="diagnosis">Chuẩn đoán:</label>
                    <textarea name="diagnosis" id="diagnosis"><?php echo $appointment_info['diagnosis']; ?></textarea>
                    <br><br>
                    <label for="prescription">Đơn thuốc:</label>
                    <textarea name="prescription" id="prescription"><?php echo $appointment_info['prescription']; ?></textarea>
                    <br><br>
                    <input type="submit" name="submit" value="Cập nhật">
                </form>
    <?php
            } else {
                echo "<p>Không tìm thấy thông tin cuộc hẹn.</p>";
            }
        } else {
            echo "<p>Không có appointment_id được cung cấp.</p>";
        }
    } else {
        echo "<p>Không có tham số appointment_id được gửi đến.</p>";
    }
    ?>
</body>

</html>