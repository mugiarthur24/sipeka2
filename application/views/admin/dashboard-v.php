<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="<?php echo base_url($brand); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?php echo $title; ?></title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="<?php echo base_url($brand); ?>" type="image/x-icon"/>

  <!-- Fonts and icons -->
  <script src="<?php echo base_url() ?>/asset/js/jquery.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {"families":["Lato:300,400,700,900"]},
      custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url() ?>/assets/css/fonts.min.css']},
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/atlantis.min.css">

</head>
<body>
  <div class="wrapper">
    <div class="main-header">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="blue">

        <a href="index.html" class="logo">
          <img src="<?php echo base_url($brand)?>" width="40px" class="navbar-brand"><span class="text-light"> <?php echo $infopt->alias_pt; ?></span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="icon-menu"></i>
          </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
          </button>
        </div>
      </div>
      <!-- End Logo Header -->

      <!-- Navbar Header -->
      <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        <div class="container-fluid">
          <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
              <!-- div class="dropdown show">
                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Master
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div> -->
            </form>
          </div>
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
              <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                <i class="fa fa-search"></i>
              </a>
            </li>
            <li class="nav-item dropdown hidden-caret">
              <span><?php echo $users->first_name; ?></span>
            </li>
          </li>
          <li class="nav-item dropdown hidden-caret">

            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
              <div class="avatar-sm">
                <?php if ($this->ion_auth->is_admin()): ?>
                  <img src="<?php echo base_url('asset/img/users/'.$users->profile) ?>" alt="<?php echo $users->profile;?>" class="avatar-img rounded-circle">

                  <?php else: ?>
                    <img src="<?php echo base_url('asset/img/pegawai/'.$this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$users->id_pegawai)->foto) ?>" alt="<?php echo $users->profile;?>" class="avatar-img rounded-circle">
                  <?php endif ?>

                </div>

              </a>

              <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                  <li>
                    <div class="user-box">
                      <div class="avatar-lg">
                        <?php if ($this->ion_auth->is_admin()): ?>
                          <img src="<?php echo base_url('asset/img/users/'.$users->profile) ?>" alt="<?php echo $users->profile;?>" class="avatar-img rounded">
                          <?php else: ?>
                            <img src="<?php echo base_url('asset/img/pegawai/'.$this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$users->id_pegawai)->foto) ?>" alt="<?php echo $users->profile;?>" class="avatar-img rounded">
                          <?php endif ?>
                        </div>
                        <div class="u-text">
                          <h4>Selamat Datang</h4>
                          <p class="text-muted"><?php echo $users->first_name; ?></p>
                        </div>
                      </div>
                    </li>
                    <li>
                       <?php if ($this->ion_auth->is_admin()): ?>
                       <!--  <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">My Profile</a> -->
                        <?php else: ?>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('index.php/admin/pegawai/detail/'.$users->id_pegawai) ?>">My Profile</a>
                      <?php endif ?>
                      <?php if ($this->ion_auth->is_admin()): ?>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('index.php/admin/users/') ?>">Account Setting</a>
                      <?php else: ?>
                        <a class="dropdown-item" href="<?php echo base_url('index.php/admin/users/edit/'.$users->id) ?>">Account Setting</a>
                        <?php endif ?>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('index.php/login/logout/') ?>">Logout</a>
                    </li>
                  </div>
                  
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>

      <!-- Sidebar -->
      <div class="sidebar sidebar-style-2">     
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <div class="user">
              <div class="avatar-sm float-left mr-2">
                <?php if ($this->ion_auth->is_admin()): ?>
                  <img src="<?php echo base_url('asset/img/users/'.$users->profile) ?>" alt="<?php echo $users->profile;?>" class="avatar-img rounded-circle">
                  <?php else: ?>
                    <img src="<?php echo base_url('asset/img/pegawai/'.$this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$users->id_pegawai)->foto) ?>" alt="<?php echo $users->profile;?>" class="avatar-img rounded-circle">
                  <?php endif ?>
                </div>
                <div class="info">
                  <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                      Selamat Datang
                      <span class="user-level"><?php echo $users->first_name; ?></span>
                    </span>
                  </a>
                </div>
              </div>
             
              <ul class="nav nav-danger">
                <li class="nav-item active">
                  <a class="btn btn-danger" data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="dashboard">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="<?php echo base_url('index.php/admin/dashboard/') ?>">
                          <span class="sub-item">Halaman Utama</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="nav-section">
                  <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                  </span>
                  <h4 class="text-section">Menu</h4>
                </li>
                 <?php if ($this->ion_auth->is_admin()): ?>
                <li class="nav-item">
                  <a data-toggle="collapse" href="#base">
                    <i class="fas fa-user-tie"></i>
                    <p>Kepegawaian</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="base">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="<?php echo base_url('index.php/admin/pegawai/') ?>">
                          <span class="sub-item">PNS</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/honorer/') ?>">
                          <span class="sub-item">Non PNS</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <?php endif ?>
                <!-- <?php if ($users->cs_sekret == 1): ?>
                  <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                      <i class="fas fa-chalkboard-teacher"></i>
                      <p>Sekretariat</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                      <ul class="nav nav-collapse">
                        <li>
                          <a href="sidebar-style-1.html">
                            <span class="sub-item">Sidebar Style 1</span>
                          </a>
                        </li>
                        <li>
                          <a href="overlay-sidebar.html">
                            <span class="sub-item">Overlay Sidebar</span>
                          </a>
                        </li>
                        <li>
                          <a href="compact-sidebar.html">
                            <span class="sub-item">Compact Sidebar</span>
                          </a>
                        </li>
                        <li>
                          <a href="static-sidebar.html">
                            <span class="sub-item">Static Sidebar</span>
                          </a>
                        </li>
                        <li>
                          <a href="icon-menu.html">
                            <span class="sub-item">Icon Menu</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                <?php endif ?> -->
                <?php if ($this->ion_auth->is_admin()): ?>
                  <li class="nav-item">
                    <a data-toggle="collapse" href="#layanan">
                      <i class="fas fa-directions"></i>
                      <p>Layanan Pegawai</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="layanan">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="<?php echo base_url('index.php/admin/csmutasi/') ?>">
                          <span class="sub-item">Mutasi</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/cssuket/') ?>">
                          <span class="sub-item">SUKET Ijin Pegawai</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/cskartu/') ?>">
                          <span class="sub-item">KARSU / KARSI / KARPEG</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/cspensiun/') ?>">
                          <span class="sub-item">Pensiun</span>
                        </a>
                      </li>
                      <!-- <li>
                        <a href="<?php echo base_url('index.php/admin/cskartu/') ?>">
                          <span class="sub-item">Diklat</span>
                        </a>
                      </li> -->
                    </ul>
                  </div>
                  </li>
                  <?php else: ?>
                       <li class="nav-item">
                    <a data-toggle="collapse" href="#layanan">
                      <i class="fas fa-directions"></i>
                      <p>Layanan Pegawai</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="layanan">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="<?php echo base_url('index.php/admin/csmutasi/') ?>">
                          <span class="sub-item">Mutasi</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/cssuket/') ?>">
                          <span class="sub-item">SUKET Ijin Pegawai</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/cskartu/') ?>">
                          <span class="sub-item">KARSU / KARSI / KARPEG</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/cspensiun/') ?>">
                          <span class="sub-item">Pensiun</span>
                        </a>
                      </li>
                      <!-- <li>
                        <a href="#">
                          <span class="sub-item">Diklat</span>
                        </a>
                      </li> -->
                    </ul>
                  </div>
                  </li>
                  <li class="nav-item">
                    <a data-toggle="collapse" href="#datapegawai">
                      <i class="fas fa-directions"></i>
                      <p>Profil Pegawai</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="datapegawai">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="<?php echo base_url('index.php/admin/pegawai/detail/'.$users->id_pegawai) ?>">Profil Pegawai</a>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/users/edit/'.$users->id) ?>">Edit Akun User</a>
                        </a>
                      </li>
                    </ul>
                  </div>
                  </li>

                <?php endif ?>
                <!-- <?php if ($users->cs_sdm == 1): ?>
                  <li class="nav-item">
                    <a data-toggle="collapse" href="#tables">
                      <i class="fas fa-child"></i>
                      <p>Pengembangan SDM</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                      <ul class="nav nav-collapse">
                        <li>
                          <a href="tables/tables.html">
                            <span class="sub-item">Ijin Pelantikan</span>
                          </a>
                        </li>
                        <li>
                          <a href="tables/datatables.html">
                            <span class="sub-item">Ijin Belajar</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                <?php endif ?> -->
                <?php if ($this->ion_auth->is_admin()): ?>
                <li class="nav-item">
                  <a data-toggle="collapse" href="#statistik">
                    <i class="fas fa-chart-line"></i>
                    <p>Data Statistik</p>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="statistik">
                    <ul class="nav nav-collapse">
                      <li>
                        <a href="<?php echo base_url('index.php/admin/grafik/jabatan') ?>">
                          <span class="sub-item">Jabatan</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/admin/grafik/jk') ?>">
                          <span class="sub-item">Jenis Kelamin</span>
                        </a>
                      </li>
                       <li>
                        <a href="<?php echo base_url('index.php/admin/grafik/') ?>">
                          <span class="sub-item">Unit Kerja</span>
                        </a>
                      </li>
                       <li>
                        <a href="<?php echo base_url('index.php/admin/grafik/golongan') ?>">
                          <span class="sub-item">Golongan</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <?php endif ?>
                <?php if ($this->ion_auth->is_admin()): ?>
                  <li class="nav-section">
                    <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu Master</h4>
                  </li>
                  <li class="nav-item">
                    <a data-toggle="collapse" href="#master">
                      <i class="fas fa-shield-alt"></i>
                      <p>Master</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="master">
                      <ul class="nav nav-collapse">
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/') ?>">
                            <span class="sub-item">Status Pegawai</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/satuan_kerja') ?>">
                            <span class="sub-item">Satuan Kerja</span>
                          </a>
                        </li>
                        <!-- <li>
                          <a href="<?php echo base_url('index.php/admin/master/ppk') ?>">
                            <span class="sub-item">PPK</span>
                          </a>
                        </li> -->
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/golongan') ?>">
                            <span class="sub-item">Golongan</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/eselon') ?>">
                            <span class="sub-item">Eselon</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/pelatihan') ?>">
                            <span class="sub-item">Pelatihan</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/jabatan') ?>">
                            <span class="sub-item">Jabatan</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/status_jabatan') ?>">
                            <span class="sub-item">Jenis KP</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/penghargaan') ?>">
                            <span class="sub-item">Penghargaan</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/hukuman') ?>">
                            <span class="sub-item">Hukuman</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/lokasi_pelatihan') ?>">
                            <span class="sub-item">Lokasi Pelatihan</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/master/lokasi_kerja') ?>">
                            <span class="sub-item">Lokasi Kerja</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                <?php endif ?>

                <?php if ($this->ion_auth->is_admin()): ?>
                  <li class="nav-section">
                    <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Report</h4>
                  </li>
                  <li class="nav-item">
                    <a data-toggle="collapse" href="#report">
                      <i class="fas fa-print"></i>
                      <p>Laporan</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="report">
                      <ul class="nav nav-collapse">
                        <li>
                          <a href="<?php echo base_url('index.php/admin/Export_excel') ?>">
                            <span class="sub-item">Kolefktif Pegawai</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/honorer/lap_honorer') ?>" >
                            <span class="sub-item">Kolektif Honorer</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/pegawai/lap_pegawaiperpendidikan') ?>">
                            <span class="sub-item">Pegawai Per-Pendidikan</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/pegawai/lap_pegawaipergolongan') ?>">
                            <span class="sub-item">Pegawai Per-Golongan</span>
                          </a>
                        </li>
                      <!--  <li>
                          <a href="<?php echo base_url('index.php/admin/export_excel/export_by_golongan') ?>">
                            <span class="sub-item">Form DPCP</span>
                          </a>
                        </li> -->
                      </ul>
                    </div>
                  </li>
                <?php endif ?>
                <?php if ($this->ion_auth->is_admin()): ?>
                  <li class="nav-section">
                    <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">General</h4>
                  </li>
                  <li class="nav-item">
                    <a data-toggle="collapse" href="#general">
                      <i class="fas fa-cog"></i>
                      <p>Setting</p>
                      <span class="caret"></span>
                    </a>
                    <div class="collapse" id="general">
                      <ul class="nav nav-collapse">
                        <li>
                          <a href="<?php echo base_url('index.php/admin/setting/') ?>">
                            <span class="sub-item">Instansi</span>
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('index.php/admin/users/') ?>">
                            <span class="sub-item">User</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                <?php endif ?>
              </ul>
            </div>
          </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
          <div class="content">

            <div>
              <?php if ($this->session->flashdata('message')): ?>
                  <div class="row">
                    <div class="alert alert-danger alert-dismissible tengah" role="alert" style="margin-bottom: 7px;">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <i class="fa fa-warning"></i> <strong><?php echo $this->session->flashdata('message');?></strong>
                    </div>
                  </div>
                <?php endif ;?>
              <?php $this->load->view($page) ?>
            </div>
          </div>
          <footer class="footer">
            <div class="container-fluid">
              <div class="copyright ml-auto">
              BKPSDM BUTON SELATAN</a>
            </div>        
          </div>
        </footer>
      </div>

    </div>
    <!--   Core JS Files   -->
    
    <script src="<?php echo base_url() ?>/assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo base_url() ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="<?php echo base_url() ?>/assets/js/atlantis.min.js"></script>
  </body>
  </html>