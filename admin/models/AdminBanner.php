<?php
class AdminBanner {
    public $conn;
    public function __construct() 
    {
        $this->conn = connectDB();
    }

    public function getAllBanner() {
        try {
            $sql = "SELECT * FROM banners";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function addBanner($anh_banner,$link_san_pham,$tieu_de){
 
        try {
            $sql = "INSERT INTO banners (anh_banner,link_san_pham,tieu_de) VALUES (:anh_banner,:link_san_pham,:tieu_de)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":anh_banner" => $anh_banner,
                ":link_san_pham" => $link_san_pham,
                ":tieu_de" => $tieu_de       
            ]);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>
