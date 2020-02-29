<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">

  <title>PINK LABEL - TOKO BAJU</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
 
  <link href="<?= base_url('assets/'); ?>css/pinklabel.css" rel="stylesheet" type="text/css">
</head>

<body>
  
  <nav id="sidebar">
    <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>

    <div class="sidebar-header">
        <h3>Pink Labell</h3>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="#">Beranda</a>
          </li>
          
        <li>
            <a href="#">Semua Produk</a>
        </li>
        <li>
            <a href="<?= base_url('sale'); ?>">Sale</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Kategori</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<nav id="sidebar2" class="pr-3 pl-2">
    <div id="dismiss2">
        <i class="fas fa-arrow-right"></i>
    </div>

    <div class="sidebar-header">
        <a href="<?= base_url('keranjang'); ?>" class="h3 nav-link-pink" style="font-size: 30px;">KERANJANG</a>
    </div>
    <?php if($user['role_id'] == 3) :?>
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col text-center">
          <p style="color:black">anda belum login</p>
          <a class="nav-link-pink"href="<?php echo base_url('auth') ?>">LOGIN</a>
          <hr>
          <a class="nav-link-pink" href="<?=base_url('auth/register'); ?>">REGISTER</a>
        </div>
      </div>
    </div>
    <?php else: ?>
    <?php $keranjang= $this->db->get_where('keranjang',['id_user' => $user['id']])->result_array(); ?>

     <ul class="list-unstyled components bg-pink">
        <?php foreach($keranjang as $krj) :?>
        <?php $produk = $this->db->get_where('produk', ['id' => $krj['id_produk']])->row_array(); ?>
        <li class="lis2" style="color: black;">
            <div class="ml-2 card mb-3">
              <img src="<?= base_url('assets/img/item/').$produk['gambar']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="text-center card-text"><?= $produk['nama']; ?></p>
                <p class="text-center card-text harga">Rp. <?= $krj['total_harga']; ?></p>
              </div>

              <div class="qty text-center mb-2">
                <div>jumlah</div>
                <span class="minus bg-dark">-</span>
                <input type="hidden" class="idprod" value="<?= $produk['id']; ?>">
                <input type="hidden" class="idkrj" value="<?= $krj['id']; ?>">
                <input type="number" class="count" name="qty" value="<?= $krj['jumlah']; ?>">
                <span class="plus bg-dark">+</span>
            </div>

            <button  class="trash" data-toggle="modal" data-pid="<?= $produk['id']; ?>" data-target="#trashModal" style="border: none; background: none" ><i class="fas fa-lg fa-fw fa-trash"></i></button>
            </div>
          
        </li>
        <?php endforeach; ?>
        <?php if($keranjang): ?>
          <?php 
            $total = 0;
          foreach ($keranjang as $ker) {
            $total += $ker['total_harga'];
          }
          ?>
        <li class="ml-2 text-center">
          <div class="card border-checkout mb-3">
          <div class="card-body text-checkout">
            <h5 class="card-title">Total Harga</h5>
            <p class="card-text totalkeranjang">Rp. <?= $total; ?></p>
          </div>
          <div class="card-footer bg-transparent border-checkout"><a href="<?= base_url('checkout'); ?>" class="btn btn-outline-checkout" style="color: black;">checkout</a></div>
        </div>
        </li>
        <?php else: ?>
        <li class="ml-2 text-center">
          <div class="card border-checkout mb-3">
          <div class="card-body text-checkout">
            <h5 class="card-title">Keranjang KOSONG</h5>
            <p>AYO BELANJA !</p>
          </div>
        </div>
        </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
</nav>
<div class="wrapper">
  <div id="content">
  <nav class="navbar navbar-expand navbar-light bg-pink mb-4 fixed-top">
   <button id="sidebarCollapse" class="btn btn-sidebar d-lg-none rounded-circle">
      <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand logo-label-pink mt-1 d-none d-sm-inline-block" href="<?= base_url(); ?>">
      <img class="mb-1 d-none d-md-inline" src="<?= base_url('assets/'); ?>img/bg/logo.png" width="35" height="35" alt="">
      <span class="h3">Pink Label</span>
    </a>
    
    <div class="pink-divider d-none d-xl-inline-block"></div>
    
    <a class="nav-link-pink d-none d-xl-inline" href="">New Arrival</a>
    
    <a class="nav-link-pink d-none d-xl-inline" href="<?= base_url('sale'); ?>">Sale</a>
    
    <a class="nav-link-pink d-none d-xl-inline" href="<?= base_url('seluruh_koleksi'); ?>">All</a>
    

    <div class="dropdown-nav-pink d-none d-xl-inline-block position-relative">
      
      <a class="nav-link-pink" href="<?= base_url('seluruh_koleksi'); ?>">Category</a>
      <div class="dropdown-kategori-pink">
          <?php $kategori = $this->db->get('kategori_produk')->result_array(); ?>
          <?php foreach($kategori as $k): ?>
            <a class="dropdown-item-pink" href="<?= base_url('koleksi/').$k['kategori']; ?>"> <?= $k['kategori']; ?> </a>
          <?php endforeach; ?>

      </div>
    </div>
    
    <div class="pink-divider"></div>
    
    <form class="d-inline-block" action="<?php echo base_url('search/all') ?>" method="get">
      <input type="text" name="keyword" class="input-search-pink" placeholder="search here ..." >
      <div class="d-inline-block">
        <button class="btn btn-pink-search" type="submit">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </form>
    
    

    <div class="pink-divider ml-auto mr-2"></div>
    
    <?php if($user['role_id'] == 3): ?>
      <a class="nav-link-pink d-none d-xl-inline" href="<?= base_url('auth'); ?>">Login</a>
      <div style="height: 20px;"class="pink-divider mx-0"></div>
      <a class="nav-link-pink d-none d-xl-inline" href="<?= base_url('auth/register'); ?>">Register</a>
    <?php else: ?>
    <div class="dropdown-nav-pink mx-2 d-inline-block position-relative">
      <a href="#" class="dropbtn-pink">
        <img class="img-profile-pink rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>">
      </a>
      <div class="dropdown-content-pink">       
          <a class="dropdown-item-pink" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 "></i>
            Profile
          </a>
          <a class="dropdown-item-pink" href="<?php echo base_url('transaksi') ?>">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 "></i>
            transaksi
          </a>
          <a class="dropdown-item-pink" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 "></i>
            Activity Log
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item-pink" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
            Logout
          </a>
      </div>
    </div>
    <?php endif; ?>







    <div class="pink-divider mx-2"></div>
    <button id="sidebarCollapse2" class="ml-0 d-inline" style="border:none; background: none;">
      <i style="color:black;" class="fas fa-2x fa-shopping-cart"></i>
    </button>
    
  </nav>