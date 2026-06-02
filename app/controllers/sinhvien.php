<?php
require_once '../app/core/controller.php';
class sinhvien extends controller {
	public function index() {
		$sinhvienModel = $this->model('sinhvienModel');
		$sinhviens = $sinhvienModel->getAllSinhVien();
        $this->view('layout/masterlayout', ['viewname' => 'sinhvien/index', 'sinhviens' => $sinhviens]);
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
}

