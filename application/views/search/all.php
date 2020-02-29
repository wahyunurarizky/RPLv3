<section id="atasan" class="pt-5 mt-5 position-relative">
  
  <div class="container">
  		<h1 class="text-center h2">Pencarian "<?php echo $this->input->get('keyword')?>"</h1>
    
      <div class="row">
		<?php foreach($produk as $p): ?>	
      
          <div class="col-lg-3 col-6 mb-4">
            <div class="card h-100">
              <img src="<?= base_url('assets/img/item/').$p['gambar']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $p['nama']; ?></h5>
                <p class="card-text"><?= $p['deskripsi']; ?></p>
              </div>
              <?php $id=$p['id'] ?>
              <a href="<?= base_url('produk/detail/') . $id; ?>" class="stretched-link mx-2 my-2 btn btn-pink">lihat detail</a>
            </div>
          </div>
       	<?php endforeach; ?>
      </div>
  </div>
</section>