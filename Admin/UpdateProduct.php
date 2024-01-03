
<?php
require_once "./layouts/header.php";
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
            <a href="ListOrder.php" class="nav-link ">
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
            <h1 class="m-0">Cập nhật sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    <h2>Cập nhật sản phẩm</h2>
    <form action="./controller/product.php" method="post">
    <div class="mb-3" style="display:none;">
            <label for="productName" class="form-label">Product id:</label>
            <input type="text" class="form-control" id="productId" placeholder="Enter product name" required name="product_id">
        </div>
        <div class="mb-3">
            <label for="productName" class="form-label">Product name:</label>
            <input type="text" class="form-control" id="productName" placeholder="Enter product name" required name="product_name">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Category:</label>
            <input type="text" class="form-control" id="productCategory" placeholder="Enter product price" required name="product_category">
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
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
    <?php
        $product = new Product();
        if(isset($_GET['id'])){
            $lstproduct = $product->GetByID($_GET['id']);
            foreach($lstproduct as $product){
                echo '
                <script>
                    document.getElementById("productId").value = "'.$product["product_id"].'";
                    document.getElementById("productName").value = "'.$product["product_name"].'";
                    document.getElementById("productCategory").value = "'.$product["product_category"].'";
                    document.getElementById("productDescription").value = "'.$product["product_description"].'";
                    document.getElementById("productPrice").value = "'.$product["product_price"].'";
                    document.getElementById("product_special_offer").value = "'.$product["product_special_offer"].'";
                    document.getElementById("product_color").value = "'.$product["product_color"].'";
                </script>
                ';
            }
        }

     ?>
     
</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  require_once "./layouts/footer.php"
   ?>
  