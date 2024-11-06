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
            <h1>Quản lí tài khoản quản trị viên</h1>
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
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm tài khoản quản trị</h3>
              </div>

              <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                  <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
                    <?php if (isset($_SESSION['error']['ho_ten'])){ ?>
                         <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="emaill" class="form-control" name="email" placeholder="Nhập email">
                    <?php if (isset($_SESSION['error']['email'])){ ?>
                         <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                    <?php } ?>
                  </div>
                   
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
</html>
