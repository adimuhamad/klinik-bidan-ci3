<div class="content-wrapper">
	<section class="content">
		<?php  foreach($tb_obat as $obt) { ?>

		<form action="<?php echo base_url().'obat/update'; ?>" method="post">

		  <div class="form-group">
            <label>Nama Obat</label>
            <input type="hidden" name="idObat" class="form-control" value="<?php  echo $obt->idObat ?>"> 
            <input type="text" name="namaobat" class="form-control" value="<?php  echo $obt->namaobat ?>">
          </div>

          <div class="form-group">
            <label>Jenis Obat</label>
            <div>
                <select name="jenisobat" class="form-control col-sm-10 " value="<?php  echo $obt->jenisobat ?>">
                  <option value="tablet" >Tablet</option>
                  <option value="kapsul" >Kapsul</option>
                  <option value="sirup" >Sirup</option>
                </select>
              </div>
            </div>

          <div class="form-group" style="margin-top: 50px">
            <label>Harga Modal</label>
            <input type="number" name="hargamodal" class="form-control" value="<?php  echo $obt->hargamodal ?>">
          </div>

          <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="hargajual" class="form-control" value="<?php  echo $obt->hargajual ?>">
          </div>

          <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="<?php  echo $obt->stock ?>">
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
			
		</form>
		<?php } ?>
	</section>
</div>