<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>
  <div class="row">
		<div class="col-lg-12	">
			<?= form_error('kategori', '<div class="alert alert-danger" role="alert"> ','</div>'); ?>
			<?= $this->session->flashdata('message'); ?>

			<table class="table table-hover mt-3">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Id Checkout</th>
			      <th scope="col">Nama Pengguna</th>
			      <th scope="col">Produk</th>
			      <th scope="col">Total Harga</th>
			      <th scope="col">Status</th>
			      <th scope="col">Terakhir diubah</th>
			      <th scope="col">Bukti Pembayaran</th>
			    </tr>
			  </thead>

			  <tbody>
			  	<?php $i=1; foreach($checkout as $c) :?>
			    <tr>
			      <th scope="row"><?= $i++; ?></th>
			      <td><?= $c['id']; ?></td>
			      <td><?= $c['nama']; ?></td>
			      <td><a href="#modalProduk" data-toggle="modal" data-check-id="<?php echo $c['id'] ?>"class="badge badge-success">lihat produk</a></td>
			      <td>Rp. <?= $c['total_harga_semua']; ?></td>
			      <td><?= $c['nama_status']; ?> <a href="#" class="badge badge-warning">edit</a></td>
			      <td>1 jam yang lalu</td>
			      <td>
			      	<?php if($c['upload_bukti'] == 1): ?>
				      	<a href="<?= base_url('assets/img/bukti/').$c['bukti']; ?>" data-toggle="lightbox">lihat</a>
				    <?php else: ?>
				    	<p>belum upload</p>
				    <?php endif; ?>
			      </td>
			    </tr>
			    <?php endforeach; ?>
			    
			  </tbody>
			</table>
		</div>
	</div>
 

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="modalProdukTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalProdukTitle">List Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body isinya">
        
      </div>
    </div>
  </div>
</div>
