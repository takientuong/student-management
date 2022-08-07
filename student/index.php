<?php require '../layout/header.php' ?>
<h1>Danh sách sinh viên</h1>
<a href="create.php" class="btn btn-info">Add</a>
<?php require '../layout/search.php' ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Mã SV</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới Tính</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php require '../config.php' ?>
        <?php require '../connectDb.php' ?>
        <?php
        $sql = 'SELECT * FROM student';
        if ($search) {
            $sql .= " WHERE name LIKE '%$search%'";
        }
        $result = $conn->query($sql);
        $order = 0;
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
                $order++;
        ?>
        <tr>
            <td><?= $order ?></td>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['birthday'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><a class="btn btn-warning btn-sm" href="edit.php?id=<?= $row['id'] ?>">Sửa</a></td>
            <td>
                <button type="button" data-href="destroy.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm delete"
                    data-toggle="modal" data-target="#exampleModal">
                    Xóa
                </button>
            </td>
        </tr>
        <?php endwhile; ?>
        <?php endif ?>
    </tbody>
</table>
<div>
    <span>Số lượng: <?= $order ?></span>
</div>
<?php require '../layout/footer.php' ?>