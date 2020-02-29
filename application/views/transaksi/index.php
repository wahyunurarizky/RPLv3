<section id="atasan" class="pt-5 mt-5 position-relative">
  <div class="container">
      <h1 class="text-center">TRANSAKSI</h1>

      <?php foreach($checkout as $c): ?>
        <?php if($c['status'] == 1): ?>
          <h4>Belum Di bayar</h4>
          <a href="<?php echo base_url('payment') ?>">lihat checkout yang belum dibayar </a>
          <?php break; ?>
        <?php endif; ?>
      <?php endforeach; ?>
      <br><br><br>
      <?php foreach($checkout as $c): ?>
        <?php if($c['status'] == 2): ?>
          <h4>Telah dibayar</h4>
          <a href="<?php echo base_url('payment') ?>">lihat checkout yang menunggu pengiriman </a>
          <?php break; ?>
        <?php endif; ?>
      <?php endforeach; ?>
<br><br><br>
      <?php foreach($checkout as $c): ?>
        <?php if($c['status'] == 2): ?>
          <h4>Sedang dikirim</h4>
          <a href="<?php echo base_url('payment') ?>">lihat checkout yang sedang dikirim </a>
          <?php break; ?>
        <?php endif; ?>
      <?php endforeach; ?>
<br><br><br>
      <?php $i=0; ?>
      <?php foreach($checkout as $c): ?>
        <?php if($c['status'] == 2): ?>
          <h4>Sudah Diterima</h4>
          <a href="<?php echo base_url('payment') ?>">lihat checkout yang Sudah diterima </a>
          <?php break; ?>
        <?php endif; ?>
      <?php endforeach; ?>
<br><br><br>
      <div class="row">
         
      </div>
  </div>
</section>