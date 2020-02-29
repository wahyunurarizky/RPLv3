<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

   <link href="<?= base_url('assets/'); ?>css/pinklabel.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-pink">
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          
          <div class="col-lg-10">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="<?= base_url('auth/register'); ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name"  name="nama" value="<?= set_value('nama') ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" value="<?= set_value('email') ?>" class="form-control form-control-user" id="email" placeholder="Email Address" name="email">
                  <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                  <?= form_error('password1', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                  <?= form_error('password2', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <button type="submit" name="submit" class="btn btn-pink btn-user btn-block">
                  Register Accountt
                </button>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small link-pink-label" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


      <div class="row justify-content-center">
      <a href="<?= base_url('home'); ?>" class="btn btn-pink"><i class="fas fa-hand-point-left"></i> Halaman Awal</a>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
