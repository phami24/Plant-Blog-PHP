<?php

include "/xampp/htdocs/e-project1/Config/conn.php";


$post_id = $_GET['id'];
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

            .modal-hide {
                display: none;
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

                <!-- <form action="../Back-End/Admin/update.php?topic_id=>"></form> -->



                <!-- Main content -->
                <div class="content mt-5">
                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Topics Controller</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="jsGrid1">
                                    <?php
                                    $sql = "SELECT * FROM topics WHERE post_id = '$post_id' AND status = 1";
                                    if ($result = mysqli_query($conn, $sql)) {
                                        $i = 0;
                                        if (mysqli_num_rows($result) >= 0) {
                                    ?>
                                            <table border=1 class="table table-striped-columns">
                                                <th>Topic ID </th>
                                                <th>Topic Name</th>
                                                <th>Image</th>
                                                <th><button type=button class='btn btn-info' data-bs-toggle='modal' data-bs-target='#createTopic'>Add</button></th>
                                                </tr>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $i++;
                                                    $topic_id = $row['topic_id'];
                                                ?>
                                                    <div class="modal fade" id="editImage<?php echo $row['topic_id'] ?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Image</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeBtn" onclick="resetModal()"></button>
                                                                </div>
                                                                <div class="modal-body ">
                                                                    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                        Add Image
                                                                    </button>
                                                                    <div class="row">
                                                                        <?php
                                                                        $sql1 = "SELECT * FROM topics_img WHERE topic_id = '$topic_id' and status = 1";
                                                                        $result1 = mysqli_query($conn, $sql1);
                                                                        if (mysqli_num_rows($result1) > 0) {
                                                                            while ($topic_img = mysqli_fetch_assoc($result1)) {
                                                                                if ($topic_img['img_url'] != 'null') {
                                                                                    $topic_img_id = $topic_img['topic_img_id'];
                                                                        ?>

                                                                                    <div class="col-4">
                                                                                        <div class="card" id="editImgForm<?php echo $topic_img_id ?>" style="width: 18rem; max-height:100%">
                                                                                            <img style="max-height:30vh ; min-height:30vh ;" src="../Admin/img/<?php echo $topic_img['img_url']; ?>" class="card-img-top" alt="<?php echo $topic_img['img_url']; ?>">
                                                                                            <div class="card-body">
                                                                                                <!-- Button trigger modal -->
                                                                                                <input style="display:none;" type="text" value="<?php echo $topic_img_id ?>" id="topic_img_id1">
                                                                                                <button id="updateImg<?php echo $topic_img_id ?>" type="button" class="btn btn-primary" onclick="showUpdateForm">
                                                                                                    Update
                                                                                                </button>
                                                                                                <a href="../Back-End/Admin/delete.php?id=<?php echo $post_id ?>&topic_img_id=<?php echo $topic_img_id ?>" class="btn btn-danger">Delete</a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-hide m-2" id="updateForm<?php echo $topic_img_id ?>">
                                                                                            <form action="../Back-End/Admin/update.php?id=<?php echo $post_id ?>&topic_img_id=<?php echo $topic_img_id ?>" method="post" enctype="multipart/form-data">
                                                                                                <div class="col-4 m-2">
                                                                                                    <div class="card" id="editImgForm<?php echo $topic_img_id ?>" style="width: 18rem; max-height:100%">
                                                                                                        <img id="blah<?php echo $topic_img_id ?>" style="max-height:30vh ; min-height:30vh ;">
                                                                                                        <div class="card-body">
                                                                                                            <label class="btn btn-success" for="myFileInput<?php echo $topic_img_id ?>">Choose Image</label>
                                                                                                            <input style="display: none;" type="file" name="topics_img" id="myFileInput<?php echo $topic_img_id ?>" onchange="readURL(this)">
                                                                                                            <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                                                                                                <button type="button" id="cancel<?php echo $topic_img_id ?>" class="btn btn-secondary">Cancel</button>
                                                                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                            <script>
                                                                                                function readURL(input) {
                                                                                                    if (input.files && input.files[0]) {
                                                                                                        var reader = new FileReader();
                                                                                                        var img = input.parentNode.querySelector('img');

                                                                                                        reader.onload = function(e) {
                                                                                                            img.setAttribute('src', e.target.result);
                                                                                                        };

                                                                                                        reader.readAsDataURL(input.files[0]);
                                                                                                    }
                                                                                                }
                                                                                            </script>
                                                                                        </div>
                                                                                    </div>

                                                                                    <script>
                                                                                        var btnUpdateForm = document.getElementById('updateImg<?php echo $topic_img_id ?>');
                                                                                        btnUpdateForm.addEventListener('click', hideUpdateForm);


                                                                                        var btnClose = document.getElementById('closeBtn');
                                                                                        btnClose.addEventListener('click', resetModal);

                                                                                        var btnCancel = document.getElementById('cancel<?php echo $topic_img_id ?>');
                                                                                        btnCancel.addEventListener('click', resetModal);

                                                                                        function hideUpdateForm() {
                                                                                            var updateForm = document.getElementById('updateForm<?php echo $topic_img_id ?>');
                                                                                            var editImgForm = document.getElementById('editImgForm<?php echo $topic_img_id ?>');
                                                                                            updateForm.classList.remove('modal-hide');
                                                                                            editImgForm.classList.add('modal-hide');
                                                                                        }

                                                                                        function resetModal() {
                                                                                            var updateForm = document.getElementById('updateForm<?php echo $topic_img_id ?>');
                                                                                            var editImgForm = document.getElementById('editImgForm<?php echo $topic_img_id ?>');
                                                                                            editImgForm.classList.remove('modal-hide');
                                                                                            updateForm.classList.add('modal-hide');
                                                                                        }
                                                                                    </script>

                                                                        <?php
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Image</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="../Back-End/Admin/create.php?id=<?php echo $post_id ?>&topic_id=<?php echo $row['topic_id'] ?>" method="post" enctype="multipart/form-data">
                                                                        <label for=""></label>
                                                                        <input type="file" name="topics_img">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Add</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <td> <?php echo $i ?></td>
                                                    <td> <?php echo $row['topic_name'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editImage<?php echo $row['topic_id'] ?>">
                                                            Edit Image
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#editTopic<?php echo $row['topic_id'] ?>">
                                                            Edit Topic
                                                        </button>
                                                        <div class="modal fade " id="editTopic<?php echo $row['topic_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Topic</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="../Back-End/Admin/update.php?id=<?php echo $post_id ?>&topic_id=<?php echo $row['topic_id'] ?>" method="post" enctype="multipart/form-data">
                                                                            <table>
                                                                                <tr>
                                                                                    <th><label style="float: left;" for="">Topic Name</label></th>
                                                                                    <th><input type="text" style="width:300px ; float:left;" name="topic_name" value="<?php echo $row['topic_name']?>" required></th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><label for="content">Content</label></td>
                                                                                    <td><textarea style="float:left;" name="content" id="content" cols="80" rows="10"><?php echo  $row['content'] ?></textarea></td>
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
                                                        <a href='../Back-End/Admin/delete.php?id=<?php echo $post_id ?>&topic_id=<?php echo $row['topic_id'] ?>'>
                                                            <button type=button class='btn btn-danger btn-xs'>Delete</button>
                                                        </a>
                                                    </td>

                                                    </tr>
                                                <?php } ?>
                                            </table>
                                    <?php
                                        } else {
                                            echo "Không có bản ghi nào được tìm thấy.";
                                        }
                                    } else {
                                        echo "ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($conn);
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.content -->
                </div>
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


            <div class="modal fade" id="createTopic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Post</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../Back-End/Admin/create.php?id=<?php echo $post_id ?>" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td><label style="float: left;" for="">Topic Name</label></td>
                                        <td><input type="text" style="width:300px ; float:left;" name="topic_name" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="content">Content</label></td>
                                        <td><textarea style="float:left;" name="content" id="" cols="80" rows="10"></textarea></td>
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