</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Go Drive 2023</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url("assets/vendor/Sbadmin-2/") ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url("assets/vendor/Sbadmin-2/") ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url("assets/vendor/Sbadmin-2/") ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url("assets/vendor/Sbadmin-2/") ?>js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url("assets/vendor/Sbadmin-2/") ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url("assets/vendor/Sbadmin-2/") ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url("assets/vendor/Sbadmin-2/") ?>js/demo/datatables-demo.js"></script>
<script>
	let currentYear = new Date().getFullYear();

	$("#year").attr("max", currentYear);
</script>
<script>
	$("#actual_return_date").on("change", function () {
		let price = $("#price").data("value")
		let return_date = new Date($("#return_date").data("value"))
		let actual_return_date = new Date($("#actual_return_date").val())
		let dayDiff = Math.ceil((actual_return_date - return_date) / (1000 * 60 * 60 * 24));
		let late_cost = Math.ceil((dayDiff * price) * 1.5)
		$("#late_cost").val(late_cost)
	})
</script>

</body>

</html>
