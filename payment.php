User
<?php
  session_start();


  if(isset($_POST['order_pay_btn'])){
    $order_status=$_POST['order_status'];
    $order_total_price=$_POST['order_total_price'];
  }


?>
<?php include('layouts/header.php');?>
      <!-- Payment -->

 <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Thanh Toán</h2>
    <hr class="mx-auto"> 
    </div>

    <div class="mx-auto container text-center">
       <?php if(isset($_SESSION['total']) && $_SESSION['total'] != 0){ ?>
      
        <p>Tổng Thanh Toán:<?php echo $_SESSION['total'];?>VNĐ</p>
        <input type="submit" class="btn btn-primary" value= "Thanh Toán Ngay">
   
        <?php } else if (isset($_POST['order_status']) && $_POST['order_status'] == "Chưa thanh toán "){ ?>
          <p>Tổng Thanh Toán:<?php echo $_POST['order_total_price'];?>VNĐ</p>
            <input type="submit" class="btn btn-primary" value= "Thanh Toán Ngay">
     
          <?php }else  {?>
            <p>BẠN KHÔNG CÓ ĐƠN HÀNG NÀO CẦN THANH TOÁN</p>
          <?php }?>

    </div>
  </section>

      <!-- Footer -->
      <?php include('layouts/footer.php');?>