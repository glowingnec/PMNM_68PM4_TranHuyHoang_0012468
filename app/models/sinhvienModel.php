<?php
require_once '../app/core/DB.php';
class sinhvienModel {
    private $conn;

    public function __construct() {
        $db = new db();
        $this->conn = $db->connect();
    }
    public function getAllSinhVien() {
        $sql_query = "SELECT * FROM tbl_sinhvien";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSinhVienById($id) {
        $sql_query = "SELECT * FROM tbl_sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($sql_query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($id,$hoten, $gioitinh, $mssv) {
        $query= "INSERT INTO tbl_sinhvien (hoten, gioitinh, mssv) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$hoten, $gioitinh, $mssv]);
    }
    public function update($id, $hoten, $gioitinh, $mssv) {
        $query = "UPDATE tbl_sinhvien SET hoten = ?, gioitinh = ?, mssv = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$hoten, $gioitinh, $mssv, $id]);
    }
    public function delete($id) {
        $query = "DELETE FROM tbl_sinhvien WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
   }

    public function paging($limit = 5, $offset = 0, $search = "") {
    $sql = "SELECT * FROM tbl_sinhvien LIMIT :limit OFFSET :offset";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();

    $sinhvien = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $countStmt = $this->conn->prepare("SELECT COUNT(*) FROM tbl_sinhvien");
    $countStmt->execute();
    $totalRecords = (int)$countStmt->fetchColumn();

    $totalPage = (int)ceil($totalRecords / $limit);

    return [ 'sinhvien' => $sinhvien,  'totalPage' => $totalPage];
}
}

    