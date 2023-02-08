 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sorry :(
      </h1>  
    </section>
    <div class="col-lg-12">
    <br>
    <?php echo $this->session->flashdata('pesan') ?>
    </div>
    <br>
     <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content"><br>
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Halaman tidak ditemukan.</h3>

          <p>
            Kami tidak dapat menemukan halaman yang anda cari karena halaman ini belum dibuat.
            Selagi menunggu update, kamu bisa kembali ke halaman <a href="dashboard">dashboard</a> .
          </p>

          
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>
