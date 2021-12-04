<?php
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
//header
include "./includes/header.php";
 //connect
include('../connect.php');
//select product from database
$sql = "SELECT * FROM products INNER JOIN categories ON categories.category_id = products.product_categorie_id";
$result = mysqli_query($conn,$sql);
$product  = mysqli_fetch_all($result,MYSQLI_ASSOC);

//Delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM products WHERE product_id = $id";
  $result = mysqli_query($conn, $delete);
  if (mysqli_query($conn, $delete)) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
  }

  redirect("manage_products.php");
}

//Edit
if (isset($_GET['do'])) {
  $do = $_GET["do"];
  @$product_name = $_POST["product_name"];
  @$product_description = $_POST["product_description"];
  @$product_price = $_POST["product_price"];
  @$product_quantity = $_POST["product_quantity"];
  @$product_rate = $_POST["product_rate"];
  @$product_main_image = $_POST["product_main_image"];
  @$product_desc_image_1 = $_POST["product_desc_image_1"];
  @$product_desc_image_2 = $_POST["product_desc_image_2"];
  @$product_desc_image_3 = $_POST["product_desc_image_3"];
  @$product_tag = $_POST["product_tag"];
  @$product_categorie_id = $_POST["categorieid"];

  $check = 1;
  if ($do == "edit") {
      $id = $_GET["id"];
      $sql = "SELECT * FROM products WHERE product_id =$id";
      $edit = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($edit, MYSQLI_ASSOC);
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $check = 1;
          $image = $_FILES["mainimage"];
          $image1 = $_FILES["image1"];
          $image2 = $_FILES["image2"];
          $image3 = $_FILES["image3"];
          // Check file size
          if ($image["size"] > 500000 || $image["size"] == 0) {
              $imageError = "Sorry, your file is too large.";
              $check      = 0;
          }
          if ($image1["size"] > 500000 || $image1["size"] == 0) {
            $imageError = "Sorry, your file is too large.";
            $check      = 0;
        }
        if ($image2["size"] > 500000 || $image2["size"] == 0) {
          $imageError = "Sorry, your file is too large.";
          $check      = 0;
      }
      if ($image3["size"] > 500000 || $image3["size"] == 0) {
        $imageError = "Sorry, your file is too large.";
        $check      = 0;
    }
       // Check if image file is a actual image or fake image
          // $check_if_image = getimagesize($image["tmp_name"]);
          // if ($check_if_image == false) {
          //     $imageError = "File is not an image.";
          //     $check = 0;
          // }
          if ($check == 1) {
              $image_folder = "../admin/uploads/";
              $target_file  = $image_folder . uniqid() . basename($image["name"]);
              $target_file1 = $image_folder . uniqid() . basename($image1["name"]);
              $target_file2 = $image_folder . uniqid() . basename($image2["name"]);
              $target_file3 = $image_folder . uniqid() . basename($image3["name"]);
              move_uploaded_file($image["tmp_name"], $target_file);
              move_uploaded_file($image1["tmp_name"], $target_file1);
              move_uploaded_file($image2["tmp_name"], $target_file2);
              move_uploaded_file($image3["tmp_name"], $target_file3);
              $sql2 = "UPDATE products SET product_name = '$product_name', product_description='$product_description',
                      product_price ='$product_price', product_quantity='$product_quantity',product_rate='$product_rate',
                      product_main_image= '$target_file', product_desc_image_1 ='$target_file1', product_desc_image_2='$target_file2',
                      product_desc_image_3='$target_file3', product_tag= '$product_tag'
                      WHERE product_id = '$id'";
              if ($conn->query($sql2) === TRUE) {
                  echo "New record created successfully";
              } else {
                  echo "Error: " . $sql2 . "<br>" . $conn->error;
              }
              $conn->close();
              redirect("manage_products.php");
          }
      }
  }
  // Add
  else if ($do == "add") {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $check = 1;
          $image = $_FILES["mainimage"];
          $image1 = $_FILES["image1"];
          $image2 = $_FILES["image2"];
          $image3 = $_FILES["image3"];
          // Check file size
          if ($image["size"] > 500000 || $image["size"] == 0) {
            $imageError = "Sorry, your file is too large.";
            $check      = 0;
            }
            if ($image1["size"] > 500000 || $image1["size"] == 0) {
              $imageError = "Sorry, your file is too large.";
              $check      = 0;
          }
          if ($image2["size"] > 500000 || $image2["size"] == 0) {
            $imageError = "Sorry, your file is too large.";
            $check      = 0;
          }
          if ($image3["size"] > 500000 || $image3["size"] == 0) {
            $imageError = "Sorry, your file is too large.";
            $check      = 0;
          }
          // // Check if image file is a actual image or fake image
          // $check_if_image = getimagesize($image["tmp_name"]);
          // if ($check_if_image == false) {
          //     $imageError = "File is not an image.";
          //     $check = 0;
          // }
          if ($check == 1) {
            $image_folder = "../admin/uploads/";
            $target_file  = $image_folder . uniqid() . basename($image["name"]);
            $target_file1 = $image_folder . uniqid() . basename($image1["name"]);
            $target_file2 = $image_folder . uniqid() . basename($image2["name"]);
            $target_file3 = $image_folder . uniqid() . basename($image3["name"]);
            move_uploaded_file($image["tmp_name"], $target_file);
            move_uploaded_file($image1["tmp_name"], $target_file1);
            move_uploaded_file($image2["tmp_name"], $target_file2);
            move_uploaded_file($image3["tmp_name"], $target_file3);
             $sql = "INSERT INTO `products` (`product_name`, `product_description`, `product_price`, `product_quantity`, 
            `product_main_image`, `product_desc_image_1`, `product_desc_image_2`, `product_desc_image_3`,
            `product_tag`, `product_categorie_id`) VALUES ('$product_name', '$product_description', $product_price,
             $product_quantity, '$target_file', '$target_file1', '$target_file2', '$target_file3', 
             '$product_tag', 	$product_categorie_id)";            
             if (mysqli_query($conn, $sql)) {
              echo "New record created successfully";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
              $conn->close();
              redirect("manage_products.php");
          }
      }
  }
