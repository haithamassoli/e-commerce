<?php
//header
include("includes/header.php");
//connect
include('includes/connect.php');
//select product from database
$sql = "SELECT * FROM products INNER JOIN categories ON categories.category_id = products.product_categorie_id  INNER JOIN admins ON admins.admin_id  = products.product_admin_id INNER JOIN users ON users.user_id   = products.product_user_id  ";
$result = mysqli_query($conn, $sql);
$product  = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET["do"])) {
  $do = $_GET["do"];
  $product_name = '';
  $product_description = '';
  $product_price = '';
  $product_quantity = '';
  $product_rate = '';
  $product_desc_image_1 = '';


  $product_name = $_POST["product_name"];
  $product_description = $_POST["product_description"];
  $product_price = $_POST["product_price"];
  $product_quantity = $_POST["product_quantity"];
  $product_rate = $_POST["product_rate"];
  $product_desc_image_1 = $_POST["product_desc_image_1"];
  $product_desc_image_2 = ($_POST["product_desc_image_2"]);
  $product_desc_image_3 = ($_POST["product_desc_image_3"]);
  $product_tag = ($_POST["product_tag"]);


  //Add Product
  if ($do == 'add') {
    //select product from database
    $add = "INSERT INTO products ( product_name, product_description, product_price, product_quantity, product_rate,
          product_desc_image_1, product_desc_image_2, product_desc_image_3, product_tag, product_size, product_color) 
          VALUES ('$product_name', '$product_description', '$product_price', '$product_quantity', '$product_rate',
          '$product_desc_image_1', '$product_desc_image_2', '$product_desc_image_3', '$product_tag', '$product_size', '$product_color')";
    if (mysqli_query($conn, $add)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $add . "<br>" . mysqli_error($conn);
    }
  }
  //product_name, product_description, product_price, product_quantity, product_rate,
  //product_desc_image_1, product_desc_image_2, product_desc_image_3, product_tag, product_size, product_color
  //Edit Product
  if ($do == 'edit') {
  }
  //Delete Product
  if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    $delete = "DELETE FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $delete);
    echo $delete;
    if (mysqli_query($conn, $delete)) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
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
                      <input type="text" name="product_name" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
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
                      <input type="text" name="product_description" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
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
                      <input type="number" name="product_price" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
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
                      <input type="number" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 "></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>product_rate</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input type="text" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 "></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>product_desc_image_1</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input type="text" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 "></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>product_desc_image_2</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input type="text" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 "></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>product_desc_image_3</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input type="text" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
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
                      <input type="text" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 "></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>product_size</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input type="text" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 "></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>product_color</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input type="text" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 "></div>
                    </div>
                  </div>
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
<?php }
if (!isset($_GET['do'])) { ?>
  <!-- start table -->
  <div class="row">
    <div class="col-lg-12">
      <div class="users-table table-wrapper">
        <table class="table table-striped" id="table1">

          <thead>
            <tr class="users-table-info">
              <th>
                <label class="users-table__checkbox ms-20">
                  <input type="checkbox" class="check-all">product_main_image
                </label>
              </th>
              <th>product_name</th>
              <th>product_description</th>
              <th>product_price</th>
              <th>product_quantity </th>
              <th>product_rate</th>
              <th>product_desc_image_1</th>
              <th>product_desc_image_2</th>
              <th>product_desc_image_3</th>
              <th>product_tag</th>
              <th>product_categorie_id</th>
              <th>product_admin_id </th>
              <th>product_user_id </th>
              <th> </th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($product as $key => $row) { ?>
              <tr>
                <td>
                  <label class="users-table__checkbox">
                    <input type="checkbox" class="check">
                    <div class="categories-table-img">
                      <picture>
                        <source srcset="<?php echo $row['product_main_image'];  ?>" type="image/webp"><img src="<?php echo $product['product_main_image']; ?>" alt="category">
                      </picture>
                    </div>
                  </label>
                </td>
                <td>
                  <?php echo $row['product_name'];
                  echo $row['product_id']; ?>
                </td>
                <td>
                  <?php echo $row['product_description']; ?>
                </td>
                <td><span class="badge-pending"><?php echo $row['product_price']; ?></span></td>
                <td><?php echo $row['product_quantity']; ?></td>
                <td><?php echo $row['product_rate']; ?></td>
                <td><?php echo $row['product_desc_image_1']; ?></td>
                <td><?php echo $row['product_desc_image_2']; ?></td>
                <td><?php echo $row['product_desc_image_3']; ?></td>
                <td><?php echo $row['product_tag']; ?></td>
                <td><?php echo $row['product_categorie_id']; ?></td>
                <td><?php echo $row['product_admin_id']; ?></td>
                <td><?php echo $row['product_user_id']; ?></td>
                <td>
                  <span class="p-relative">
                    <button class="dropdown-btn transparent-btn" type="button" title="More info">
                      <div class="sr-only">More info</div>
                      <i data-feather="more-horizontal" aria-hidden="true"></i>
                    </button>
                    <ul class="users-item-dropdown dropdown">
                      <li><a href="manage_products.php?do=edit&id=<?php echo $row['product_id'] ?>">Edit</a></li>
                      <li><a href="##">Quick edit</a></li>
                      <li><a href="manage_products.php?delete=<?php echo $row['product_id'] ?>">Trash</a></li>
                    </ul>
                  </span>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php   }  ?>
<!-- end table -->
<?php include "./includes/footer.php"; ?>