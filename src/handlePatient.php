<?php
require_once("../database/fnCSDL.php");
//hàm Truy vấn CSDL và trả về mảng dữ liệu từ bảng patients
function getListPatients()
{
    $conn = ConnectDB();//gọi hàm kết nối CSDL nhận về đối tượng PDO
    $sql = "SELECT * FROM patients";
    //Tạo đối tượng PDOStatement để thực thi sql và lấy kết quả
    $pdostm = $conn->prepare($sql);
    $ketqua = $pdostm->execute();//trả kết quả TRUE/FALSE
    if($ketqua==TRUE)
    {
        $rows = $pdostm->fetchAll(PDO::FETCH_BOTH);//PDO::FETCH_ASSOC
        return $rows;
    }
    else
        return NULL;
}
//hàm thêm bệnh nhân
function AddPatient($patient_name, $patient_dob, $patient_gender, $patient_address, $patient_phone, $patient_image)
{
    $conn = ConnectDB();//gọi hàm kết nối CSDL nhận về đối tượng PDO
    $sql = "INSERT INTO patients (patient_name, patient_dob, patient_gender, patient_address, patient_phone, patient_image) VALUES (?, ?, ?, ?, ?, ?)";

    //Tạo đối tượng PDOStatement để thực thi sql và lấy kết quả
    $pdostm = $conn->prepare($sql);
    
    $param = [$patient_name, $patient_dob, $patient_gender, $patient_address, $patient_phone, $patient_image];
    $ketqua = $pdostm->execute($param);//thực thi sql với các tham số từ mảng
    return $ketqua;
}

//hàm tìm bệnh nhân theo id và trả về bản ghi dạng mảng
function getPatients($patient_id)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "SELECT * FROM patients WHERE patient_id=?";
    $data =[$patient_id];   
    
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

//Hàm Sửa bệnh nhân
function UpdatePatient($patient_id,$patient_name,$patient_dob,$patient_gender,$patient_address,$patient_phone, $patient_image)
{
    $conn = ConnectDB();
    if($conn==NULL)
        return NULL;
    $sql = "UPDATE patients 
            SET patient_name=?,patient_dob=?,patient_gender=?,patient_address=?,patient_phone=?,patient_image=? WHERE patient_id=?";
    $data = [$patient_name,$patient_dob,$patient_gender,$patient_address,$patient_phone,$patient_image,$patient_id];

    $pdo_stm = $conn->prepare($sql);//tạo đối tượng PDOStatement
    $ketqua = $pdo_stm->execute($data);//thực thi câu sql
    return $ketqua;//TRUE/FALSE
}
//hàm xóa Nhân viên 
function DeletePatient($patient_id)
{
    $conn = ConnectDB();//gọi hàm kết nối CSDL nhận về đối tượng PDO
    $sql = "DELETE FROM patients WHERE patient_id=$patient_id";
    //Tạo đối tượng PDOStatement để thực thi sql và lấy kết quả
    $pdostm = $conn->prepare($sql);
    $ketqua = $pdostm->execute();//trả kết quả TRUE/FALSE
    return $ketqua;
}

// get ra thông tin để kiểm tra

function getPatientByNamePhone($patient_name, $patient_phone) {
    $conn = ConnectDB(); // Kết nối CSDL

    // Chuẩn bị câu truy vấn SQL
    $sql = "SELECT * FROM patients WHERE patient_name = ? AND patient_phone = ?";
    
    // Tạo đối tượng PDOStatement để thực thi truy vấn
    $pdostm = $conn->prepare($sql);

    // Bind các giá trị tham số vào câu truy vấn
    $pdostm->bindValue(1, $patient_name, PDO::PARAM_STR);
    $pdostm->bindValue(2, $patient_phone, PDO::PARAM_STR);

    // Thực thi truy vấn
    $pdostm->execute();

    // Lấy thông tin bệnh nhân từ kết quả truy vấn
    $patient = $pdostm->fetch(PDO::FETCH_ASSOC);

    // Đóng kết nối CSDL
    $conn = null;

    return $patient; // Trả về thông tin bệnh nhân (hoặc NULL nếu không tìm thấy)
}
?>