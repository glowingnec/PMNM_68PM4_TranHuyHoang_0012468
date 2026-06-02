<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .content {
        width: 90%;
        margin: auto;
    }
</style>
<body>
    <div> <?php require_once '../app/views/layout/partial/header.php'; ?> </div>
    <div class="content">
        <?php require_once '../app/views/' . $viewname . '.php'; ?>
    </div>
    <div class="footer"> <?php require_once '../app/views/layout/partial/footer.php'; ?> </div>
</body>
</html>