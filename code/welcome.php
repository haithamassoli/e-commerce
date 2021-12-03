<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:error.php');
    exit;
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

<body style="background-color: #009688;">
    <h1 style="margin: auto;text-align:center;margin-top: 350px; color:white;"><span style="font-weight: bolder; font-size:100px;">Welcome</span> Our User </h1>
</body>

</html>