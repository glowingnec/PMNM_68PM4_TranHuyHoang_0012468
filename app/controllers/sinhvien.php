<?php
require_once '../app/core/controller.php';
class sinhvien extends controller {
	public function index($limit = 5, $offset = 0, $search = "") {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        $search = urldecode($search);

        $sortBy = $_GET['sort_by'] ?? 'id';
        $sortOrder = $_GET['sort_order'] ?? 'ASC';

		$sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset, $search, $sortBy, $sortOrder);
        $sinhvien = $result['sinhvien'];
        $totalPage = $result['totalPage'];
        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/index',
            'sinhvien' => $sinhvien,
            'totalPage' => $totalPage,
            'limit' => $limit,
            'offset' => $offset,
            'search' => $search,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder
        ]);
	}
	public function create() {
		$lopModel = $this->model('lophocModel');
		$lops = $lopModel->getAllLop();
		$this->view('layout/masterlayout', [
			'viewname' => 'sinhvien/create',
			'lops' => $lops
		]);
	}
	 public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $hoten = $_POST['hoten'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';
            $malop = $_POST['malop'] ?? '';
            
            $sinhvienModel = $this->model('sinhvienModel');
            
            $result = $sinhvienModel->create($hoten, $gioitinh, $mssv, $malop);
            
            if($result){
                header('Location: /sinhvien/index');
				exit();
            } else {
                echo "Lỗi khi thêm sinh viên.";
            }
        }
    }
    public function edit($id) {
        $sinhvienModel = $this->model('sinhvienModel');
        $sinhvien = $sinhvienModel->getSinhVienById($id);
        $lopModel = $this->model('lophocModel');
        $lops = $lopModel->getAllLop();
        $this->view('layout/masterlayout', [
            'viewname' => 'sinhvien/edit',
            'sinhvien' => $sinhvien,
            'lops' => $lops
        ]);
    }
    
    public function update() {
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'] ?? '';
            $hoten = $_POST['hoten'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';
            $malop = $_POST['malop'] ?? '';

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->update($id, $hoten, $gioitinh, $mssv, $malop);
            
            if($result){
                header('Location: /sinhvien/index');
                exit();
            } else {
                echo "Lỗi khi cập nhật sinh viên.";
            }
        }
    }
    public function delete($id) {
    $sinhvienModel = $this->model('sinhvienModel');
    $result = $sinhvienModel->delete($id);

    if ($result) {
        header('Location: /sinhvien/index');
        exit();
    } else {
        echo "Xoá sinh viên không thành công";
    }
}
}

