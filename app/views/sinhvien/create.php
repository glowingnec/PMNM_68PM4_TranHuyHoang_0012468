<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h1>Thêm sinh viên mới</h1>
    <form action="/sinhvien/store" method="POST">
        <label for="hoten">Tên:</label>
        <input type="text" id="hoten" name="hoten"><br>
        <label for="gioitinh">Giới tính:</label>
        <input type="text" id="gioitinh" name="gioitinh"><br>
        <label for="mssv">MSSV:</label>
        <input type="text" id="mssv" name="mssv"><br>
        <input type="submit" value="Thêm sinh viên">    
    </form>

</body>
</html>