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
        $stmt = $con->prepare("select FirstName, LastName, Email, Assets from consultee where email = ?");
        $stmt->bind_param("s",  $_SESSION["email"]);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $data = $stmt_result->fetch_assoc();
        
        
    }
//Made the function that check ur wallet
function checkwallet($fee,$assets){
  if ($fee<$assets){
    return True;
  }
  else{
    return False;
  }
}
if (isset($_POST['consultantemail'])) {
  $stmt = $con->prepare("select Email,Role1 from consultant where Email = ?");
  $stmt->bind_param("s",  $_POST["consultantemail"]);
  $stmt->execute();
  $stmt_result = $stmt->get_result();
  $data2 = $stmt_result->fetch_assoc();
  session_start();
  $_SESSION['POST'] = $_POST;
  if($data2['Role1']=='Adult'){
    if(checkwallet(250,$data['Assets'])){
      
      header("location:./PickTime.php");
    }
    else{
      echo "<script>alert('Your money does not enough! Put some money on your wallet')</script>";
    }
  }
  elseif($data2['Role1']=='Teen'){
    if(checkwallet(200,$data['Assets'])){
      header("location:./PickTime.php");
    }
    else{
      echo "<script>alert('Your money does not enough! Put some money on your wallet')</script>";
    }

  }
  elseif($data2['Role1']=='Child'){
    if(checkwallet(150,$data['Assets'])){
      header("location:./PickTime.php");
    }
    else{
      echo "<script>alert('Your money does not enough! Put some money on your wallet')</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consultant Member</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/satin.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
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

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Information</li>
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
        
        <nav class="mt-2">

        </nav>

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
            <h1>Contacts</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <?php
              $con = mysqli_connect("localhost", "root", "", "consuling center");
              $query = "select * from consultant";
              $result = mysqli_query($con, $query) or die(mysqli_error());
              //Calculate Age
              $today = date("Y-m-d");
              while($row=mysqli_fetch_array($result)):
                $diff = date_diff(date_create($row[5]), date_create($today));
              // If the consultant is Female put Female Picture otherwise put Male Picture
                if($row[2] == "Female"){
                  $img = "../../dist/img/female.jpg";
                }
                else{
                  $img = "../../dist/img/male.jpg";
                }

            ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <?php echo $row[6]. "'s Consultant"; ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $row[0].' '.$row[1]; ?></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li><span class="fa-li"><i class="fas fa-lg fa-venus-mars"></i></span> <?php echo "Gender: ".$row[2]; ?></li>
                        <li><span class="fa-li"><i class="fas fa-lg fa-child"></i></span> <?php echo "Age: ".$diff->format('%y'); ?></li>
                        <li><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <?php echo "Email: ".$row[3]; ?></li>
                        <li><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <?php echo "Phone Number: ".$row[4]; ?></li>
                        <li><span class="fa-li"><i class="far fa-money-bill-alt"></i></span> <?php
                        //Show cost of any consuling fee:)
                          if ($row[6] =='Adult'){
                            echo "Consulting Fee: 250$";
                          }
                          elseif($row[6] =='Teen'){
                            echo "Consulting Fee: 200$";
                          }
                          else{
                            echo "Consulting Fee: 150$";
                          } ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?php echo $img; ?>" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <form method="post" action="">
                      <input type="hidden" name="consultantemail" value="<?php echo $row[3]; ?>"/>
                    <button class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Book Now!
                    </button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

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
</body>
</html>
