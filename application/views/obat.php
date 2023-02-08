<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Data Obat
      </h1>
    </section>
    <section class="content">
      <?php echo $this->session->flashdata('pesan') ?>
      <?php echo $this->session->flashdata('message'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahObat"><i class="fa fa-plus"> Tambah Data Obat</i></button>

      <a class="btn btn-danger" href="<?php echo base_url('obat/print_data') ?>"><i class="fa fa-print"> Print</i></a>

      <div class="dropdown inline">
        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <i class="fa fa-download"></i> Export
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="<?php echo base_url('obat/print_pdf') ?>">PDF</a></li>
          <li><a href="<?php echo base_url('obat/print_excel') ?>">Excel</a></li>
        </ul>
      </div>

      <!-- <div class="navbar-form navbar-right">
        <?php echo form_open('obat/search') ?>
        <input type="text" name="keyword" class="form-control" placeholder="Search">
        <button type="submit" class="btn btn-success">Cari</button>

        <?php echo form_close() ?>
      </div> -->

      <div style="margin-top: 20px;">
      <table id="dataObat" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Nama Obat</th>
          <th>Jenis Obat</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Stock</th>
          <th data-sortable="false">Edit</th>
          <th data-sortable="false">Hapus</th>
        </tr>
      </thead>

        <?php

        $no = 1;
        foreach ($tb_obat as $obt) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $obt->namaobat ?></td>
          <td><?php echo $obt->jenisobat ?></td>
          <td><?php echo number_format ($obt->hargamodal) ?></td>
          <td><?php echo number_format ($obt->hargajual) ?></td>
          <td><?php echo $obt->stock ?></td>

          <!-- <td><?php echo anchor('obat/detail/'.$obt->idObat, '<div class="btn btn-success"><i class="fa fa-search-plus"></i></div>') ?></td> -->

          <td><?php echo anchor('obat/edit/'.$obt->idObat, '<center><div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?></td>

          <td onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')">
            <?php echo anchor('obat/hapus/'.$obt->idObat, '<center><div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>

      <?php endforeach; ?>
      
      <tfoot>
        <tr>
          <th>Nomor</th>
          <th>Nama Obat</th>
          <th>Jenis Obat</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Stock</th>
          <th>Edit</th>
          <th>Hapus</th>
        </tr>
      </tfoot>

      </table>
      </div>
    </section>


<!-- Modal -->
<div class="modal fade" id="tambahObat" tabindex="-1" role="dialog" aria-labelledby="tambahObatLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tambahObatLabel">Form Input Data Obat</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'obat/tambah_aksi' ?>">

          <div class="form-group">
            <label>Nama Obat</label>
            <input type="text" name="namaobat" class="form-control"placeholder="Masukan Nama Obat" required>
          </div>
          <div class="form-group">
            <label>Jenis Obat</label>
            <div>
                <select id="jenisobat" name="jenisobat" class="form-control col-sm-10">
                  <option value="tablet" >Tablet</option>
                  <option value="kapsul" >Kapsul</option>
                  <option value="sirup" >Sirup</option>
                  <option value="pil" >Pil</option>
                </select>
                
              </div>
            </div>
            <hr>
          <div class="form-group">
            <label>Harga Modal</label>
            <input type="number" name="hargamodal" class="form-control" placeholder="Masukan Harga Modal" required>
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="hargajual" class="form-control" placeholder="Masukan Harga Jual" required>
          </div>
          <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" placeholder="Masukan Jumlah Stock" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>

        </form>

      </div>
    </div>
  </div>
</div>
</div>