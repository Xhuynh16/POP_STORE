
<?php include('layouts/header.php');?>

<!-- Home -->
<section id="home">
  <div class="container">
    <h5>NEW ARRIVALS</h5>
    <h1><span>Giá Tốt Nhất</span> Hôm Nay</h1>
    <p>Mở Cánh Cửa Tri Thức - Tại Popstore</p>
    <a href="shop.php"><button>MUA NGAY</button></a>
  </div>
</section>

<!-- Book -->
<br>
<h3 class="text-center">NXB</h3>
<br>
<section id="brand" class="container">
  <div class="row">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.png">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg">
    <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand5.png">
  </div>
</section>
<br>
<!-- New -->
<section id="new" class="w-100">
 <div class="row p-0 m-0"> <!--padding = 0 margin = 0 -->
  <!-- San pham 1 -->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/imgs/1.jpg" >
  <div class="details">
    <h2>Tuổi trẻ đáng giá bao nhiêu </h2>
    <button class="text-uppercase">MUA NGAY</button>
  </div>
</div>
<!-- San pham 2 -->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/imgs/2.jpg" >
  <div class="details">
    <h2>Thiên tài bên trái kẻ điên bên phải</h2>
    <button class="text-uppercase">MUA NGAY</button>
  </div>
</div>
<!-- San pham 3 -->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/imgs/3.jpg" >
  <div class="details">
    <h2>Hành tinh của một kẻ nghĩ nhiều</h2>
    <button class="text-uppercase">MUA NGAY</button>
  </div>
</div>

</div>
</section>

<!-- Featured -->
<?php include('server/get_featured_products.php'); ?>

<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3> SELF-HELP </h3>
    <hr class="mx-auto">
    <p>Những cuốn sách giúp bạn hoàn thiện bản thân </p>
  </div>
  <div class="row mx-auto container-fluid">
    <?php while($row = $featured_products->fetch_assoc()): ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img src="assets/imgs/<?php echo $row['product_image'];?>" class="img-fluid mb-3">
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name"><?php echo $row['product_name'];?></h5>
        <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
       <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">MUA NGAY</button></a>
      </div>
    <?php endwhile; ?>
  </div>
</section>



 <!-- Banner -->
 <section id="banner" class="my-5 py-5">
  <div class="container">
    <h4>SALE CỰC LỚN</h4>
    <h1>MUA sách thả ga <br>KHÔNG lo về giá</h1>
    <a href="shop.html"><button>MUA NGAY</button></a>
  </div>
 </section>
  

 <!--Combo Book -->
 <?php include ('server/get_combo.php')?>
 <section id="featured" class="my-5">
  <div class="container text-center mt-5">
    <h3> COMBO SÁCH HOT </h3>
    <hr class="mx-auto">
    <p>Mua sách thả ga - không lo về giá</p>
  </div>
  <div class="row mx-auto container-fluid">
    <!-- 1 -->
  
    <?php while($row = $combo_products->fetch_assoc()): ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img src="assets/imgs/<?php echo $row['product_image'];?>"  class="img-fluid mb-3">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name'];?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?>VNĐ</h4>
      <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">MUA NGAY</button></a>
    </div>
    
    <?php endwhile; ?>
  </div>
</section>

<!-- Sách thiếu nhi -->
<?php include ('server/get_story.php')?>
<section id="featured" class="my-5">
  <div class="container text-center mt-5">
    <h3> TRUYỆN TRANH </h3>
    <hr class="mx-auto">
    <p>Nơi hội tụ những câu chuyện đầy màu sắc và kỳ ảo</p>
  </div>
  <div class="row mx-auto container-fluid">
    <!-- 1 -->
    <?php while($row = $story_products->fetch_assoc()): ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img src="assets/imgs/<?php echo $row['product_image'];?>" alt="" class="img-fluid mb-3">
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name'];?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?>VNĐ</h4>
      <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">MUA NGAY</button></a>
    </div>
    <?php endwhile; ?>

  </div>
</section>

<?php include('layouts/footer.php');?>