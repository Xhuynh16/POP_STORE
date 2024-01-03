<?php
include ('connect.php');


        $stmt = $conn->prepare("SELECT * FROM products WHERE product_category ='story' LIMIT 4");
        $stmt->execute();
        $story_products = $stmt->get_result();

?> 