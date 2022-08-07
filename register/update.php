<?php
require '../config.php';
require '../connectDb.php';
$id = $_POST['id'];
$score = $_POST['score'];

$sql = "UPDATE register SET score=$score WHERE id=$id";
session_start();
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Đã cập nhật điểm thi thành công';
    header('location:index.php'); //về lại trang ds môn học
    exit; //kết thúc chương trình
}
$_SESSION['error'] = "Error: $sql<br>" . $conn->error;
header('location:index.php'); //về lại trang ds môn học