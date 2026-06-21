<?php
require_once '../app/core/DB.php';
class sinhvienModel {
    private $conn;

    public function __construct() {
        $db = new db();
        $this->conn = $db->connect();
    }
    public function getAllSinhVien() {
        $sql_query = "SELECT sv.*, lh.tenlop FROM tbl_sinhvien sv LEFT JOIN tbl_lophoc lh ON sv.malop = lh.malop";
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
    public function create($hoten, $gioitinh, $mssv, $malop) {
        $query= "INSERT INTO tbl_sinhvien (hoten, gioitinh, mssv, malop) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$hoten, $gioitinh, $mssv, $malop]);
    }
    public function update($id, $hoten, $gioitinh, $mssv, $malop) {
        $query = "UPDATE tbl_sinhvien SET hoten = ?, gioitinh = ?, mssv = ?, malop = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$hoten, $gioitinh, $mssv, $malop, $id]);
    }
    public function delete($id) {
        $query = "DELETE FROM tbl_sinhvien WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
   }

    public function paging($limit = 5, $offset = 0, $search = "") {
        $searchQuery = "";
        if (!empty($search)) {
            $searchQuery = " WHERE sv.mssv LIKE :search OR sv.hoten LIKE :search OR lh.tenlop LIKE :search";
        }

        $sql = "SELECT sv.*, lh.tenlop FROM tbl_sinhvien sv LEFT JOIN tbl_lophoc lh ON sv.malop = lh.malop" . $searchQuery . " LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        if (!empty($search)) {
            $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }
        $stmt->execute();

        $sinhvien = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $countSql = "SELECT COUNT(*) FROM tbl_sinhvien sv LEFT JOIN tbl_lophoc lh ON sv.malop = lh.malop" . $searchQuery;
        $countStmt = $this->conn->prepare($countSql);
        if (!empty($search)) {
            $countStmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }
        $countStmt->execute();
        $totalRecords = (int)$countStmt->fetchColumn();

        $totalPage = (int)ceil($totalRecords / $limit);

        return [ 'sinhvien' => $sinhvien,  'totalPage' => $totalPage];
    }
}

    