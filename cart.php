<?php

      session_start();
      if(isset($_POST['add_to_cart'])){
// nếu giỏ hàng đã có sản phẩm
        if(isset($_SESSION['cart'])){
          $product_array_ids = array_column($_SESSION['cart'],"product_id");
         //kiểm tra sản phẩm đã được thêm hay chưa
          if(!in_array($_POST['product_id'], $product_array_ids) ){

            $product_id = $_POST['product_id'];

            $product_array = array(
             'product_id'=> $_POST['product_id'],
             'product_name'=> $_POST['product_name'],
             'product_price'=> $_POST['product_price'],
             'product_image'=> $_POST['product_image'],
             'product_quantity'=> $_POST['product_quantity'],
   
            );
   
            $_SESSION['cart'][$product_id]=$product_array;

            //sản phẩm đã được thêm
          }else{
              echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng")</script>';
              //echo '<script>window.location="index.php"</script>';
            }


          //nếu chưa có sản phẩm
        }else{

         $product_id = $_POST['product_id'];
         $product_name =$_POST['product_name'];
         $product_price =$_POST['product_price'];
         $product_image =$_POST['product_image'];
         $product_quantity =$_POST['product_quantity'];


         $product_array = array(
          'product_id'=> $product_id,
          'product_name'=> $product_name,
          'product_price'=> $product_price,
          'product_image'=> $product_image,
          'product_quantity'=> $product_quantity,

         );

         $_SESSION['cart'][$product_id]=$product_array;
        }

//xóa sản phẩm khỏi giỏ hàng
      }else if(isset($_POST['remove_product'])){

      $product_id = $_POST['product_id'];
      unset($_SESSION['cart'][$product_id]);

//Tổng
calculateTotalCart();

      }else if( isset($_POST['edit_quantity'])){
// lấy id và số lượng từ form
      $product_id = $_POST['product_id'];
      $product_quantity = $_POST['product_quantity'];
 // lấy mảng từ sesstion     
      $product_array = $_SESSION['cart'][$product_id];
     // cập nhật số lượng 
      $product_array['product_quantity'] = $product_quantity;
      // trả lại mảng
      $_SESSION['cart'][$product_id] = $product_array;
      
//Tổng
calculateTotalCart();
      }else{
       //header('location: index.php');
      }
      function calculateTotalCart(){

        $total = 0;

          foreach($_SESSION['cart'] as $key => $value){

            $product = $_SESSION['cart'][$key];

            $price = $product['product_price'];
            $quantity = $product['product_quantity'];
            
            $total += $price * $quantity;
        }
        $_SESSION['total'] = $total;
      }

?>

<?php include('layouts/header.php');?>

<!--  Cart -->

<section class="cart container my-5 py-5">
    <div class="container mt-5 pt-5">
        <h2 class="font-weight-bolde text-center">GIỎ HÀNG CỦA BẠN</h2>
        <hr>
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>


        <?php foreach($_SESSION['cart'] as $key => $value){?>
        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/imgs/<?php echo $value['product_image'];?>">
                    <div>
                        <p><?php echo $value['product_name'];?></p>
                        <small><?php echo $value['product_price'];?><span>VNĐ</span></small>
                        <br>
                        <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value ="<?php echo $value['product_id']; ?>">
                        <input type="submit" name="remove_product" class="remove-btn" value="Remove"></input> 
                        </form>
                      </div>
                </div>
                
            </td>
            <td>
                
                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                  <input type="number" name = "product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                  <input type ="submit" class="edit-btn" value="edit" name="edit_quantity">

                </form>
                
            </td>
            <td>
                <span class="product-price"><?php echo $value['product_quantity']* $value['product_price'];?></span>
                <span>VNĐ</span>
            </td>
        </tr>

        <?php }?>
    </table>

    <div class ="cart-total">
      <table>
  

        <tr>
          <td>ToTal</td>
          <td><?php echo $_SESSION['total'];?>VND</td>
        </tr>
       
      </table>
</div>
    <div class="checkout-container">
      <form method = "POST" action="checkout.php">
      <input type="submit" class="btn checkout-btn" value="Checkout"  name = "checkout"></input>
      </form>
    </div>
</section>


<!-- Footer -->
<?php include('layouts/footer.php');?>