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
            <h1>Quản lý banner</h1>
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
                <h3 class="card-title">Thêm banner</h3>
              </div>

              <form action="<?= BASE_URL_ADMIN . '?act=them-banner' ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body row">
                <div class="form-group col-12">
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề">

                    <?php if (isset($_SESSION['error']['tieu_de'])){ ?>
                         <p class="text-danger"><?= $_SESSION['error']['tieu_de'] ?></p>
                    <?php } ?>
                  </div>
            
                  <div class="form-group col-6">
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="anh_banner" >
                    <?php if (isset($_SESSION['error']['anh_banner'])){ ?>
                         <p class="text-danger"><?= $_SESSION['error']['anh_banner'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label>Đường dẫn sản phẩm</label>
                    <input type="text" class="form-control" name="link_san_pham" placeholder="Nhập đường dẫn">
                    <?php if (isset($_SESSION['error']['link_san_pham'])){ ?>
                         <p class="text-danger"><?= $_SESSION['error']['link_san_pham'] ?></p>
                    <?php } ?>
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>