<?php
session_start();
include('server/connect.php');

if (isset($_SESSION['logged_in'])) {
  header('location: account.php');
  exit;
}
if (isset($_POST['register'])) { // Kiểm tra nút đăng ký được nhấn

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) { // Kiểm tra mật khẩu và mật khẩu xác nhận có khớp nhau không
        header('location: register.php?error=' . urlencode('Mật khẩu xác nhận chưa đúng')); 
    } else if (strlen($password) < 6) { // Kiểm tra độ dài mật khẩu tối thiểu
        header('location: register.php?error=' . urlencode('Độ dài mật khẩu tối thiểu lớn hơn 6 ký tự')); 
    } else {
        $stmt1 = $conn->prepare('SELECT count(*) FROM users WHERE user_email=?'); 
        $stmt1->bind_param('s', $email); 
        $stmt1->execute(); 
        $stmt1->bind_result($num_rows); 
        $stmt1 ->store_result();
        $stmt1->fetch(); // Lấy kết quả
        
        if ($num_rows != 0) { // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
            header('location: register.php?error=' . urlencode('Email của bạn đã tồn tại'));
        } else {
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)"); 
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Băm mật khẩu

            $stmt->bind_param('sss', $name, $email, $hashedPassword); 

            if ($stmt->execute()) { 
                $user_id = $stmt -> insert_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account.php?register=' . urlencode('Bạn đã đăng ký thành công!')); 
            } else {
                header('location: register.php?error=' . urlencode('Không thể đăng ký tài khoản!')); 
            }
        }
    }
}
?>

<?php include('layouts/header.php');?>
      <!-- Register -->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Đăng ký</h2>
        <hr class="mx-auto"> 
        </div>

        <div class="mx-auto container">
            <form  id="register-form" method="POST" action="register.php">
                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];}?></p>
            <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
              </div>

              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirm-password" placeholder="Confirm Password" required>
            </div>
              <div class="form-group">      
                <input type="submit" class="btn" id="register-btn" name = " register" value="Đăng ký" />
            </div>

            <div class="form-group">      
                <a type="login-url" class="btn">Bạn đã có tài khoản? Đăng nhập ngay</a>
            </div>
            </form>
        </div>
      </section>


    <!-- Footer -->
    <?php include('layouts/footer.php');?>