?>
 <!-- start form -->
<div class="col-md-6 col-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Add products :</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal" enctype="multipart/form-data" method="POST">
          <div class="form-body">
            <div class="row">
              <div class="col-md-4">
                <label>product_name</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="text" name="product_name" class="form-control col-9 mb-2"  style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>
                    product_description
                </label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="text" name="product_description" class="form-control col-9 mb-2"  style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>product_price</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="number" name="product_price" class="form-control col-9 mb-2"  style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>product_quantity</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="number" name="product_quantity" class="form-control col-9 mb-2"  style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>product image</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                  <input name="mainimage" class="mt-2 p-2" type="file"/>
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>product image_1</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                  <input name="image1" class="mt-2 p-2" type="file" />
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>product image_2</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                  <input name="image2" class="mt-2 p-2" type="file" />
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>product image_3</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                  <input name="image3" class="mt-2 p-2" type="file" />
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>product_tag</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="text" name="product_tag" placeholder="Separate Tags With Comma (,)" class="form-control col-9 mb-2"  style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                    <div class="form-control-icon col-3 "></div>
                  </div>
                </div>
              </div>
                <div class="col-md-4">
                <label>categorie</label>
              </div>
              <div class="col-md-8">
              <select name="categorieid">
                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $sql);
                    $categories  = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($categories as $categorie) { ?>
                        <option value="<?php echo $categorie['category_id']  ?>">
                            <?php echo $categorie["category_name"]; ?>
                        </option>
                    <?php  } ?>
                </select>
              </div>
              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- end form -->
<?php
}
$conn->close();
if (!isset($_GET['do'])) {
?>
<main class="main users chart-page" id="skip-target">
<div class="container">
<!-- start table -->
<div class="row">
  <div class="col-lg-12">
    <div class="users-table table-wrapper">
      <table class="table table-striped" id="table1">
      <a href="manage_products.php?do=add" class="btn btn-success" style="float: right;margin:10px 50px 0px 10px;">Add Product</a>
        <thead>
          <tr class="users-table-info">
            <th>
              <label class="users-table__checkbox ms-20">
                <input type="checkbox" class="check-all">image
              </label>
            </th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>quantity	</th>
            <th>rate</th>
            <th>image_1</th>
            <th>image_2</th>
            <th>image_3</th>
            <th>tag</th>
            <th>categorie_id</th>
            <th> </th> 

          </tr>
        </thead>
        <tbody>
        <?php foreach($product as $key => $row){?>   
          <tr>
            <td>
              <label class="users-table__checkbox">
                <input type="checkbox" class="check">
                <div class="categories-table-img">
                  <picture>
                  <source srcset="<?php echo isset($row['product_main_image']) ? $row['product_main_image'] : ''; ?>" type="image/webp">
                    <img src="<?php echo isset($row['product_main_image']) ? $row['product_main_image'] : ''; ?>" alt="ff">
                  </picture>   
                </div>
              </label>
            </td>
            <td>
            <?php echo isset($row['product_name']) ? $row['product_name'] : ''; ?>
            </td>
            <td>
              <?php echo isset($row['product_description']) ? $row['product_description'] : ''; ?>
            </td>
            <td><span class="badge-pending"><?php echo isset($row['product_price']) ? $row['product_price'] : ''; ?></span></td>
            <td><?php echo isset($row['product_quantity']) ? $row['product_quantity'] : ''; ?></td>
            <td><?php echo isset($row['product_rate']) ? $row['product_rate'] : ''; ?></td>
            <td><img src="<?php echo isset($row['product_desc_image_1']) ? $row['product_desc_image_1'] : ''; ?>" alt="ff" style='width:50px; height:50px;'></td>
            <td><img src="<?php echo isset($row['product_desc_image_2']) ? $row['product_desc_image_2'] : ''; ?>" alt="ff" style='width:50px; height:50px;'></td>
            <td><img src="<?php echo isset($row['product_desc_image_3']) ? $row['product_desc_image_3'] : ''; ?>" alt="ff" style='width:50px; height:50px;'></td>
            <td><?php echo isset($row['product_tag']) ? $row['product_tag'] : ''; ?></td>
            <td><?php echo isset($row['product_categorie_id']) ? $row['product_categorie_id'] : ''; ?></td>
            <td>
            <a href="manage_products.php?do=edit&id=<?php echo $row['product_id']; ?>" class="btn btn-secondary">Edit</a>
            <a href="manage_products.php?delete=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <?php } ?>   
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</main>
<?php   }  ?>
<!-- end table -->
<?php include "./includes/footer.php"; ?>