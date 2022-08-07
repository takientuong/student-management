<?php
require '../config.php';
require '../connectDb.php';
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];

$sql = "INSERT INTO student (name, birthday, gender) VALUES('$name',' $birthday', '$gender')";
session_start();
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Đã tạo sinh viên thành công';
    header('location:/'); //về lại trang chủ
    exit; //kết thúc chương trình
}
$_SESSION['error'] = "Error: $sql<br>" . $conn->error;
header('location:/'); //về lại trang chủ