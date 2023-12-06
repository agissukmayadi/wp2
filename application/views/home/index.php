<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center align-items-md-center">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
		<h1>Car Hire - <span>Search</span></h1>
		<form action="<?= base_url("home/car_list") ?>" method="get"
			class="d-flex flex-column flex-md-row row-gap-2 row-gap-md-0 column-gap-md-2 align-items-md-center bg-primary p-3 p-md-2 rounded-2 shadow">
			<div class="flex-grow-1">
				<span class="text-white d-block d-md-none">Tanggal sewa : </span>
				<input type="date" name="rent_date" id="" required class="form-control" />
			</div>
			<div>
				<span class="text-white font-weight-bold d-none d-md-block">-</span>
			</div>
			<div class="flex-grow-1">
				<span class="text-white d-block d-md-none">Tanggal pengembalian :
				</span>
				<input type="date" name="return_date" id="" required class="form-control" />
			</div>
			<button class="btn btn-primary border" type="submit">
				<i class="bi bi-search"></i> Search
			</button>
		</form>
	</div>
</section>
<!-- End Hero -->

<!-- ======= Clients Section ======= -->
<section id="clients" class="clients section-bg">
	<div class="container" data-aos="zoom-in">
		<div class="row justify-content-center">
			<div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
				<img src="<?= base_url() ?>assets/img/brand/daihatsu.png" class="img-fluid" alt="" />
			</div>
			<div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
				<img src="<?= base_url() ?>assets/img/brand/mitsubishi.png" class="img-fluid" alt="" />
			</div>
			<div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
				<img src="<?= base_url() ?>assets/img/brand/hyundai.png" class="img-fluid" alt="" />
			</div>
			<div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
				<img src="<?= base_url() ?>assets/img/brand/toyota.png" class="img-fluid" alt="" />
			</div>
			<div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
				<img src="<?= base_url() ?>assets/img/brand/honda.png" class="img-fluid" alt="" />
			</div>
		</div>
	</div>
</section>
<!-- End Clients Section -->

