<div class="container pt-5 mt-5">
	<div class="row justify-content-center">
		<div class="col-sm-4 input-group mt-3">
		  <select class="custom-select" id="inputGroupSelect02">
		    <option selected>Semua <?= $this->uri->segment(2); ?></option>
		    <?php foreach($sub_kategori as $k): ?>
		    	<option value="<?= $k['id']; ?>"><?= $k['sub_kategori']; ?></option>
			<?php endforeach; ?>
		  </select>
		</div>
	</div>
</div>
<?php $i = 1; ?>
<?php foreach($sub_kategori as $k): ?>
  <section class="mt-4 position-relative <?= ($i++ %2 == 0) ? 'bg-grey' : '';?>">
      <div class="container">

      <div class="row justify-content-center">
        <h1><?= $k['sub_kategori']; ?></h1>
      </div>
      
		<div class="row">
		<?php $j=0; ?>
		<?php foreach($produk as $p): ?>	
        <?php if(($k['id'] == $p['id_sub_kategori']) && $j<4): ?>
          <div class="col-lg-3 col-6 mb-4">
            <div class="card h-100">
              <img src="<?= base_url('assets/img/item/').$p['gambar']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $p['nama']; ?></h5>
                <p class="card-text"><?= $p['deskripsi']; ?></p>
                <a href="<?= base_url('produk/detail/').$p['id']; ?>"class="stretched-link"></a>
              </div>
            </div>
          </div>
        <?php $j++ ?>
        <?php endif; ?>
       	<?php endforeach; ?>
      </div>
      <div class="row justify-content-center">
          <a href="<?= base_url('koleksi/'.$this->uri->segment(2).'/') . $k['sub_kategori']; ?>" class="h5 link-pink-label ">lihat semua <?= $k['sub_kategori']; ?></a>
      </div>
  	</div>
  </section>
  <?php endforeach; ?>