<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">sub Kategori</h1>
  </div>
	<div class="row">
		<div class="col-lg-6">
			<?= form_error('kategori', '<div class="alert alert-danger" role="alert"> ','</div>'); ?>
			<?= form_error('subkategori', '<div class="alert alert-danger" role="alert"> ','</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#staticBackdrop">tambah sub kategori baru</a>

			<table class="table table-hover mt-3">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Sub Kategori</th>
			      <th scope="col">Kategori</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>

			  <tbody>
			  <?php $i=1; foreach($subkategori as $k) :?>
			    <tr>
			      <th scope="row"><?= $i++; ?></th>
			      <td><?= $k['sub_kategori']; ?></td>
			      <td><?= $k['kategori']; ?></td>
			      <td>
			      	<a href="#" class="badge badge-success">edit</a>
			      	<a href="#" class="badge badge-danger">hapus</a>

			      </td>
			    </tr>
			    
			  <?php endforeach ?>
			  </tbody>
			</table>
			
		</div>
	</div>
 

</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">sub kategori Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= base_url('admin/subkategori'); ?>" method="post">
      <div class="modal-body">
        	<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><i class="fas fa-fw fa-cube"></i></span>
			  </div>
			  <input type="text" class="form-control" name="subkategori" placeholder="masukan sub kategori baru" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
				<div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><i class="fas fa-fw fa-sitemap"></i></span>
			  </div>
			  <select class="custom-select" id="inputGroupSelect04" name="kategori" aria-label="Example select with button addon">
			    <option selected disabled="">Pilih Kategori</option>
			    <?php foreach ($kategori as $k) :?>
			    <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
			    <?php endforeach ?>
			  </select>
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