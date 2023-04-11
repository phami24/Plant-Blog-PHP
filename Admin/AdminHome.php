<?php
include "/xampp/htdocs/e-project1/Config/conn.php";

$sql = "SELECT COUNT(post_id) as post_total from post";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
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
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
            <a href="#" class="d-block">Alexander Pierce</a>
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
                  <a href="./index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="navbar-brand" href="test.html" style="color: white">
                <span class="ms-lg-5" style="font-weight:bold;">
                  <ion-icon name="exit-outline"></ion-icon>
                  <span class="pb-1">
                    Exit
                  </span>
                </span>
              </a>
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
                $sql = "SELECT post.post_id, post.title, post_category.post_category_name, post.status FROM post INNER JOIN post_category ON post.post_category_id = post_category.post_category_id ORDER BY post_id LIMIT $start, $limit";
                if ($result = mysqli_query($conn, $sql)) {
                  if (mysqli_num_rows($result) > 0) {
                    echo "<table border=1>";
                    echo "<th>Post ID</th>";
                    echo "<th>Title</th>";
                    echo "<th>Post Type</th>";
                    echo "<th>Status</th>";
                    echo "<th><button type=button class='btn btn-info' data-toggle='modal' data-target='#myModal'>Add</button></th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                      echo " ";
                      echo "<td>" . $row['post_id'] . "</td>";
                      echo "<td>" . $row['title'] . "</td>";
                      echo "<td>" . $row['post_category_name'] . "</td>";
                      echo "<td>" . $row['status'] . "</td>";
                      echo "<td><a href=''>
                    <button type=button class='btn btn-success btn-xs'>Update</button></a>
                <a href=''>
                <button type=button class='btn btn-danger btn-xs'>Delete</button>
                </a></td>";
                      echo "</tr>";
                    }
                    echo "</table>" . "<br>";
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

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021
        <a href="AdminHome.php">AdminPanel</a>.</strong>
      All rights reserved.
    </footer>
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
</body>

</html>