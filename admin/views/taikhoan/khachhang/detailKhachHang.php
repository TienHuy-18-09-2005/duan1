<!-- header -->
<?php require './views/layout/header.php'; ?>
<!-- end header -->

<!-- navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lí tài khoản khách hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width: 70%" alt=""
            onerror="this.onerror=null; this.src='https://icon-library.com/images/icon-user/icon-user-15.jpg'">
        </div>
        <div class="col-6">
          <div class="container">
            <table class="table table-borderless">
              <tbody style="font-size: large;">
                <tr>
                  <th>Họ tên: </th>
                  <td><?= $khachHang['ho_ten'] ?></td>
                </tr>

                <tr>
                  <th>Ngày sinh: </th>
                  <td><?= $khachHang['ngay_sinh'] ?></td>
                </tr>

                <tr>
                  <th>Email: </th>
                  <td><?= $khachHang['email'] ?></td>
                </tr>

                <tr>
                  <th>Số điện thoại: </th>
                  <td><?= $khachHang['so_dien_thoai'] ?></td>
                </tr>

                <tr>
                  <th>Giới tính: </th>
                  <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                </tr>

                <tr>
                  <th>Địa chỉ: </th>
                  <td><?= $khachHang['dia_chi'] ?></td>
                </tr>

                <tr>
                  <th>Trạng thái: </th>
                  <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12">
          <hr>
          <br>
          <h2>Lịch sử mua hàng</h2>
          <div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Tên người nhận</th>
                  <th>SĐT</th>
                  <th>Ngày đặt</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listDonHang as $key => $donHang): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $donHang['ma_don_hang'] ?></td>
                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                    <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                    <td><?= $donHang['ngay_dat'] ?></td>
                    <td><?= $donHang['tong_tien'] ?></td>
                    <td><?= $donHang['ten_trang_thai'] ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                        </a>

                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                        </a>

                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
             
            </table>
          </div>
        </div>

        <div class="col-12">
          <hr>
          <br>
          <h2>Lịch sử bình luận</h2>
          <div>
          <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Sản phẩm</th>
                  <th>Nội dung</th>
                  <th>Ngày bình luận</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                    <td><?= $binhLuan['noi_dung'] ?></td>
                    <td><?= $binhLuan['ngay_dang'] ?></td>
                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị': 'Ẩn' ?></td>
                    <td>
                      <div class="btn-group">

                      <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="POST">
                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>" id="">
                        <input type="hidden" name="name_view" value="detail_khach" id="">
                        <button onclick="return confirm('Đại vương có muốn ẩn bình luận không')" class="btn btn-warning">
                          <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn': 'Hiển thị' ?>
                        </button>
                      </form>

                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
             
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->



</body>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>
</html>