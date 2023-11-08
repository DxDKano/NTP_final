
<main id="main" class="main">

	<div class="pagetitle">
		<h1>Halaman 1</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Perkebunan</a></li>
				<li class="breadcrumb-item active"><?php echo $title ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok1Form" action="<?php echo base_url('Perkebunan/submitblok1')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">

						<?php $this->load->view('Kuesioner/Perkebunan/tabs'); ?>
						<h5 class="card-title"><?php echo $title ?></h5>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr>
								<th scope="col" colspan="3" class="table-secondary">I. PENGENALAN TEMPAT</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<th>1. Provinsi</th>
								<td>Sulawesi Utara</td>
								<td><?php echo $sub['id_prov'] ?></td>
							</tr>
							<tr>
								<th>2. Kabupaten</th>
								<td><?php echo $sub['nama_kab'] ?></td>
								<td><?php echo $sub['id_kab'] ?></td>
							</tr>
							<tr>
								<th>3. Kecamatan</th>
								<td>
									<!--<select class="form-select" id="i3" aria-label="i3" required>
										<option selected>Pilih Kecamatan</option>
										<?php foreach ($kecamatan as $item): ?>
											<option value="<?php echo $item['id_kec'] ?>"><?php echo $item['nama_kec'] ?></option>
										<?php endforeach; ?>
									</select>-->
									<?php echo $sub['nama_kec'] ?>
								</td>
								<td id="val_i3"><?php echo $sub['id_kec'] ?></td>
							</tr>
							<tr>
								<th>4. Desa/Kelurahan</th>
								<td>
									<!--<select class="form-select" id="i4" aria-label="i4" required>
										<option selected>Pilih Desa/Kelurahan</option>
									</select>-->
									<?php echo $sub['nama_desa'] ?>
								</td>
								<td id="val_i4"><?php echo $sub['id_desa'] ?></td>
							</tr>
							<tr>
								<th>5. Nomor Blok Sensus</th>
								<td>
									<!--<input id="i5" name="i5" type="text" class="form-control" placeholder="Blok Sensus" aria-label="i5" required>
									-->
								<?php echo $sub['blok_sensus'] ?>
								</td>
								<td id="val_i5"><?php echo $sub['blok_sensus'] ?></td>
							</tr>
							<tr>
								<th>6. Nomor Urut Rumah Tangga Sampel</th>
								<td>
									<!--<select class="form-select" id="i6a" aria-label="i6a" required disabled>
										<option value="1" <?php echo $sub['sampel']=="1"?'selected':'' ?>>Utama</option>
										<option value="2" <?php echo $sub['sampel']=="2"?'selected':'' ?>>Pengganti</option>
									</select>-->
									<?php echo $sub['sampel']=="1"?'Utama':($sub['sampel']=="2"?'Pengganti':'') ?>
								</td>
								<td id="val_i6">
									<!--<input id="i6b" type="text" class="form-control" placeholder="No Urut Rumah Tangga Sampel" aria-label="i6b" required>-->
									<?php echo $sub['no_ruta'] ?>
								</td>
							</tr>
							<tr>
								<th>7. Nama Kepala Rumah Tangga</th>
								<td>
									<!--<input type="text" class="form-control" id="i7" placeholder="Nama Kepala Rumah Tangga" required>-->
									<?php echo $sub['nama_ruta'] ?>
								</td>
								<td id="val_i7" class="table-secondary"></td>
							</tr>
							<tr>
								<th>8. Jenis Komoditas Utama</th>
								<td>
									<!--<select class="form-select" id="i8" aria-label="i8" required>
										<?php foreach ($subsektor as $item): ?>
											<option value="<?php echo $item['id_subsektor'] ?>"
													<?php echo $sub["subsektor"]==$item['id_subsektor']?"selected":"" ?>>
												<?php echo $item['subsektor'] ?>
											</option>
										<?php endforeach; ?>
									</select>-->
									<?php echo $sub["nama_subsektor"] ?>
								</td>
								<td id="val_i8"><?php echo $sub["subsektor"] ?></td>
							</tr>
							</tbody>

							<thead class="text-center top-0">
							<tr>
								<th scope="col" colspan="3" class="table-secondary">II. KETERANGAN PENCACAHAN</th>
							</tr>
							<tr>
								<th>RINCIAN</th>
								<th>PENCACAH</th>
								<th>PEMERIKSA</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<th>1. N a m a</th>
								<td>
									<!--<input id="b2_1_a" name="ii1" type="text" class="form-control align-right" placeholder="Nama" value="<?php echo $user['nama'] ?>" required>-->
									<?php echo $sub['nama_pcl'] ?>
								</td>
								<td><?php echo $sub['nama_pml'] ?></td>
							</tr>
							<tr>
								<th>2. Kode Petugas</th>
								<td>
									<!--<input id="b2_2_a" name="ii2" type="text" class="form-control align-right" placeholder="Kode Pencacah" value="<?php echo $user['kode_petugas'] ?>" required>-->
									<?php echo $sub['kode_pcl'] ?>
								</td>
								<td><?php echo $sub['kode_pml'] ?></td>
							</tr>
							<tr>
								<th>3. Tanggal</th>
								<td>
									<input id="b2_3_a" name="ii3a" type="date" class="form-control align-right" placeholder="Tanggal Pencacahan" aria-label="ii3a" value="<?php echo $sub['tanggal_pcl']?>" required>
								</td>
								<td>
									<input id="b2_3_b" name="ii3b" type="date" class="form-control align-right" placeholder="Tanggal Pencacahan" aria-label="ii3b" value="<?php echo $sub['tanggal_pml']?>" required>
								</td>
							</tr>
							<tr>
								<th>4. Tanda Tangan</th>
								<td></td>
								<td></td>
							</tr>
							</tbody>
						</table>
						<!-- End small tables -->

						<div id="footernotif" class="text-center">
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Perkebunan/halaman2"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>">Halaman 2 <i class="bi bi-arrow-right"></i> </button>
						</div>

					</div>
				</div>



			</div>
		</div>


		</form>
	</section>

