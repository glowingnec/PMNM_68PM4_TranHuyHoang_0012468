<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="/home/index">
            <span class="text-white">QLSV</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/home/index">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sinhvien/index">Sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/lophoc/index">Lớp học</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                <a href="/auth/logout" class="btn btn-outline-danger btn-sm px-3 mb-0" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">Đăng xuất</a>
            </div>
        </div>
    </div>
</nav>