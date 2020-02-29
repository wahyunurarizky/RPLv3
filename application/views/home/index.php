
  <header>
    <div id="carouselId" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner" >
        <div class="carousel-item active " >
          <img src="<?= base_url('assets/img/bg/'); ?>1.jpg" class="d-block w-100 " alt="...">
        </div>
        <div class="carousel-item" >
          <img src="<?= base_url('assets/img/bg/'); ?>3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <section id="semua-produk">
    <div class="container">

      <div class="row justify-content-center">
        <h1>SEMUA PRODUK</h1>
      </div>
      
      <div class="row">
        <?php 

          $this->db->from('produk');
          $this->db->order_by("id", "desc");
          $produkk = $this->db->get()->result_array(); 

         ?>
        <?php $i=0; ?>
        <?php foreach ($produkk as $p) : ?>
        <?php if($i++ >= 4){
          break;
        } ?>
        <div class="col-lg-3 col-6 mb-4">
          <div class="card h-100">
            <img src="<?= base_url('assets/img/item/').$p['gambar']; ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?= $p['nama']; ?></h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="row justify-content-center">
          <a href="<?= base_url('seluruh_koleksi'); ?>" class="h5 link-pink-label">LIHAT SEMUA PRODUK</a>
      </div>
    
    </div>


    


  </section>
  





  <section id="cuci-gudang" class="bg-grey">
    <div class="container">
      <div class="row justify-content-center">
        <h1>Sale</h1>
      </div>
    </div>
  </section>
