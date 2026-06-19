<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.btn {
    margin-bottom: 10px;
}
</style>
</head>

<body>
    <h1>Danh sách lớp học</h1>
    <a href="/home/index" class="btn btn-secondary mb-3">Trang chủ</a>
    <a href="/lophoc/create" class="btn btn-primary mb-3">Thêm lớp học</a>

    <table>
        <thead>
            <tr>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Hành động</th>
            </tr>
        </thead>
            <?php if (!empty($lops)): ?>
                <?php foreach ($lops as $lop): ?>
                    <tr>
                        <td><?= $lop['malop'] ?></td>
                        <td><?= $lop['tenlop'] ?></td>
                        <td>
                            <a href="/lophoc/edit/<?= $lop['malop'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="/lophoc/delete/<?= $lop['malop'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá lớp này không?')">Xoá</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Không có dữ liệu lớp học.</td>
                </tr>
            <?php endif; ?>
    </table>
</div>

</body>
</html>