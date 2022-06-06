<div class="row">
	<div class="col-lg-12">
		<div class="footer">
			<p>2018 © Admin Board. - <a href="#">example.com</a></p>
		</div>
	</div>
</div>
</section>
</div>
</div>
</div>

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

<!-- scripit init-->

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
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Page specific script -->

<script src="<?= base_url('assets/') ?>js/lib/barRating/jquery.barrating.js"></script>
<script src="<?= base_url('assets/') ?>js/lib/barRating/barRating.init.js"></script>
<script src="<?= base_url('assets/') ?>js/lib/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>js/scripts.js"></script>


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