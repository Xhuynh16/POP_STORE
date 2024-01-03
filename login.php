<?php
session_start();
include('server/connect.php');


if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Lấy mật khẩu từ form

    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email=? LIMIT 1 ");
    $stmt->bind_param('s', $email);
    
    if ($stmt->execute()) {
        $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
        $stmt->fetch();

        if (password_verify($password, $user_password)) { // So sánh mật khẩu nhập vào với mật khẩu trong cơ sở dữ liệu
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;
            header('location: account.php?message=ĐĂNG NHẬP THÀNH CÔNG!');
        } else {
            header('location: login.php?error=THÔNG TIN TÀI KHOẢN KHÔNG ĐÚNG!');
        }
    } else {
        header('location: login.php?error=ĐĂNG NHẬP BỊ LỖI! VUI LÒNG THỬ LẠI!');
    }
}
?>

<?php include('layouts/header.php');?>

    <!-- Login -->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Login</h2>
        <hr class="mx-auto"> 
        </div>

        <div class="mx-auto container">
            <form  id="login-form" action = "login.php" method = "POST">
              <p style="color: red"><?php if(isset($_GET['error'])){ echo $_GET['error'];}?></p>
            <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">      
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login" />
            </div>
            <div class="form-group">      
              <a href="register.php" id="register-url" class="btn">Bạn chưa có tài khoản? Đăng ký ngay</a>
          </div>
            </form>
        </div>
      </section>


    <!-- Footer -->
    <?php include('layouts/footer.php');?>