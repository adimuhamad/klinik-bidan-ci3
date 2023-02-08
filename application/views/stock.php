<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Data Histori Stock Masuk
      </h1>
    </section>
    
    <section class="content">
      <?php echo $this->session->flashdata('pesan') ?>
      <?php echo $this->session->flashdata('message'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahStock"><i class="fa fa-plus"> Tambah Stock Obat</i></button>

      <!-- <div class="navbar-form navbar-right">
        <?php echo form_open('stock/search') ?>
        <input type="text" name="keyword" class="form-control" placeholder="Search">
        <button type="submit" class="btn btn-success">Cari</button>

        <?php echo form_close() ?>
      </div> -->

      <div style="margin-top: 20px">
      <table id="dataStock" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Obat</th>
            <th>Jenis Obat</th>
            <th>Stock Masuk</th>
            <th>Tanggal Masuk</th>
            <th data-sortable="false">Edit</th>
            <th data-sortable="false">Hapus</th>
          </tr>
        </thead>

        <?php
          include "koneksi.php";
          $tampil = mysqli_query($mysqli, "select a.*, b.* from tb_stock a inner join tb_obat b on a.idObat=b.idObat");
          
          $no = 1;
          while ($hasil = mysqli_fetch_array($tampil)) { ?>
        
        <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $hasil['namaobat']; ?></td>
          <td><?php echo $hasil['jenisobat']; ?></td>
          <td><?php echo $hasil['jumlah']; ?></td>
          <td><?php echo $hasil['tanggal']; ?></td>
          
          <td><?php echo anchor('stock/edit/'.$hasil['idStock'], '<center><div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?></td>

          <td onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')">
            <?php echo anchor('stock/hapus/'.$hasil['idStock'], '<center><div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        
        <?php } ?>

        <tfoot>
          <tr>
            <th>Nomor</th>
            <th>Nama Obat</th>
            <th>Jenis Obat</th>
            <th>Stock Masuk</th>
            <th>Tanggal Masuk</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </tfoot>
      </table>
    </div>
    </section>
  

<!-- Modal -->
<div class="modal fade" id="tambahStock" tabindex="-1" role="dialog" aria-labelledby="tambahStockLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tambahStockLabel">Form Input Stock Obat</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'stock/tambah_aksi' ?>">
          <div class="form-group">
              <label>Pilih Obat</label>                  
              <select name="namaobat" class="form-control col-sm-10">                  
                  <?php
                    include "koneksi.php";                
                    $tampil = mysqli_query($mysqli, "select * from tb_obat");
                    $no = 1;
                    while($hasil = mysqli_fetch_array($tampil)){
                  ?>
              <option value="<?php echo $hasil['idObat']; ?>">
                  <?php echo $hasil['namaobat']; ?>
              </option>
              <?php } ?>
              </select>         
          </div>
          <hr>
          <div class="form-group">
            <label>Jumlah yang ditambahkan</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Masukan Jumlah Stock" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Tambah</button>
          <button type="reset" class="btn btn-warning">Reset</button>

        </form>
      </div>
    </div>
  </div>
</div>
</div>