<?php
class AdminBanner {
    public $conn;
    public function __construct() 
    {
        $this->conn = connectDB();
    }

    public function gettAllBanner() {
        try {
            $sql = "SELECT * FROM banners";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // public function addBanner($link_san_pham, $anh_banner) {
    //     try {
    //         $sql = "INSERT INTO banners (link_san_pham, anh_banner) VALUES (:link_san_pham, :anh_banner)";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([
    //             ":link_san_pham" => $link_san_pham,
    //             ":anh_banner" => $anh_banner
    //         ]);
    //         return true;
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //     }
    // }

    // public function deleteData($id) {
    //     try{
    //         $sql = "DELETE FROM banners WHERE :id = id";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute(["id"=>$id]);
    //     } catch (Exception $e) {
    //         echo "Lỗi" . $e->getMessage();
    //     }
    // }

    //     public function getSanPham ($id) {
         
    //         try {
    //             $sql = "SELECT * FROM banner WHERE id = :id";
    //             $stmt = $this->conn->prepare($sql);
    //             $stmt->execute([":id" => $id]);
    //             return $stmt->fetch();
    //         } catch (PDOException $e) {
    //             // Ghi log lỗi thay vì hiển thị cho người dùng
    //             error_log("Lỗi truy vấn: " . $e->getMessage());
    //             echo "Đã xảy ra lỗi trong quá trình truy vấn.";
    //         }
            
    // }
    public function __destruct() {
        $this->conn = null;
    }
}
?>
