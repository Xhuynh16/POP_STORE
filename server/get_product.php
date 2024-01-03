<?php
include ('connect.php');


        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $product = $stmt->get_result();

?> 
