<?php
$id = $_POST['idc'];
$produk = $this->db->get_where('produk_checkout',['id_checkout' => $id])->result_array();

?>
<div class="container">
	<?php foreach($produk as $pr): ?>
		<?php $p = $this->db->get_where('produk',['id'=>$pr['id_produk']])->row_array(); ?>
		<div class="row">
			<div class="col-4">
				<p><?=$p['nama'] ?></p>
			</div>
			<div class="col-4">
				<p><?=$pr['jumlah']?> item</p>
			</div>
			<div class="col-4">
				<p class="font-weight-bold">Rp. <?=$pr['total_harga']?></p>
			</div>
		</div>
	<?php endforeach; ?>
</div>
