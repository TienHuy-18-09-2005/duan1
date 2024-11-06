<?php
class AdminBannerController {
    public $modersBanner;
    public function __construct(){
        $this->modersBanner = new AdminBanner();
    }

    public function danhSachBanner() {
        $listBanner = $this->modersBanner->gettAllBanner();
        // var_dump($banner);
        require_once "./views/banners/listbanner.php";
    }

    // public function create() {
    //     require_once "views/banner/form_Add_Banner.php";
    // }

    // public function store() {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $link_san_pham = $_POST["link_san_pham"] ?? "";
    //         $anh_banner = $_FILES["anh_banner"] ?? "";
    //         $error = [];

    //         // Kiểm tra lỗi upload
    //         if (isset($anh_banner["error"]) && $anh_banner["error"] !== 0) {
    //             $error["anh_banner"] = "Phải chọn ảnh";
    //         } else {
    //             $file_thumb = uploadFile($anh_banner, "./uploads/");
    //         }

    //         if (empty($link_san_pham)) {
    //             $error["link_san_pham"] = "Tên sản phẩm không được bỏ trống";
    //         }

    //         $_SESSION["error"] = $error;

    //         if (empty($error)) {
    //             $this->modersBanner->addBanner($link_san_pham, $file_thumb);
    //             header("Location:" . BASE_URL_ADMIN . "?act=banner");
    //             exit();
    //         } else {
    //             $_SESSION["flash"] = true;
    //             header("Location:" . BASE_URL_ADMIN . "?act=form-them-banner");
    //             exit();
    //         }
    //     }
    // }

    // public function edit() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    //         $id = $_GET["id"];
    //         $banner_id = $this->modersBanner->getSanPham($id);
    //         if($banner_id) {
    //             require_once "views/banner/formSua.php";

    //             deleteteSessionError();
    //         } else {
    //             header("Location: " . BASE_URL_ADMIN . "?act=banner");
    //             exit();
    //         }
    //     }

    // }

//     public function update() {
//         // Chức năng cập nhật
//     }

//     public function destroy() {
//         // Chức năng xóa
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
//             $id = $_POST['id']; 
//             // var_dump($id); die(); 
//             // Xóa danh mục  
//             $deleteBanner = $this->modersBanner->deleteData($id);  
//             header('Location: ?act=banner');  
//             exit();  
//         }  
//     }
}
?>
