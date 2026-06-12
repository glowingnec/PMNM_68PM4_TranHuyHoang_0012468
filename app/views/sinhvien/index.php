<!DOCTYPE html>
<html lang="en">
    
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
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
    <h1>Danh sách sinh viên</h1>
    <a href="/home/index" class="btn btn-secondary">Trang chủ</a>
    <a href="/sinhvien/create" class="btn btn-primary">Thêm sinh viên</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>MSSV</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sinhvien as $sv): ?>
            <tr>
                <td><?= $sv['id'] ?></td>
                <td><?= $sv['hoten'] ?></td>
                <td><?= $sv['gioitinh'] ?></td>
                <td><?= $sv['mssv'] ?></td>
                <td>
                    <a href="/sinhvien/edit/<?= $sv['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<nav style="padding-top: 30px;">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $totalPage; $i++): ?>
            <li class="page-item <?= $i == ceil(($offset + 1) / $limit) ? 'active' : '' ?>">
                <a class="page-link" href="/sinhvien/index/<?= $limit ?>/<?= ($i - 1) * $limit ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
</body>
</html>