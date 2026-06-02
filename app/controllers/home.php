<?php
require_once '../app/core/controller.php';
class home extends controller {
    public function index() {
        $this->view('layout/masterlayout', ['viewname' => 'home/index']);
    }
    public function login(){
        $this->view('layout/masterlayout', ['viewname' => 'home/login']);
    }
}