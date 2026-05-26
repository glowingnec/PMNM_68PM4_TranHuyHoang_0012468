<?php
require_once '../app/core/controller.php';
class sinhvien extends controller {
	public function index() {
		$sinhvienModel = $this->model('sinhvienModel');
		$sinhviens = $sinhvienModel->getAllSinhVien();
		$this->view('sinhvien/index', ['sinhviens' => $sinhviens]);
	}
	public function create() {
		$this->view('sinhvien/create');
 		}
}

