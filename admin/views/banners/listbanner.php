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
            <h1>Quản lí Banner</h1>
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
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <a href="<?= BASE_URL_ADMIN . '?act=form-them-banner' ?>">
                  <button class="btn btn-success">
                    Thêm Banner
                  </button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Banner</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listBanner as $key=>$banner): ?>
                  <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $banner['tieu_de'] ?></td>
                    <td>
                        <img src="<?= BASE_URL . $banner['link_san_pham'] ?>" style="height: 300px" width="600px" alt="" 
                        onerror="this.onerror=null; this.src='https://webadmin.beeart.vn/upload/image/20220629/6379211571097799404175786.jpg'">
                    </td>
                    <td>
                      <a href="<?= BASE_URL_ADMIN . '?act=form-sua-banner&id_banner=' . $banner['id'] ?>">
                      <button class="btn btn-warning">Sửa</button>
                      </a>
                      <a href="<?= BASE_URL_ADMIN . '?act=form-xoa-banner&id_banner=' . $banner['id'] ?>" 
                      onclick="return confirm('Đại vương có muốn xóa không')">
                      <button class="btn btn-danger">Xóa</button>
                      </a>
                    </td>
                  </tr>
                   <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Banner</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
  
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->

</body>
</html>
