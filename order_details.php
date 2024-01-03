
<?php
    include('server/connect.php');
    if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];
        $stmt = $conn -> prepare("SELECT * FROM order_items WHERE order_id=?");
        $stmt -> bind_param('i',$order_id);
        $stmt -> execute();
        $order_details = $stmt -> get_result();


        $order_total_price = calculateTotalOrderPrice($order_details);
    }else{
        header('location: account.php ');
        exit;
}
function calculateTotalOrderPrice($order_details){

  $total = 0;

  while($row = $order_details -> fetch_assoc()){
    
   $product_price = $row['product_price'];
   $product_quantity = $row['product_quantity'];
   $total += $product_price * $product_quantity; 
  }
    
  return $total;
}
?>
<?php include('layouts/header.php');?>
     <!--  Orders Details -->

     <section id ="orders" class="orders container my-2 py-3">
        <div class="container mt-5 pt-5 ">
        <h2 class="font-weight-bolde text-center ">CHI TIẾT ĐƠN HÀNG</h2>
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
                   
        </tr>

  <?php foreach ($order_details as $row) {?>
        <tr>
            <td>
                <div class="product-info">
                        <img src="assets/imgs/<?php echo $row['product_image'];?>" >
                    <div>
                        <p class="mt-3"><?php echo $row['product_name'];?></p>
                    </div>
                </div>
            </td>
            <td>
          <span><?php echo $row['product_price'];?></span>
            </td>
            <td>
                <span><?php echo $row['product_quantity'];?></span>
            </td>
            <td>
           
            </td>
          </tr>

        <?php }?>
    </table>

    <?php 
    if($order_status == "Chưa thanh toán"){?>
        <form style="float: right;" method="POST" action="payment.php">
        <input type="hidden" name="order_total_price" value = "<?php echo $order_total_price;?>">    
        <input type="hidden" name="order_status" value="<?php echo $order_status?>">
        <input type="submit" name="order_pay_btn"class="btn btn-primary" value = "Thanh Toán Ngay">
        </form>

    <?php } ?>
    </section>

      <!-- Footer -->
      <?php include('layouts/footer.php');?>