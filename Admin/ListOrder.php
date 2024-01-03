
<?php
require_once "./layouts/header.php";
require_once "./layouts/header.php";
require_once "./interface/interfaceDb.php";
require_once "./interface/interfaceClass.php";
require_once "./db.conn.php";
require_once "./classes/Product.php";
require_once "./classes/Order.php";
require_once "./classes/User.php";
 ?>
<!-- Sidebar Menu -->
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
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
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="ListOrder.php" class="nav-link active">
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
            <h1 class="m-0">Danh sách đơn hàng</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách đơn hàng</li>
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
                <th scope="col">Order_id</th>
                <th scope="col">Order_cost</th>
                <th scope="col">Order_status</th>
                <th scope="col">User_name</th>
                <th scope="col">User_phone</th>
                <th scope="col">User_city</th>
                <th scope="col">User_address</th>
                <th scope="col">Order_date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $order = new Order();
                $user = new User();
                $lstOrder = $order->GetAll();
                foreach($lstOrder as $order){
                    $user_name= $user->GetByID($order["user_id"])[0];
                    echo '
                        <tr>
                        <th scope="row">'.$order["order_id"].'</th>
                        <td>'.$order["order_cost"].'</td>
                        <td>'.$order["order_status"].'</td>
                        <td>'.$user_name["user_name"].'</td>
                        <td>'.$order["user_phone"].'</td>
                        <td>'.$order["user_city"].'</td>
                        <td>'.$order["user_address"].'</td>
                        <td>'.$order["order_date"].'</td>
                        </tr>
                ';
                }
             ?>
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
  