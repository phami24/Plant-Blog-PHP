<?php

include "/xampp/htdocs/e-project1/Config/conn.php";

$sql = "SELECT COUNT(post_id) as post_total from post where status != 3";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

session_start();
if (isset($_SESSION['id'])) {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      h1 {
        text-align: center;
      }

      table {
        width: 100%;
      }

      th,
      td {
        text-align: center;
        padding: 5px;
      }

      .pagination a {
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;

      }

      .pagination a.active {
        background-color: green;
        color: white;
      }

      div.pagination {
        float: right;
      }

      .pagination a:hover {
        background-color: lightgreen;
      }
    </style>
  </head>
  <!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link ms-2" data-widget="pushmenu" style="font-size: 20px;" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->

        <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">GardenWorld</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="../Admin/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Admin Controller</a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Action
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../Front-End/View/HomePage.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Go to Page</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../Back-End/Admin/logout.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Exit</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2 d-flex justify-content-center">
              <div class="col-sm-6">
                <h1 class="m-0">Admin Home Page</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content mt-5">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title text-bold text-lg">Total Posts</h3>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-center">
                      <p class="d-flex flex-column">

                        <span class="text-bold text-lg">
                          <?php
                          echo $data['post_total'];
                          ?>
                        </span>
                      </p>
                    </div>
                    <!-- /.d-flex -->
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col-md-6 -->

              <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
          </div>
          <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post Controller</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="jsGrid1">
                  <?php
                  include "/xampp/htdocs/e-project1/Config/conn.php";
                  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                  $limit = 10;
                  $result_row = mysqli_query($conn, 'select count(post_id) as total from post Where status = 1');
                  $row = mysqli_fetch_assoc($result_row);
                  $total_records = $row['total'];
                  $total_page = ceil($total_records / $limit);
                  if ($current_page > $total_page) {
                    $current_page = $total_page;
                  } else if ($current_page < 1) {
                    $current_page = 1;
                  }
                  $start = ($current_page - 1) * $limit;
                  ?>
                  <?php
                  $sql = "SELECT post.post_id, post.title, post_category.post_category_name, post.status FROM post INNER JOIN post_category ON post.post_category_id = post_category.post_category_id AND status != 3  ORDER BY post_id DESC LIMIT $start,$limit ";
                  $sql_id_total = "SELECT COUNT(post.post_id) AS id_total FROM post INNER JOIN post_category  ON post.post_category_id = post_category.post_category_id AND status != 3  ORDER BY post_id DESC ";
                  $result_id_total = mysqli_query($conn, $sql_id_total);
                  $id_total = mysqli_fetch_assoc($result_id_total);
                  $i = 0;
                  if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                  ?>
                      <table border=1 class="table table-striped-columns">
                        <th>Post ID</th>
                        <th>Title</th>
                        <th>Post Type</th>
                        <th>Status</th>
                        <th>
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#createPost">
                            Add
                          </button>
                        </th>

                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                          if ($i <= $id_total['id_total'] && $current_page == 1) {
                            $i++;
                            $id = $i;
                          }
                          if ($i <= $id_total['id_total']  && $current_page > 1) {
                            $i++;
                            $id = $i + $current_page * 10 - 10;
                          }
                        ?>
                          <td><?php echo $id;  ?></td>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['post_category_name']; ?> </td>
                          <td><?php echo $row['status']; ?></td>
                          <?php
                          if ($row['status'] == 1) {
                          ?>
                            <td>
                              <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editPost<?php echo $row['post_id'] ?>">
                                Edit Post
                              </button>
                              <div class="modal fade" id="editPost<?php echo $row['post_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="../Back-End/Admin/update.php?id=<?php echo $row['post_id']?>" method="post" enctype="multipart/form-data">
                                        <table>
                                          <tr>
                                            <td><label style="float: left;" for="">Title</label></td>
                                            <td><input type="text" style="width:300px ; float:left;" name="title" required></td>
                                          </tr>
                                          <tr>
                                            <td><label style="float: left;" for="post_img">Post Image</label></td>
                                            <td><input style="float: left;" type="file" name="post_img"></td>
                                          </tr>
                                          <tr>
                                            <td><label style="float: left;" for="">Post Type</label></td>
                                            <td>
                                              <select style="float: left;" name="post_category_id" required>
                                                <?php
                                                $sql3 = "SELECT * FROM post_category";
                                                $result3 = mysqli_query($conn, $sql3);
                                                if (mysqli_num_rows($result3) > 0) {
                                                  while ($post_category = mysqli_fetch_assoc($result3)) {
                                                ?>
                                                    <option value="<?php echo $post_category['post_category_id'] ?>"><?php echo $post_category['post_category_name'] ?></option>
                                                <?php

                                                  }
                                                }
                                                ?>
                                              </select>
                                            </td>
                                          </tr>
                                        </table>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save And Change</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <a href='../Admin/edit.php?id=<?php echo $row['post_id'] ?>'>
                                <button type=button class='btn btn-success btn-xs'>Edit Topic</button>
                              </a>
                              <a href='../Back-End/Admin/hideshow.php?id=<?php echo $row['post_id'] ?>&page=<?php echo $current_page ?>'>
                                <button type=button class='btn btn-warning btn-xs'>Hide</button>
                              </a>
                              <a href='../Back-End/Admin/delete.php?id=<?php echo $row['post_id'] ?>&page=<?php echo $current_page ?>'>
                                <button type=button class='btn btn-danger btn-xs'>Delete</button>
                              </a>
                            </td>
                            </tr>
                          <?php
                          } else { ?>
                            <td>
                              <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editPost<?php echo $row['post_id'] ?>">
                                Edit Post
                              </button>
                              <div class="modal fade" id="editPost<?php echo $row['post_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="../Back-End/Admin/create.php" method="post" enctype="multipart/form-data">
                                        <table>
                                          <tr>
                                            <td><label style="float: left;" for="">Title</label></td>
                                            <td><input type="text" style="width:300px ; float:left;" name="title" required></td>
                                          </tr>
                                          <tr>
                                            <td><label style="float: left;" for="post_img">Post Image</label></td>
                                            <td><input style="float: left;" type="file" name="post_img"></td>
                                          </tr>
                                          <tr>
                                            <td><label style="float: left;" for="">Post Type</label></td>
                                            <td>
                                              <select style="float: left;" name="post_category_id" required>
                                                <?php
                                                $sql3 = "SELECT * FROM post_category";
                                                $result3 = mysqli_query($conn, $sql3);
                                                if (mysqli_num_rows($result3) > 0) {
                                                  while ($post_category = mysqli_fetch_assoc($result3)) {
                                                ?>
                                                    <option value="<?php echo $post_category['post_category_id'] ?>"><?php echo $post_category['post_category_name'] ?></option>
                                                <?php

                                                  }
                                                }
                                                ?>
                                              </select>
                                            </td>
                                          </tr>
                                        </table>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save And Change</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <a href='../Admin/edit.php?id=<?php echo $row['post_id'] ?>'>
                                <button type=button class='btn btn-success btn-xs'>Edit Topic</button>
                              </a>
                              <a href='../Back-End/Admin/hideshow.php?id=<?php echo $row['post_id'] ?>&page=<?php echo $current_page ?>'>
                                <button type=button class='btn btn-primary btn-xs'>Show</button>
                              </a>
                              <a href='../Back-End/Admin/delete.php?id=<?php echo $row['post_id'] ?>&page=<?php echo $current_page ?>'>
                                <button type=button class='btn btn-danger btn-xs'>Delete</button>
                              </a>
                            </td>
                            </tr>
                        <?php
                          }
                        }
                        ?>
                      </table><br>
                  <?php
                    } else {
                      echo "Không có bản ghi nào được tìm thấy.";
                    }
                  } else {
                    echo "ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($conn);
                  }

                  ?>
                </div>
                <div class="pagination">
                  <?php
                  if ($total_page > 1) {

                    if ($current_page > 1 && $total_page > 1) {
                      echo '<a href="AdminHome.php?page=' . ($current_page - 1) . '">Prev</a>';
                    }

                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++) {
                      // Nếu là trang hiện tại thì hiển thị thẻ span
                      // ngược lại hiển thị thẻ a
                      if ($i == $current_page) {
                        echo '<a class="active">' . $i . '</a>';
                      } else {
                        echo '<a href="AdminHome.php?page=' . $i . '">' . $i . '</a>';
                      }
                    }
                    // echo $current_page + 1;
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($current_page < $total_page && $total_page > 1) {
                      echo '<a href="AdminHome.php?page=' . ($current_page + 1) . '">Next</a>';
                    }
                  }
                  ?>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.content -->
          <!-- /.content-wrapper -->

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->


        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE -->
        <script src="dist/js/adminlte.js"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard3.js"></script>
        <div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="../Back-End/Admin/create.php" method="post" enctype="multipart/form-data">
                  <table>
                    <tr>
                      <td><label style="float: left;" for="">Title</label></td>
                      <td><input type="text" style="width:300px ; float:left;" name="title" required></td>
                    </tr>
                    <tr>
                      <td><label style="float: left;" for="post_img">Post Image</label></td>
                      <td><input style="float: left;" type="file" name="post_img"></td>
                    </tr>
                    <tr>
                      <td><label style="float: left;" for="">Post Type</label></td>
                      <td>
                        <select style="float: left;" name="post_category_id" required>
                          <?php
                          $sql3 = "SELECT * FROM post_category";
                          $result3 = mysqli_query($conn, $sql3);
                          if (mysqli_num_rows($result3) > 0) {
                            while ($post_category = mysqli_fetch_assoc($result3)) {
                          ?>
                              <option value="<?php echo $post_category['post_category_id'] ?>"><?php echo $post_category['post_category_name'] ?></option>
                          <?php

                            }
                          }
                          ?>
                        </select>
                      </td>
                    </tr>
                  </table>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
  </body>

  </html>
<?php
} else {
  header("location:../Admin/login_admin.php");
  exit();
}



?>