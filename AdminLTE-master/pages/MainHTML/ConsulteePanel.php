<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || (!isset($_SESSION["role"])) || $_SESSION["role"] !== "consultee"){
    header("location: index.php");
    exit;
}

$con = new mysqli("localhost", "root", "", "consuling center");

    if($con->connect_error){
        die("Connection failed: " .$con->connect_error);
    } else {
        $stmt = $con->prepare("select FirstName, LastName, Email, Gender, DateOfBirth, PhoneNumber, Assets from consultee where email = ?");
        $stmt->bind_param("s",  $_SESSION["email"]);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $data = $stmt_result->fetch_assoc();
        $DateOfBirth = $data["DateOfBirth"];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($DateOfBirth), date_create($today));
    }
    // $name = $con->prepare("select FirstName, LastName, Email from consultant where email=?");
    // $name->bind_param("s", $_SESSION["email"]);
    // $name->execute();
    // $name_result = $name->get_result();
    // $data1 = $name_result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/satin.min.css">
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
      <!-- Navbar -->

      <nav
        class="main-header navbar navbar-expand-md navbar-light navbar-white"
      >
        <div class="container">
          <a href="index.php" class="navbar-brand">
            <img
              src="../../dist/img/Let'sTalkLogo2.png"
              alt="Let's Talk Logo"
              class="brand-image img-circle elevation-3"
              style="width: 50px;"
            />
            <span class="brand-text font-weight-light">Let's Talk</span>
          </a>

          <button
            class="navbar-toggler order-1"
            type="button"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="contact-us.php" class="nav-link">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  id="dropdownSubMenu1"
                  href="#"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  class="nav-link dropdown-toggle"
                  >Easier Access</a
                >
                <ul
                  aria-labelledby="dropdownSubMenu1"
                  class="dropdown-menu border-0 shadow"
                >
                  <li>
                    <a href="ConsultantRegister.php" class="dropdown-item">Consultant Registeration </a>
                  </li>
                  <li>
                    <a href="ConsultantLogin.php" class="dropdown-item">Consultant Login</a>
                  </li>
                  <li>
                    <a href="ConsulteeRegister.php" class="dropdown-item"
                      >Consultee Registration</a
                    >
                  </li>
                  <li>
                    <a href="ConsulteeLogin.php" class="dropdown-item"
                      >Consultee Login</a
                    >
                  </li>
                  <li class="dropdown-divider"></li>
                </ul>
              </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
              <div class="input-group input-group-sm">
                <input
                  class="form-control form-control-navbar"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
                />
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
              </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $data['FirstName']." ".$data['LastName'];?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Information</li>
                  <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="ConsulteePanel.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
          </ul>
        </nav>
        </ul>

      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="pick-consultant.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Consultant Members
              </p>
            </a>
          </li>
        </ul>
      


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>

        </div>

      </div>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">

          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo $data['FirstName']." ".$data['LastName'];?></h3>
                <ul class="list-group list-group-unbordered mb-3">
                  
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right"><?php echo $data['Gender'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Age</b> <a class="float-right"><?php echo $diff->format('%y'); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Date of Birth</b> <a class="float-right"><?php echo $data['DateOfBirth']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right"><?php echo $data['PhoneNumber']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email Adress</b> <a class="float-right"><?php echo $data['Email']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Wallet</b> <a class="float-right"><?php echo $data['Assets']; ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h3>Your Assets</h3>
                <div class="form-group">
                  <label>Put some money on your wallet:</label>
                  <form action="registration/consulteewallet.php" method="post">
                    <div class="input-group">
                        <input type="text" name="Assets" class="form-control" required/>
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-wallet"></i></div>
                        </div>
                    </div>
                </div>
                <input type="submit" name="Update" value="Submit!" class="btn btn-primary btn-block"/>
              </form>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <h3>History</h3>
                <div class="card-body p-0">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Consultant Name</th>
                        <th>Consultant Email</th>
                        <th>Phone Number</th>
                        <th>Date/Time</th>
                        <th>Financial</th>
                        <th></th>
                      </tr>
                    </thead>
                    
                    <?php
                    //made history for consultee panel that shows all the booking
                    $con = mysqli_connect("localhost", "root", "", "consuling center");
                    //Natural join
                    $query = "select * from attends_to,consultant where consultant.email = attends_to.Consultant_Email and  attends_to.Consultee_Email = '".$_SESSION['email']."'";

                    
                    $result = mysqli_query($con, $query) or die(mysqli_error());
                    while($row=mysqli_fetch_array($result)):
                    
                    ?>
                    <tbody>

                      <tr>
                  
                        <td><?php echo $row[4]." ".$row[5];?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[8] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        
                    </tbody>
                    <?php endwhile; ?>
                  </table>
                  
                </div>
                
                <!-- /.card-body -->
              </div>
              
                    </div>
                    
                    <!-- /.post -->
                  </div>



                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.1.1
    </div>
    <strong>Copyright &copy;2021 <a>Let's Talk</a>.</strong> All rights reserved. By SaTin
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- satin App -->
<script src="../../dist/js/satin.min.js"></script>

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- satin App -->
<script src="../../dist/js/satin.min.js"></script>
</body>
</html>