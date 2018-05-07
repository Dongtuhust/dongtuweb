<?php
    //page will return true if the item not be exists in cart. return false if it be a part of cart or $id is incorrect
    session_start();
    $flag = 0;
    $id = $_GET["id"];
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
        $flag = 1;
    }
    echo $flag;
?>