</main><!-- End #main -->

<script>

	//tahun=2022&id_prov=71&id_kab=07&id_kec=010&id_desa=003&no_ruta=194
	const state = {
		tahun:'<?php echo $sub['tahun'] ?>',
		id_prov:'<?php echo $sub['id_prov'] ?>',
		id_kab:'<?php echo $sub['id_kab'] ?>',
		id_kec:'<?php echo $sub['id_kec'] ?>',
		id_desa:'<?php echo $sub['id_desa'] ?>',
		no_ruta:'<?php echo $sub['no_ruta'] ?>',
		b2:{
			p1a:'<?php echo $sub['nama_pcl'] ?>',
			p2a:'<?php echo $sub['kode_pcl'] ?>',
			p1b:'<?php echo $sub['nama_pml'] ?>',
			p2b:'<?php echo $sub['kode_pml'] ?>',
			p3a:'<?php echo $sub['tanggal_pcl'] ?>',
			p3b:'<?php echo $sub['tanggal_pml'] ?>',
		}
	}

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
			$('#val_i3').html($('#i3').val())
			state.b1.p3=$('#i3').val()
			setTimeout(function (){
				$.ajax({
					type: "POST",
					url: `<?php echo base_url('Perkebunan/ambilDesa')?>`,
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
		$('#i4').on('change',()=>{
			state.b1.p4=$('#i4').val()
			$('#val_i4').html(state.b1.p4)
		})
		$('#i5').on('change',()=>{
			state.b1.p5=`${$('#i5').val()}`
			$('#val_i5').html(state.b1.p5)
		})
		$('#i6a').on('change',()=>{
			state.b1.p6a=`${$('#i6a').val()}`
		})
		$('#i6b').on('change',()=>{
			state.b1.p6b=`${$('#i6b').val()}`
		})
		$('#i7').on('change',()=>{
			state.b1.p7=`${$('#i7').val()}`
			$('#val_i7').html(state.b1.p7)
		})
		$('#i8').on('change',()=>{
			state.b1.p8=`${$('#i8').val()}`
			$('#val_i8').html(state.b1.p8)
		})
		$('#b2_1_a').on('change',()=>{
			state.b2.p1a=`${$('#b2_1_a').val()}`
		})
		$('#b2_2_a').on('change',()=>{
			state.b2.p2a=`${$('#b2_2_a').val()}`
		})
		$('#b2_3_a').on('change',()=>{
			state.b2.p3a=`${$('#b2_3_a').val()}`
		})
		$('#b2_3_b').on('change',()=>{
			state.b2.p3b=`${$('#b2_3_b').val()}`
		})

		$('#submitBtn, .halaman-tabs').on('click',function (e) {
			e.preventDefault();
			$('#submitBtn').empty();
			$('#submitBtn').append(`
			<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				Loading...`);
			$('#submitBtn').attr('disabled',true);

			let url = $(this).data('url');
			if(typeof url === "undefined"){
				url = $(this).find('.active').data('url')
			}

			setTimeout(function (){
				$.ajax({
					url: `<?php echo base_url('Perkebunan/submithalaman1')?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn').empty();
						$('#submitBtn').append(`Halaman 2 <i class="bi bi-arrow-right"></i> `);
						$('#submitBtn').attr('disabled',false);
						if(response.ok){
							/*$('#footernotif').after(`
							<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
							${response.message}</div>`);*/
							//?tahun=2022&id_prov=71&id_kab=07&id_kec=010&id_desa=003&no_ruta=194
							//console.log(url)
							location.href=url
						}else {
							$('#footernotif').after(`
								<div class="alert alert-danger fade show response-submit-btn m-3" role="alert">
								${response.message}</div>`);
						}
					},
					error: function(xhr, status, error) {
						console.log(error); // Tanggapan error dari server
						$('.response-submit-btn').remove()
						$('#submitBtn').empty();
						$('#submitBtn').append(`Halaman 2 <i class="bi bi-arrow-right"></i> `);
						$('#footernotif').after(`
						<div class="alert alert-danger fade show response-submit-btn m-3" role="alert">
						Gagal, harap coba lagi</div>`);
						$('#submitBtn').attr('disabled',false);
					}
				});

			},300);
		});
	});
</script>
