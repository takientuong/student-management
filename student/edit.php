<?php require '../layout/header.php' ?>
<h1>Chỉnh sửa sinh viên</h1>
<?php
$id = $_GET['id'];
?>
<?php require '../config.php' ?>
<?php require '../connectDb.php' ?>
<?php
$sql = "SELECT * FROM student WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" placeholder="Tên của bạn" required name="name"
                        value="<?= $row['name'] ?>">
                </div>
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" class="form-control" placeholder="Ngày sinh của bạn" required name="birthday"
                        value="<?= $row['birthday'] ?>">
                </div>
                <div class="form-group">
                    <label>Chọn Giới tính</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="nam" <?= $row['gender'] == 'nam' ? 'selected' : '' ?>>Nam</option>
                        <option value="nữ" <?= $row['gender'] == 'nữ' ? 'selected' : '' ?>>Nữ</option>
                        <option value="khác" <?= $row['gender'] == 'khác' ? 'selected' : '' ?>>Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require '../layout/footer.php' ?>