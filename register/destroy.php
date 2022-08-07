<?php
require '../config.php';
require '../connectDb.php';

$id = $_GET['id'];
$sql = "DELETE FROM register WHERE id=$id";
session_start();
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Đã xóa đăng ký môn học thành công';
    header('location:index.php'); //về lại trang chủ
    exit; //kết thúc chương trình
}
$_SESSION['error'] = "Error: $sql<br>" . $conn->error;
header('location:index.php'); //về lại trang chủ