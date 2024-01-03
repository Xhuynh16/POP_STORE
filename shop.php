
<?php
include('server/connect.php');
$search_product = null;
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    // Sử dụng LIKE để tìm kiếm sản phẩm chứa từ khóa nhập vào
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE ?");
    $searchTerm = '%' . $search . '%';
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $search_product = $stmt->get_result();
    }
  
?>

<?php include('layouts/header.php');?>
<!-- Search -->
<div class="container mt-5 pt-5" >
  <form  class="d-flex mt-3 pt-3" method="POST" action="shop.php">
    <input type="search" name="search" class="form-control me-2" placeholder="Tìm Kiếm...">
    <button class="btn btn-outline-info" type="submit">Tìm Kiếm</button>
  </form>
  
  <div class="container">
    <div class="row">
  <?php
  if ($search_product !== null) {
      if ($search_product->num_rows > 0) {
          while ($row = $search_product->fetch_assoc()) {
  ?> 
        <div class="product text-center col-lg-3 col-md-6 col-sm-12 pt-2" >
        <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?> " >
        <h5 class="p-name"><?php echo $row['product_name'];?></h5>
        <h4 class="p-price"><?php echo $row['product_price'];?></h4>
        <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">MUA NGAY</button></a>
        </div>
      <?php
          }
      } else {
         ?> <p class="text-center pt-3" style="color: red"><?php echo "KHÔNG TÌM THẤY SẢN PHẨM";?></p><?php
      }
  }
  ?>
        </div>
    </div>   
  </div>

<!-- Products -->

<section id="featured" class="my-3 py-3 ">
    <div class="container text-center mt-5 py-5">
      <h3> Sản Phẩm </h3>
      <hr class="mx-auto">
      <p>Tìm kiếm tri thức của bạn tại đây</p>
    </div>
    <div class="row mx-auto container-fluid">
      <!-- 1 -->
      <?php include('server/get_product.php'); ?>
      <?php  while($row = $product->fetch_assoc()) {?>

        <div class="product-shop text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?> " >
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name"><?php echo $row['product_name'];?></h5>
        <h4 class="p-price"><?php echo $row['product_price'];?></h4>
        <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">MUA NGAY</button></a>
      </div>
      <?php } ?>
<!-- Phân trang -->
      <nav aria-label="Page navigation example">
        <ul class="pagination mt-5 d-flex justify-content-center">
            <li class="page-item"><a href="#" class="page-link">Previous</a></li>
            <li class="page-item"><a href="#" class="page-link">1</a></li>
            <li class="page-item"><a href="#" class="page-link">2</a></li>
            <li class="page-item"><a href="#" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">Next</a></li>
        </ul>
      </nav>



    </div>
  </section>

<?php include('layouts/footer.php');?>