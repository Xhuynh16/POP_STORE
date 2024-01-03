<?php

  include('server/connect.php');

  if (isset($_GET['product_id'])){  

      $product_id = $_GET['product_id'];

      $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ? ");
      $stmt->bind_param("i",$product_id);
      
      $stmt->execute();
      $products = $stmt->get_result();
    }else{

      header('location: index.php');

    }


?>
<?php include('layouts/header.php');?>
<!-- single-product -->
<section class="container single-product my-5 pt-5">
    <div class="row mt-5 pt-5">

      <?php while($row = $products->fetch_assoc()){?>

       
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid w-100 pb-1" id="mainImg">
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
                <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img">
            </div><div class="small-img-col">
                <img src="assets/imgs/<?php echo $row['product_image4'];?>" width="100%" class="small-img">
            </div><div class="small-img-col">
                <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img">
            </div>
        </div>
        </div>


        <div class="col-lg-6 col-md-12 col-sm-12">
            <h6 ><?php echo $row['product_category']; ?></h6>
            <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
            <h2><?php echo $row['product_price']; ?></h2>
            <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                  <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                  <input type="number" name="product_quantity" value="1">
                  <button class="buy-btn" type="submit" name ="add_to_cart">THÊM VÀO GIỎ HÀNG</button>     
      </form>

            
            <h4 class="mt-5 mb-5">Mô tả chi tiết</h4>
            <span><?php echo $row['product_description']; ?></span>
        </div>
    </div>


    <?php }?>


</section>

<!-- realated products-->
<section id="realated-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3> SẢM PHẨM LIÊN QUAN </h3>
      <hr class="mx-auto">
    </div>
    <div class="row mx-auto container-fluid">
      <!-- 1 -->
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img src="assets/imgs/featured1.jpg" alt="" class="img-fluid mb-3">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Đắc Nhân Tâm (Khổ Lớn - Tái Bản 2023) - Sbooks</h5>
        <h4 class="p-price">49.000VNĐ</h4>
        <button class="buy-btn">MUA NGAY</button>
      </div>
      <!-- 2 -->
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img src="assets/imgs/featured2.jpg" alt="" class="img-fluid mb-3">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Chiến Thắng Con Quỷ Trong Bạn (Tái Bản 2023) - Sbooks</h5>
        <h4 class="p-price">79.000VNĐ</h4>
        <button class="buy-btn">MUA NGAY</button>
      </div>
      <!-- 3 -->
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img src="assets/imgs/featured3.jpg" alt="" class="img-fluid mb-3">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Nghĩ Giàu & Làm Giàu</h5>
        <h4 class="p-price">89.000VNĐ</h4>
        <button class="buy-btn">MUA NGAY</button>
      </div>
      <!-- 4 -->
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img src="assets/imgs/featured4.jpg" alt="" class="img-fluid mb-3">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Người Giàu Có Nhất Thành Babylon (Tái Bản 2023)</h5>
        <h4 class="p-price">69.000</h4>
        <button class="buy-btn">MUA NGAY</button>
      </div>
  
    </div>
  </section>


    <!-- Footer -->

        <script>
            var mainImg = document.getElementById("mainImg");
            var smallImg = document.getElementsByClassName("small-img");
            
            for(let i=0; i<4; i++){

            smallImg[i].onclick = function(){
                mainImg.src = smallImg[i].src;
            }
        };
            
        </script>
   <?php include('layouts/footer.php');?>