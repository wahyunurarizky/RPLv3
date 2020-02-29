

  <div class="mt-5"></div>
  <?php $i = 1; ?>
  <?php foreach($all_kategori as $ktg): ?>
  <section id="atasan" class="mt-4 position-relative <?= ($i++ %2 == 0) ? 'bg-grey' : '';?>">
      <div class="container">

      <div class="row justify-content-center">
        <h1><?= $ktg['kategori']; ?></h1>
      </div>
      
      <div class="row">
        <?php 
          $produk = $this->kategori->getProdukByIdKtg($ktg['id']); 
        ?>
        <?php $j=0; ?>
        <?php foreach ($produk as $p) : ?>
          <?php if($j++ >= 4){
            break;
          } ?>
          <div class="col-lg-3 col-6 mb-4">
            <div class="card h-100">
              <img src="<?= base_url('assets/img/item/').$p['gambar']; ?>" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title"><?= $p['nama']; ?></h5>
               <p class="card-text">Bukan barang palsu, bukan barang bekas, atau reject. Semua dalam keadaan baru dengan kualitas terjamin. </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="row justify-content-center">
          <a href="<?= base_url('koleksi/') . $ktg['kategori']; ?>" class="h5 link-pink-labelk">lihat semua <?= $ktg['kategori']; ?></a>
      </div>
  </section>
  <?php endforeach; ?>
  

  