<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="../public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <div class="container" style="margin-top:20px;">
        <?php
        $requestURI = $_SERVER['REQUEST_URI'];
        // bỏ dấu / trước vào sau chuỗi nếu có
        $requestURI = trim($requestURI, '/');
        //explode() là hàm cắt chuỗi tạo array
        $temp = explode('/', $requestURI);
        $module = $temp[0];
        ?>
        <a href="../student" class="<?= $module == 'student' ? 'active' : '' ?> btn btn-info">Students</a>
        <a href="../subject" class="<?= $module == 'subject' ? 'active' : '' ?> btn btn-info">Subject</a>
        <a href="../register" class="<?= $module == 'register' ? 'active' : '' ?> btn btn-info">Register</a>
        <?php
        session_start();
        $message = '';
        $class = '';
        if (!empty($_SESSION['success'])) :
            $class = 'success';
            $message = $_SESSION['success'];
            //xóa phần tử có key là success
            unset($_SESSION['success']);
        elseif (!empty($_SESSION['error'])) :
            $class = 'danger';
            $message = $_SESSION['error'];
            //xóa phần tử có key là success
            unset($_SESSION['error']);
        endif;
        ?>
        <?php if ($message) : ?>
        <div class="alert alert-<?= $class ?> mt-3"><?= $message ?></div>
        <?php endif ?>