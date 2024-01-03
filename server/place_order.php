<?php

    session_start();
    include('connect.php');

    if(!isset($_SESSION['logged_in'])){
        header('location: ../checkout.php?message="VUI LÒNG ĐĂNG NHẬP TRƯỚC KHI ĐẶT HÀNG"');
       exit;
    }else{

    if(isset($_POST['place_order'])){

        //1. lấy thông tin người dùng và lưu vào dababase
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_cost = $_SESSION['total'];
        $order_status = "Chưa thanh toán";
        $user_id = $_SESSION['user_id'];
        $order_date = date('Y-m-d H:i:s');


        $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
                        VALUE (?,?,?,?,?,?,?); ");
        $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);
        
        $stmt_status = $stmt->execute();
         if(!$stmt_status){
            header('location: index.php');
            exit;
         }
        //2. lưu trữ thông tin đơn hàng vào database   
        $order_id = $stmt->insert_id;

        
        
        //3. lấy sản phẩm từ giỏ hàng
    
        foreach($_SESSION['cart'] as $key => $value){


            $product = $_SESSION['cart'] [$key];
            $product_id = $product['product_id'];
            $product_name = $product['product_name'];
            $product_image = $product['product_image'];
            $product_price = $product['product_price'];
            $product_quantity = $product['product_quantity'];
      

            //4.lưu trữ sản phẩm trong order_items
            $stmt1 = $conn->prepare("INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
                                VALUE (?,?,?,?,?,?,?,?) ");
            $stmt1->bind_param('iissiiis',$order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);
            $stmt1->execute();
            
        
        }




        //5. xóa mọi sản phẩm trong giỏ hàng (cho đến khi thanh toán xong)

        // unset($_SESSION['cart']);


        //6.thông báo cho người dùng đặt hàng thành công hoặc gặp lỗi
    
        header('location: ../payment.php?order_status="ĐẶT HÀNG THÀNH CÔNG"');
    
    }
 
}
?>