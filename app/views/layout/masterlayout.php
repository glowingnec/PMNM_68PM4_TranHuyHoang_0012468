<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống Quản lý Sinh viên</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .content {
            flex: 1 0 auto;
            width: 90%;
            margin: 30px auto;
        }
        .footer-wrapper {
            flex-shrink: 0;
        }
    </style>
</head>
<body> 
    <?php if ($viewname !== 'home/login'): ?>
        <div>
            <?php require_once '../app/views/layout/partial/header.php'; ?>
        </div>
    <?php endif; ?>
    <div class="content">
        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>
    <div class="footer-wrapper">
        <?php require_once '../app/views/layout/partial/footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>