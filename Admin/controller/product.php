<?php
    require_once "../interface/interfaceDb.php";
    require_once "../interface/interfaceClass.php";
    require_once "../db.conn.php";
    require_once "../classes/Product.php";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])&& !isset($_GET['product_id'])){
        $product_name = $_POST["product_name"];
        $product_category = $_POST["product_category"];
        $product_decription = $_POST["product_decription"];
        $product_price = $_POST["product_price"];
        $product_special_offer = $_POST["product_special_offer"];
        $product_color = $_POST["product_color"];
        $product_image = $_POST["files"];

        $product = new Product();
        $data = array(
        "product_name"=> $product_name,
        "product_category"=> $product_category,
        "product_description"=> $product_decription,
        "product_price"=> $product_price,
        "product_special_offer"=> $product_special_offer,
        "product_color"=> $product_color,
        "product_image"=> $product_image[0],
        "product_image2"=> $product_image[1],
        "product_image3"=> $product_image[2],
        "product_image4"=> $product_image[3]

    );
        $product->Create($data);
        header("Location: ../index.php");
    }
    else if(isset($_GET['delete'])){
        $product_id = $_GET['id'];
        $product = new Product();
        $product->Delete($product_id);
        header("Location: ../index.php");
    }
    else{
        $product_id = $_POST["product_id"];
        $product_name = $_POST["product_name"];
        $product_category = $_POST["product_category"];
        $product_decription = $_POST["product_decription"];
        $product_price = $_POST["product_price"];
        $product_special_offer = $_POST["product_special_offer"];
        $product_color = $_POST["product_color"];
        $product = new Product();
        $data = array(
            "product_name"=> $product_name,
            "product_category"=> $product_category,
            "product_description"=> $product_decription,
            "product_price"=> $product_price,
            "product_special_offer"=> $product_special_offer,
            "product_color"=> $product_color,
        );
        $product->Update($product_id, $data);
        header("Location: ../index.php");
    }
 ?>