<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url("admin/dashboard") ?>" class="brand-link">
    <img src="<?php echo base_url(); ?>assets/admin/img/rooster-logo.png" alt="Logo" style="width: 70px;">
    <span class="brand-text font-weight-bold">Cafe Rooster</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('./uploads/foto/') . $admin['foto'] ?>" style="width: 40px; height: 40px;" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url('admin/Profile') ?>" class="d-block"><?= $this->session->userdata('nama_karyawan'); ?></a>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-header">HOME</li> -->
        <li class="nav-item has-treeview">
          <a href="<?= base_url("admin/dashboard") ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <?php 
        if($_SESSION['id_bagian'] == 1) {                  
        ?>
          <li class="nav-header">MANAGEMENT USER</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Data Pengguna
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url("admin/administrator") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Administrator</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url("admin/pengguna") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengguna</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-header">DATA MASTER MENU</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Data Menu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/Menu') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/Kategorimenu') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Menu</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">DATA TRANSAKSI</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/Transaksi') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi Langsung</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Report Transaksi</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Booking
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Booking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Report Booking</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Catering
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Catering</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Report Catering</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } elseif ($_SESSION['id_bagian'] == 3) {?>
          <li class="nav-header">DATA TRANSAKSI</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/Transaksi') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaksi Langsung</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Report Transaksi</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Booking
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Booking</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Report Booking</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Catering
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Catering</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Report Catering</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>
        
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>