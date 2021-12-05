<?php
include("includes/header.php");
include("admin/includes/connect.php");
?>
<?php

// echo "Connected successfully";
$sql = "SELECT * FROM categories WHERE category_name='Women' OR category_name='Men' ";
$result = mysqli_query($conn, $sql);
$cat  = mysqli_fetch_all($result, MYSQLI_ASSOC);
//   print_r($cat);
?>


<!-- photo Slider -->
<section class="section-slide">
	<div class="wrap-slick1 rs2-slick1">
		<div class="slick1">
			<div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-05.jpg);" data-thumb="images/thumb-01.jpg" data-caption="Women’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Women Collection 2018
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								New arrivals
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-06.jpg);" data-thumb="images/thumb-02.jpg" data-caption="Men’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Men New-Season
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								Jackets & Coats
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-07.jpg);" data-thumb="images/thumb-03.jpg" data-caption="Men’s Wear">
				<div class="container h-full">
					<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
							<span class="ltext-202 txt-center cl0 respon2">
								Men Collection 2018
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
							<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
								NEW SEASON
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
							<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="wrap-slick1-dots p-lr-10"></div>
	</div>
</section>

<!-- Banner -->
<div class="sec-banner bg0 p-t-95 p-b-55">
	<div class="container">
		<div class="row">

			<?php foreach ($cat as $val) {   ?>
				<div class="col-md-6 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="<?php echo $val['category_image'];  ?>" alt="IMG-BANNER">

						<a href="shop.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?php echo $val['category_name'];  ?>
								</span>

								<span class="block1-info stext-102 trans-04">
									<?php echo $val['category_description'];  ?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

			<?php   } ?>

			<?php

			$sql = "SELECT * FROM categories WHERE category_name='Wotches' OR category_name='Bags' OR category_name='Accessories'";
			$result = mysqli_query($conn, $sql);
			$cat2  = mysqli_fetch_all($result, MYSQLI_ASSOC);
			// print_r($cat2);

			foreach ($cat2 as $val) {   ?>
				<div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
					<div class="block1 wrap-pic-w">
						<img src="<?php echo $val['category_image'];  ?>" alt="IMG-BANNER">

						<a href="shop.php" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?php echo $val['category_name'];  ?>
								</span>

								<span class="block1-info stext-102 trans-04">
									<?php echo $val['category_description'];  ?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php   } ?>
		</div>

	</div>
</div>



<!-- News section  -->

<section class="bg0 p-t-23 p-b-130">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				New Items
			</h3>
		</div>

		<!-- block two  -->
		<!-- connectto  sql  -->
		<?php

		$sql = "SELECT * FROM products WHERE product_tag='new' ";
		$result = mysqli_query($conn, $sql);
		$product  = mysqli_fetch_all($result, MYSQLI_ASSOC);

		?>

		<div class="row isotope-grid">

			<!-- first image  -->
			<?php foreach ($product as $val) {     ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item sales">
					<!-- Block2 -->

					<div class="block2">
						<div class="block2-pic hov-img0 label-new" data-label="New">
							<img src="<?php echo $val['product_main_image'];  ?>" alt="IMG-PRODUCT">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $val["product_name"]   ?>
								</a>

								<span class="stext-105 cl3">
									<?php echo $val["product_description"]   ?>
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
			<?php  }  ?>

		</div>


	</div>
</section>


<!-- sales section  -->

<section class="bg0 p-t-23 p-b-130">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				Items On Sale
			</h3>
		</div>

		<!-- block two  -->
		<!-- connectto  sql  -->
		<?php

		$sql = "SELECT * FROM products WHERE product_tag='sales' ";
		$result = mysqli_query($conn, $sql);
		$product  = mysqli_fetch_all($result, MYSQLI_ASSOC);

		?>

		<div class="row isotope-grid">

			<!-- first image  -->
			<?php foreach ($product as $val) {     ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item sales">
					<!-- Block2 -->

					<div class="block2">
						<div class="block2-pic hov-img0 ">
							<div style="width:15%;height:5vh;border-radius:50px;background-color:red;text-align:center;position:absolute ;padding-top:10px;color:white;font-weight:bold"> 50% </div>
							<img src="<?php echo $val['product_main_image'];  ?>" alt="IMG-PRODUCT">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $val["product_name"]   ?>
								</a>

								<span class="stext-105 cl3">
									<?php echo $val["product_description"]   ?>
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
			<?php  }  ?>

		</div>


	</div>
</section>



<?php include("includes/footer.php");
?>