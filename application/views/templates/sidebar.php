  <aside class="main-sidebar">
    <section class="sidebar">
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group sticky-top">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?=activate_menu('Dashboard')?>">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-controller">
          </a>
          <li class="<?=activate_menu('Obat')?>">
          <a href="<?php echo base_url('obat') ?>">
            <i class="fa fa-medkit"></i> <span>Data Obat</span>
            <span class="pull-right-controller">              
            </span>
          </a>
          <li class="<?=activate_menu('Stock')?>">
          <a href="<?php echo base_url('stock') ?>">
            <i class="fa fa-archive"></i> <span>Stok Obat</span>
          </a>
          <li class="<?=activate_menu('Penjualan')?>">
          <a href="<?php echo base_url('penjualan') ?>">
            <i class="fa fa-database"></i> <span>Data Penjualan</span>
          </a>
          <li class="<?=activate_menu('Pengeluaran')?>">
          <a href="<?php echo base_url('pengeluaran') ?>">
            <i class="fa fa-shopping-cart"></i> <span>Data Pengeluaran</span>
          </a>

          <li class="treeview <?=activate_menu('Rumahsakit')?> <?=activate_menu('Puskesmas')?>">
            <a href="#">
              <i class="fa fa-hospital-o"></i> <span>Data Tempat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?=activate_menu('Rumahsakit')?>"><a href="<?php echo base_url('rumahsakit') ?>"><i class="fa fa-circle-o"></i> Rumah Sakit</a></li>
              <li class="<?=activate_menu('Puskesmas')?>"><a href="<?php echo base_url('puskesmas') ?>"><i class="fa fa-circle-o"></i> Puskesmas</a></li>
            </ul>
          </li>

          <li class="<?=activate_menu('Maps')?>">
            <a href="<?php echo base_url('maps') ?>">
              <i class="fa fa-map"></i> <span>Maps</span>
            </a>
          </li>
      </ul>
    </section>
  </aside>

 