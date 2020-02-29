
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">

  <title>PINK LABEL - TOKO BAJU</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
 
  <link href="<?= base_url('assets/'); ?>css/pinklabel.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="text-center mt-3 container">
  <?php if(validation_errors()) :?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= validation_errors(); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>
  <h1>Payment</h1>

  <p>Silahkan Transfer</p>
  <p>BANK <?php echo $bank['nama'] ?> - <?php echo $bank['no_rek'] ?></p>
  <p>a/n <?php echo $bank['atas_nama'] ?></p>
  <p class="font-weight-bold">Rp. <?php echo $checkout['total_harga_semua'] ?></p>
  <form action="<?= base_url('payment/upload') ?>" method="post" enctype="multipart/form-data">
  <div class="row justify-content-center">
    <div class="col-md-4">
     <div class="form-group row">
          <div class="col">
            <!-- <input type="file" class="form-control-file" id="gambar" name="gambar"> -->
            <input type="file" class="form-control" id="bukti" name="bukti">
            <button class="btn btn-pink mt-3" type="submit">upload</button>
          </div>
      </div>
    </div>
  </div>
  </form>
  <a href="<?php echo base_url(); ?>" class="btn btn-pink">kembali belanja</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>