<?php include "./includes/header.php"; ?>
<?php
$admin_name = "";
$admin_email = "";
$admin_password = "";
$admin_type = "";
// Function 
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
$sql = "SELECT * FROM admins";
$result = mysqli_query($conn, $sql);
$admins  = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r($admins);
//Delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM admins WHERE admin_id = $id";
  $result = mysqli_query($conn, $delete);
  if (mysqli_query($conn, $delete)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  redirect("manage_admins.php");
}


//Edit
if (isset($_GET['do'])) {
  $do = $_GET["do"];
  if ($do == "edit") {
    $id = $_GET["id"];
    $sql = "SELECT * FROM admins WHERE admin_id =$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //print_r($row);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $check = 1;
      $admin_name = ($_POST["admin_name"]);
      $admin_email = strtolower($_POST["admin_email"]);
      $admin_password = ($_POST["admin_password"]);
      $admin_type = ($_POST["admin_type"]);

      if ($admin_name == "") {
        $nameErr = ("The name shouldn't be empty");
        $check = 0;
      }

      if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = ("$admin_email is not a valid email address");
        $check = 0;
      }

      if ($admin_email == "") {
        $check = 0;
        $emailErr = "The email shouldn't be empty!";
      }
      if ($admin_password == "") {
        $check = 0;
        $passwordErr = "The password shouldn't be empty!";
      }
      if ($admin_type == "") {
        $check = 0;
        $typeErr = "The type shouldn't be empty!";
      }
      /* elseif(!$admin_type==1 || $admin_type==0){
        $admin_type = $_POST["admin_type"];
      }
      else {
        $typeErr=" The type value should be 0 or 1 ";
      } */

      if ($admin_type != '0' || '1') {
        $typeErr = " The type value should be 0 or 1 ";
      }

      if ($check == 1) {
        $sql2 = "UPDATE admins SET admin_name = '$admin_name', admin_email='$admin_email', admin_password = '$admin_password' , admin_type='$admin_type' WHERE admin_id = '$id'";
        if ($conn->query($sql2) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
        $conn->close();
        redirect("manage_admins.php");
      }
    }
  }


  //Add 
  else if ($do == "add") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $check = 1;
      $admin_name = ($_POST["admin_name"]);
      $admin_email = strtolower($_POST["admin_email"]);
      $admin_password = ($_POST["admin_password"]);
      $admin_type = ($_POST["admin_type"]);
      if ($admin_name == "") {
        $nameErr = ("The name shouldn't be empty");
        $check = 0;
      }

      if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = ("$admin_email is not a valid email address");
        $check = 0;
      }

      if ($admin_email == "") {
        $check = 0;
        $emailErr = "The email shouldn't be empty!";
      }
      if ($admin_password == "") {
        $check = 0;
        $passwordErr = "The password shouldn't be empty!";
      }
      if ($admin_type == "") {
        $check = 0;
        $typeErr = "The type shouldn't be empty!";
      }
      if ($admin_type == 1 || $admin_type == 0) {
        $check = 1;
      } else {
        $typeErr = " The type value should be 0 or 1 ";
        $check = 0;
      }


      if ($check == 1) {
        $sql = "INSERT INTO `admins` (`admin_name`,`admin_email`,`admin_password`, `admin_type`) VALUES ('$admin_name','$admin_email','$admin_password','$admin_type')";
        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $conn->close();
        redirect("manage_admins.php");
      }
    }
  }

