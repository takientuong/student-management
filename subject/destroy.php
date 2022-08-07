<?php
require '../config.php';
require '../connectDb.php';
session_start();
$id = $_GET['id'];
// Nếu môn học này đã được sinh viên đăng ký thì không thể xóa
$sql = "SELECT * FROM register WHERE subject_id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['error'] = 'Error: Môn học này đã được đăng ký, không thể xóa';
    header('location:/'); //về lại trang chủ
    exit; //kết thúc chương trình
}

$sql = "DELETE FROM subject WHERE id=$id";
session_start();
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Đã xóa môn học thành công';
    header('location:index.php'); //về lại trang chủ
    exit; //kết thúc chương trình
}
$_SESSION['error'] = "Error: $sql<br>" . $conn->error;
header('location:index.php'); //về lại trang chủ