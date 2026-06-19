<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lớp học mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Thêm lớp học mới</h1>
    <form action="/lophoc/store" method="POST">
        <div class="mb-3">
            <label for="malop" class="form-label">Mã lớp:</label>
            <input type="text" id="malop" name="malop" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="tenlop" class="form-label">Tên lớp:</label>
            <input type="text" id="tenlop" name="tenlop" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Thêm lớp học</button>
        <a href="/lophoc/index" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>
