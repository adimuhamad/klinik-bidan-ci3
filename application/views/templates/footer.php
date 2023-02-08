<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version </b> <a href="changelog">1.3.0</a>
    </div>
    <strong>Copyright &copy; 2022 <a href="" target='_blank'>Kelompok X</a></strong> All rights reserved.
  </footer>

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>bower_components/jquery/dist/jquery.min.js"></script>

<link href="<?php echo base_url() ?>plugins/select2/dist/css/select2.min.css" rel="stylesheet"/>
<script src="<?php echo base_url() ?>plugins/select2/dist/js/select2.min.js"></script>

<!-- <script>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
$('#jenisobat').select2();
});
</script> -->

<script>
	$(document).ready(function () {
	  $('#dataObat').DataTable();
    $('#dataStock').DataTable();
    $('#dataRumkit').DataTable();
    $('#dataPuskes').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
</script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>./ad.js"></script>

<script src="<?php echo base_url() ?>bower_components/popper/dist/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

