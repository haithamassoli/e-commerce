<?php
ob_start(); // Output Buffering Start
include "./includes/header.php";
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
require('admin/includes/connect.php');

//select products
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
if(isset($_GET["id"])){
@$comment_product_id  = $_GET["id"];
@$user_id = $_SESSION["user_id"];
@$comment = $_POST["review"];
@$rating = $_POST["rating"];

// @$product_rate = $_POST["product_rate"];
@$image = $_FILES["image"];
<<<<<<< HEAD
$sql = "SELECT * FROM products INNER JOIN categories ON products.product_categorie_id = categories.category_id WHERE product_id = {$_GET['id']}";
=======
$sql = "SELECT * FROM products WHERE product_id =$comment_product_id";
=======
$sql = "SELECT * FROM products INNER JOIN categories ON products.product_categorie_id = categories.category_id WHERE product_id = {$_GET['id']}";
>>>>>>> 358bb3de82d4e32eaa034744fa152e3e5a69904f
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
$result = mysqli_query($conn, $sql);
$product  = mysqli_fetch_all($result, MYSQLI_ASSOC);

//select comments
$sql = "SELECT * FROM comments INNER JOIN users ON comments.comment_user_id = users.user_id";
<<<<<<< HEAD
$result = mysqli_query($conn,$sql);
$comments  = mysqli_fetch_all($result,MYSQLI_ASSOC);

=======
<<<<<<< HEAD
$result = mysqli_query($conn,$sql);
$comments  = mysqli_fetch_all($result,MYSQLI_ASSOC);

=======
$result = mysqli_query($conn, $sql);
$comments  = mysqli_fetch_all($result, MYSQLI_ASSOC);
>>>>>>> 358bb3de82d4e32eaa034744fa152e3e5a69904f
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
//select related
$sql = "SELECT * FROM products WHERE product_tag='related'";
$result = mysqli_query($conn, $sql);
$related  = mysqli_fetch_all($result, MYSQLI_ASSOC);


//review
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["submit"])) {
	$check = 1;
	// Check file size
	if ($image["size"] > 500000 || $image["size"] == 0) {
		$imageError = "Sorry, your file is too large.";
		$check      = 0;
	}
	// Check if image file is a actual image or fake image
	$check_if_image = getimagesize($image["tmp_name"]);
	if ($check_if_image == false) {
		$imageError = "File is not an image.";
		$check = 0;
	}
	if ($check == 1) {
		$image_folder = "uploads/";
		$target_file  = $image_folder . uniqid() . basename($image["name"]);
		move_uploaded_file($image["tmp_name"], $target_file);
		$sql = "INSERT INTO `comments` (`comment`, `comment_image`, 
		`comment_product_id`,`comment_user_id`,`comment_rate`)
		VALUES ('$comment','$target_file',$comment_product_id,$user_id,$rating)";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		$conn->close();
		 redirect("product-detail.php?id={$comment_product_id}");
	}
}
}
// add to cart
if (isset($_POST["add_to_cart"])) {
	$ok = 1;
	if ($_POST['size'] == 0) {
		$sizeError = "you must choose size!";
		$ok = 0;
	}
	if ($ok == 1) {
		if (isset($_SESSION['cart'])) {
			$items = array_column($_SESSION["cart"], 'product_id');
			$size = array_column($_SESSION["cart"], 'size');
			if (in_array($_POST['add_to_cart_id'], $items)  && in_array($_POST['size'], $size)) {
				$_SESSION["cart"][$_POST['add_to_cart_id']  . $_POST['size']]["quantity"] += $_POST['num-product'];
				header("location:product-detail.php?id={$_GET['id']}");
			} else {
				$item_array = array(
					'product_id' => $_POST['add_to_cart_id'],
					'product_price' => $_POST['product_price'],
					'quantity' => $_POST['num-product'],
					'product_name' => $_POST['product_name'],
					'product_image' => $_POST['product_image'],
					'size' => $_POST['size']
				);
				$_SESSION["cart"][$_POST['add_to_cart_id'] . $_POST['size']] = $item_array;
				header("location:product-detail.php?id={$_GET['id']}");
			}
		} else {
			$item_array = array(
				'product_id' => $_POST['add_to_cart_id'],
				'product_price' => $_POST['product_price'],
				'quantity' => $_POST['num-product'],
				'product_name' => $_POST['product_name'],
				'product_image' => $_POST['product_image'],
				'size' => $_POST['size']
			);
			$_SESSION["cart"][$_POST['add_to_cart_id'] . $_POST['size']] = $item_array;
			header("location:product-detail.php?id={$_GET['id']}");
		}
	}
}
}
?>


