
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
		<form id="blok2Form" action="<?php echo base_url('Peternakan/submitblok2')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">


				<div class="card">
					<div class="card-body">
						<?php $this->load->view('Kuesioner/Peternakan/tabs'); ?>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr>
								<th scope="col" colspan="13" class="table-secondary">III. PRODUKSI TERNAK/UNGGAS DAN HASIL TERNAK/UNGGAS YANG DIUSAHAKAN SELAMA SETAHUN</th>
							</tr>

							<!-- <tr id="tr_tambah_b3_a">
								<td colspan="9" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b3_a">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr> -->
						</thead>
						<tbody>
							<!-- <tr>
								<td>No</td>
								<td>Jenis Ternak/Unggas</td>
								<td>Kode<br>(Diisi Pengawas)</td>
								<td colspan="2">Jenis Kegiatan<br>1. Pengembangbiakan<br>2. Penggemukan<br>4. Lainnya</td>
								<td colspan="2">Status Pengelolaan Ternak/Unggas<br>1. Milik Sendiri<br>2. Bagi Hasil<br>3. Milik Sendiri dan Bagi Hasil</td>
								<td>Persentase (%)<br>Bagi Hasil Jika<br>Kolom (5) Berkode<br>2 atau 3</td>
								<td>Aksi</td>
							</tr>
							<tr>
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td colspan="2">4</td>
								<td colspan="2">5</td>
								<td>6</td>
								<td>7</td>
							</tr>
							</thead>
							<tbody>
							<tr id="tr_tambah_b3_a">
								<td colspan="9" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b3_a">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr> -->
							</tbody>
						</table>
						<?php echo $isianBlok3a; ?>
						<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b3_a">
							<i class="bi bi-plus"></i>Tambah
						</button>
						<!-- End small tables -->

						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("Peternakan/halaman1"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman 1  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Peternakan/halaman3"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>">Halaman 3 <i class="bi bi-arrow-right"></i> </button>
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
		b3_a:[],
		b3_del:[]
	}
	//ambil data blok 3 A
	<?php foreach ($sub_b3_a as $item): ?>
	state.b3_a.push({
		p1:state[`b3_a`].length+1,
		p2:'<?php echo $item['b3a_k2']?:'0' ?>',
		p3:'<?php echo $item['b3a_k3']?:'0' ?>',
		p4:<?php echo $item['b3a_k4']?:'0' ?>,
		p5:<?php echo $item['b3a_k5']?:'0' ?>,
		p6:<?php echo $item['b3a_k6']?:'0' ?>,
		p7:<?php echo $item['b3a_r1_k3']?:'0' ?>,
		p8:<?php echo $item['b3a_r1_k4']?:'0' ?>,
		p9:<?php echo $item['b3a_r2_k3']?:'0' ?>,
		p10:<?php echo $item['b3a_r2_k4']?:'0' ?>,
		p11:<?php echo $item['b3a_r3_k3']?:'0' ?>,
		p12:<?php echo $item['b3a_r3_k4']?:'0' ?>,
		p13:<?php echo $item['b3a_r4_k3']?:'0' ?>,
		p14:<?php echo $item['b3a_r4_k4']?:'0' ?>,
		p15:<?php echo $item['b3a_r5_k3']?:'0' ?>,
		p16:<?php echo $item['b3a_r5_k4']?:'0' ?>,
		p17:<?php echo $item['b3a_r6_k3']?:'0' ?>,
		p18:<?php echo $item['b3a_r6_k4']?:'0' ?>,
		p19:<?php echo $item['b3a_r7_k3']?:'0' ?>,
		p20:<?php echo $item['b3a_r7_k4']?:'0' ?>,
		p21:<?php echo $item['b3a_r8_k3']?:'0' ?>,
		p22:<?php echo $item['b3a_r9_k3']?:'0' ?>,
		p23:<?php echo $item['b3a_r9_k4']?:'0' ?>,
		p24:<?php echo $item['b3a_r10_k3']?:'0' ?>,
		p25:<?php echo $item['b3a_r10_k4']?:'0' ?>,
		p26:<?php echo $item['b3a_r11_k4']?:'0' ?>,
		p27:<?php echo $item['b3a_r12_k4']?:'0' ?>,
		uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
		uploaded:'update'
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
		const {p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17,p18,p19,p20,p21,p22,p23,p24,p25,p26,p27,uuid}=p;

		$(`#btn_tambah_b3_${jenis}`).before(`
			<table class='table table-sm table-bordered small tr_b3_${jenis}'>
				<thead class='text-center top-0'>
					<tr>
						<td>No</td>
						<td>Jenis Ternak/Unggas</td>
						<td>Kode<br>(Diisi Pengawas)</td>
						<td colspan='2'>Jenis Kegiatan<br>1. Pengembangbiakan<br>2. Penggemukan<br>4. Lainnya</td>
						<td colspan='2'>Status Pengelolaan Ternak/Unggas<br>1. Milik Sendiri<br>2. Bagi Hasil<br>3. Milik Sendiri dan Bagi Hasil</td>
						<td>Persentase (%)<br>Bagi Hasil Jika<br>Kolom (5) Berkode<br>2 atau 3</td>
						<td>Aksi</td>
					</tr>
					<tr>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td colspan='2'>4</td>
						<td colspan='2'>5</td>
						<td>6</td>
						<td>7</td>
					</tr>
					<tr>
						<td>${p1}</td>
						<td><input type='text' class='form-control b3-${jenis}-input' data-keyx='p2' data-uuid='${uuid}' value='${p2}'></td>
		        <td><input type='number' class='form-control b3-${jenis}-input' data-keyx='p3' data-uuid='${uuid}' value='${p3}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p4' data-uuid='${uuid}' value='${p4}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p5' data-uuid='${uuid}' value='${p5}'></td>
		        <td><input type='number' class='form-control b3-${jenis}-input' data-keyx='p6' data-uuid='${uuid}' value='${p6}'></td>
		        <td rowspan='14'><button type='button'
									class='btn btn-danger btn-hapus-b3-${jenis}'
									data-uuid='${uuid}'>
							<i class='ri ri-close-fill'>
						</button></td>
		      </tr>
		      <tr>
		        <td>No</td>
		        <td colspan='3'>Rincian Mutasi Ternak/Unggas</td>
		        <td colspan='2'>Banyaknya</td>
		        <td colspan='2'>Nilai<br>(000Rp)</td>
		      </tr>
		      <tr>
		        <td>1</td>
		        <td colspan='3'>Jumlah Ternak/Unggas Stok Akhir</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p7' data-uuid='${uuid}' value='${p7}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p8' data-uuid='${uuid}' value='${p8}'></td>
					</tr>
		      <tr>
		        <td>2</td>
		        <td colspan='3'>Penjualan</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p9' data-uuid='${uuid}' value='${p9}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p10' data-uuid='${uuid}' value='${p10}'></td>
					</tr>
		      <tr>
		        <td>3</td>
		        <td colspan='3'>Pemotongan</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p11' data-uuid='${uuid}' value='${p11}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p12' data-uuid='${uuid}' value='${p12}'></td>
					</tr>
		      <tr>
		        <td>4</td>
		        <td colspan='3'>Kematian</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p13' data-uuid='${uuid}' value='${p13}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p14' data-uuid='${uuid}' value='${p14}'></td>
					</tr>
		      <tr>
		        <td>5</td>
		        <td colspan='3'>Pengurangan Lain</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p15' data-uuid='${uuid}' value='${p15}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p16' data-uuid='${uuid}' value='${p16}'></td>
					</tr>
		      <tr>
		        <td>6</td>
		        <td colspan='3'>Jumlah (R1+R2+R3+R4+R5)</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p17' data-uuid='${uuid}' value='${p17}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p18' data-uuid='${uuid}' value='${p18}'></td>
					</tr>
		      <tr>
		        <td>7</td>
		        <td colspan='3'>Pembelian Ternak/Day Old Chick (DOC)</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p19' data-uuid='${uuid}' value='${p19}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p20' data-uuid='${uuid}' value='${p20}'></td>
					</tr>
		      <tr>
		        <td>8</td>
		        <td colspan='3'>Kelahiran/Penetasan</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p21' data-uuid='${uuid}' value='${p21}'></td>
		        <td colspan='2' class="table-secondary"></td>
					</tr>
		      <tr>
		        <td>9</td>
		        <td colspan='3'>Penambahan Lain</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p22' data-uuid='${uuid}' value='${p22}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p23' data-uuid='${uuid}' value='${p23}'></td>
					</tr>
		      <tr>
		        <td>10</td>
		        <td colspan='3'>Jumlah Ternak/Unggas Stok Awal<br>Khusus untuk kolom (3) (R6-R7-R8-R9)</td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p24' data-uuid='${uuid}' value='${p24}'></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p25' data-uuid='${uuid}' value='${p25}'></td>
					</tr>
		      <tr>
		        <td>11</td>
		        <td colspan='3'>Jumlah (R7+R9+R10)</td>
		        <td colspan='2' class="table-secondary"></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p26' data-uuid='${uuid}' value='${p26}'></td>
					</tr>
		      <tr>
		        <td>12</td>
		        <td colspan='3'>Nilai Pertambahan Bobot Ternak/Unggas Kolom (4) (R6-R11)</td>
		        <td colspan='2' class="table-secondary"></td>
		        <td colspan='2'><input type='number' class='form-control b3-${jenis}-input' data-keyx='p27' data-uuid='${uuid}' value='${p27}'></td>
					</tr>
					</tbody>
				</table>
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

		$(`#btn_tambah_b3_${jenis}`).on('click',function (e){
			e.preventDefault();
			const pnew = {
				p1:state[`b3_${jenis}`].length+1,
				p2:'',
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
				p15:'',
				p16:'',
				p17:'',
				p18:'',
				p19:'',
				p20:'',
				p21:'',
				p22:'',
				p23:'',
				p24:'',
				p25:'',
				p26:'',
				p27:'',
				uuid:generateUUID()
			}
			state[`b3_${jenis}`].push(pnew)
			tambahKomoditas(pnew,jenis)



		})

		onChangeB3(jenis)
		hapusKomoditas(jenis)
	}

	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')

		actionTambahKomoditas('a')

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
					url: `<?php echo base_url('Peternakan/submithalaman2')?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 1 `);
						$('#submitBtn').append(`Halaman 3 <i class="bi bi-arrow-right"></i> `);
						$('#submitBtn, #backBtn').attr('disabled',false);
						if(response.ok){
							/*$('#footernotif').after(`
							<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
							${response.message}</div>`);*/
							location.href=url
						}else {
							$('.response-submit-btn').remove()
							$('#submitBtn, #backBtn').empty();
							$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 1 `);
							$('#submitBtn').append(`Halaman 3 <i class="bi bi-arrow-right"></i> `);
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
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 1 `);
						$('#submitBtn').append(`Halaman 3 <i class="bi bi-arrow-right"></i> `);
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
