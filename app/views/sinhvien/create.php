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
        <label for="malop">Lớp học:</label>
        <select id="malop" name="malop">
            <option value="">-- Chọn lớp học --</option>
            <?php if (!empty($lops)): ?>
                <?php foreach ($lops as $lop): ?>
                    <option value="<?= htmlspecialchars($lop['malop']) ?>">
                        <?= htmlspecialchars($lop['tenlop']) ?> (<?= htmlspecialchars($lop['malop']) ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select><br>
        <input type="submit" value="Thêm sinh viên">    
    </form>

</body>
</html>