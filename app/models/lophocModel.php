<?php
require_once '../app/core/DB.php';

class lophocModel {
    private $conn;

    public function __construct() {
        $db = new db();
        $this->conn = $db->connect();
    }

    public function getAllLop() {
        $sql = "SELECT * FROM tbl_lophoc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLopById($id) {
        $sql = "SELECT * FROM tbl_lophoc WHERE malop = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($tenlop, $malop) {
        $sql = "INSERT INTO tbl_lophoc (tenlop, malop) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$tenlop, $malop]);
    }

    public function update($id, $tenlop, $malop) {
        $sql = "UPDATE tbl_lophoc SET tenlop = ?, malop = ? WHERE malop = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$tenlop, $malop, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tbl_lophoc WHERE malop = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}