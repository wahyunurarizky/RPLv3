<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Produk</h1>
  </div>

  	<?php if(validation_errors()) :?>
	  <div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= validation_errors(); ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php endif; ?>
		<?= $this->session->flashdata('message'); ?>

  	<a href="" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#staticBackdrop">tambah Produk baru</a>
  	<table class="table table-hover mt-3" id="example">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama</th>
	      <th scope="col">sub Kategori</th>
	      <th scope="col">Kategori</th>
	      <th scope="col">stok</th>
	      <th scope="col">harga</th>
	      <th scope="col">gambar</th>
	      <th scope="col">aksi</th>
	    </tr>
	  </thead>

	  <tbody>
	  <?php $i=1; foreach($produk as $p) :?>
	    <tr>
	      <th scope="row"><?= $i++; ?></th>
	      <td><?= $p['nama']; ?></td>
	      <td><?= $p['sub_kategori']; ?></td>
	      <td><?= $p['kategori']; ?></td>
	      <td><?= $p['stok']; ?></td>
	      <td><?= $p['harga']; ?></td>
	      <td><?= $p['gambar']; ?></td>
	      <td>
	      	<a href="#" class="badge badge-success">edit</a>
	      	<a href="<?= base_url('admin/produk/hapus/').$p['id']; ?>" class="badge badge-danger">hapus</a>

	      </td>
	    </tr>
	    
	  <?php endforeach ?>
	  </tbody>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Produk Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="<?= base_url('admin/produk'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        	
			<div class="form-group row">
				<label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
				<div class="col-sm-9">
				  <select class="form-control" id="kategori" name="kategori">
				    <option >Pilih Kategori</option>
			      <?php foreach ($kategori as $k) :?>
				    <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
			      <?php endforeach ?>
				  </select>
			  </div>
			</div>
			<div class="form-group row">
				<label for="subkategori" class="col-sm-3 col-form-label">sub kategori</label>
				<div class="col-sm-9">
				  <select class="form-control" id="subkategori" name="subkategori">
				    <option >Pilih sub Kategori</option>
			      <?php foreach ($subkategori as $sk) :?>
				    <option class="<?= $sk['id_kategori'] ?>" value="<?= $sk['id']; ?>"><?= $sk['sub_kategori']; ?></option>
			      <?php endforeach ?>
				  </select>
			  </div>
			</div>
			<div class="form-group row">
			    <label for="nama" class="col-sm-3 col-form-label">Nama Produk</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="nama" name="nama">
			    </div>
			</div>
			<div class="form-group row">
			    <label for="stok" class="col-sm-3 col-form-label">stok Produk</label>
			    <div class="col-sm-3">
			      <input type="number" class="form-control" id="stok" name="stok">
			    </div>
			</div>

			<div class="form-group row">
			    <label for="harga" class="col-sm-3 col-form-label">harga Produk</label>
			    <div class="col-sm-6">
			      <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Rp.</span>
					  </div>
					  <input type="text" class="form-control" id="harga" name="harga">
					</div>
			    </div>
			</div>

			<div class="form-group row">
			    <label for="deskripsi" class="col-sm-3 col-form-label">deskripsi</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
			    </div>
			</div>
			<div class="form-group row">
			    <label for="gambar" class="col-sm-3 col-form-label">foto</label>
			    <div class="col-sm-9">
			      <!-- <input type="file" class="form-control-file" id="gambar" name="gambar"> -->
			      <input type="file" class="form-control" id="gambar" name="gambar">
			    </div>
			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
        <button type="submit" class="btn btn-primary">tambah</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