?>

  <!-- start form -->

  <div class="col-md-6 col-12 offset-3">

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Manage Admins</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form class="form form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <label>Name</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input name="admin_name" type="text" class="form-control col-9 mb-2" placeholder="Name" value="<?php if ($do == "edit") {
                                                                                                                        echo $row['admin_name'];
                                                                                                                      } ?>" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 ">
                        <i class="bi bi-person" style="position: absolute; top:-10px; left: -20px;"></i>
                      </div>
                      <div style="color:red"><?php echo @$nameErr;  ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Email</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input name="admin_email" type="email" class="form-control col-9 mb-2" placeholder="Email" value="<?php if ($do == "edit") {
                                                                                                                          echo $row['admin_email'];
                                                                                                                        } ?>" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">

                      <div class="form-control-icon col-3">
                        <i class="bi bi-envelope" style="position: absolute; top:-10px; left: -20px;"></i>
                      </div>
                      <div style="color:red"><?php echo @$emailErr;  ?></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <label>Password</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input name="admin_password" type="password" class="form-control col-9 mb-2" placeholder="Password" value="<?php if ($do == "edit") {
                                                                                                                                    echo $row['admin_password'];
                                                                                                                                  }

                                                                                                                                  ?>" style="border: 1px solid #dce7f1 !important;">
                      <div class="form-control-icon col-3">
                        <i class="bi bi-lock" style="position: absolute; top:-10px; left: -20px;"></i>
                      </div>
                      <div style="color:red"><?php echo @$passwordErr;  ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Type</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input name="admin_type" type="number" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" placeholder="Type" value="<?php if ($do == "edit") {
                                                                                                                                                                        echo $row['admin_type'];
                                                                                                                                                                      } ?>">

                      <div class="form-control-icon col-3">
                        <i class="bi bi-phone" style="position: absolute; top:-10px; left: -20px;"></i>
                      </div>
                      <div style="color:red"><?php echo @$typeErr;  ?></div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-8 offset-md-4">
                  <div class='form-check'>
                    <div class="checkbox">
                      <input type="checkbox" id="checkbox2" class='form-check-input' checked>
                      <label for="checkbox2">Remember Me</label>
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
<?php
}
$conn->close();
?>

<!--  here -->
<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
<link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/app.css">
<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">

<?php
if (!isset($_GET['do'])) { ?>
  <main class="main users chart-page" id="skip-target">
    <div class="container">

      <!-- end form -->

      <!-- start table -->
      <div class="row">
        <div class="col-lg-12">
          <div class="users-table table-wrapper">
            <table class="table table-striped" id="table1">
              <button class="btn btn-primary" style="float: right;margin:10px 50px 0px 10px;">
                <a href="manage_admins.php?do=add">Add Admin </a>
              </button>
              <thead>
                <tr class="users-table-info">
                  <!-- <th>
              <label class="users-table__checkbox ms-20">
                <input type="checkbox" class="check-all">Thumbnail
              </label>
            </th>  -->
                  <th>Admin_ID</th>
                  <th>Admin_Name</th>
                  <th>Admin_Email</th>
                  <th>Admin_Password</th>
                  <th>Type</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($admins as $key => $admin) { ?>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-img">
                          <?php echo isset($admin['admin_id']) ? $admin['admin_id'] : ''; ?>
                        </div>
                      </label>
                    </td>
                    <td>
                      <?php echo isset($admin['admin_name']) ? $admin['admin_name'] : ''; ?>
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <?php echo isset($admin['admin_email']) ? $admin['admin_email'] : ''; ?>
                      </div>
                    </td>
                    <td><span class="badge-pending"><?php echo isset($admin['admin_password']) ? $admin['admin_password'] : ''; ?> </span></td>
                    <td><?php echo isset($admin['admin_type']) ? $admin['admin_type'] : ''; ?></td>
                    <td>
                      <div class="table-data-feature">
                        <button class="btn btn-success" title="edit">
                          <a href="manage_admins.php?do=edit&id=<?php echo $admin['admin_id'] ?>"> Edit </a>
                        </button>
                        <button class="btn btn-danger" title="delete">
                          <a href="manage_admins.php?delete=<?php echo $admin['admin_id'] ?>"> Delete </a>
                        </button>
                      </div>
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
<?php } ?>

<?php include "./includes/footer.php"; ?>