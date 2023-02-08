<div class="content-wrapper">
	<section class="content">
		<?php  foreach($tb_rumkit as $rum) { ?>

		<form action="<?php echo base_url().'rumahsakit/update'; ?>" method="post">

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
            <input type="hidden" name="idRumkit" class="form-control" value="<?php  echo $rum->idRumkit ?>">
            <input type="text" onChange="geocodeLokasi()" name="namarumkit" id="namarumkit" class="form-control" value="<?php  echo $rum->namarumkit ?>" required>
          </div>

          <div class="form-group">
            <label>Alamat Rumah Sakit</label>
            <input type="text" name="alamatrumkit" id="alamatrumkit" class="form-control" value="<?php  echo $rum->alamatrumkit ?>" required>
          </div>

          <div class="form-group">
            <label>No Telpon</label>
            <input type="text" name="notelp" id="notelp" class="form-control" value="<?php  echo $rum->notelp ?>" required>
          </div>

          <div class="form-group">
            <label>Jadwal Buka</label>
            <input type="text" name="jadwalbuka" id="jadwalbuka" class="form-control" value="<?php  echo $rum->jadwalbuka ?>" required>
          </div>

          <div class="form-group">
            <label>Jam Operasional</label>
            <input type="text" name="jamoperasional" id="jamoperasional" class="form-control" value="<?php  echo $rum->jamoperasional ?>" required>
          </div>

          <div class="form-group">
            <label>Latitude</label>
            <input type="text" name="lat" id="lat" class="form-control" value="<?php  echo $rum->lat ?>" required readonly>
          </div>

          <div class="form-group">
            <label>Longtitude</label>
            <input type="text" name="long" id="long" class="form-control" value="<?php  echo $rum->long ?>" required readonly>
          </div>

          <div id="map-canvas" style="width: 569px; height: 300px;"></div>
          
          <br>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
			
		</form>
		<?php } ?>
	</section>
</div>