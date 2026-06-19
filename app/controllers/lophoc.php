<?php
require_once '../app/core/controller.php';

class lophoc extends controller {
    public function index() {
        $lopModel = $this->model('lophocModel');
        $lops = $lopModel->getAllLop();
        $this->view('layout/masterlayout', [
            'viewname' => 'lophoc/index',
            'lops' => $lops
        ]);
    }

    public function create() {
        $this->view('layout/masterlayout', [
            'viewname' => 'lophoc/create'
        ]);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenlop = $_POST['tenlop'] ?? '';
            $malop = $_POST['malop'] ?? '';

            $lopModel = $this->model('lophocModel');
            $result = $lopModel->create($tenlop, $malop);

            if ($result) {
                header('Location: /lophoc/index');
                exit();
            }

            echo 'Lỗi khi thêm lớp học.';
        }
    }

    public function edit($id) {
        $lopModel = $this->model('lophocModel');
        $lop = $lopModel->getLopById($id);

        $this->view('layout/masterlayout', [
            'viewname' => 'lophoc/edit',
            'lop' => $lop
        ]);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $tenlop = $_POST['tenlop'] ?? '';
            $malop = $_POST['malop'] ?? '';

            $lopModel = $this->model('lophocModel');
            $result = $lopModel->update($id, $tenlop, $malop);

            if ($result) {
                header('Location: /lophoc/index');
                exit();
            }

            echo 'Lỗi khi cập nhật lớp học.';
        }
    }

    public function delete($id) {
        $lopModel = $this->model('lophocModel');
        $result = $lopModel->delete($id);

        if ($result) {
            header('Location: /lophoc/index');
            exit();
        }

        echo 'Xóa lớp học không thành công.';
    }
}