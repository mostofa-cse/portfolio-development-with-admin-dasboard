<?php
include 'profilepic-process.php';
if (isset($_POST['submit'])) {
       $btn = $_POST['work_btn'];
       $download = $_POST['download'];
       $name = $_POST['name'];
       $demo = $_POST['demo'];
       $readmorelink = $_POST['readmorelink'];
       $image = $_FILES['image']['name'];
  	   $target = "images/".basename($image);
    $sql = "INSERT INTO work_tbl (work_btn,download,demo,image,name,readmorelink)VALUES('$btn','$download','$demo','$image','$name','$readmorelink')";
    if (mysqli_query($conn, $sql)) {
      header("location:work.php?msg=".urlencode("Data insert successfully"));
    }
     if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}
    else
    {
      die("Data update failed").mysqli_error($conn);
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Work Add</title>
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<!--------------------------------------------Top Navbar ---------------------------------------------------->
 <?php include 'top-nav.php';?>
<!---------------------------------------- /Top-nav ------------------------------------------->         
  <!-- /.navbar -->
  <!---------------------------------------- Main Sidebar Container ------------------------------------------->
<!-- Main Sidebar Container -->
<?php include 'aside-nav.php';?>
 <!-------------------------------------------- /Aside -------------------------------------------------------->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div id="edit" class="row mb-2 mt-5">
          <div class="col-sm-10  m-auto">
            <h4 class="m-0 text-dark text-center">Add New</h4>
             <hr>
            <a href="work.php" class="btn btn-warning float-right mb-3">Back</a>
             <div class="clearfix"></div>
             <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                      <label>Button Name</label>
                      <input class="form-control" name="work_btn">
                      </div>
                      <div class="form-group">
                      <label>Button</label>
                      <input class="form-control" name="name">
                      </div>
                      <div class="form-group">
                      <label>Button Image</label>
                      <input type="file" class="form-control" name="image">
                      </div>
                      <div class="form-group">
                      <label>Dwonload Link</label>
                      <textarea class="form-control" name="download"></textarea>
                      </div>
                      <div class="form-group">
                      <label>Demo Link</label>
                      <textarea class="form-control" name="demo"></textarea>
                      </div>
                      <div class="form-group">
                      <label>Demo Link</label>
                      <textarea class="form-control" name="readmorelink"></textarea>
                      </div>

                     <button type="submit" class="btn btn-primary btn-block mt-5" name="submit">Submit</button>
             </form>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <?php include 'footer.php';?>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
