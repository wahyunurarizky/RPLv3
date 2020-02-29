<section>
	<div class="mt-5 text-center container">
		<h1>KERANJANG</h1>
    <div class="row">
      <div class="col-lg-8">
    		<?php foreach($keranjang as $krj) :?>
            <?php $produk = $this->db->get_where('produk', ['id' => $krj['id_produk']])->row_array(); ?>
           
        		<div class="card mb-3" style="">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="<?= base_url('assets/img/item/').$produk['gambar']; ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class= "card-title"><?= $produk['nama'];?></h5>
                    <p class="card-text"><?= $produk['deskripsi']; ?></p>
                    <p class="card-text">Rp. <?= $krj['total_harga']; ?></p>
                  </div>
                </div>
              </div>
            </div>
      
            
        <?php endforeach; ?>
        
      </div>
      <div class="col-lg-4">
        <a href="<?= base_url('checkout'); ?>" class="btn btn-pink">CHECKOUT</a>
        
      </div>
    </div>
	</div>
</section>