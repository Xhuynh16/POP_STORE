
<?php
require_once "./layouts/header.php"
 ?>
 <!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="UpdateProduct.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh sách đơn hàng
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm sản phẩm</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    <form action="./controller/product.php" method="post">
        <input type="text" name="create" value = "true" style="display: none;">
        <div class="mb-3">
            <label for="productName" class="form-label">Product name:</label>
            <input type="text" class="form-control" id="productName" placeholder="Enter product name" required name="product_name">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Category:</label>
            <input type="text" class="form-control" id="productPrice" placeholder="Enter product price" required name="product_category">
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description:</label>
            <textarea class="form-control" id="productDescription" rows="3" placeholder="Enter product description" required name="product_decription"></textarea>
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Price:</label>
            <input type="text" class="form-control" id="productPrice" placeholder="Enter product price" required name="product_price">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Secial Offer:</label>
            <input type="text" class="form-control" id="product_special_offer" placeholder="Enter product price" required name="product_special_offer">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Color:</label>
            <input type="text" class="form-control" id="product_color" placeholder="Enter product price" required name="product_color">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Chọn file:</label>
            <input type="file" class="" id="product_color" placeholder="Enter product price" required name="files[]" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  require_once "./layouts/footer.php"
   ?>
  