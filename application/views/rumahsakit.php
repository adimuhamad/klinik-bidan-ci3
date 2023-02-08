<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Data Rumah Sakit Terdekat
      </h1>
    </section>
    <section class="content">
      <?php echo $this->session->flashdata('pesan') ?>
      <?php echo $this->session->flashdata('message'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> Tambah Rumah Sakit</i></button>

      <!-- <div class="navbar-form navbar-right">
        <?php echo form_open('rumahsakit/search') ?>
        <input type="text" name="keyword" class="form-control" placeholder="Search">
        <button type="submit" class="btn btn-success">Cari</button>

        <?php echo form_close() ?>
      </div> -->

    <div style="margin-top: 20px">
      <table id="dataRumkit" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th data-sortable="false">Telp</th>
            <th>Hari Buka</th>
            <th>Jam Operasional</th>
            <th data-sortable="false">Edit</th>
            <th data-sortable="false">Hapus</th>
          </tr>
        </thead>

        <?php

        $no = 1;
        foreach ($tb_rumkit as $rum) : ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $rum->namarumkit ?></td>
          <td><?php echo $rum->alamatrumkit ?></td>
          <td><?php echo $rum->notelp ?></td>
          <td><?php echo $rum->jadwalbuka ?></td>
          <td><?php echo $rum->jamoperasional ?></td>

          <td><?php echo anchor('rumahsakit/edit/'.$rum->idRumkit, '<center><div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?></td>

          <td onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')">
            <?php echo anchor('rumahsakit/hapus/'.$rum->idRumkit, '<center><div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>

      <?php endforeach; ?>

      <tfoot>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Hari Buka</th>
            <th>Jam Operasional</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </tfoot>
      </table>
    </div>
    </section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data Rumah Sakit</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'rumahsakit/tambah_aksi' ?>">

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRmDCVUCishKh6rORTJEYDNnb504N3iyE&libraries=places"></script>
            
            <script type="text/javascript">
                var geocoder;
                var map;
                function initialize() {  
                    geocoder = new google.maps.Geocoder();
                    var latlng = new google.maps.LatLng(-6.9174639, 107.61912280000001);
                    var mapOptions = {
                        zoom: 12,
                        center: latlng
                      }
                      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                      }
            function geocodeLokasi() {
            var address = document.getElementById('namarumkit').value;
            geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location          
                });
                var lat = results[0].geometry.location.lat();
                var lng = results[0].geometry.location.lng();
              } else {
                alert('Geocode gagal dilakukan karena : ' + status);
              }
                document.getElementById("lat").value=lat;      
                document.getElementById("long").value=lng;    
            });
          }           
                google.maps.event.addDomListener(window, 'load', initialize);
          </script>

          <div class="form-group">
            <label>Nama Rumah Sakit</label>
            <input type="text" onChange="geocodeLokasi()" name="namarumkit" id="namarumkit" class="form-control" placeholder="Masukan Nama Rumah Sakit" required>
          </div>

          <div class="form-group">
            <label>Alamat Rumah Sakit</label>
            <input type="text" name="alamatrumkit" id="alamatrumkit" class="form-control" placeholder="Masukan Alamat Rumah Sakit" required>
          </div>

          <div class="form-group">
            <label>No Telpon</label>
            <input type="text" name="notelp" id="notelp" class="form-control" placeholder="Masukan No Telpon" required>
          </div>

          <div class="form-group">
            <label>Jadwal Buka</label>
            <input type="text" name="jadwalbuka" id="jadwalbuka" class="form-control" placeholder="Masukan Jadwal Buka" required>
          </div>

          <div class="form-group">
            <label>Jam Operasional</label>
            <input type="text" name="jamoperasional" id="jamoperasional" class="form-control" placeholder="Masukan Jam Operasional" required>
          </div>

          <div class="form-group">
            <label>Latitude</label>
            <input type="text" name="lat" id="lat" class="form-control" placeholder="Masukan Latitude" required readonly>
          </div>

          <div class="form-group">
            <label>Longtitude</label>
            <input type="text" name="long" id="long" class="form-control" placeholder="Masukan Longtitude" required readonly>
          </div>

          <div id="map-canvas" style="width: 569px; height: 300px;"></div>
          
          <br>
          <div>
            <button type="submit" class="btn btn-primary btn-sm my-3">Simpan</button>
            <button type="reset" class="btn btn-warning btn-sm my-3">Reset</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
</div>