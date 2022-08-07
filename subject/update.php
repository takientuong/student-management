<?php
require '../config.php';
require '../connectDb.php';
$name = $_POST['name'];
$number_of_credit = $_POST['number_of_credit'];
$id = $_POST['id'];

$sql = "UPDATE subject SET name='$name', number_of_credit=$number_of_credit WHERE id=$id";
session_start();
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Đã cập nhật môn học thành công';
    header('location:index.php'); //về lại trang ds môn học
    exit; //kết thúc chương trình
}
$_SESSION['error'] = "Error: $sql<br>" . $conn->error;
header('location:index.php'); //về lại trang ds môn học