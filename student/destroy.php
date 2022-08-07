<?php
require '../config.php';
require '../connectDb.php';
session_start();
$id = $_GET['id'];
// Nếu sinh viên đăng ký môn học rồi thì không thể xóa
$sql = "SELECT * FROM register WHERE student_id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['error'] = 'Error: Sinh viên này đã đăng ký môn học, không thể xóa';
    header('location:/'); //về lại trang chủ
    exit; //kết thúc chương trình
}

$sql = "DELETE FROM student WHERE id=$id";
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Đã xóa sinh viên thành công';
    header('location:/'); //về lại trang chủ
    exit; //kết thúc chương trình
}
$_SESSION['error'] = "Error: $sql<br>" . $conn->error;
header('location:/'); //về lại trang chủ