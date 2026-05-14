<?php
include "../Controllers/sinhvien_ctrl.php";
$sv = new Sinhvien_ctrl();
$rs = $sv->getAll();
var_dump($rs);
?>