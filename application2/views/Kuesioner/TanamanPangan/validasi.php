
<main id="main" class="main">

	<div class="pagetitle">
		<h1><?php echo $title; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Tanaman Pangan</a></li>
				<li class="breadcrumb-item active"><?php echo $title; ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok2Form" action="<?php echo base_url('TanamanPangan/validasi')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">


				<div class="card">
					<div class="card-body">
						<?php $this->load->view('Kuesioner/TanamanPangan/tabs'); ?>

						<!-- Default Accordion -->
						<div class="accordion" id="accordionExample">
							<?php  foreach ($validasiList as $key => $value): ?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading<?php echo $key; ?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key; ?>">
										<?php echo $value['error']; ?>
									</button>
								</h2>
								<div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<strong>LOKASI: </strong><?php echo $value['lokasi']; ?>
										<br>
										<strong>SOLUSI: </strong><?php echo $value['solusi']; ?>
										<br>
										<?php  foreach ($value['button'] as $button): ?>
										<a class="btn btn-success" href="<?php echo $button['url']; ?>"><?php echo $button['label']; ?></a>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div><!-- End Default Accordion Example -->

						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("TanamanPangan/halaman6"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman 7  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Kuesioner/entri_data")?>">Selesai <i class="bi bi-arrow-right"></i> </button>
						</div>

					</div>
				</div>


			</div>
		</div>


		</form>
	</section>

</main><!-- End #main -->

<script>
	//$('input[name="name_of_your_radiobutton"]:checked').val();
	const state={
		tahun:'<?php echo $sub['tahun'] ?>',
		id_prov:'<?php echo $sub['id_prov'] ?>',
		id_kab:'<?php echo $sub['id_kab'] ?>',
		id_kec:'<?php echo $sub['id_kec'] ?>',
		id_desa:'<?php echo $sub['id_desa'] ?>',
		no_ruta:'<?php echo $sub['no_ruta'] ?>',
		b7:'<?php echo $sub['catatan']?>'
	}
	function generateUUID() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = (Math.random() * 16) | 0,
				v = c === 'x' ? r : (r & 0x3) | 0x8;
			return v.toString(16);
		});
	}


	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')
		$('#b7').on('change',function (){
			state.b7=$(this).val();
		})


		$('#submitBtn, #backBtn, .halaman-tabs').on('click',function (e) {
			e.preventDefault();
			$('#submitBtn, #backBtn').empty();
			$('#submitBtn, #backBtn').append(`
			<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				Loading...`);
			$('#submitBtn, #backBtn').attr('disabled',true);

			let url = $(this).data('url');
			if(typeof url === "undefined"){
				url = $(this).find('.active').data('url')
			}

			let action = $(this).data('url')
			setTimeout(function (){
				$.ajax({
					url: `<?php echo base_url('TanamanPangan/submitvalidasi')?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 6 `);
						$('#submitBtn').append(`Selesai<i class="bi bi-arrow-right"></i> `);
						$('#submitBtn, #backBtn').attr('disabled',false);
						if(response.ok){
							$('#footernotif').after(`
							<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
							Berhasil disimpan</div>`);
							location.href=url
						}else {
							$('.response-submit-btn').remove()
							$('#submitBtn, #backBtn').empty();
							$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 6 `);
							$('#submitBtn').append(`Selesai <i class="bi bi-arrow-right"></i> `);
							$('#footernotif').after(`
						<div class="alert alert-danger fade show response-submit-btn m-3" role="alert">
						${response.message}</div>`);
							$('#submitBtn, #backBtn').attr('disabled',false);
						}
					},
					error: function(xhr, status, error) {
						console.log(error); // Tanggapan error dari server
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 6 `);
						$('#submitBtn').append(`Selesai <i class="bi bi-arrow-right"></i> `);
						$('#footernotif').after(`
						<div class="alert alert-danger fade show response-submit-btn m-3" role="alert">
						Gagal, harap coba lagi</div>`);
						$('#submitBtn, #backBtn').attr('disabled',false);
					}
				});

			},300);
		});
	});
</script>
