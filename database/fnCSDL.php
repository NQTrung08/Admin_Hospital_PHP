<?php
//hàm kết nối CSDL và trả về đối tượng PDO (chứa kết nối)
function ConnectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "hospital_db";

    $conn = NULL;
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "<h3>Kết nối CSDL thành công</h3>";
    } catch(PDOException $e) {
        die("<p>Lỗi kết nối CSDL: " . $e->getMessage() . "</p>");
    }
    return $conn;
}

?>