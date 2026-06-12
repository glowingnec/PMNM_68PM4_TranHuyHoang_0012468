<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
</head>
<body>
    <h1>Sửa thông tin sinh viên</h1>
    <form action="/sinhvien/update" method="POST">
        <input type="hidden" name="id" value="<?= $sinhvien['id'] ?>">
        <label for="hoten">Tên:</label>
        <input type="text" id="hoten" name="hoten" value="<?= $sinhvien['hoten'] ?>"><br>
        <label for="gioitinh">Giới tính:</label>
        <input type="text" id="gioitinh" name="gioitinh" value="<?= $sinhvien['gioitinh'] ?>"><br>
        <label for="mssv">MSSV:</label>
        <input type="text" id="mssv" name="mssv" value="<?= $sinhvien['mssv'] ?>"><br>
        <input type="submit" value="Cập nhật">
        <a href="/sinhvien/index">Hủy</a>
    </form>
</body>
</html>