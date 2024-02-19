<?php
// Định nghĩa biến để lưu trữ đường dẫn cơ bản của dự án
$baseURL = "/KTQT/Admin_Hopital/";

// Định nghĩa các đường dẫn cụ thể
$patientsListURL = $baseURL . "src/patientsList.php?page=patients";
$appointmentsListURL = $baseURL . "src/appointments/appointmentsList.php?page=appointments";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo ($activePage == 'patientsList') ? 'active' : ''; ?>" id="patientsList">
                        <a class="nav-link" href="<?php echo $patientsListURL; ?>">Quản lý bệnh nhân</a>
                    </li>
                    <li class="nav-item <?php echo ($activePage == 'appointmentsList') ? 'active' : ''; ?>" id="appointmentsList">
                        <a class="nav-link" href="<?php echo $appointmentsListURL; ?>">Kết quả khám bệnh</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        function highlightLink(link, event) {
            // Ngăn chặn hành vi mặc định của liên kết
            event.preventDefault();

            // Lấy đường dẫn từ thuộc tính href của liên kết
            var url = link.getAttribute("href");

            // Kiểm tra xem tham số truy vấn 'page' có tồn tại hay không
            var pageParamIndex = url.indexOf('?page=');
            if (pageParamIndex !== -1) {
                // Xóa tham số truy vấn 'page' nếu có
                url = url.substring(0, pageParamIndex);
            }

            // Lấy tất cả các liên kết trong thanh điều hướng
            var navLinks = document.getElementsByClassName("nav-link");
            // Lặp qua từng liên kết và loại bỏ lớp "active"
            for (var i = 0; i < navLinks.length; i++) {
                navLinks[i].classList.remove("active");
            }
            // Thêm lớp "active" cho liên kết được nhấp
            link.classList.add("active");
            // Chuyển hướng đến URL của liên kết (đã được xóa tham số truy vấn 'page')
            window.location.href = url;
        }
    </script>
</body>

</html>
