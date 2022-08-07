<?php
require '../config.php';
require '../connectDb.php';
$student_id = $_POST['student_id'];
$subject_id = $_POST['subject_id'];

$sql = "INSERT INTO register (student_id, subject_id) VALUES($student_id,$subject_id)";
session_start();
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Đã tạo đăng ký môn học thành công';
    header('location:index.php'); //về lại ds môn học
    exit; //kết thúc chương trình
}
$_SESSION['error'] = "Error: $sql<br>" . $conn->error;
header('location:index.php'); //về lại ds môn học