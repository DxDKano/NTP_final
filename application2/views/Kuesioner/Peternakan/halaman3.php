
<main id="main" class="main">

	<div class="pagetitle">
		<h1><?php echo $title; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Peternakan</a></li>
				<li class="breadcrumb-item active"><?php echo $title; ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok2Form" action="<?php echo base_url('Perikanan/submitblok2')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">


				<div class="card">
					<div class="card-body">
						<?php $this->load->view('Kuesioner/TanamanPangan/tabs'); ?>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr>
								<th scope="col" colspan="13" class="table-secondary">III. PRODUKSI TERNAK/UNGGAS DAN HASIL TERNAK/UNGGAS YANG DIUSAHAKAN SELAMA SETAHUN</th>
							</tr>
							<tr>
								<td rowspan="3">No</td>
								<td rowspan="3">Komoditas <br>
									(Kode Diisi Pengawas)</td>
								<td rowspan="3">Satuan: <br>
									1. Butir <br>
									2. Kg <br>
									3. Liter</td>
								<td rowspan="3">Produksi Hasil Ternak/Unggas</td>
								<td colspan="4">Pemanfaatan Hasil Ternak/Unggas</td>
								<td rowspan="3">Status<br>
									Pengolahan : <br>
									1. Sendiri <br>
									2. Bagi Hasil <br>
									3. Sendiri dan Bagi Hasil</td>
								<td rowspan="3">Persentase (%)<br>
									Bagi Hasil <br>
									Jika kolom (9) <br>
									berkode 2 atau 3</td>
								<td rowspan="3">Aksi</td>
							</tr>
							<tr>
								<td colspan="2">Produksi Hasil Ternak/Unggas Dijual</td>
								<td rowspan="2">Produksi Hasil Ternak/Unggas Dikonsumsi Sendiri</td>
								<td rowspan="2">Produksi Hasil Ternak/Unggas untuk Lainnya</td>
							</tr>
							<tr>
								<td>Banyaknya</td>
								<td>Nilai (000 Rp.)</td>
							</tr>
							<tr>
								<td>(1)</td>
								<td>(2)</td>
								<td>(3)</td>
								<td>(4)</td>
								<td>(5)</td>
								<td>(6)</td>
								<td>(7)</td>
								<td>(8)</td>
								<td>(9)</td>
								<td>(10)</td>
								<td>(11)</td>
							</tr>
							<tr>
								<!-- <td colspan="11" class="table-primary">B. HASIL TERNAK/UNGGAS</td> -->
								<td colspan="5" class="table-primary">B. HASIL TERNAK/UNGGAS</td>
								<td colspan="1" class="table-primary">
									<input id="b3b_k6_total" data-key="b3b_k6_total" type="number" class="form-control subval"  value="<?php echo $sub['b3b_k6_total'] ?>"></td>
								</td>
								<td colspan="5" class="table-primary"></td>
							</tr>
							</thead>
							<tbody>
							<?php echo $isianBlok3b; ?>
							<tr id="tr_tambah_b3_b">
								<td colspan="11" >
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
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("Peternakan/halaman2"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman 2  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Peternakan/halaman4"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>">Halaman 4 <i class="bi bi-arrow-right"></i> </button>
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
		b3_b:[],
		b3b_k6_total:'<?php echo $sub['b3b_k6_total']?>',
		b3_del:[]
	}

	//ambil data blok 3 b
	<?php foreach ($sub_b3_b as $item): ?>
	state.b3_b.push(
		{
			p1:<?php echo $item['b3b_k1']?:'0' ?>,
			p2a:'<?php echo $item['b3b_k2A']?:'0' ?>',
			p2b:'<?php echo $item['b3b_k2']?:'0' ?>',
			p3:<?php echo $item['b3b_k3']?:'0' ?>,
			p4:'<?php echo $item['b3_k4']?:'0' ?>',
			p5:'<?php echo $item['b3_k5']?:'0' ?>',
			p6:'<?php echo $item['b3_k6']?:'0' ?>',
			p7:'<?php echo $item['b3_k7']?:'0' ?>',
			p8:'<?php echo $item['b3_k8']?:'0' ?>',
			p9:'<?php echo $item['b3_k9']?:'0' ?>',
			p10:'<?php echo $item['b3_k10']?:'0' ?>',
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>'
		})
	<?php endforeach; ?>

	function generateUUID() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = (Math.random() * 16) | 0,
				v = c === 'x' ? r : (r & 0x3) | 0x8;
			return v.toString(16);
		});
	}

	const onChangeB3 = (jenis)=>{

		$(`.b3-${jenis}-input`).on('change', function() {
			const uuid = $(this).data('uuid')
			var nilai = $(this).val();
			const key = $(this).data('keyx')
			state[`b3_${jenis}`].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const tambahPengeluaran =(p,jenis)=>{
		const {p1,p2a,p2b,p3,p4,p5,p6,p7,p8,p9,p10,uuid}=p;


		$(`#tr_tambah_b3_${jenis}`).before(`
					<tr class="tr_b3_${jenis}">
						<td colspan="1">${p1}</td>
						<td>${p2a}<br>${p2b}</td>
						<td><input name="b3_${jenis}_3[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
						<td><input name="b3_${jenis}_4[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
						<td><input name="b3_${jenis}_5[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td><input name="b3_${jenis}_6[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td><input name="b3_${jenis}_7[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p7" data-uuid="${uuid}" value="${p7}"></td>
						<td><input name="b3_${jenis}_8[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p8" data-uuid="${uuid}" value="${p8}"></td>
						<td><input name="b3_${jenis}_9[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p9" data-uuid="${uuid}" value="${p9}"></td>
						<td><input name="b3_${jenis}_10[]" type="number" class="form-control b3-${jenis}-input" data-keyx="p10" data-uuid="${uuid}" value="${p10}"></td>
						<td colspan="1"><button type="button"
									class="btn btn-danger btn-hapus-b3-${jenis}"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)

		onChangeB3(jenis)

		hapusPengeluaran(jenis)
	}

	const hapusPengeluaran =(jenis)=>{
		console.log(state)
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
				tambahPengeluaran(state[`b3_${jenis}`][it],jenis)
			}
			state.b3_del.push(uuid)
			console.log(state)

		})
	}

	const actionTambahPengeluaran = (jenis)=>{

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
				uuid:generateUUID()
			}
			state[`b3_${jenis}`].push(pnew)
			tambahPengeluaran(pnew,jenis)



		})

		onChangeB3(jenis)
		hapusPengeluaran(jenis)
	}

	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')

		$('#b3b_k6_total').on('change',()=>{
			state.b3b_k6_total=`${$('#b3b_k6_total').val()}`
		})

		actionTambahPengeluaran('b')

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
					url: `<?php echo base_url('Peternakan/submithalaman3')?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 2 `);
						$('#submitBtn').append(`Halaman 4 <i class="bi bi-arrow-right"></i> `);
						$('#submitBtn, #backBtn').attr('disabled',false);
						if(response.ok){
							/*$('#footernotif').after(`
							<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
							${response.message}</div>`);*/
							location.href=url
						}else {
							$('.response-submit-btn').remove()
							$('#submitBtn, #backBtn').empty();
							$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 2 `);
							$('#submitBtn').append(`Halaman 4 <i class="bi bi-arrow-right"></i> `);
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
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 2 `);
						$('#submitBtn').append(`Halaman 4 <i class="bi bi-arrow-right"></i> `);
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
