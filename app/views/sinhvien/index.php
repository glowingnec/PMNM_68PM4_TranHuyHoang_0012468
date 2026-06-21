<?php
if (!function_exists('getSortUrl')) {
    function getSortUrl($column, $currentSortBy, $currentSortOrder, $limit, $offset, $search) {
        $nextOrder = 'ASC';
        if ($currentSortBy === $column) {
            $nextOrder = ($currentSortOrder === 'ASC') ? 'DESC' : 'ASC';
        }
        $url = "/sinhvien/index/{$limit}/0?sort_by={$column}&sort_order={$nextOrder}";
        if (!empty($search)) {
            $url .= "&search=" . urlencode($search);
        }
        return $url;
    }
}

if (!function_exists('renderSortIcon')) {
    function renderSortIcon($column, $currentSortBy, $currentSortOrder) {
        if ($currentSortBy === $column) {
            return ($currentSortOrder === 'ASC') ? ' ▴' : ' ▾';
        }
        return ' ⇅';
    }
}
?>
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

th a {
  color: white;
  text-decoration: none;
  display: block;
  width: 100%;
}

th a:hover {
  color: #f2f2f2;
  text-decoration: none;
}

.btn {
    margin-bottom: 10px;
}
</style>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <div>
            <a href="/home/index" class="btn btn-secondary">Trang chủ</a>
            <a href="/sinhvien/create" class="btn btn-primary">Thêm sinh viên</a>
        </div>
        <form id="searchForm" class="d-flex gap-2 align-items-center m-0">
            <input type="text" id="searchInput" class="form-control" placeholder="Tìm thông tin sinh viên" value="<?= htmlspecialchars($search ?? '') ?>" style="max-width: 280px;">
            <button type="submit" class="btn btn-success mb-0" style="white-space: nowrap;">Tìm kiếm</button>
            <?php if (!empty($search)): ?>
                <a href="/sinhvien/index/<?= $limit ?>/0?sort_by=<?= $sortBy ?>&sort_order=<?= $sortOrder ?>" class="btn btn-danger mb-0" style="white-space: nowrap;">Xóa tìm kiếm</a>
            <?php endif; ?>
        </form>
    </div>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>
                <a href="<?= getSortUrl('hoten', $sortBy, $sortOrder, $limit, $offset, $search) ?>">
                    Họ tên<?= renderSortIcon('hoten', $sortBy, $sortOrder) ?>
                </a>
            </th>
            <th>Giới tính</th>
            <th>
                <a href="<?= getSortUrl('mssv', $sortBy, $sortOrder, $limit, $offset, $search) ?>">
                    MSSV<?= renderSortIcon('mssv', $sortBy, $sortOrder) ?>
                </a>
            </th>
            <th>Tên lớp</th>
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
                <td><?= $sv['tenlop'] ?></td>
                <td>
                    <a href="/sinhvien/edit/<?= $sv['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="/sinhvien/delete/<?= $sv['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tin chuẩn chưa anh?')">Xoá</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<nav style="padding-top: 30px;">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $totalPage; $i++): ?>
            <li class="page-item <?= $i == ceil(($offset + 1) / $limit) ? 'active' : '' ?>">
                <a class="page-link" href="/sinhvien/index/<?= $limit ?>/<?= ($i - 1) * $limit ?>?sort_by=<?= $sortBy ?>&sort_order=<?= $sortOrder ?><?= !empty($search) ? '&search=' . urlencode($search) : '' ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
<script>
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const searchVal = encodeURIComponent(document.getElementById('searchInput').value.trim());
    const limit = <?= $limit ?>;
    const sortBy = '<?= $sortBy ?>';
    const sortOrder = '<?= $sortOrder ?>';
    let url = `/sinhvien/index/${limit}/0?sort_by=${sortBy}&sort_order=${sortOrder}`;
    if (searchVal) {
        url += `&search=${searchVal}`;
    }
    window.location.href = url;
});
</script>
</body>
</html>