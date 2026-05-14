<?php
require_once "../Models/connectDB.php";
require_once "../Models/sinhvien_ett.php";

class Sinhvien_ctrl{
    private $conn;
    
    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }

    public function getAll(){
        $sql = "SELECT hoten,mssv,gioitinh FROM sinhvien";
        $result = $this->conn->query($sql);
        $dsSinhvien = array();

        if ($result === false){
            return $dsSinhvien;
        }

        while ($row = $result->fetch_assoc()){
            $dsSinhvien[] = new Sinhvien_ett(
                $row["hoten"],
                $row["mssv"],
                $row["gioitinh"]
            );
        }
        return $dsSinhvien;
    }
}
?>