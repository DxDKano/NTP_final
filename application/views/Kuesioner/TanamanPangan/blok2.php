
<main id="main" class="main">

	<div class="pagetitle">
		<h1>BLOK II</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioer/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioer/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Tanaman Pangan</a></li>
				<li class="breadcrumb-item active">Blok II</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok2Form" action="<?php echo base_url('TanamanPangan/submitblok2')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">KETERANGAN PENCACAHAN</h5>

						<!-- Floating Labels Form -->
						<div class="row g-3">
							<div class="col-md-6">
							<div class="form-floating mb-3">
								<input id="ii1" name="ii1" type="text" class="form-control align-right" placeholder="Nama" aria-label="ii1" required>
								<label for="ii1">Nama Pencacah</label>
							</div>
							</div>
							<div class="col-md-3">
							<div class="form-floating mb-3">
								<input id="ii2" name="ii2" type="text" class="form-control align-right" placeholder="Kode Pencacah" aria-label="ii2" required>
								<label for="ii2">Kode Pencacah</label>
							</div>
							</div>
							<div class="col-md-3">
							<div class="form-floating mb-3">
								<input id="ii3" name="ii3" type="date" class="form-control align-right" placeholder="Tanggal Pencacahan" aria-label="ii3" required>
								<label for="ii3">Tanggal Pencacahan</label>
							</div>
							</div>

							<div id="footernotif" class="text-center">
								<button id="backBtn" type="button" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Blok I  </button>
								<button id="submitBtn" type="button" class="btn btn-primary">Blok III <i class="bi bi-arrow-right"></i> </button>
							</div>
						</div><!-- End floating Labels Form -->

					</div>
				</div>



			</div>
		</div>


		</form>
	</section>

</main><!-- End #main -->

<script>
	$(document).ready(()=>{

		$('#backBtn').on('click',function (){
			location.replace(`<?php echo base_url('TanamanPangan/blok1')?>`)
		})

		$('#submitBtn').on('click',function (e) {
			e.preventDefault();
			$('#submitBtn').empty();
			$('#submitBtn').append(`
			<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				Loading...`);
			$('#submitBtn').attr('disabled',true);

			let action = this.getAttribute('action');

			var data = new FormData();
			data.set('ii1',$("#ii1").val());
			data.set('ii2',$("#ii2").val());
			data.set('ii3',$("#ii3").val());
			setTimeout(function (){
				$.ajax({
					type: "POST",
					url: `<?php echo base_url('TanamanPangan/submitblok2')?>`,
					data: data,
					contentType: false,
					processData: false,
					cache: false,
					mimeType: "multipart/form-data",
					dataType: 'json',
					timeout: 40000
				}).done( function(response){
					console.log(response.ok)
					$('.response-submit-btn').remove()
					$('#submitBtn').empty();
					$('#submitBtn').append(`Blok III <i class="bi bi-arrow-right"></i> `);
					$('#submitBtn').attr('disabled',false);
					if(response.ok){
						/*$('#footernotif').after(`
						<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
						${response.message}</div>`);*/
						location.replace(`<?php echo base_url('TanamanPangan/blok3')?>`)
					}else {
						$('#footernotif').after(`
						<div class="alert alert-danger fade show response-submit-btn m-3" role="alert">
						${response.message}</div>`);
					}
				}).fail( function(data){
					$('.response-submit-btn').remove()
					$('#submitBtn').empty();
					$('#submitBtn').append(`Daftar`);
					$('#footernotif').after(`
						<div class="alert alert-danger fade show response-submit-btn m-3" role="alert">
						Gagal, harap coba lagi</div>`);
					$('#submitBtn').attr('disabled',false);
				});
			},300);
		});
	});
</script>
