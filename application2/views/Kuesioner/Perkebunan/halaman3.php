
<main id="main" class="main">

	<div class="pagetitle">
		<h1><?php echo $title; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Perkebunan</a></li>
				<li class="breadcrumb-item active"><?php echo $title; ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok2Form" action="<?php echo base_url('Perkebunan/submitblok3')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">


				<div class="card">
					<div class="card-body">
						<?php $this->load->view('Kuesioner/Perkebunan/tabs'); ?>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr>
								<th scope="col" colspan="15" class="table-secondary">III. PRODUKSI PERKEBUNAN YANG DIUSAHAKAN SELAMA SETAHUN (OKTOBER 2016 - SEPTEMBER 2017)</th>
							</tr>
							<tr>
								<td rowspan="3" style="width: 4%">No</td>
								<td rowspan="3" style="width: 7%">Komoditas (Kode Diisi Pengawas)</td>
								<td rowspan="3" style="width: 7%">Satuan Banyaknya/ Luas <br>
									1. Pohon <br>
									2. Rumpun <br>
									3. Lajar <br>
									4. m2</td>
								<td rowspan="3" style="width: 7%">Jumlah Tanaman yang Diusahakan/ Luas Tanam</td>
								<td rowspan="3" style="width: 7%">Jumlah Tanaman yang Berproduksi/ Luas Panen</td>
								<td rowspan="3" style="width: 7%">Satuan Produksi <br>
									1. Kg <br>
									2. Liter</td>
								<td rowspan="3" style="width: 7%">Produksi Dihasilkan</td>
								<td colspan="4" style="width: 30%">Pemanfaatan Hasil Produksi</td>
								<td rowspan="3">Status Lahan:<br>
									1. Milik Sendiri<br>
									2. Sewa/ Kontrak<br>
									4. Lainnya</td>
								<td rowspan="3" style="width: 7%">Status Pengelolaan<br>
									1. Sendiri<br>
									2. Bagi Hasil<br>
									3. Sendiri dan Bagi hasil</td>
								<td rowspan="3" style="width: 7%">Persentase (%) Bagi Hasil, Jika kol (13) berkode 2 atau 3</td>
								<td rowspan="3" style="width: 5%">Aksi</td>
							</tr>
							<tr>
								<td colspan="2">Produksi Dijual</td>
								<td rowspan="2">Produksi Dikonsumsi Sendiri</td>
								<td rowspan="2">Produksi untuk Lainnya</td>
							</tr>
							<tr>
								<td>Banyaknya</td>
								<td style="width: 9%">Nilai <br>(000 Rp.)</td>
							</tr>
							<tr>
								<?php for($i=1;$i<=15;$i++): ?>
									<td >(<?php echo $i ?>)</td>
								<?php endfor;?>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td colspan="8" class="table-primary">B. Tanaman Semusim</td>
								<td colspan="1" class="table-primary">
									<input id="b3_b_total" data-key="b3_b_total" type="number" class="form-control subval"  value="<?php echo $sub['b3_b_total'] ?>"></td>
								</td>
								<td colspan="6" class="table-primary"></td>
							</tr>
							<?php echo $isianBlok3b; ?>
							<!-- <i class="bi bi-plus"></i>Tambah -->
							<tr id="tr_tambah_b3_b">
								<td colspan="13" class="dropdown">
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b3_b" data-bs-toggle="dropdown">
										<i class="bi bi-plus"></i>Tambah
									</button>

									<ul class="dropdown-menu ">
										<?php foreach ($komoditas_b as $item) : ?>

										<li>
											<a class="dropdown-item d-flex align-items-center btn-tambah-b3-b" href="#"
											   data-idkomoditas="<?php echo $item['id_komoditas']?>"
											   data-namakomoditas="<?php echo $item['komoditas']?>">
												<span><?php echo $item['komoditas']?></span>
											</a>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<?php endforeach; ?>

									</ul><!-- End Profile Dropdown Items -->
								</td>
							</tr>
							</tbody>
						</table>
						<!-- End small tables -->

						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("Perkebunan/halaman".($halaman-1)
								."?tahun={$sub['tahun']}"
								."&id_prov={$sub['id_prov']}"
								."&id_kab={$sub['id_kab']}"
								."&id_kec={$sub['id_kec']}"
								."&id_desa={$sub['id_desa']}"
								."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman <?php echo ($halaman-1)?>  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Perkebunan/halaman".($halaman+1)
								."?tahun={$sub['tahun']}"
								."&id_prov={$sub['id_prov']}"
								."&id_kab={$sub['id_kab']}"
								."&id_kec={$sub['id_kec']}"
								."&id_desa={$sub['id_desa']}"
								."&no_ruta={$sub['no_ruta']}")?>">Halaman <?php echo ($halaman+1)?>  <i class="bi bi-arrow-right"></i> </button>
						</div>

					</div>
				</div>


			</div>
		</div>


		</form>
	</section>

</main><!-- End #main -->