<main id="main">
	<!-- ======= Featured Services Section ======= -->
	<section id="featured-services" class="featured-services">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h3>Rental <span>Process</span></h3>
			</div>

			<div class="d-flex flex-wrap justify-content-center gap-4">
				<div class="d-flex align-items-stretch" style="width: 400px">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="100">
						<div class="icon"><i class="bi bi-person-add"></i></div>
						<h4 class="title"><a href="">Membuat Akun</a></h4>
						<p class="description">
							Membuat akun terlebih dahulu pada halaman pendaftaran
						</p>
					</div>
				</div>

				<div class="d-flex align-items-stretch" style="width: 400px">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="200">
						<div class="icon"><i class="bi bi-car-front"></i></div>
						<h4 class="title"><a href="">Memilih Mobil</a></h4>
						<p class="description">
							Mencari mobil berdasarkan rentang waktu penyewaan hingga
							pengembalian dan sesuaikan dengan kebutuhan anda
						</p>
					</div>
				</div>

				<div class="d-flex align-items-stretch" style="width: 400px">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="300">
						<div class="icon"><i class="bi bi-credit-card"></i></div>
						<h4 class="title"><a href="">Melakukan Pembayaran</a></h4>
						<p class="description">
							Lakukan pembayaran serta melakukan upload dokumen SIM sebagai
							jaminan, dan akan diverifikasi maksimal 1x24 jam
						</p>
					</div>
				</div>

				<div class="d-flex align-items-stretch" style="width: 400px">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="400">
						<div class="icon"><i class="bi bi-pin-map"></i></div>
						<h4 class="title"><a href="">Ambil Mobil</a></h4>
						<p class="description">
							Ambil mobil pada tanggal sewa serta bawa jaminan dan
							perlihatkan ke pada petugas
						</p>
					</div>
				</div>

				<div class="d-flex align-items-stretch" style="width: 400px">
					<div class="icon-box" data-aos="fade-up" data-aos-delay="400">
						<div class="icon"><i class="bi bi-arrow-return-left"></i></div>
						<h4 class="title"><a href="">Pengembalian Mobil</a></h4>
						<p class="description">
							Kembalikan mobil sesuai dengan waktu yang sudah ditentukan,
							jika melewati tanggal pengembalian maka akan dikenakan denda
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Featured Services Section -->

	<!-- ======= About Section ======= -->
	<section id="about" class="about section-bg">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2>About</h2>
				<h3>Find Out More <span>About Us</span></h3>
			</div>

			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
					<img src="<?= base_url() ?>assets/img/about.png" class="img-fluid" alt="" />
				</div>
				<div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up"
					data-aos-delay="100">
					<h3>GoDrive.</h3>
					<p class="fst-italic">
						GoDrive adalah perusahaan yang menawarkan layanan peminjaman
						jenis kendaraan yang dapat disesuaikan dengan kebutuhan Anda,
						mulai dari sewa kendaraan jangka pendek dan panjang untuk
						keperluan operasional bisnis hingga sewa mobil harian dengan
						lepas kunci untuk kebutuhan pribadi.
					</p>
					<p>
						Alasan mengapa harus memilih sewa mobil di GoDrive Rentcar :
					</p>
					<ul>
						<li>
							<div class="icon-mark">
								<i class="bi bi-check2-all"></i>
							</div>
							<div>
								<h5>Menawarkan harga sewa yang kompetitif</h5>
							</div>
						</li>
						<li>
							<div class="icon-mark">
								<i class="bi bi-check2-all"></i>
							</div>
							<div>
								<h5>Kualitas layanan yang andal dan profesional.</h5>
							</div>
						</li>
						<li>
							<div class="icon-mark">
								<i class="bi bi-check2-all"></i>
							</div>
							<div>
								<h5>
									Praktis, ekonomis, aman, nyaman, harga terjangkau dan
									memuaskan.
								</h5>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section -->

	<section id="cta">
		<div class="container">
			<div class="row align-items-center" data-aos="zoom-in" data-aos-duration="1000">
				<div class="col-lg-9 text-center text-lg-start col-12">
					<h3>BUTUH KENDARAAN ? BOOKING SEKARANG</h3>
					<p>
						Apakah Anda membutuhkan kendaraan untuk keperluan pribadi,
						liburan keluarga, atau perjalanan bisnis? Jangan khawatir! Kami
						di GoDrive siap memberikan solusi transportasi yang tepat untuk
						Anda. Dapatkan kendaraan yang Anda butuhkan dengan cepat dan
						mudah melalui layanan rental mobil terbaik kami
					</p>
				</div>
				<div class="col-lg-3 text-center col-12 mt-3 mt-lg-0">
					<a href="#" class="btn-cta">BOOKING</a>
				</div>
			</div>
		</div>
	</section>
	<!-- ======= Frequently Asked Questions Section ======= -->
	<section id="faq" class="faq section-bg">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2>F.A.Q</h2>
				<h3>Frequently Asked <span>Questions</span></h3>
			</div>

			<div class="row justify-content-center">
				<div class="col-xl-10">
					<ul class="faq-list">
						<li>
							<div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
								Apakah Saya Harus Memiliki SIM untuk Menyewa Mobil?
								<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
							</div>
							<div id="faq1" class="collapse" data-bs-parent=".faq-list">
								<p>
									Ya, Anda harus memiliki SIM yang valid untuk menyewa
									mobil. Kami akan memeriksa dan memvalidasi SIM Anda selama
									proses penyewaan.
								</p>
							</div>
						</li>

						<li>
							<div data-bs-toggle="collapse" class="collapsed question" href="#faq2">
								Apakah Penyewaan Termasuk Asuransi?
								<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
							</div>
							<div id="faq2" class="collapse" data-bs-parent=".faq-list">
								<p>
									Ya, asuransi kendaraan dan asuransi jiwa sudah termasuk
									dalam biaya penyewaan
								</p>
							</div>
						</li>

						<li>
							<div data-bs-toggle="collapse" class="collapsed question" href="#faq3">
								Bagaimana Sistem Pembayaran Berfungsi?
								<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
							</div>
							<div id="faq3" class="collapse" data-bs-parent=".faq-list">
								<p>
									Kami menerima pembayaran melalui bank atau metode
									pembayaran online lainnya. Pembayaran akan diverifikasi
									sebelum Anda dapat mengambil mobil.
								</p>
							</div>
						</li>

						<li>
							<div data-bs-toggle="collapse" class="collapsed question" href="#faq4">
								Bagaimana Jika Saya Terlambat Mengembalikan Mobil?
								<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
							</div>
							<div id="faq4" class="collapse" data-bs-parent=".faq-list">
								<p>
									Terlambat mengembalikan mobil dapat mengakibatkan biaya
									keterlambatan. Pastikan untuk mengembalikan mobil sesuai
									dengan waktu yang telah disepakati.
								</p>
							</div>
						</li>

						<li>
							<div data-bs-toggle="collapse" class="collapsed question" href="#faq5">
								Apakah Bahan Bakar Termasuk dalam Biaya Penyewaan?

								<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
							</div>
							<div id="faq5" class="collapse" data-bs-parent=".faq-list">
								<p>
									Bahan bakar biasanya tidak termasuk dalam biaya penyewaan.
									Anda harus mengisi bahan bakar sebelum mengembalikan
									mobil.
								</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End Frequently Asked Questions Section -->

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2>Contact</h2>
				<h3><span>Contact Us</span></h3>
			</div>

			<div class="row" data-aos="fade-up" data-aos-delay="100">
				<div class="col-lg-4">
					<div class="info-box mb-4">
						<i class="bx bx-map"></i>
						<h3>Our Address</h3>
						<p>Jl. Pagelaran Ciomas, Bogor, 16610</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="info-box mb-4">
						<i class="bx bx-envelope"></i>
						<h3>Email Us</h3>
						<p>godrive.official@gmail.com</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="info-box mb-4">
						<i class="bx bx-phone-call"></i>
						<h3>Call Us</h3>
						<p>+62 851 5613 4922</p>
					</div>
				</div>
			</div>

			<div class="row" data-aos="fade-up" data-aos-delay="100">
				<div class="col-lg-12">
					<iframe class="mb-4 mb-lg-0"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15853.110367733418!2d106.75132276379843!3d-6.612391079061399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5724cf53d59%3A0xd61ec15819a57035!2sPagelaran%2C%20Kec.%20Ciomas%2C%20Kabupaten%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1697979534838!5m2!1sid!2sid"
						frameborder="0" style="border: 0; width: 100%; height: 384px" allowfullscreen></iframe>
				</div>

			</div>
		</div>
	</section>
	<!-- End Contact Section -->
</main>
<!-- End #main -->
