
<?php
require_once "./layouts/header.php";
require_once "./interface/interfaceDb.php";
require_once "./interface/interfaceClass.php";
require_once "./db.conn.php";
require_once "./classes/Product.php";

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
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="ListOrder.php" class="nav-link">
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
            <h1 class="m-0">Danh sách sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách sản phẩm</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product_id</th>
                <th scope="col">Product_name</th>
                <th scope="col">Product_category</th>
                <th scope="col">Product_description</th>
                <th scope="col">Product_price</th>
                <th scope="col">Product_color</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $Product = new Product();
            $lstProduct = $Product->GetAll();
            foreach($lstProduct as $product){
              echo '
              <tr>
                <th scope="row">'.$product["product_id"].'</th>
                <td>'.$product["product_name"].'</td>
                <td>'.$product["product_category"].'</td>
                <td>'.$product["product_description"].'</td>
                <td>'.$product["product_price"].'</td>
                <td>'.$product["product_color"].'</td>
                <td>
                <a href="UpdateProduct.php?id='.$product["product_id"].'" style="padding: 0 12px; background-color:#ccc;">Cập nhật</a>
                <a style=" padding: 0 30px; background-color:#ccc;" href="./controller/product.php?id='.$product["product_id"].'&delete=true">Xóa</a>
                </td>
            </tr>
              ';
            }
             ?>
            
            <!-- Thêm các hàng khác tương tự tại đây -->
        </tbody>
    </table>
</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  require_once "./layouts/footer.php"
   ?>
  