<script>
	const state={
		tahun:'<?php echo $sub['tahun'] ?>',
		id_prov:'<?php echo $sub['id_prov'] ?>',
		id_kab:'<?php echo $sub['id_kab'] ?>',
		id_kec:'<?php echo $sub['id_kec'] ?>',
		id_desa:'<?php echo $sub['id_desa'] ?>',
		no_ruta:'<?php echo $sub['no_ruta'] ?>',
		no_komoditas_b:0,
		b3_b_total:'<?php echo $sub['b3_b_total'] ?>',
		b3_b:[],
		b3_del:[],
	}
	//ambil data blok 3 B
	<?php foreach ($sub_b3_b as $item): ?>
	state.b3_b.push({
		p1:state[`b3_b`].length+1,
		p2a:'<?php echo $item['b3_k2'] ?>',
		p2b:'<?php echo $item['b3_k2A'] ?>',
		p3:'<?php echo $item['b3_k3']?:'0' ?>',
		p4:'<?php echo $item['b3_k4']?:'0' ?>',
		p5:'<?php echo $item['b3_k5']?:'0' ?>',
		p6:'<?php echo $item['b3_k6']?:'0' ?>',
		p7:'<?php echo $item['b3_k7']?:'0' ?>',
		p8:'<?php echo $item['b3_k8']?:'0' ?>',
		p9:'<?php echo $item['b3_k9']?:'0' ?>',
		p10:'<?php echo $item['b3_k10']?:'0' ?>',
		p11:'<?php echo $item['b3_k11']?:'0' ?>',
		p12:'<?php echo $item['b3_k12']?:'0' ?>',
		p13:'<?php echo $item['b3_k13']?:'0' ?>',
		p14:'<?php echo $item['b3_k14']?:'0' ?>',
		uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
		uploaded:'update',
		type_blok:`b`
	})
	<?php endforeach; ?>
	function generateUUID() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = (Math.random() * 16) | 0,
				v = c === 'x' ? r : (r & 0x3) | 0x8;
			return v.toString(16);
		});
	}

	const onChangeB3 =(jenis) => {

		$(`.b3-${jenis}-input`).on('change', function() {
			var nilai = $(this).val();
			const uuid = $(this).data('uuid')
			const key = $(this).data('keyx')
			state[`b3_${jenis}`].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const tambahKomoditas =(p,jenis)=>{
		const {p1,p2a,p2b,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,uuid}=p;


		$(`#tr_tambah_b3_${jenis}`).before(`
					<tr class="tr_b3_${jenis}">
						<td>${p1}</td>
						<td>${p2a}<br>${p2b}</td>
						<td><input name="b3_${jenis}_3[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
						<td><input name="b3_${jenis}_4[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
						<td><input name="b3_${jenis}_5[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td><input name="b3_${jenis}_6[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td><input name="b3_${jenis}_7[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p7" data-uuid="${uuid}" value="${p7}"></td>
						<td><input name="b3_${jenis}_8[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p8" data-uuid="${uuid}" value="${p8}"></td>
						<td><input name="b3_${jenis}_9[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p9" data-uuid="${uuid}" value="${p9}"></td>
						<td><input name="b3_${jenis}_10[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p10" data-uuid="${uuid}" value="${p10}"></td>
						<td><input name="b3_${jenis}_11[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p11" data-uuid="${uuid}" value="${p11}"></td>
						<td><input name="b3_${jenis}_12[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p12" data-uuid="${uuid}" value="${p12}"></td>
						<td><input name="b3_${jenis}_13[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p13" data-uuid="${uuid}" value="${p13}"></td>
						<td><input name="b3_${jenis}_14[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p14" data-uuid="${uuid}" value="${p14}"></td>
						<td><button type="button"
									class="btn btn-danger btn-hapus-b3-${jenis}"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)
		onChangeB3(jenis)

		hapusKomoditas(jenis)
	}

	const hapusKomoditas =(jenis)=>{
		//untuk hapus
		$(`.btn-hapus-b3-${jenis}`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[`b3_${jenis}`].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[`b3_${jenis}`] = newArray

			$(`.tr_b3_${jenis}`).remove()
			for(var it=0;it<state[`b3_${jenis}`].length;it++) {
				state[`b3_${jenis}`][it].p1=it+1;
				tambahKomoditas(state[`b3_${jenis}`][it],jenis)
			}
			state.b3_del.push(uuid)

		})
	}

	const actionTambahKomoditas = (jenis)=>{

		$(`.btn-tambah-b3-${jenis}`).on('click',function (e){
			e.preventDefault();
			const idkomoditas = $(this).data('idkomoditas');
			const namakomoditas = $(this).data('namakomoditas');
			const pnew = {
				p1:state[`b3_${jenis}`].length+1,
				p2a:idkomoditas,
				p2b:namakomoditas,
				p3:'',
				p4:'',
				p5:'',
				p6:'',
				p7:'',
				p8:'',
				p9:'',
				p10:'',
				p11:'',
				p12:'',
				p13:'',
				p14:'',
				uuid:generateUUID(),
				type_blok:`${jenis}`
			}
			state[`b3_${jenis}`].push(pnew)
			tambahKomoditas(pnew,jenis)



		})

		onChangeB3(jenis)
		hapusKomoditas(jenis)
	}


	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')

		$('#b3_b_total').on('change',()=>{
			state.b3_b_total=$('#b3_b_total').val()
		})

		actionTambahKomoditas('b')


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
					url: `<?php echo base_url("Perkebunan/submithalaman".$halaman)?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman <?php echo ($halaman-1)?> `);
						$('#submitBtn').append(`Halaman <?php echo ($halaman+1)?> <i class="bi bi-arrow-right"></i> `);
						$('#submitBtn, #backBtn').attr('disabled',false);
						if(response.ok){
							/*$('#footernotif').after(`
							<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
							${response.message}</div>`);*/
							location.href=url
						}else {
							$('.response-submit-btn').remove()
							$('#submitBtn, #backBtn').empty();
							$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman <?php echo ($halaman-1)?> `);
							$('#submitBtn').append(`Halaman <?php echo ($halaman+1)?> <i class="bi bi-arrow-right"></i> `);
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
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman <?php echo ($halaman-1)?> `);
						$('#submitBtn').append(`Halaman <?php echo ($halaman+1)?> <i class="bi bi-arrow-right"></i> `);
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
