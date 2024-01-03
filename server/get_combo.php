<?php
include ('connect.php');

        $stmt = $conn->prepare("SELECT * FROM products WHERE product_category ='combo' LIMIT 4");
        $stmt->execute();
        $combo_products = $stmt->get_result();
    



?>

