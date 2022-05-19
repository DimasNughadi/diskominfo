<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Diskominfotik - Riau</title>

  <link rel="icon" href="<?= base_url("assets/images/logo.png") ?>" type="image/jpeg">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url("assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css") ?>">
  <!-- jQuery -->
  <script src="<?= base_url("assets/plugins/jquery/jquery.min.js") ?>"></script>
  <!-- DataTables -->
  <script src="<?= base_url("assets/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
  <script src="<?= base_url("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js") ?>"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("assets/dist/css/adminlte.min.css") ?>">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/sweetalert2/dark.css' ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.min.css' ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light navbar-white">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary  elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link navbar-light">
        <img src="<?= base_url("assets/images/logo.png") ?>" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text text-secondary font-weight-bold">DiskominfotikRiau</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3  d-flex">
          <div class="image">
            <img src="<?= base_url('assets/images/user.jpg') ?>" class="img-circle mt-3" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= ucwords($this->session->userdata('username')) ?> </a>
            <p><span class="mb-0 badge badge-light"><?= ucwords($this->session->userdata('role')) ?></span>
              <span class="mb-0 badge badge-light"><?= $this->session->userdata('departemen') ?></span>
            </p>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url('dashboard') ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('permintaan') ?>" class="nav-link">
                <i class="nav-icon fa fa-paper-plane"></i>
                <p>
                  Permintaan Aset
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('perbaikan') ?>" class="nav-link">
                <i class="nav-icon fa fa-wrench"></i>
                <p>
                  Perbaikan Aset
                </p>
              </a>
            </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>
                    Data Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('aset') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Aset</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('kategori') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Kategori</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('user') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('departemen') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Departemen</p>
                    </a>
                  </li>
                </ul>
              </li>
            <li class="nav-item">
              <a href="<?= base_url('setting') ?>" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Setting
                </p>
              </a>
            </li>
            <li class="nav-item">
              <hr>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-logout">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

