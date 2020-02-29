<section id="atasan" class="pt-5 mt-5 position-relative">
  <div class="container">

    
      <div class="row">
      <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/item/').$produk['gambar']; ?>" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $produk['nama']; ?></h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form action="<?= base_url('keranjang/tambah/').$produk['id']; ?>" method="post">
            <input type="hidden" name="uri" value="<?= $this->uri->uri_string; ?>">
            <button type="submit" class="btn btn-outline-danger btn-ker" name="submit">tambahkan ke keranjang</button>
            </form>
        </div>
      </div>
  </div>
</section>