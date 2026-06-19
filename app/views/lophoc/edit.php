<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin lớp học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Sửa thông tin lớp học</h1>
    <form action="/lophoc/update" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($lop['malop']) ?>">
        
        <div class="mb-3">
            <label for="malop" class="form-label">Mã lớp:</label>
            <input type="text" id="malop" name="malop" class="form-control" value="<?= htmlspecialchars($lop['malop']) ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="tenlop" class="form-label">Tên lớp:</label>
            <input type="text" id="tenlop" name="tenlop" class="form-control" value="<?= htmlspecialchars($lop['tenlop']) ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="/lophoc/index" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>