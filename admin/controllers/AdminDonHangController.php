<?php
class AdminDonHangController {
    public $modelDonHang;
    public function __construct()

    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang(){

        $listDonHang = $this->modelDonHang->getAllDonHang();
        
        require_once './views/donhang/listDonHang.php';
    }


    public function detailDonHang() {
        $don_hang_id = $_GET['id_don_hang'];

        // lấy thông tin ở bảng đơn hàng 
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once './views/donhang/detailDonHang.php';

    }
   
    public function formEditDonHang(){

        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang($id);
        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
        
    }


    public function postEditDonHang(){
        // hàm dùng thêm xử lý dữ liệu

        // kiểm tra xem dữ liệu dc sumbit nên k 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            // lấy ra dữ liệu cũ của sản phẩm 
            $don_hang_id = $_POST['don_hang_id'] ?? '';


            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';

           
            // tạo 1 mảng trống để chứa dữ liệu 
            $errors = [];

            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên không được để trống';
            }

            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại không được để trống';
            }

            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email không được để trống';
            }

            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
            }

            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Vui lòng chọn trạng thái';
            }


            $_SESSION['error'] = $errors;
            // var_dump($errors);die;
            // Nếu không có lỗi tiến hành thêm sản phẩm
            if (empty($errors)) {

                // Nếu không có lỗi tiến hành thêm sản phẩm
                // var_dump('oke'); 

               $this->modelDonHang->updateDonHang( $don_hang_id,
                                                   $ten_nguoi_nhan,
                                                   $sdt_nguoi_nhan,
                                                   $email_nguoi_nhan, 
                                                   $dia_chi_nguoi_nhan, 
                                                   $ghi_chu, 
                                                   $trang_thai_id
                                                  );

                // var_dump($san_pham_id);die();

                // Xử lý thêm album ảnh sản phẩm img_array

                header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                // trả về form và lỗi 
            //    Đặt chỉ thị xóa session sau khi hiển thị form 
            $_SESSION['flash'] = true;

            header("Location: " . BASE_URL_ADMIN .  '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
            exit();
            }
        }
    }

 }