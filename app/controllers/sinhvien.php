<?php
require_once '../app/core/controller.php';
class sinhvien extends controller {
	public function index($limit = 5, $offset = 0, $search = "") {
		$sinhvienModel = $this->model('sinhvienModel');
        $result = $sinhvienModel->paging($limit, $offset,$search);
        $sinhvien = $result['sinhvien'];
        $totalPage = $result['totalPage'];
        // $sinhviens = $sinhvienModel->paging($limit, $offset, $search);
        $this->view('layout/masterlayout', ['viewname' => 'sinhvien/index', 'sinhvien' => $sinhvien, 'totalPage' => $totalPage, 'limit' => $limit,
        'offset' => $offset]);
	}
	public function create() {
		$this->view('sinhvien/create');
 		}
	 public function store(){
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $hoten = $_POST['hoten'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';
            
            $sinhvienModel = $this->model('sinhvienModel');
            
            $result = $sinhvienModel->create($hoten, $gioitinh, $mssv);
            
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
        $this->view('sinhvien/edit', ['sinhvien' => $sinhvien]);
    }
    
    public function update() {
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'] ?? '';
            $hoten = $_POST['hoten'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $gioitinh = $_POST['gioitinh'] ?? '';

            $sinhvienModel = $this->model('sinhvienModel');
            $result = $sinhvienModel->update($id, $hoten, $gioitinh, $mssv);
            
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

