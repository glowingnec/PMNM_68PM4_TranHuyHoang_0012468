<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow border-0 rounded-3">
            <div class="card-body p-4 p-md-5">
                <h3 class="card-title text-center mb-4 fw-bold text-dark">Đăng nhập QLSV</h3>
                
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger py-2 text-center" role="alert" style="font-size: 0.9rem;">
                        Sai tên đăng nhập hoặc mật khẩu!
                    </div>
                <?php endif; ?>
                
                <form action="/auth/login" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label text-secondary small fw-semibold">Tên đăng nhập</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Nhập tài khoản" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-secondary small fw-semibold">Mật khẩu</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" id="remember" name="remember" class="form-check-input">
                        <label for="remember" class="form-check-label text-secondary small">Ghi nhớ đăng nhập</label>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 py-2 fw-semibold mb-0">
                        Đăng nhập
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>