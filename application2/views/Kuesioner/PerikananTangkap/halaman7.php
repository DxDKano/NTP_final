
<main id="main" class="main">

	<div class="pagetitle">
		<h1><?php echo $title; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Periknanan Tangkap</a></li>
				<li class="breadcrumb-item active"><?php echo $title; ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok2Form" action="<?php echo base_url('Perikanan Tangkap/submitblok2')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">


				<div class="card">
					<div class="card-body">
						<?php $this->load->view('Kuesioner/PerikananTangkap/tabs'); ?>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr>
								<th scope="col" colspan="15" class="table-secondary">VI. JASA PPERIKANAN KEGIATAN PENANGKAPAN IKAN YANG DIUSAHAKAN SELAMA SETAHUN</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td colspan="15">
									1.
									Apakah ada anggota rumah tangga yang melakukan Usaha Jasa Perikanan Kegiatan Penangkapan Ikan (bukan buruh) selama setahun ? <br>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="b6_r1" id="b6_r1_a" value="1" <?php echo intval($sub['b6_r1'])==2?'':'checked' ?>>
										<label class="form-check-label" for="b6_r1_a">
											Ya - 1
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="b6_r1" id="b6_r1_b" value="2" <?php echo intval($sub['b6_r1'])==2?'checked':'' ?>>
										<label class="form-check-label" for="b6_r1_b">
											Tidak - 2 <i><strong>(Lanjut ke Blok VIII)</strong></i>
										</label>
									</div>
									<br>
									2. Jasa Perikanan Kegiatan Penangkapan Ikan yang diusahakan selama setahun.
								</td>
							</tr>
							</tbody>
							<thead class="cond-b6r1">
							<tr>
								<td colspan="1">No</td>
								<td colspan="3">Usaha Jasa Perikanan Kegiatan Penangkapan Ikan</td>
								<td colspan="2">Kode <br> (Diisi Pengawas)</td>
								<td colspan="2">Nilai(000 Rp.)</td>
								<td colspan="2">Lokasi Pengguna Utama
									<br>1. Dalam Kecamatan
									<br>2. Luar Kecamatan</td>
								<td colspan="2">Status Pengelolaan
									<br>1. Sendiri
									<br>2. Bagi Hasil
									<br>3. Sendiri dan Bagi Hasil</td>
								<td colspan="2">Persentase (%) Bagi Hasil,
									<br>Jika kol(6) berkode2 atau 3</td>
								<td colspan="1">Aksi</td>
							</tr>
							<tr>
								<td colspan="1">(1)</td>
								<td colspan="3">(2)</td>
								<td colspan="2">(3)</td>
								<td colspan="2">(4)</td>
								<td colspan="2">(5)</td>
								<td colspan="2">(6)</td>
								<td colspan="2">(7)</td>
								<td colspan="1">(8)</td>
							</tr>
							</thead>
							<tbody class="cond-b6r1">
							<?php echo $isianBlok6; ?>
							<tr id="tr_tambah_b6_r2">
								<td colspan="15" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b6_r2">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>
							</tbody>
							<thead class="cond-b6r1">
							<tr>
								<th scope="col" colspan="15" class="table-secondary">VI. PENGELUARAN UNTUK USAHA JASA PERIKANAN KEGIATAN PENANGKAPAN IKAN SELAMA SETAHUN</th>
							</tr>
							<tr>
								<td colspan="1">No</td>
								<td colspan="4">Nama Barang/Jasa</td>
								<td colspan="2">Satuan</td>
								<td colspan="2">Kode <br>(Diisi Pengawas)</td>
								<td colspan="3">Banyaknya</td>
								<td colspan="2">Nilai<br>(000 Rp.)</td>
								<td colspan="1">Aksi</td>
							</tr>
							<tr>
								<td colspan="1">(1)</td>
								<td colspan="4">(2)</td>
								<td colspan="2">(3)</td>
								<td colspan="2">(4)</td>
								<td colspan="3">(5)</td>
								<td colspan="2">(6)</td>
								<td colspan="1">(7)</td>
							</tr>
							</thead>
							<tbody class="cond-B6r1">
							<?php echo $isianBlok7; ?>
							<tr id="tr_tambah_b7">
								<td colspan="15" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b7">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>

							</tbody>
						</table>
						<!-- End small tables -->

						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("PerikananTangkap/halaman6"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman 6  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("PerikananTangkap/halaman8"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>">Halaman 8 <i class="bi bi-arrow-right"></i> </button>
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
		b6_r1:'1',
		b6_r2:[],
		b7:[],
		b6_del:[],
		b7_del:[]
	}
	//ambil data blok 6
	<?php foreach ($sub_b6 as $item): ?>
	state.b6_r2.push(
		{
			p1:<?php echo $item['b6_k1']?:'0' ?>,
			p2:'<?php echo $item['b6_k2']?:'0' ?>',
			p3:<?php echo $item['b6_k3']?:'0' ?>,
			p4:<?php echo $item['b6_k4']?:'0' ?>,
			p5:<?php echo $item['b6_k5']?:'0' ?>,
			p6:<?php echo $item['b6_k6']?:'0' ?>,
			p7:<?php echo $item['b6_k7']?:'0' ?>,
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
			type_blok:`b6`
		})
	<?php endforeach; ?>

	//ambil data blok 7
	<?php foreach ($sub_b7 as $item): ?>
	state.b7.push(
		{
			p1:<?php echo $item['b7_k1']?:'0' ?>,
			p2:'<?php echo $item['b7_k2']?:'0' ?>',
			p3:'<?php echo $item['b7_k3']?:'0' ?>',
			p4:<?php echo $item['b7_k4']?:'0' ?>,
			p5:<?php echo $item['b7_k5']?:'0' ?>,
			p6:<?php echo $item['b7_k6']?:'0' ?>,
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
			type_blok:`b7`
		})
	<?php endforeach; ?>

	function generateUUID() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = (Math.random() * 16) | 0,
				v = c === 'x' ? r : (r & 0x3) | 0x8;
			return v.toString(16);
		});
	}

	const actionTambahPengeluaran = ()=>{

		$(`#btn_tambah_b6_r2`).on('click',function (e){
			e.preventDefault();
			const pnew = {
				p1:state[`b6_r2`].length+1,
				p2:'',
				p3:'',
				p4:'',
				p5:'',
				p6:'',
				p7:'',
				uuid:generateUUID(),
				type_blok:`b6`
			}
			state[`b6_r2`].push(pnew)
			tambahPengeluaran(pnew)



		})
		hapusPengeluaran()
	}

	const tambahPengeluaran =(p)=>{
		const {p1,p2,p3,p4,p5,p6,p7,uuid}=p;


		$(`#tr_tambah_b6_r2`).before(`
					<tr class="tr_b6_r2">
						<td colspan="1">${p1}</td>
						<td colspan="3"><input type="text" class="form-control b6-r2-input" data-keyx="p2" data-uuid="${uuid}" value="${p2}"></td>
						<td colspan="2"><input type="text" class="form-control b6-r2-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
						<td colspan="2"><input type="number" class="form-control b6-r2-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
						<td colspan="2"><input type="number" class="form-control b6-r2-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td colspan="2"><input type="number" class="form-control b6-r2-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td colspan="2"><input type="number" class="form-control b6-r2-input" data-keyx="p7" data-uuid="${uuid}" value="${p7}"></td>
						<td colspan="1"><button type="button"
									class="btn btn-danger btn-hapus-b6-r2"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)

		hapusPengeluaran()
	}

	const onChangeB6 = () => {

		$(`.b6-r2-input`).on('change', function() {
			var nilai = $(this).val();
			const uuid = $(this).data('uuid')
			const key = $(this).data('keyx')
			state[`b6_r2`].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const hapusPengeluaran =()=>{
		//untuk hapus
		$(`.btn-hapus-b6-r2`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[`b6_r2`].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[`b6_r2`] = newArray

			$(`.tr_b6_r2`).remove()
			for(var it=0;it<state[`b6_r2`].length;it++) {
				state[`b6_r2`][it].p1=it+1;
				tambahPengeluaran(state[`b6_r2`][it])
			}
			state.b6_del.push(uuid)

		})
		onChangeB6()
	}

	const actionTambahPengeluaran7 = ()=>{

		$(`#btn_tambah_b7`).on('click',function (e){
			e.preventDefault();
			const pnew = {
				p1:state[`b7`].length+1,
				p2:'',
				p3:'',
				p4:'',
				p5:'',
				p6:'',
				uuid:generateUUID(),
				type_blok:`b7`
			}
			state[`b7`].push(pnew)
			tambahPengeluaran7(pnew)



		})
		hapusPengeluaran7()
	}

	const onChangeB7 = () => {

		$(`.b7-input`).on('change', function() {
			var nilai = $(this).val();
			const uuid = $(this).data('uuid')
			const key = $(this).data('keyx')
			state[`b7`].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const tambahPengeluaran7 =(p)=>{
		const {p1,p2,p3,p4,p5,p6,uuid}=p;


		$(`#tr_tambah_b7`).before(`
					<tr class="tr_b7">
						<td colspan="1">${p1}</td>
						<td colspan="4"><input type="text" class="form-control b7-input" data-keyx="p2" data-uuid="${uuid}" value="${p2}"></td>
						<td colspan="2"><input type="text" class="form-control b7-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
						<td colspan="2"><input type="text" class="form-control b7-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
						<td colspan="3"><input type="number" class="form-control b7-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td colspan="2"><input type="number" class="form-control b7-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td colspan="1"><button type="button"
									class="btn btn-danger btn-hapus-b7"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)

		hapusPengeluaran7()
	}

	const hapusPengeluaran7 =()=>{
		//untuk hapus
		$(`.btn-hapus-b7`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[`b7`].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[`b7`] = newArray

			$(`.tr_b7`).remove()
			for(var it=0;it<state[`b7`].length;it++) {
				state[`b7`][it].p1=it+1;
				tambahPengeluaran6(state[`b7`][it])
			}

			state.b7_del.push(uuid)

		})
		onChangeB7()
	}

	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')

		// $('input[name="b6_r1"]').change(function() {
		// 	if (this.value === '1') {
		// 		state.b6_r1=1;
		// 		console.log(this.value,1)
		// 		//$('.cond-b5r1').addClass('muncul')
		// 		$('.cond-b6r1').removeClass('hilang')
		// 	}
		// 	else if (this.value === '2') {
		// 		console.log(this.value,2)
		// 		state.b6_r1=2;
		// 		for(let i=0; i<state.b6_r2.length; i++){
		// 			state.b6_del.push(state.b6_r2[i].uuid)
		// 		}
		// 		for(let i=0; i<state.b7.length; i++){
		// 			state.b7_del.push(state.b7[i].uuid)
		// 		}
		// 		console.log(state)
		// 		state.b6_r2=[];
		// 		state.b7=[];
		// 		$('.cond-b6r1').addClass('hilang')
		// 		$('.tr_b6_r2').remove()
		// 		$('.tr_b7').remove()
		// 		//$('.cond-b5r1').removeClass('muncul')
		// 	}
		// });

		actionTambahPengeluaran()
		actionTambahPengeluaran7()

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
					url: `<?php echo base_url('PerikananTangkap/submithalaman7')?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 6 `);
						$('#submitBtn').append(`Halaman 8 <i class="bi bi-arrow-right"></i> `);
						$('#submitBtn, #backBtn').attr('disabled',false);
						if(response.ok){
							/*$('#footernotif').after(`
							<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
							${response.message}</div>`);*/
							location.href=url
						}else {
							$('.response-submit-btn').remove()
							$('#submitBtn, #backBtn').empty();
							$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 6 `);
							$('#submitBtn').append(`Halaman 8 <i class="bi bi-arrow-right"></i> `);
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
						$('#submitBtn').append(`Halaman 8 <i class="bi bi-arrow-right"></i> `);
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
