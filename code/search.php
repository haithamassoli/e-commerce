<?php
include "includes/header.php";
include "./admin/includes/functions.php";
if ($_GET["search"]) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR product_description LIKE '%$search%' OR product_price LIKE '%$search%' OR product_tag LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r($products);
    } else {
        redirect("error.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>