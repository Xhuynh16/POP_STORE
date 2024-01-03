<?php
session_start();
include('server/connect.php');
if (isset($_SESSION['logged_in'])) {
  
}else{
  header("location: login.php");
  exit;
}

if (isset($_GET['logout'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header("location: login.php");
    exit;
}

// Đổi mật khẩu
if (isset($_POST['change_password'])) {
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];
  $user_email = $_SESSION['user_email'];

  // Kiểm tra mật khẩu không khớp
  if ($password !== $confirmPassword) {
      header('location: account.php?error=Mật khẩu không khớp!');
  } elseif (strlen($password) < 6 || strlen($confirmPassword) < 6) {
      header('location: account.php?error=Độ dài mật khẩu phải lớn hơn hoặc bằng 6 ký tự!');
  } else {
      // Hash mật khẩu mới
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Sử dụng prepared statement để cập nhật mật khẩu mới
      $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
      $stmt->bind_param('ss', $hashed_password, $user_email);

      if ($stmt->execute()) {
          header('location: account.php?message=ĐỔI MẬT KHẨU THÀNH CÔNG');
      } else {
          header('location: account.php?error=ĐỔI MẬT KHẨU THẤT BẠI');
      }
  }
}


// Đơn hàng của người dùng
  if(isset($_SESSION['logged_in'])){
        $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id =? ");
        $user_id = $_SESSION['user_id'];
        $stmt->bind_param('i',$user_id);
        $stmt -> execute();
        $orders = $stmt->get_result();
  }
?>

<?php include('layouts/header.php');?>
    <!-- Account -->
      <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Thông tin tài khoản</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Tên đăng nhập: <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];}?></span></p>
                    <p>Email: <span><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];}?></span></p>
                    <p><a href="#orders" id="orders-btn">Đơn hàng của bạn</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Đăng xuất</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                <form id="account-form" method="POST" action="account.php">
                <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>    
                <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></p>    
                <h3>Đổi mật khẩu</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirm-password" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" name="change_password" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
      </section>


    <!--  Orders -->

    <section id ="orders" class="orders container my-2 py-3">
    <div class="container mt-2 ">
        <h2 class="font-weight-bolde text-center">ĐƠN HÀNG CỦA BẠN</h2>
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Mã Đơn Hàng</th>
            <th>Đơn Giá</th>
            <th>Trạng Thái</th>
            <th>Ngày Đặt Hàng</th>
            <th>Chi Tiết Đơn Hàng</th>       
        </tr>

        <?php while($row = $orders->fetch_assoc()){ ?>
        <tr>
            <td>
                <!-- <div class="product-info">
                     <img src="assets/imgs/" alt=""> 
                <div>
                    <p class="mt-3"><?php echo $row['order_id'];?></p> -->
                <!-- </div>
                </div> -->
                <span><?php echo $row['order_id'];?></span>
            </td>
            <td>
            <?php echo $row['order_cost'];?>
            </td>
            <td>
            <?php echo $row['order_status'];?>
            </td>
            <td>
                <span><?php echo $row['order_date'];?></span>
            </td>
            <td>
            <form method="POST" action="order_details.php" >
              <input type="hidden" value="<?php echo $row['order_status'];?>" name = "order_status">
              <input type="hidden" value="<?php echo $row['order_id'];?>" name ="order_id">    
              <input class="btn order-details-btn" name = "order_details_btn" type = "submit" value = "Chi tiết">
            </form>
            </td>
          </tr>
<?php }?>
        
    </table>


    </section>

    <!-- Footer -->
    <?php include('layouts/footer.php');?>