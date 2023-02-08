 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>  
    </section>
    <div class="col-lg-12">
    <br>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo $this->session->flashdata('message') ?>
    </div>
    <br>
    <div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('tb_obat');
                            echo $this->db->count_all_results();
                        ?>
                    </h3>
                    <p>
                        Total Data Obat
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-clipboard"></i>
                </div>
                <a href="<?php echo site_url('obat');?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('tb_stock');
                            echo $this->db->count_all_results();
                        ?>
                    </h3>
                    <p>
                        Total Penambahan Stok
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-checkbox-outline"></i>
                </div>
                <a href="<?php echo site_url('stock');?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        10                                    
                    </h3>
                    <p>
                        Total Obat Terjual
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <a href="penjualan" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>
                        10                                    
                    </h3>
                    <p>
                        Total Obat Terjual Bulan Ini
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="penjualan" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        Rp 621.000                                   
                    </h3>
                    <p>
                        Total Pendapatan Bulan Ini
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
                <a href="penjualan" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>
                        Rp 126.000                                   
                    </h3>
                    <p>
                        Total Pengeluaran Bulan Ini
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-upload"></i>
                </div>
                <a href="pengeluaran" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div>
  </div>

      <div class="row">
        <div class="col-lg-12">
      <div class='col-lg-12'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            Informasi Pembuat
          </div>
          <div class='panel-body'>
            <ul class='nav nav-tabs'>
              <li class='active'><a href='#home' data-toggle='tab'><i class="fa fa-home"></i> Home</a>
              </li>
              <li><a href='#biodata' data-toggle='tab'><i class="fa fa-id-card"></i> Biodata</a>
              </li>
              <li><a href='#akademik' data-toggle='tab'><i class="fa fa-graduation-cap"></i> Akademik</a>
              </li>
              <li><a href='#kontak' data-toggle='tab'><i class="fa fa-address-book"></i> Kontak</a>
              </li>
            </ul>
            <div class='tab-content'>
              <div class='tab-pane fade in active' id='home'>
                <table>
                    <tr><br>
                      Website ini dibuat untuk memenuhi salah satu tugas <b>Mata Kuliah</b>
                      <td align='left' width='100px'><b>Kode MK</b></td><td>: 01130</td></tr>
                      <tr><td align='left'><b>Mata Kuliah</b></td><td>: Manajemen Proyek Perangkat Lunak</td></tr>
                      <tr><td align='left'><b>SKS</b></td><td>: 3 (Tiga)</td></tr>
                      <tr><td align='left'><b>Dosen</b></td><td>: Irfan Maliki, S.T, M.T</td></tr></tr>
                      </td>
                    </tr>
                  </table>
              </div>
              <div class='tab-pane fade' id='biodata'>                        
                  <table>
                    <tr><br>
                      <td align='left' width='180px'><b>Nama Anggota 1</b></td><td>: Mochamad Adi Maulia Rahman</td></tr>
                      <tr><td align='left'><b>Nomor Induk Mahasiswa</b></td><td>: 10119253</td></tr>
                      <td align='left' width='180px'><b>Nama Anggota 2</b></td><td>: Ismayani Setyaningrum</td></tr>
                      <tr><td align='left'><b>Nomor Induk Mahasiswa</b></td><td>: 10119265</td></tr>
                      <td align='left' width='180px'><b>Nama Anggota 3</b></td><td>: Zuhair Rasyid Wafi</td></tr>
                      <tr><td align='left'><b>Nomor Induk Mahasiswa</b></td><td>: 10119269</td></tr>
                      </td>
                    </tr>
                  </table>                            
              </div>
              <div class='tab-pane fade' id='akademik'>
                <table>
                    <tr><br>
                      <td align='left' width='150px'><b>Fakultas</b></td><td>: Teknik & Ilmu Komputer</td></tr>
                      <tr><td align='left'><b>Jurusan</b></td><td>: Teknik Informatika (S1)</td></tr>
                      <tr><td align='left'><b>Kelas/Tahun Masuk</b></td><td>: IF-7 / 2019</td></tr>
                      <tr><td align='left'><b>Semester</b></td><td>: Genap (VI) 2021/2022</td></tr>
                      <tr><td align='left'><b>Dosen Wali</b></td><td>: Alif Finandhita, S.Kom, M.T</td></tr>
                      </td>
                    </tr>
                  </table>
              </div>
              <div class='tab-pane fade' id='kontak'>
                <table>
                    <tr><br>
                      <td align='left' width='150px'><b>Email M. Adi</b></td><td>: adi.10119253@mahasiswa.unikom.ac.id</td></tr>
                      <tr><td align='left'><b>Email Ismayani</b></td><td>: ismayani.10119265@mahasiswa.unikom.ac.id</td></tr>
                      <tr><td align='left'><b>Email Zuhair</b></td><td>: zuhair.10119269@mahasiswa.unikom.ac.id</td></tr>
                      </td>
                    </tr>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>          
    </div>
  </div>
</section>
</div>
</body>
</html>
