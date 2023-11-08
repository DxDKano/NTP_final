
<main id="main" class="main">

	<div class="pagetitle">
		<h1>BLOK I</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioer/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioer/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Tanaman Pangan</a></li>
				<li class="breadcrumb-item active">Blok I</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok1Form" action="<?php echo base_url('TanamanPangan/submitblok1')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Pengenalan Tempat</h5>

						<!-- Floating Labels Form -->
						<div class="row g-3">
							<div class="col-md-4">
								<div class="form-floating mb-3">
									<select class="form-select" id="i1" aria-label="i1" name="i1" disabled required>
										<option value="<?php echo $id_prov ?>" selected>Sulawesi Utara</option>
									</select>
									<label for="i1">Provinsi</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating mb-3">
									<select class="form-select" id="i2" name="i2" aria-label="i2" disabled required>
										<option value="<?php echo $id_kab ?>" selected><?php echo $kabupaten['nama_kab'] ?></option>
									</select>
									<label for="i2">Kabupaten</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating mb-3">
									<select class="form-select" id="i3" aria-label="i3" required>
										<option selected>Pilih Kecamatan</option>
										<?php foreach ($kecamatan as $item): ?>
											<option value="<?php echo $item['id_kec'] ?>"><?php echo $item['nama_kec'] ?></option>
										<?php endforeach; ?>
									</select>
									<label for="i3">Kecamatan</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating mb-3">
									<select class="form-select" id="i4" aria-label="i4" required>
										<option selected>Pilih Desa/Kelurahan</option>
									</select>
									<label for="i4">Desa/Kelurahan</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-floating input-group mb-3">
									<input id="i5" name="i5" type="text" class="form-control align-right" placeholder="Blok Sensus" aria-label="i5" required>
									<span class="input-group-text" id="i5-addon">B</span>
									<label for="i5">Blok Sensus</label>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-floating mb-3">
									<select class="form-select" id="i6a" aria-label="i6a" required>
										<option value="1">Utama</option>
										<option value="2">Pengganti</option>
									</select>
									<label for="i6a">Status Sampel</label>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-floating mb-3">
									<input id="i6b" type="text" class="form-control" placeholder="No Urut Rumah Tangga Sampel" aria-label="i6b" required>
									<label for="i6b">No Urut Rumah Tangga Sampel</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-floating">
									<input type="text" class="form-control" id="i7" placeholder="Nama Kepala Rumah Tangga" required>
									<label for="i7">Nama Kepala Rumah Tangga</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-floating mb-3">
									<select class="form-select" id="i8" aria-label="i8" required>
										<?php foreach ($subsektor as $item): ?>
											<option value="<?php echo $item['id_subsektor'] ?>"
												<?php echo isset($get["id_subsektor"])?$get["id_subsektor"]==$item['id_subsektor']?"selected":"":"" ?>>
												<?php echo $item['subsektor'] ?>
											</option>
										<?php endforeach; ?>
									</select>
									<label for="i8">Komoditas Utama</label>
								</div>
							</div>
							<div id="footernotif" class="text-center">
								<button id="submitBtn" type="button" class="btn btn-primary">Blok II <i class="bi bi-arrow-right"></i> </button>
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
	const init = ()=>{
		$('#i3').val('');
		$('#i4').val('');
		$('#i5').val('');
		$('#i6b').val('');
		$('#i7').val('');
	}
	$(document).ready(()=>{
		$('#i3').on('change',()=>{
			const data = new FormData();
			data.set('idprov',$('#i1').val())
			data.set('idkab',$('#i2').val())
			data.set('idkec',$('#i3').val())
			setTimeout(function (){
				$.ajax({
					type: "POST",
					url: `<?php echo base_url('TanamanPangan/ambilDesa')?>`,
					data: data,
					contentType: false,
					processData: false,
					cache: false,
					dataType: 'json',
					timeout: 40000
				}).done( function(response){
					if(response.ok){
						$('#i4').empty();
						$('#i4').append(`<option selected>Pilih Desa/Kelurahan</option>`);
						for(let i=0; i<response.data.length; i++){
							const item = response.data[i]
							$('#i4').append(`<option value="${item.id_desa}">${item.nama_desa}</option>`);
						}
					}else {
						$('#i3').val('')
					}
				}).fail( function(data){
					$('#i3').val('')

				});
			},300);

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
			data.set('i1',$("#i1").val());
			data.set('i2',$("#i2").val());
			data.set('i3',$("#i3").val());
			data.set('i4',$("#i4").val());
			data.set('i5',$("#i5").val());
			data.set('i6a',$("#i6a").val());
			data.set('i6b',$("#i6b").val());
			data.set('i7',$("#i7").val());
			data.set('i8',$("#i8").val());
			console.log(data.values())
			setTimeout(function (){
				$.ajax({
					type: "POST",
					url: `<?php echo base_url('TanamanPangan/submitblok1')?>`,
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
					$('#submitBtn').append(`Blok II <i class="bi bi-arrow-right"></i> `);
					$('#submitBtn').attr('disabled',false);
					if(response.ok){
						/*$('#footernotif').after(`
						<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
						${response.message}</div>`);*/
						location.replace(`<?php echo base_url('TanamanPangan/blok2')?>`)
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
