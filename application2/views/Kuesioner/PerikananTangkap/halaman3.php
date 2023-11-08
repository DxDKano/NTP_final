
<main id="main" class="main">

	<div class="pagetitle">
		<h1><?php echo $title; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Perikanan Tangkap</a></li>
				<li class="breadcrumb-item active"><?php echo $title; ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok2Form" action="<?php echo base_url('TanamanPangan/submitblok2')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">


				<div class="card">
					<div class="card-body">
						<?php $this->load->view('Kuesioner/PerikananTangkap/tabs'); ?>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
								<!-- <tr>
									<th scope="col" colspan="13" class="table-secondary">IV. PRODUKSI PERIKANAN KEGIATAN PENANGKAPAN IKAN SELAMA SETAHUN</th>
								</tr> -->
								<tr>
									<td rowspan="3">No</td>
									<td rowspan="3">Komoditas Segar</td>
									<td rowspan="3" colspan="2">Kode<br>(Diisi Pengawas)</td>
									<td rowspan="3" colspan="2">Produksi Dihasilkan<br>(Kg)</td>
									<td colspan="4">Pemanfaatan Hasil Produksi</td>
									<td rowspan="3">Aksi</td>
								</tr>
								<tr>
									<td colspan="2">Produksi Dijual</td>
									<td rowspan="2">Produksi Dokinsumsi Sendiri<br>(Kg)</td>
									<td rowspan="2">Produksi Untuk Lainnya<br>(Kg)</td>
								</tr>
								<tr>
									<td>Banyaknya (Kg)</td>
									<td>Nilai (000 Rp.)</td>

								</tr>
								<tr>
									<td>1</td>
									<td>2</td>
									<td colspan="2">3</td>
									<td colspan="2">4</td>
									<td>5</td>
									<td>6</td>
									<td>7</td>
									<td>8</td>
									<td>9</td>
									<!-- <?php for($i=1;$i<9;$i++): ?>
										<td colspan="<?php echo $i==1?'1':($i==2?'3':'2') ?>">(<?php echo $i ?>)</td>
									<?php endfor;?> -->
								</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="7" class="table-primary"><b>B. LAUT</b></td>
										<td><input id="b4_b_k6_total" name="b4_b_k6_total" type="number" class="form-control align-right" placeholder="" aria-label="b4_b_k6_total" value="<?php echo $sub['b4_b_k6_total']?>" ></td>
										<td colspan="3" class="table-primary"></td>
									</tr>
									<?php echo $isianBlok4b; ?>
									<tr id="tr_tambah_b4_b">
										<td colspan="9" class="dropdown">
											<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b4_b">
												<i class="bi bi-plus"></i>Tambah
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						<!-- End small tables -->


						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("PerikananTangkap/halaman2"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman 2  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("PerikananTangkap/halaman4"
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
		b4_b_k6_total:'<?php echo $sub['b4_b_k6_total'] ?>',
		b4_b:[],
		b4_del:[]
	}

	//ambil data blok 4 b
	<?php foreach ($sub_b4_b as $item): ?>
	state.b4_b.push(
		{
			p1:<?php echo $item['b4_k1']?:'0' ?>,
			p2:'<?php echo $item['b4_k2']?:'0' ?>',
			p3:<?php echo $item['b4_k3']?:'0' ?>,
			p4:<?php echo $item['b4_k4']?:'0' ?>,
			p5:<?php echo $item['b4_k5']?:'0' ?>,
			p6:<?php echo $item['b4_k6']?:'0' ?>,
			p7:<?php echo $item['b4_k7']?:'0' ?>,
			p8:<?php echo $item['b4_k8']?:'0' ?>,
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
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

	const actionTambahProduksi = (jenis)=>{

		$(`#btn_tambah_b4_${jenis}`).on('click',function (e){
			e.preventDefault();
			const pnew = {
				p1:state[`b4_${jenis}`].length+1,
				p2:'',
				p3:'',
				p4:'',
				p5:'',
				p6:'',
				p7:'',
				p8:'',
				uuid:generateUUID(),
				type_blok:`${jenis}`
			}
			state[`b4_${jenis}`].push(pnew)
			tambahProduksi(pnew,jenis)



		})

		onChangeB4(jenis)
		hapusProduksi(jenis)
	}

	const onChangeB4 = (jenis)=>{

		$(`.b4-${jenis}-input`).on('change', function() {
			const uuid = $(this).data('uuid')
			var nilai = $(this).val();
			const key = $(this).data('keyx')
			state[`b4_${jenis}`].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const tambahProduksi =(p,jenis)=>{
		const {p1,p2,p3,p4,p5,p6,p7,p8,uuid}=p;


		$(`#tr_tambah_b4_${jenis}`).before(`
					<tr class="tr_b4_${jenis}">
					<td colspan="1">${p1}</td>
					<td colspan="1"><input type="text" class="form-control b4-${jenis}-input" data-keyx="p2" data-uuid="${uuid}" value="${p2}"></td>
					<td colspan="2"><input type="text" class="form-control b4-${jenis}-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
					<td colspan="2"><input type="number" class="form-control b4-${jenis}-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
					<td colspan="1"><input type="number" class="form-control b4-${jenis}-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
					<td colspan="1"><input type="number" class="form-control b4-${jenis}-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
					<td colspan="1"><input type="number" class="form-control b4-${jenis}-input" data-keyx="p7" data-uuid="${uuid}" value="${p7}"></td>
					<td colspan="1"><input type="number" class="form-control b4-${jenis}-input" data-keyx="p8" data-uuid="${uuid}" value="${p8}"></td>
						<td colspan="1"><button type="button"
									class="btn btn-danger btn-hapus-b4-${jenis}"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)

		onChangeB4(jenis)

		hapusProduksi(jenis)
	}

	const hapusProduksi =(jenis)=>{
		console.log(state)
		//untuk hapus
		$(`.btn-hapus-b4-${jenis}`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[`b4_${jenis}`].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[`b4_${jenis}`] = newArray

			$(`.tr_b4_${jenis}`).remove()
			for(var it=0;it<state[`b4_${jenis}`].length;it++) {
				state[`b4_${jenis}`][it].p1=it+1;
				tambahProduksi(state[`b4_${jenis}`][it],jenis)
			}
			state.b4_del.push(uuid)
			console.log(state)

		})
	}

	$(document).ready(()=>{

		$('#b4_b_k6_total').on('change',()=>{
			state.b4_b_k6_total=`${$('#b4_b_k6_total').val()}`
		})

		$('body').addClass('toggle-sidebar')

		actionTambahProduksi('b')

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
					url: `<?php echo base_url('PerikananTangkap/submithalaman3')?>`,
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