<!-- breadcrumb -->
<div class="container mt-5">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="shop.php" class="stext-109 cl8 hov-cl1 trans-04">
			<?php echo $product[0]['category_name'] ?>
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			<?php echo $product[0]['product_name'] ?>
		</span>
	</div>
</div>

<?php foreach ($product as $key => $row) { ?>

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?php echo 'admin/' . $row["product_main_image"]; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo 'admin/' . $row["product_main_image"]; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo 'admin/' . $row["product_main_image"]; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="<?php echo 'admin/' . $row["product_desc_image_2"]; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo 'admin/' . $row["product_desc_image_2"]; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo 'admin/' . $row["product_desc_image_2"]; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="<?php echo 'admin/' . $row["product_desc_image_3"]; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo 'admin/' . $row["product_desc_image_3"]; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo 'admin/' . $row["product_desc_image_3"]; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="<?php echo 'admin/' . $row["product_nd_color_image"]; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo 'admin/' . $row["product_nd_color_image"]; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo 'admin/' . $row["product_nd_color_image"]; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<div class="item-slick3" data-thumb="<?php echo 'admin/' . $row["product_thd_color_image"]; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo 'admin/' . $row["product_thd_color_image"]; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo 'admin/' . $row["product_thd_color_image"]; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								<div class="item-slick3" data-thumb="<?php echo 'admin/' . $row["product_fourth_color_image"]; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo 'admin/' . $row["product_fourth_color_image"]; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo 'admin/' . $row["product_fourth_color_image"]; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<form method="POST">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							</h4>

							<span class="mtext-106 cl2">
								<?php echo $row["product_price"];  ?>
							</span>

							<p class="stext-102 cl3 p-t-23">
								<?php echo $row["product_description"];  ?>
							</p>

							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="size">
												<option value="0">Choose an option</option>
												<option value="S">Size S</option>
												<option value="M">Size M</option>
												<option value="L">Size L</option>
												<option value="XL">Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
										<span class="text-danger"><?php echo isset($sizeError) ? $sizeError : ""; ?></span>
									</div>
								</div>
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
										<a href="product-detail.php?id=<?php echo $row["product_id"];  ?>">
											<input type="hidden" name="add_to_cart_id" value="<?php echo $_GET['id']; ?>">
											<input type="hidden" name="product_name" value="<?php echo $product[0]['product_name']; ?>">
											<input type="hidden" name="product_image" value="<?php echo $product[0]['product_main_image']; ?>">
											<input type="hidden" name="product_price" value="<?php echo $row["product_price"]; ?>">
											<button type="submit" name="add_to_cart" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
												Add to cart
											</button>
										</a>
									</div>
								</div>
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</form>
					</div>
				</div>
			<?php } ?>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo $row["product_description"];  ?></p>
							</div>
						</div>

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
							
						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review --> 
										<?php foreach($comments as  $row){?>
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="<?php  echo $row["user_image"];  ?>" alt="AVATAR">
											</div>											
											<div class="size-207">												
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
													<?php  echo $row["user_name"];  ?>
													</span>
													<!-- <span class="fs-18 cl11">
<<<<<<< HEAD
=======
=======
						<?php foreach ($comments as $key => $row) { ?>
							<!-- - -->
							<div class="tab-pane fade" id="reviews" role="tabpanel">
								<div class="row">
									<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
										<div class="p-b-30 m-lr-15-sm">
											<!-- Review -->
											<div class="flex-w flex-t p-b-68">
												<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
													<img src="<?php echo $row["user_image"];  ?>" alt="AVATAR">
												</div>
												<div class="size-207">
													<div class="flex-w flex-sb-m p-b-17">
														<span class="mtext-107 cl2 p-r-20">
															<?php echo $row["user_name"];  ?>
														</span>
														<!-- <span class="fs-18 cl11">
>>>>>>> 358bb3de82d4e32eaa034744fa152e3e5a69904f
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star-half"></i>
													</span> -->

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
													<span class="fs-18 cl11">
														<?php 
															for($r = 1; $r <= $row["comment_rate"]; $r++){
																echo '<i class="zmdi zmdi-star"></i>';
<<<<<<< HEAD
															}
															for($e = 1; $e <= 5-$row["comment_rate"]; $e++){
																echo '<i class="item-rating pointer zmdi zmdi-star-outline"></i>';
															}													
														?>
														<input class="dis-none" type="number" name="rating">
													</span>
												</div>
=======
															}
															for($e = 1; $e <= 5-$row["comment_rate"]; $e++){
																echo '<i class="item-rating pointer zmdi zmdi-star-outline"></i>';
															}													
														?>
=======
														<span class="fs-18 cl11">
															<?php
															for ($r = 1; $r <= $row["comment_rate"]; $r++) {
																echo '<i class="fas fa-star"></i>';
															}
															for ($e = 1; $e <= 5 - $row["comment_rate"]; $e++) {
																echo '<i class="far fa-star"></i>';
															}
															?>
															<input class="dis-none" type="number" name="rating">
														</span>

													</div>
													<p class="stext-102 cl6">
														<?php echo $row["comment"];  ?>
													</p>
												</div>
											</div>

											<!-- Add review -->
											<form class="w-full" enctype="multipart/form-data" method="POST">
												<h5 class="mtext-108 cl2 p-b-7">
													Add a review
												</h5>

												<div class="flex-w flex-m p-t-50 p-b-23">
													<span class="stext-102 cl3 m-r-16">
														Your Rating
													</span>
													<span class="wrap-rating fs-18 cl11 pointer">
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
														<i class="item-rating pointer zmdi zmdi-star-outline"></i>
>>>>>>> 358bb3de82d4e32eaa034744fa152e3e5a69904f
														<input class="dis-none" type="number" name="rating">
													</span>
												</div>
<<<<<<< HEAD
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
												<p class="stext-102 cl6">
													<?php  echo $row["comment"];  ?>
												</p>
											</div> 
										</div>
										<?php } ?>
										<!-- Add review -->
										<?php 
										if (isset($_SESSION['type'])){
											if($_SESSION['type']== 0){
<<<<<<< HEAD
										?>
=======
										}?>
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
										<form class="w-full" enctype="multipart/form-data" method="POST">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>
												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>
<<<<<<< HEAD
=======
=======
>>>>>>> 358bb3de82d4e32eaa034744fa152e3e5a69904f
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d

												<div class="file-upload-wrapper" data-text="Select your file!">
												
													<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>
												<input name="image" type="file" class="file-upload-field" value="">

											</div></div>
										</div>
										<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" value="submit" name="submit">
											Submit
										</button>
										</form>
<<<<<<< HEAD
										<?php } }?>
									</div>
								</div>
							</div>
						</div>
