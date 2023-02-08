  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Peta Letak Rumah Sakit dan Puskesmas
      </h1>  
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRmDCVUCishKh6rORTJEYDNnb504N3iyE&callback=initialize" async defer></script>
	<script type="text/javascript">   
	    var marker;
	    function initialize(){
	        // Variabel untuk menyimpan informasi lokasi
	        var infoWindow = new google.maps.InfoWindow;
	        //  Variabel berisi properti tipe peta
	        var mapOptions = {
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        } 
	        // Pembuatan peta
	        var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);      
	        // Variabel untuk menyimpan batas kordinat
	        var bounds = new google.maps.LatLngBounds();
	        // Pengambilan data dari database MySQL
	        <?php
	        // Sesuaikan dengan konfigurasi koneksi Anda
	            $host     = "localhost";
	            $username = "root";
	            $password = "";
	            $Dbname   = "db_klinik";
	            $db       = new mysqli($host,$username,$password,$Dbname);
	            
	            $query = $db->query("SELECT * FROM tb_rumkit");
	            while ($row = $query->fetch_assoc()) {
	                $nama = $row["namarumkit"];
	                $lat  = $row["lat"];
	                $long = $row["long"];
	                echo "addMarker($lat, $long, '$nama');\n";
	            }

	            $query = $db->query("SELECT * FROM tb_pkm");
            	while ($row = $query->fetch_assoc()) {
	                $nama = $row["namapkm"];
	                $lat  = $row["lat"];
	                $long = $row["long"];
	                echo "addMarker($lat, $long, '$nama');\n";
            	}

            	$query = $db->query("SELECT * FROM tb_bidan");
            	while ($row = $query->fetch_assoc()) {
	                $nama = $row["namabidan"];
	                $lat  = $row["lat"];
	                $long = $row["long"];
	                echo "addMarker($lat, $long, '$nama');\n";
            	}
	        ?> 
	        // Proses membuat marker 
	        function addMarker(lat, lng, info){
	            var lokasi = new google.maps.LatLng(lat, lng);
	            bounds.extend(lokasi);
	            var marker = new google.maps.Marker({
	                map: peta,
	                position: lokasi
	            });       
	            peta.fitBounds(bounds);
	            bindInfoWindow(marker, peta, infoWindow, info);
	         }
	        // Menampilkan informasi pada masing-masing marker yang diklik
	        function bindInfoWindow(marker, peta, infoWindow, html){
	            google.maps.event.addListener(marker, 'click', function() {
	            infoWindow.setContent(html);
	            infoWindow.open(peta, marker);
	          });
	        }
	    }
	</script>
    <section class="content">        
    	<div id="googleMap" style="width:1100px;height:480px;"></div>
    </section>
  </div>
</body>
</html>
