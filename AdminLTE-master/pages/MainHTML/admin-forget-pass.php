<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Let's Talk | Forget Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="../../plugins/fontawesome-free/css/all.min.css"
    />
    <!-- icheck bootstrap -->
    <link
      rel="stylesheet"
      href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/satin.min.css" />
  </head>
  <body class="hold-transition layout-top-nav">
    <div class="wrapper">
      <!-- Navbar -->
      <nav
        class="main-header navbar navbar-expand-md navbar-light navbar-white"
      >
        <div class="container">
          <a href="index.html" class="navbar-brand">
            <img
              src="../../dist/img/Let'sTalkLogo2.png"
              alt="Let's Talk Logo"
              class="brand-image img-circle elevation-3"
              style="opacity: 1"
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
                <a href="index.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="contact-us.html" class="nav-link">Contact</a>
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
                    <a href="ConsultantRegister.html" class="dropdown-item">Consultant Registeration </a>
                  </li>
                  <li>
                    <a href="ConsultantLogin.html" class="dropdown-item">Consultant Login</a>
                  </li>
                  <li>
                    <a href="ConsulteeRegister.html" class="dropdown-item"
                      >Consultee Registration</a
                    >
                  </li>
                  <li>
                    <a href="ConsulteeLogin.html" class="dropdown-item"
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
      <!-- /.navbar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h4 class="m-0">
                  Feel Like Talking? <small>We Are There For You</small>
                </h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="hold-transition login-page">
            <div class="login-box">
              <div class="login-logo">
                <a href="index.html" class="navbar-brand">
                  <img
                    src="../../dist/img/Let'sTalkLogo2.png"
                    alt="Let's Talk Logo"
                    class="brand-image img-circle elevation-3"
                    style="width: 50px"
                  />
                  <span class="brand-text font-weight-light" style="font-size: larger; font-weight: bold;">Let's Talk</span>
                </a>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">
                You forgot your password? Here you can easily retrieve a new password.
              </p>

              <form action="Admin-recover-pw.html" method="post">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" />
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">
                      Request new password
                    </button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>

      <p class="mt-3 mb-1">
        <a href="AdminLogin.html">Back To Login</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">By SaTin</div>
        <!-- Default to the left -->
        <strong
          >Copyright &copy; 2021-....
          <a href="index.html">Let's Talk.Com</a>.</strong
        >
        All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- satin App -->
    <script src="../../dist/js/satin.min.js"></script>
  </body>
</html>