=======
										<?php } ?>
									</div>
								</div>
							</div>
<<<<<<< HEAD
						</div>
=======
						<?php } ?>
>>>>>>> 358bb3de82d4e32eaa034744fa152e3e5a69904f
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>


			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php foreach ($related as $key => $row) { ?>
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="<?php echo 'admin/' . $row["product_main_image"];  ?>" alt="IMG-PRODUCT">

									<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
										Quick View
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $row["product_name"];  ?>
										</a>

										<span class="stext-105 cl3">
											<?php echo '$' . $row["product_price"];  ?>
										</span>
									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>


			
		</div>
	</section>
<<<<<<< HEAD
	<?php include "./includes/footer.php"; ?>
=======
	<?php include "./includes/footer.php"; ?>
<<<<<<< HEAD
=======
	<?php ob_end_flush(); // Release The Output
	?>
	<script>
		let y = document.getElementById("mydiv");
		y.style.background = 'blue';

		let color = ['red', 'green', 'blue'];
		let count = 0;
		y.addEventListener('click', function(event) {
			event.target.style.background = color[count];
			count++;
			if (count == color.length) {
				count = 0;
			}
		});
	</script>
>>>>>>> 358bb3de82d4e32eaa034744fa152e3e5a69904f
>>>>>>> 54abce7d00262b002468e78b45fb7e1016e1e18d
