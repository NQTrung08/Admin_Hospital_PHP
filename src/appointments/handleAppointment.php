<?php
require_once("../../database/fnCSDL.php");
//hàm Truy vấn CSDL và trả về mảng dữ liệu từ bảng appointments
function getListAppointments() {
    // Chuẩn bị truy vấn SQL
    $sql = "SELECT appointments.*, patients.patient_name
            FROM appointments
            INNER JOIN patients ON appointments.patient_id = patients.patient_id";

    // Thực hiện truy vấn
    $conn = ConnectDB();
    $pdo_smt = $conn->prepare($sql);
    $pdo_smt->execute();

    // Trả về kết quả dưới dạng mảng kết hợp
    return $pdo_smt->fetchAll(PDO::FETCH_ASSOC);
}

function addAppointment($patientId, $appointmentDate, $doctorName, $diagnosis, $prescription) {
    // Chuẩn bị truy vấn SQL để thêm một cuộc hẹn mới
    $sql = "INSERT INTO appointments (patient_id, appointment_date, doctor_name, diagnosis, prescription)
            VALUES (:patientId, :appointmentDate, :doctorName, :diagnosis, :prescription)";

    // Thực hiện truy vấn
    $conn = ConnectDB();
    $pdo_smt = $conn->prepare($sql);
    $pdo_smt->bindParam(':patientId', $patientId);
    $pdo_smt->bindParam(':appointmentDate', $appointmentDate);
    $pdo_smt->bindParam(':doctorName', $doctorName);
    $pdo_smt->bindParam(':diagnosis', $diagnosis);
    $pdo_smt->bindParam(':prescription', $prescription);
    
    // Trả về kết quả của truy vấn (true nếu thành công, false nếu thất bại)
    return $pdo_smt->execute();
}

//hàm tìm kết quả khám theo id và trả về bản ghi dạng mảng
function getAppointments($appointment_id)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "SELECT * FROM appointments WHERE appointment_id=?";
    $data =[$appointment_id];   
    
    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql
    if($ketqua==FALSE)
        return NULL;
    else
    {
        $row = $pdo_stm->fetch(PDO::FETCH_BOTH);
        return $row;//Trả về mảng chứa dữ liệu
    } 
}

//Hàm Sửa Kết quả Khám
function UpdateAppointment($appointment_id, $patientId, $appointmentDate, $doctorName, $diagnosis, $prescription)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "UPDATE appointments 
            SET patient_id=?,appointment_date=?,doctor_name=?,diagnosis=?,prescription=? WHERE appointment_id=?";
    $data = [$patientId,$appointmentDate,$doctorName,$diagnosis,$prescription,$appointment_id];

    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql
    return $ketqua;//TRUE/FALSE
}
//hàm xóa kết quả khám
function DeleteAppointment($appointment_id)
{
    $conn = ConnectDB();//gọi hàm kết nối CSDL nhận về đối tượng PDO
    $sql = "DELETE FROM appointments WHERE appointment_id=$appointment_id";
    //Tạo đối tượng PDOStatement để thực thi sql và lấy kết quả
    $pdostm = $conn->prepare($sql);
    $ketqua = $pdostm->execute();//trả kết quả TRUE/FALSE
    return $ketqua;
}



