<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Sửa thông tin sinh viên</h1>
    <form action="/sinhvien/update" method="POST">
        <input type="hidden" name="id" value="<?= $sinhvien['id'] ?>">
        <div class="mb-3">
            <label for="hoten" class="form-label">Tên:</label>
            <input type="text" id="hoten" name="hoten" class="form-control" value="<?= htmlspecialchars($sinhvien['hoten']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="gioitinh" class="form-label">Giới tính:</label>
            <input type="text" id="gioitinh" name="gioitinh" class="form-control" value="<?= htmlspecialchars($sinhvien['gioitinh']) ?>">
        </div>
        <div class="mb-3">
            <label for="mssv" class="form-label">MSSV:</label>
            <input type="text" id="mssv" name="mssv" class="form-control" value="<?= htmlspecialchars($sinhvien['mssv']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="malop" class="form-label">Lớp học:</label>
            <select id="malop" name="malop" class="form-select">
                <option value="">-- Chọn lớp học --</option>
                <?php if (!empty($lops)): ?>
                    <?php foreach ($lops as $lop): ?>
                        <option value="<?= htmlspecialchars($lop['malop']) ?>" <?= $lop['malop'] === $sinhvien['malop'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($lop['tenlop']) ?> (<?= htmlspecialchars($lop['malop']) ?>)
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="/sinhvien/index" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>