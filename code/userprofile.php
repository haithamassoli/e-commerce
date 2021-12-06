
<?php 
//start sesstion

session_start();

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
$sessionUse     ="";
if(isset($_SESSION['type'])){
   $sessionUser =$_SESSION['type'];
}
if(isset($_SESSION['type']) && $_SESSION['type']== 0){
  
//Connect
include ('admin/includes/connect.php');
include ('includes/header.php');
// Query
$sql = "SELECT * FROM users WHERE user_id='{$_SESSION["user_id"]}'";
$result = mysqli_query($conn, $sql);
$user  = mysqli_fetch_all($result,MYSQLI_ASSOC);
//print_r($user); 
?>
<head>
    <link rel="stylesheet" href="styling.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
     
</head>
<body class="profile-page">
    <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');"></div>
    <div class="main main-raised">
		<div class="profile-content">
            <div class="container">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img src="<?php echo $user[0]['user_image']?>" alt="photo">
	                        </div>
	                        <div class="name">
	                            <h3 class="title"><?php echo $user[0]['user_name']?></h3>
								<h6 class="created"><?php echo "Date created: ".$user[0]['user_creation_date']?></h6>
								
	                        </div>
	                    </div>
    	            </div>
                </div>
               
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<h5 class="personal">Personal Details</h5>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group f2">
							<label for="fullName" class="fullname">Full Name</label>
							<div class="borderDiv"><p><?php echo $user[0]['user_name']?></div> 
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group f f2">
							<label for="eMail">Email</label>
							<div class="borderDiv"><?php echo $user[0]['user_email']?></div> 
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group f2">
							<label for="phone">Phone</label>
							<div class="borderDiv"><?php echo $user[0]['user_mobile']?></div> 
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group f f2">
							<label for="website">Password</label>
							<div class="borderDiv"><?php echo $user[0]['user_password']?></div> 
						</div>
					</div>
				</div>
				<div class="row gutters">
					<!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Address</h6>
					</div> -->
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group f2">
							<label for="Street">Gender</label>
							<div class="borderDiv"><?php echo $user[0]['user_gender']?></div> 
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group f f2">
							<label for="ciTy">Location</label>
							<div class="borderDiv"><?php echo $user[0]['user_location']?> </div> 
						</div>
					</div>
					<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="sTate">State</label>
							<div class="borderDiv">ggg </div> 
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group f">
							<label for="zIp">Zip Code</label>
							<<div class="borderDiv">ggg </div> 
						</div>
					</div> -->


                    <div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right u">
							<button type="button" id="submit" name="submit" class="btn btn-primary">
                            <a class="bt" href="edituserprofile.php?do=edit&id=<?php echo $user[0]['user_id'] ?>"> Edit Profile </a>
                            </button>
						</div>
					                </div>
				                </div>
				            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	
	<footer class="footer text-center ">
       <!-- <p>Made with <a href="https://demos.creative-tim.com/material-kit/index.html" target="_blank">Material Kit</a> by Creative Tim</p>-->
    </footer>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
</body>
<?php 
} 
else {
    header('location:sign_in.php');
    exit();
} 
include ('includes/footer.php');
?>