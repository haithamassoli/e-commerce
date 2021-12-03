<?php
$conn = mysqli_connect("localhost", "root", "", "e_commerce");
if ($conn) {
    echo "connected";
} else {
    echo "failed";
}
function redirect($url)
{
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $check               = 1;
    $email               = strtolower($_POST["email"]);
    $password            = $_POST['password'];
    $emailError          = "";
    $passwordError       = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = ("$email is not a valid email address");
        $check = 0;
    }
    if ($email == "") {
        $check = 0;
        $emailError = "The email shouldn't be empty!";
    }
    if ($password == "") {
        $check = 0;
        $passwordError = "The email shouldn't be empty!";
    }
    if ($check == 1) {
        $check_exist = "SELECT * FROM users WHERE user_email = '$email'";
        $result = mysqli_query($conn, $check_exist);
        $data = mysqli_fetch_array($result, MYSQLI_NUM);
        if ($check_exist) {
            $sql = "SELECT * FROM users WHERE user_email = '$email'";
            $result = mysqli_query($conn, $sql);
            $users  = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($users as $user) {
                if ($email == $user["user_email"] && $password == $user["user_password"]) {
                    redirect("welcome.php");
                } else {
                    $error = "your email or password is wrong";
                }
            }
        } else {
            $error = "your email isnt exist please register";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SignIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/signing_style.css">
</head>

<body>

    <div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="images/registration-form-1.jpg" alt="">
            </div>
            <form method="POST" id="signup_form">
                <h3 id="login_h3">LogIn Now</h3>
                <div style="color: red;font-weight:bold;" id="pass2Help"><?php echo @$error ?></div>
                <div class="form-wrapper">
                    <input type="email" name="email" placeholder="Email Address" class="form-control" id="signin_email_input" required autofocus auto style="text-transform:lowercase">
                    <i class="zmdi zmdi-email"></i>
                    <div style="color: red;font-weight:bold;" id="emailHelp">
                        <div style="color: red;font-weight:bold;" id="pass2Help"><?php echo @$emailError ?></div>
                    </div>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control" id="signin_pass_input" required>
                    <i class="zmdi zmdi-lock"></i>
                    <div style="color: red;font-weight:bold;" id="passHelp">
                        <div style="color: red;font-weight:bold;" id="pass2Help"><?php echo @$passwordError ?></div>
                    </div>
                </div>
                <button id="signin_insignin_btn" type="submit">LogIn
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
    <script src="js/signing.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>