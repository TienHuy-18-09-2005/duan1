<?php
class AdminBannerController {
    public $modersBanner;
    public function __construct(){
        $this->modersBanner = new AdminBanner();
    }

    public function danhSachBanner() {
        $listBanner = $this->modersBanner->getAllBanner();
        // var_dump($banner);
        require_once "./views/banners/listbanner.php";
    }

    public function addBanner(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tieuDeBanner = $_POST["tieuDeBanner"] ?? "";
            $link_san_pham = $_POST["link_san_pham"] ?? "";
            $anh_banner = $_FILES["anh_banner"] ?? "";
            $error = [];

            // Kiểm tra lỗi upload
            if (isset($anh_banner["error"]) && $anh_banner["error"] !== 0) {
                $error["anh_banner"] = "Phải chọn ảnh";
            } else {
                $file_thumb = uploadFile($anh_banner, "./uploads/");
            }

            if (empty($link_san_pham)) {
                $error["link_san_pham"] = "Tên sản phẩm không được bỏ trống";
            }

            $_SESSION["error"] = $error;

            if (empty($error)) {
                $this->modersBanner->addBanner(anh_banner: $file_thumb, link_san_pham: $link_san_pham, tieuDeBanner: $tieuDeBanner);
                header("Location:" . BASE_URL_ADMIN . "?act=banner");
                exit();
            } else {
                $_SESSION["flash"] = true;
                header("Location:" . BASE_URL_ADMIN . "?act=form-them-banner");
                exit();
            }
        }
        }
}
?>
