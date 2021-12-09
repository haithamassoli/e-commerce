<?php
include "./includes/header.php";

if (!isset($_SESSION["type"]) || $_SESSION["type"] == 0) {
  redirect('../index.php');
}
$sql = "SELECT * FROM users ";
$result = mysqli_query($conn, $sql);
$num_of_users = $result->num_rows;
?>
<?php
$sql = "SELECT * FROM unique_visitors";
$result = mysqli_query($conn, $sql);
$num_of_visitors = $result->num_rows;
$visitors = mysqli_fetch_all($result);
?>
<?php
if (isset($_SESSION['type'])) {
  if ($_SESSION["type"] == 2) {
    $id = $_SESSION["super_admin_id"];
  } else {
    $id = $_SESSION["admin_id"];
  }

  $sql    = "SELECT * FROM admins WHERE admin_id=$id ";
  $result = mysqli_query($conn, $sql);
  $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<?php
$sql = "SELECT * FROM (
  SELECT *
  FROM `comments`
  ORDER BY `comment_id` DESC
  LIMIT 5
) AS `comments` ORDER by comment_id ASC";
$result = mysqli_query($conn, $sql);
$last_comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php
$sql = "SELECT * FROM orders WHERE order_status='arrived'";
$result = mysqli_query($conn, $sql);
$last_comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
$completed = ($result->num_rows)
?>
<?php
$sql = "SELECT * FROM orders WHERE order_status='on delevery'";
$result = mysqli_query($conn, $sql);
$last_comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
$onDeliver = ($result->num_rows)
?>
<?php
$sql = "SELECT * FROM orders WHERE order_status='preparing'";
$result = mysqli_query($conn, $sql);
$last_comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
$preparing = ($result->num_rows)
?>
<?php
$sql = "SELECT * FROM orders WHERE order_status='blocked'";
$result = mysqli_query($conn, $sql);
$blocked_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
$blocked = ($result->num_rows)
?>
<!-- ! Main -->
<main class="main users chart-page" id="skip-target">
  <div class="container">
    <h2 class="main-title">Dashboard</h2>
    <div class="row stat-cards">
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num"><?php echo $num_of_users ?></p>
            <p class="stat-cards-info__title">Total signed users</p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num"><?php echo $num_of_visitors ?></p>
            <p class="stat-cards-info__title">Number of visitors</p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num"><?php echo $num_of_users ?></p>
            <p class="stat-cards-info__title">Total signed users</p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num"><?php echo $completed ?></p>
            <p class="stat-cards-info__title">Number of completed orders </p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num"><?php echo $onDeliver ?></p>
            <p class="stat-cards-info__title">Number of on delivering orders</p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num"><?php echo $preparing ?></p>
            <p class="stat-cards-info__title">Number of in preparing orders </p>
          </div>
        </article>
      </div>
      <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
          <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
          </div>
          <div class="stat-cards-info">
            <p class="stat-cards-info__num"><?php echo $blocked ?></p>
            <p class="stat-cards-info__title">Number of on blocked orders</p>
          </div>
        </article>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="users-table table-wrapper">
            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th>image</th>
                  <th>comment</th>
                  <th>user_id</th>
                  <th>product_id</th>
                  <th>date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($last_comments as $comment) {
                ?>
                  <tr>
                    <td>
                      <div class="categories-table-img">
                        <img src="<?php echo isset($comment['comment_image']) ? $comment['comment_image'] : "" ?>" alt="avc">
                      </div>
                      </label>
                    </td>
                    <td>
                      <?php echo isset($comment['comment']) ? $comment['comment'] : "" ?>
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <?php echo isset($comment['comment_user_id']) ? $comment['comment_user_id'] : "" ?>
                      </div>
                    </td>
                    <td><span class="badge-pending"><?php echo isset($comment['comment_product_id']) ? $comment['comment_product_id'] : "" ?></span></td>
                    <td><?php echo isset($comment['comment_date']) ? $comment['comment_date'] : "" ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</main>

<?php include "./includes/footer.php"; ?>