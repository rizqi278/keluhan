<?php
$conn = new mysqli('localhost', 'id12777838_adminku', '12345', 'id12777838_keluhan');

if(!$conn){
    echo json_encode(['status' => 0, 'msg' => 'Koneksi Error!!!']);
    exit();
}

if($_GET['jobdesk']){
    $jobdesk = $_GET['jobdesk'];
    $keluhan = $_GET['keluhan'];
    $cek_ = mysqli_query($conn, "SELECT * FROM keluhan WHERE keluhan='$keluhan'");
    $cek = mysqli_num_rows($cek_);
    if(!$cek){
        $insert = mysqli_query($conn, "INSERT INTO keluhan (jobdesk, keluhan) VALUES ('$jobdesk', '$keluhan')");
        if($insert){
            echo json_encode(['status' => 1, 'msg' => 'Data Berhasil di Masukkan.']);
            exit();
        }else{
            echo json_encode(['status' => 0, 'msg' => 'Data Tidak masuk.']);
            exit();
        }
    }else{
        echo json_encode(['status' => 0, 'msg' => 'Data Sudah Ada.']);
        exit();
    }
}

echo json_encode(['status' => 0, 'msg' => 'Error.']);
    exit();
?>