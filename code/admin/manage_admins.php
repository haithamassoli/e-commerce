<?php include "./includes/header.php"; ?>
<!-- start form -->
<div class="col-md-6 col-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Horizontal Form with Icons</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form class="form form-horizontal">
          <div class="form-body">
            <div class="row">
              <div class="col-md-4">
                <label>Name</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="text" class="form-control col-9 mb-2" placeholder="Name" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                    <div class="form-control-icon col-3 ">
                      <i class="bi bi-person" style="position: absolute; top:-10px; left: -20px;"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>Email</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="email" class="form-control col-9 mb-2" placeholder="Email" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                    <div class="form-control-icon col-3">
                      <i class="bi bi-envelope" style="position: absolute; top:-10px; left: -20px;"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>Mobile</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="number" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" placeholder="Mobile">
                    <div class="form-control-icon col-3">
                      <i class="bi bi-phone" style="position: absolute; top:-10px; left: -20px;"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <label>Password</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative row justify-content-center align-items-center d-flex">
                    <input type="password" class="form-control col-9 mb-2" placeholder="Password" style="border: 1px solid #dce7f1 !important;">
                    <div class="form-control-icon col-3">
                      <i class="bi bi-lock" style="position: absolute; top:-10px; left: -20px;"></i>
                    </div>
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
<!-- end form -->
<!-- start table -->
<div class="row">
  <div class="col-lg-12">
    <div class="users-table table-wrapper">
      <table class="table table-striped" id="table1">
        <thead>
          <tr class="users-table-info">
            <th>
              <label class="users-table__checkbox ms-20">
                <input type="checkbox" class="check-all">Thumbnail
              </label>
            </th>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <label class="users-table__checkbox">
                <input type="checkbox" class="check">
                <div class="categories-table-img">
                  <picture>
                    <source srcset="./img/categories/01.webp" type="image/webp"><img src="./img/categories/01.jpg" alt="category">
                  </picture>
                </div>
              </label>
            </td>
            <td>
              Starting your traveling blog with Vasco
            </td>
            <td>
              <div class="pages-table-img">
                <picture>
                  <source srcset="./img/avatar/avatar-face-04.webp" type="image/webp"><img src="./img/avatar/avatar-face-04.png" alt="User Name">
                </picture>
                Jenny Wilson
              </div>
            </td>
            <td><span class="badge-pending">Pending</span></td>
            <td>17.04.2021</td>
            <td>
              <span class="p-relative">
                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                  <div class="sr-only">More info</div>
                  <i data-feather="more-horizontal" aria-hidden="true"></i>
                </button>
                <ul class="users-item-dropdown dropdown">
                  <li><a href="##">Edit</a></li>
                  <li><a href="##">Quick edit</a></li>
                  <li><a href="##">Trash</a></li>
                </ul>
              </span>
            </td>
          </tr>
          <tr>
            <td>
              <label class="users-table__checkbox">
                <input type="checkbox" class="check">
                <div class="categories-table-img">
                  <picture>
                    <source srcset="./img/categories/02.webp" type="image/webp"><img src="./img/categories/02.jpg" alt="category">
                  </picture>
                </div>
              </label>
            </td>
            <td>
              Start a blog to reach your creative peak
            </td>
            <td>
              <div class="pages-table-img">
                <picture>
                  <source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name">
                </picture>
                Annette Black
              </div>
            </td>
            <td><span class="badge-pending">Pending</span></td>
            <td>23.04.2021</td>
            <td>
              <span class="p-relative">
                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                  <div class="sr-only">More info</div>
                  <i data-feather="more-horizontal" aria-hidden="true"></i>
                </button>
                <ul class="users-item-dropdown dropdown">
                  <li><a href="##">Edit</a></li>
                  <li><a href="##">Quick edit</a></li>
                  <li><a href="##">Trash</a></li>
                </ul>
              </span>
            </td>
          </tr>
          <tr>
            <td>
              <label class="users-table__checkbox">
                <input type="checkbox" class="check">
                <div class="categories-table-img">
                  <picture>
                    <source srcset="./img/categories/03.webp" type="image/webp"><img src="./img/categories/03.jpg" alt="category">
                  </picture>
                </div>
              </label>
            </td>
            <td>
              Helping a local business reinvent itself
            </td>
            <td>
              <div class="pages-table-img">
                <picture>
                  <source srcset="./img/avatar/avatar-face-02.webp" type="image/webp"><img src="./img/avatar/avatar-face-02.png" alt="User Name">
                </picture>
                Kathryn Murphy
              </div>
            </td>
            <td><span class="badge-active">Active</span></td>
            <td>17.04.2021</td>
            <td>
              <span class="p-relative">
                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                  <div class="sr-only">More info</div>
                  <i data-feather="more-horizontal" aria-hidden="true"></i>
                </button>
                <ul class="users-item-dropdown dropdown">
                  <li><a href="##">Edit</a></li>
                  <li><a href="##">Quick edit</a></li>
                  <li><a href="##">Trash</a></li>
                </ul>
              </span>
            </td>
          </tr>
          <tr>
            <td>
              <label class="users-table__checkbox">
                <input type="checkbox" class="check">
                <div class="categories-table-img">
                  <picture>
                    <source srcset="./img/categories/04.webp" type="image/webp"><img src="./img/categories/04.jpg" alt="category">
                  </picture>
                </div>
              </label>
            </td>
            <td>
              Caring is the new marketing
            </td>
            <td>
              <div class="pages-table-img">
                <picture>
                  <source srcset="./img/avatar/avatar-face-05.webp" type="image/webp"><img src="./img/avatar/avatar-face-05.png" alt="User Name">
                </picture>
                Guy Hawkins
              </div>
            </td>
            <td><span class="badge-active">Active</span></td>
            <td>17.04.2021</td>
            <td>
              <span class="p-relative">
                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                  <div class="sr-only">More info</div>
                  <i data-feather="more-horizontal" aria-hidden="true"></i>
                </button>
                <ul class="users-item-dropdown dropdown">
                  <li><a href="##">Edit</a></li>
                  <li><a href="##">Quick edit</a></li>
                  <li><a href="##">Trash</a></li>
                </ul>
              </span>
            </td>
          </tr>
          <tr>
            <td>
              <label class="users-table__checkbox">
                <input type="checkbox" class="check">
                <div class="categories-table-img">
                  <picture>
                    <source srcset="./img/categories/01.webp" type="image/webp"><img src="./img/categories/01.jpg" alt="category">
                  </picture>
                </div>
              </label>
            </td>
            <td>
              How to build a loyal community online and offline
            </td>
            <td>
              <div class="pages-table-img">
                <picture>
                  <source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name">
                </picture>
                Robert Fox
              </div>
            </td>
            <td><span class="badge-active">Active</span></td>
            <td>17.04.2021</td>
            <td>
              <span class="p-relative">
                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                  <div class="sr-only">More info</div>
                  <i data-feather="more-horizontal" aria-hidden="true"></i>
                </button>
                <ul class="users-item-dropdown dropdown">
                  <li><a href="##">Edit</a></li>
                  <li><a href="##">Quick edit</a></li>
                  <li><a href="##">Trash</a></li>
                </ul>
              </span>
            </td>
          </tr>
          <tr>
            <td>
              <label class="users-table__checkbox">
                <input type="checkbox" class="check">
                <div class="categories-table-img">
                  <picture>
                    <source srcset="./img/categories/03.webp" type="image/webp"><img src="./img/categories/03.jpg" alt="category">
                  </picture>
                </div>
              </label>
            </td>
            <td>
              How to build a loyal community online and offline
            </td>
            <td>
              <div class="pages-table-img">
                <picture>
                  <source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name">
                </picture>
                Robert Fox
              </div>
            </td>
            <td><span class="badge-active">Active</span></td>
            <td>17.04.2021</td>
            <td>
              <span class="p-relative">
                <button class="dropdown-btn transparent-btn" type="button" title="More info">
                  <div class="sr-only">More info</div>
                  <i data-feather="more-horizontal" aria-hidden="true"></i>
                </button>
                <ul class="users-item-dropdown dropdown">
                  <li><a href="##">Edit</a></li>
                  <li><a href="##">Quick edit</a></li>
                  <li><a href="##">Trash</a></li>
                </ul>
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end table -->
<?php include "./includes/footer.php"; ?>