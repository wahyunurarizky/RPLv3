
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
  <h1>Checkout</h1>
  <hr>
  <form action="<?= base_url('payment'); ?>" method="post">
  <div class="card">
    <div class="card-body text-left">
      <input type="hidden" name="id_alamat" value="<?= $alamat['id']; ?>">
      <h5 class="card-title">Alamat Pengiriman</h5>
      <h6 class="card-subtitle mt-2 font-weight-bold"><?= $alamat['tempat']; ?></h6>
      <p class="card-text"><?= $alamat['jalan'] .', '. $alamat['kecamatan'] .', '. $alamat['kota'] .', '. $alamat['provinsi']; ?></p>
      <a href="#alamatModal" data-toggle="modal" class="card-link">Sunting Alamat</a>
    </div>
  </div>
  <div class="card mt-3">
    <div class="card-body text-left">
      <h5>Metode Pembayaran</h5>
      <div class="form-group row">
        <select class="form-control" id="id_bank" name="id_bank">
          <option selected disabled="">Pilih Metode</option>
          <?php foreach($bank as $b): ?>
            <option value="<?php echo $b['id'] ?>">Transfer <?php echo $b['nama'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <div class="card mt-3">
    <div class="card-body text-left">
      <h5 class="card-title">Daftar Belanja</h5>
      <?php foreach($keranjang as $k) :?>
        <?php $produk = $this->db->get_where('produk', ['id'=>$k['id_produk']])->row_array(); ?>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/item/').$produk['gambar'] ?>" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $produk['nama']; ?></h5>
              <p class="card-text"><?php echo $k['jumlah']; ?> item</p>
              <p class="card-text"><small class="text-muted">Rp. <?php echo $k['total_harga'] ?></small></p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
  <div class="card mt-3">
    <div class="card-body text-left">
      <h5 class="card-title">Rincian Harga</h5>

      <?php 
      $total = 0;
      foreach($keranjang as $k){
      $total += $k['total_harga'];

      }?>
      <div class="row">
        <div class="col-5">
          <span class="font-weight-bold">Total Harga Barang</span>
        </div>
        <div class="col-7 text-right">
          </span>Rp. <?php echo $total ?></span>
        </div>
      </div>

      <div class="row">
        <div class="col-5">
          <span class="font-weight-bold">Ongkos Kirim</span>
        </div>
        <div class="col-7 text-right">
          <input type="hidden" value="10000" name="ongkir">
          </span>Rp. 10000</span>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body text-left">
       <div class="row">
        <div class="col-5">
          <span class="font-weight-bold">Total Pembayaran</span>
        </div>
        <div class="col-7 text-right font-weight-bold">
          <span>Rp. <?php echo $total+10000 ?></span>
        </div>
      </div>
    </div>
  </div>
<hr>
  <button type="submit" name="bayar" class="my-4 btn btn-pink">lanjutkan BAYAR !!!</button>
  <br>
  <a href="<?= base_url() ?>" class="mb-4 btn btn-pink">kembali belanja</a>
</form>
</div>
<!-- Modal -->
<div class="modal fade" id="alamatModal" tabindex="-1" role="dialog" aria-labelledby="alamatModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alamatModalTitle">Pilih Alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
         <?php foreach($alamats as $as) :?>
         <div class="form-check">
          <input class="form-check-input" type="radio" name="alamat" value="<?= $as['id']; ?>" <?php echo ($as['active'] == 1)? 'checked' : '' ?>>
          <label class="form-check-label">
            <p class="font-weight-bold"><?= $as['tempat']; ?></p>
            <p><?= $as['jalan'] .', '. $as['kecamatan'] .', '. $as['kota'] .', '. $as['provinsi']; ?></p>
          </label>
          <a href="#" class="badge badge-pill badge-light">edit</a>
        </div>
        <?php endforeach; ?>
        <a data-dismiss="modal" data-toggle="modal" href="#tambahAlamatModal">tambah alamat</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php 

   $sumber = 'http://dev.farizdotid.com/api/daerahindonesia/provinsi';
   $konten = file_get_contents($sumber);
   $dataprov = json_decode($konten, true);
  



 ?>
<!-- Modal -->
<div class="modal fade" id="tambahAlamatModal" tabindex="-1" role="dialog" aria-labelledby="tambahAlamatModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahAlamatModalTitle">Tambah Alamat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
        <div class="form-group row">
          <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
          <div class="col-sm-9">
            <select class="form-control" id="provinsi" name="provinsi">
              <option disabled="" selected="<?php  ?>">Pilih Provinsi</option>
              <?php foreach($dataprov['semuaprovinsi'] as $p): ?>
                <option value="$p['id']"><?= $p['nama'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <?php 
         // $sumber = 'http://dev.farizdotid.com/api/daerahindonesia/provinsi/{idprovinsi}/kabupaten';
         // $konten = file_get_contents($sumber);
         // $dataprov = json_decode($konten, true);
        ?>
        <div class="form-group row">
          <label for="kabupaten" class="col-sm-3 col-form-label">kabupaten</label>
          <div class="col-sm-9">
            <select class="form-control" id="kabupaten" name="kabupaten">
              <option >Pilih kabupaten</option>
              <?php foreach($datakab as $kab):?>
              <option value="">Banten</option>
            <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="kecamatan" class="col-sm-3 col-form-label">kecamatan</label>
          <div class="col-sm-9">
            <select class="form-control" id="kecamatan" name="kecamatan">
              <option >Pilih kecamatan</option>
              <option value="">Banten</option>
              <option value="">Jakarta</option>
              <option value="">Jawa Barat</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
            <label for="kodepos" class="col-sm-3 col-form-label">kode pos</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="kodepos" name="kodepos">
            </div>
        </div>
        <div class="form-group row">
            <label for="telp" class="col-sm-3 col-form-label">No Telpon</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="telp" name="telp">
            </div>
        </div>

        <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">alamat lengkap</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="tempat" class="col-sm-3 col-form-label">tempat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="tempat" name="tempat" placeholder="rumah/kantor/dll">
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script>
  $('.modal').on("hidden.bs.modal", function (e) { 
    if ($('.modal:visible').length) { 
        $('body').addClass('modal-open');
    }
});
  </script>
</body>

</html>