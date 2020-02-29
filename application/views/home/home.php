<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">

  <title>Home</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>css/pinklabel.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>

<body id="page-top">
  <div id="wrapper">
  
    <nav id="sidebar">
      <div id="dismiss">
          <i class="fas fa-arrow-left"></i>
      </div>

      <div class="sidebar-header">
          <h3>Bootstrap Sidebar</h3>
      </div>

      <ul class="list-unstyled components">
          <li>
              <a href="#">About</a>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="#">Page 1</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#">Portfolio</a>
          </li>
          <li>
              <a href="#">Contact</a>
          </li>
      </ul>
  </nav>

  <div id="content-wrapper" class="d-flex flex-column">

   <!-- Main Content -->
  <div id="content">
  
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-pink topbar mb-4 fixed-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarCollapse" class="btn btn-sidebar d-lg-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    
    <a class="navbar-brand logo-label-pink mt-1" href="<?= base_url(); ?>">
      <img class="mb-1" src="<?= base_url('assets/'); ?>img/bg/bg1.png" width="30" height="30" alt="">
      <span class="h5">PINK LABEL</span>
    </a>
    

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item my-auto ">
        <a class="nav-link-pink d-none d-lg-inline py-3" href="<?= base_url(); ?>">Beranda</a>
      </li>
      <li class="nav-item my-auto">
        <a class="nav-link-pink d-none d-lg-inline py-3" href="<?= base_url('kategori'); ?>">SemuaProduk</a>
      </li>
      <li class="nav-item my-auto">
        <a class="nav-link-pink d-none d-lg-inline py-3" href="#">CuciGudang</a>
      </li>
      <li class="nav-item my-auto">
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 13rem;">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="cari ..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </li>
      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle btn-sidebar" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="cari ..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow my-auto">
        <a class="nav-link dropdown-toggle d-inline pb-2" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          <span class="mr-2 d-none d-lg-inline" style="padding: none;"><?= $user['nama']; ?></span>
          <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <?php if($user['role_id'] == 3): ?>
          <a class="dropdown-item" href="<?= base_url('auth/index'); ?>">
            <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Login
          </a>
          <a class="dropdown-item" href="<?= base_url('auth/register'); ?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Register
          </a>
        <?php else: ?>
          <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
          </a>
        <?php endif; ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

      <li class="nav-item my-auto">
        <a class="ml-2 nav-link d-inline pb-2" href="">
          <i class="fas fa-lg fa-shopping-cart"></i>
        </a>
      </li>
    </ul>
    

  </nav>

  <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; PINK LABEL 2019</span>
    </div>
  </div>
</footer>

</div>
</div>
</div>
<div class="overlay"></div>


<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('#sidebar a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

</body>

</html>
