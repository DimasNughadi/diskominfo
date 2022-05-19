 <!-- Main Footer -->
 <footer class="main-footer">
 	<!-- To the right -->
 	<div class="float-right d-none d-sm-inline">

 	</div>
 	<!-- Default to the left -->
 	<strong>Copyright &copy; <?= date('Y') ?> <a href="https://diskominfotik.riau.go.id/" target="_blank">DiskominfotikRiau</a>.</strong> All rights reserved.
 </footer>
 </div>
 <!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


  <!-- Bootstrap 4 -->
  <script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("assets/dist/js/adminlte.min.js") ?>"></script>
  <!-- Sweetalert -->
  <script src="<?= base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
  <!-- Toastr -->
  <script src="<?= base_url() . 'assets/plugins/toastr/toastr.min.js' ?>"></script>
</body>

</html>

<!-- modal-logout -->
<div class="modal fade" id="modal-logout">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
        <b class="h4">Apakah anda yakin ingin logout?</b>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="btn  btn-danger" href="<?= site_url('auth/logout') ?>">Logout</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Alert Config -->
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 10000
    });
    <?php if ($this->session->flashdata('success')) { ?>
      Toast.fire({
        icon: 'success',
        title: '<?= $this->session->flashdata('success'); ?>'
      });
    <?php } else if ($this->session->flashdata('error')) {  ?>
      Toast.fire({
        icon: 'error',
        title: '<?= $this->session->flashdata('error'); ?>'
      });
    <?php } else if ($this->session->flashdata('warning')) {  ?>
      Toast.fire({
        icon: 'warning',
        title: '<?= $this->session->flashdata('warning'); ?>'
      });
    <?php } else if ($this->session->flashdata('info')) {  ?>
      Toast.fire({
        icon: 'info',
        title: '<?= $this->session->flashdata('info'); ?>'
      });
    <?php } ?>
  });
</script>

 <!-- jquery vendor -->
 <script src="<?= base_url('assets/') ?>js/lib/jquery.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/jquery.nanoscroller.min.js"></script>
 <!-- nano scroller -->
 <script src="<?= base_url('assets/') ?>js/lib/menubar/sidebar.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/preloader/pace.min.js"></script>
 <!-- sidebar -->
 <script src="<?= base_url('assets/') ?>js/lib/bootstrap.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
 <!-- bootstrap -->
 <script src="<?= base_url('assets/') ?>js/lib/calendar-2/moment.latest.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/calendar-2/pignose.calendar.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/calendar-2/pignose.init.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/weather/jquery.simpleWeather.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/weather/weather-init.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/circle-progress/circle-progress.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/circle-progress/circle-progress-init.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/chartist/chartist.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/sparklinechart/jquery.sparkline.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/sparklinechart/sparkline.init.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/owl-carousel/owl.carousel.min.js"></script>
 <script src="<?= base_url('assets/') ?>js/lib/owl-carousel/owl.carousel-init.js"></script>
 <!-- scripit init-->
 <script src="<?= base_url('assets/') ?>js/dashboard2.js"></script>

 <!-- jQuery -->
 <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/jszip/jszip.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/pdfmake/pdfmake.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/pdfmake/vfs_fonts.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
 <!-- SweetAlert2 -->
 <script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
 <!-- Bootstrap Switch -->
 <script src="<?= base_url('assets/') ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 <!-- Page specific script -->


 <script>
 	$(function() {
 		$(".custom-file-input").on("change", function() {
 			var fileName = $(this).val().split("\\").pop();
 			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
 		})
 		$("input[data-bootstrap-switch]").each(function() {
 			$(this).bootstrapSwitch('state', $(this).prop('checked'));
 		})
 		$("#example1").DataTable({
 			"responsive": true,
 			"lengthChange": false,
 			"autoWidth": false,
 			"buttons": ["colvis"]
 		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 		$('#example2').DataTable({
 			"paging": true,
 			"lengthChange": false,
 			"searching": false,
 			"ordering": true,
 			"info": true,
 			"autoWidth": false,
 			"responsive": true,
 		});
 	});
 </script>
 </body>

 </html>