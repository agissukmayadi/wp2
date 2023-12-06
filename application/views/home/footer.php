<!-- ======= Footer ======= -->
<footer id="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-3 col-md-6 footer-contact">
					<h3>GoDrive<span>.</span></h3>
					<p>
						Jl.Pagelaran Ciomas <br />
						Bogor, 16610<br />
						Indonesia <br /><br />
						<strong>Phone:</strong> +62 851 5613 49222<br />
						<strong>Email:</strong> godrive.official@gmail.com<br />
					</p>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Our Social Networks</h4>
					<p>Ikuti kami melalui sosial media :</p>
					<div class="social-links mt-3">
						<a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>

						<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
						<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container py-4 d-flex justify-content-center align-items-center">
		<div class="copyright">
			&copy; Copyright <strong><span>GoDrive</span></strong>. All Rights Reserved
		</div>
	</div>
</footer>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
		class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/aos/aos.js"></script>
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url("assets/vendor/BizLand/") ?>assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
	crossorigin="anonymous"></script>
<script>
	const rent_date = $('input[name="rent_date"]');
	const return_date = $('input[name="return_date"]');

	var today = new Date();

	// Menambahkan satu hari
	var tomorrow = new Date(today);
	tomorrow.setDate(today.getDate() + 1);

	// Format tanggal sebagai string YYYY-MM-DD
	var tomorrowFormatted = tomorrow.toISOString().split('T')[0];

	// Set atribut min pada elemen rent_date
	rent_date.attr('min', tomorrowFormatted);

	rent_date.on("change", function () {
		// Ambil nilai rent_date setelah perubahan
		var selectedDate = new Date(rent_date.val());

		// Menambahkan satu hari ke nilai rent_date
		selectedDate.setDate(selectedDate.getDate() + 1);

		// Format tanggal sebagai string YYYY-MM-DD
		var nextDayFormatted = selectedDate.toISOString().split('T')[0];

		// Set atribut min pada elemen return_date
		return_date.attr("min", nextDayFormatted);
		return_date.val(""); // Mengosongkan nilai return_date jika rent_date berubah
	});
</script>

<script>
	function nameFormat(inputNama) {
		return inputNama.toLowerCase().replace(/\b\w/g, function (l) {
			return l.toUpperCase();
		});
	}

	function formatRupiah(angka) {
		// Ubah angka ke dalam format string
		var strAngka = angka.toString();

		// Pisahkan bagian desimal
		var desimal = strAngka.split('.')[1] || '';

		// Ambil bagian angka tanpa desimal
		var angkaTanpaDesimal = strAngka.split('.')[0];

		// Tambahkan tanda titik sebagai pemisah ribuan
		var ribuan = angkaTanpaDesimal.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

		// Gabungkan bagian angka tanpa desimal dengan desimal dan tambahkan simbol rupiah
		var hasilFormatted = 'Rp.' + ribuan + (desimal.length ? ',' + desimal : '');

		return hasilFormatted;
	}

	function filter_cars() {
		const typeFilter = $(".filter-active").data("filter")
		const transmitionFilter = $("#transmitionFilter").val()
		const priceFilter = $("#priceFilter").val()

		const params = {
			type: typeFilter,
			transmition: transmitionFilter,
			price: priceFilter,
			rent_date: $('#rent_date').val(),
			return_date: $('#return_date').val()
		}

		$.ajax({
			url: "<?= base_url("api/car_filter") ?>",
			type: "GET",
			data: params
		}).done((response) => {
			let cars = ""
			if (response.cars.length == 0) {
				cars = `<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
				<strong>Maaf,</strong> Mobil tidak tersedia.
			</div>`
			} else {
				response.cars.forEach(car => {
					cars += `
				<div class="col-xl-3 col-lg-4 col-md-6 col-12 cars-item d-flex align-items-stretch mt-4">
					<div class="cars-wrap">
						<div class="cars-img">
							<img src="<?= base_url('assets/') ?>img/cars/${car.image}" alt="" class="img-fluid">
						</div>
						<hr>
							<div class="cars-info">
								<h4>
									${car.merk}
								</h4>
								<table>
									<tr>
										<td width="110px">Transmisi</td>
										<td> : </td>
										<td>
											${nameFormat(car.transmition)}
										</td>
									</tr>
									<tr>
										<td width="110px">Tahun</td>
										<td> : </td>
										<td>
											${car.year}
										</td>
									</tr>
									<tr>
										<td width="110px">Jumlah Kursi</td>
										<td> : </td>
										<td>
										${car.seat} Seater
										</td>
									</tr>
									<tr>
										<td width="110px">Harga/hari</td>
										<td> : </td>
										<td>
										${formatRupiah(car.price)}
										</td>
									</tr>
								</table>
								<hr>
									<p class="fw-bold">Harga :
										${formatRupiah(car.totalPrice)}
									</p>
							</div>
							<hr>
								<form action="<?= base_url("customer/rent") ?>" method="post">
									<input type="hidden" name="car_id" value="${car.id}">
										<input type="hidden" name="rent_date" value="${rent_date}">
											<input type="hidden" name="return_date" value="${return_date}">
											<input type="hidden" name="rent_cost" value="${car.totalPrice}">
												<div class="d-grid gap-2">
													<button type="submit" class="btn btn-outline-primary btn-block">Sewa</button>
												</div>
											</form>
										</div>
									</div>
									`
				});
			}
			$("#container-cars").html(cars)
		})

	}

	$(".filter-btn").on("click", function () {
		$(".filter-btn").removeClass("filter-active");
		$(this).addClass("filter-active");

		filter_cars();
	})
	$("#transmitionFilter").on("change", filter_cars)
	$("#priceFilter").on("change", filter_cars)
</script>
</body>

</html>