<!DOCTYPE html>
<html lang="en">
    
<head>
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
</style>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>MSSV</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sinhviens as $sv): ?>
            <tr>
                <td><?= $sv['id'] ?></td>
                <td><?= $sv['hoten'] ?></td>
                <td><?= $sv['gioitinh'] ?></td>
                <td><?= $sv['mssv'] ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
</body>
</html>