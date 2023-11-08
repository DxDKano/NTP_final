
<main id="main" class="main">

	<div class="pagetitle">
		<h1><?php echo $title; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Kuesioner</a></li>
				<li class="breadcrumb-item"><a href="Kuesioner/entri_data">Entri Data</a></li>
				<li class="breadcrumb-item"><a >Konsumsi</a></li>
				<li class="breadcrumb-item active"><?php echo $title; ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<form id="blok3Form"  class="row g-3">
		<div class="row">

			<div class="col-lg-12">


				<div class="card">
					<div class="card-body">
						<?php $this->load->view('Kuesioner/Konsumsi/tabs'); ?>
						<?php  $colsize=11 ?>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr>
								<th scope="col" colspan="<?php echo $colsize ?>" class="table-secondary">III.A. KETERANGAN ANGGOTA RUMAH TANGGA</th>
							</tr>
							<tr>
								<td rowspan="2">No. Urut</td>
								<td rowspan="2">Nama Anggota Rumah Tangga</td>
								<td rowspan="2">Hubungan Dengan Kepala Rumah Tangga <br><strong>(Kode)</strong></td>
								<td rowspan="2">Jenis Kelamin <br>
									<ol>
										<li>Lk</li>
										<li>Pr</li>
									</ol></td>
								<td rowspan="2">Umur <br>(Tahun)</td>
								<td colspan="2">Kolom (6) - (7) Ditanyakan Kepada ART Yang Berumur 5 Tahun Ke Atas</td>
								<td colspan="3">Kolom (8) - (10) Ditanyakan Kepada ART Berumur 10 Tahun Ke Atas</td>
								<td rowspan="2">Aksi</td>
							</tr>
							<tr>
								<td >Partisipasi Sekolah <br>
									<ol>
										<li>Tidak /Belum Pernah Sekolah</li>
										<li>Masih Bersekolah</li>
										<li>Tidak Bersekolah Lagi</li>
									</ol></td>
								<td >Ijazah/STTB Tertinggi yang Dimiliki<br>
									<strong>(Kode)</strong></td>
								<td >Apakah Berusaha pada Sektor Pertanian Selama Setahun?<br>
									<ol>
										<li>Ya</li>
										<li>Tidak</li>
									</ol></td>
								<td >Apakah Bekerja Sebagai Buruh Tani Selama Seminggu yang Lalu?<br>
									<ol>
										<li>Ya</li>
										<li>Tidak</li>
									</ol></td>
								<td >Jika Kol (8) Berkode 1, Subsektor yang Diusahakan<br>
									<strong>(Kode)</strong>
								</td>
							</tr>
							<tr>
								<?php for($i=1;$i<$colsize+1;$i++): ?>
									<td >(<?php echo $i ?>)</td>
								<?php endfor;?>
							</tr>
							</thead>
							<tbody>
							<?php echo $isianBlok3a; ?>
							<!-- <i class="bi bi-plus"></i>Tambah -->
							<tr id="tr_tambah_b3_a">
								<td colspan="<?php echo $colsize ?>" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b3_a" >
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>
							<tr>
								<td colspan="<?php echo $colsize ?>" class="table-secondary">III.B. SUMBER PENGHASILAN UTAMA LAINNYA,
									JUMLAH KOMODITAS PERTANIAN YANG DIUSAHAKAN, DAN BELANJA ONLINE YANG DILAKUKAN RUMAH TANGGA</td>
							</tr>

							<tr>
								<td>1.</td>
								<td colspan="<?php echo $colsize-2 ?>">
									Sumber Penghasilan Utama Rumah Tangga Selain dari Sektor Pertanian <strong>(Kode)</strong><br>
									(apabila sumber pendapatan rumah tangga hanya dari sektor pertanian, lanjut ke rincian 2)
								</td>

								<td class="text-center"><input id="b3_b_1" name="b3_b_1" type="text" class="form-control b3-b-1" value="<?php echo "1"?>"></td>
							</tr>
							<tr>
								<td>2.</td>
								<td colspan="<?php echo $colsize-2 ?>">
									Jumlah Komoditas Pertanian Pada Subsektor Terpilih yang Diusahakan dan Dijual selama Setahun<br>
								</td>

								<td class="text-center"><input id="b3_b_2" name="b3_b_2" type="text" class="form-control b3-b-2" value="<?php echo "1"?>"></td>
							</tr>
							<tr>
								<td>3.</td>
								<td colspan="<?php echo $colsize-2 ?>">
									Apakah Pernah Belanja Online Untuk Barang atau Jasa yang Dikonsumsi Rumah Tangga selama Setahun?<br> Ya -1 Tidak -2
								</td>

								<td class="text-center"><input id="b3_b_3" name="b3_b_3" type="text" class="form-control b3-b-3" value="<?php echo "1"?>"></td>
							</tr>
							</tbody>
						</table>
						<!-- End small tables -->
						<div class="row">
							<div class="col-4">
								<strong><u>Kode Blok III.A Kol (3) :</u></strong>
								<p>
									1. Kepala Rumah Tangga<br>
									2. Istri/Suami<br>
									3. Anak<br>
									4. Menantu<br>
									5. Cucu<br>
									6. Orang Tua/Mertua<br>
									7. Famili Lain<br>
									8. Asisten Rumah Tangga<br>
									9. Lainnya<br>
								</p>
							</div>
							<div class="col-4">
								<strong><u>Kode Blok III.A Kol (7) :</u></strong>
								<p>
									1. Tidak Punya Ijazah SD/Sederajat<br>
									2. SD/Sederajat<br>
									3. SMP/Sederajat<br>
									4. SMA/SMK/Sederajat<br>
									5. Akademi/D1/D2/D3<br>
									6. Perguruan Tinggi/D4/S1/S2/S3<br>
								</p>
							</div>
							<div class="col-4">
								<strong><u>Kode Blok III.A Kol (10) :</u></strong>
								<p>
									1. Tanaman Pangan<br>
									2. Hortikultura<br>
									4. Perkebunan<br>
									8. Peternakan<br>
									16. Perikanan Tangkap<br>
									32. Perikanan Budidaya<br>
									64. Kehutanan<br>
								</p>
							</div>
							<div class="col-12">
								<strong><u>Kode Blok III.B Rincian 1 :</u></strong>
								<p>
									1. Industri Pengolahan<br>
									2. Konstruksi<br>
									3. Perdagangan Besar dan Eceran; Reparasi dan Perawatan Mobil dan Sepeda Motor<br>
									4. Pengangkutan dan Pergudangan<br>
									5. Penyediaan Akomodasi dan Penyediaan Makan Minum<br>
									6. Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib<br>
									7. Pendidikan<br>
									8. Lainnya<br>
								</p>
							</div>
						</div>

						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("Konsumsi/halaman1"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman 1  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Konsumsi/halaman3"
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
		subsek:'<?php echo $sub['subsektor'] ?>',
		b3_a:[],
		b3_a_del:[],

		b3_b_1:'1',
		b3_b_2:'1',
		b3_b_3:'1',

	}
	//ambil data blok 3 A
	<?php foreach ($sub_b3_a as $item): ?>
	state.b3_a.push({
		p1:state[`b3_a`].length+1,
		p2:'<?php echo $item['b3_k2'] ?>',
		p3:'<?php echo $item['b3_k3']?:'0' ?>',
		p4:'<?php echo $item['b3_k4']?:'0' ?>',
		p5:<?php echo $item['b3_k5']?:'0' ?>,
		p6:'<?php echo $item['b3_k6']?:'0' ?>',
		p7:'<?php echo $item['b3_k7']?:'0' ?>',
		p8:'<?php echo $item['b3_k8']?:'0' ?>',
		p9:'<?php echo $item['b3_k9']?:'0' ?>',
		p10:'<?php echo $item['b3_k10']?:'0' ?>',
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

	const onChangeB3 =() => {

		$(`.b3-a-input`).on('change', function() {
			var nilai = $(this).val();
			const uuid = $(this).data('uuid')
			const key = $(this).data('keyx')
			state[`b3_a`].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const onChangeClass = (className, parent) => {

		$(`.${className}`).on('change', function() {
			var nilai = $(this).val();
			const uuid = $(this).data('uuid')
			const key = $(this).data('keyx')
			state[parent].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const onChangeId = (id, parent) => {

		$(`#${id}`).on('change', function() {
			var nilai = $(this).val();
			state[parent] = nilai
			console.log(state)
		});
	}

	const tambahB3 =(p)=>{
		const {p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,uuid}=p;


		$(`#tr_tambah_b3_a`).before(`
					<tr class="tr_b3_a">
						<td class="text-center" style="width: 5%;">${p1}</td>
						<td class="text-center" style="width: 35%;"><input name="b3_a_2[]" type="text" class="form-control b3-a-input" data-keyx="p2" data-uuid="${uuid}" value="${p2}"></td>
						<td class="text-center" style="width: 5%;"><input name="b3_a_3[]" type="number" class="form-control b3-a-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
						<td class="text-center" style="width: 5%;"><input name="b3_a_4[]" type="number" class="form-control b3-a-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
						<td class="text-center" style="width: 5%;"><input name="b3_a_5[]" type="number" class="form-control b3-a-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td class="text-center" style="width: 10%;"><input name="b3_a_6[]" type="number" class="form-control b3-a-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td class="text-center" style="width: 8%;"><input name="b3_a_7[]" type="number" class="form-control b3-a-input" data-keyx="p7" data-uuid="${uuid}" value="${p7}"></td>
						<td class="text-center" style="width: 6%;"><input name="b3_a_8[]" type="number" class="form-control b3-a-input" data-keyx="p8" data-uuid="${uuid}" value="${p8}"></td>
						<td class="text-center" style="width: 6%;"><input name="b3_a_9[]" type="number" class="form-control b3-a-input" data-keyx="p9" data-uuid="${uuid}" value="${p9}"></td>
						<td class="text-center" style="width: 10%;"><input name="b3_a_10[]" type="number" class="form-control b3-a-input" data-keyx="p10" data-uuid="${uuid}" value="${p10}"></td>
						<td class="text-center" style="width: 5%;"><button type="button"
									class="btn btn-danger btn-hapus-b3-a"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)
		onChangeClass('b3-a-input','b3_a')
		hapusRow('btn-hapus-b3-a','b3_a')
		//hapusB3()

	}

	const hapusB3 =()=>{
		//untuk hapus
		$(`.btn-hapus-b3-a`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[`b3_a`].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[`b3_a`] = newArray

			$(`.tr_b3_a`).remove()
			for(var it=0;it<state[`b3_a`].length;it++) {
				state[`b3_a`][it].p1=it+1;
				tambahB3(state[`b3_a`][it])
			}
			state.b3_a_del.push(uuid)

		})
	}

	const hapusRow =(className,parent)=>{
		console.log(`.${className}`)
		//untuk hapus
		$(`.${className}`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[parent].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[parent] = newArray

			$(`.tr_${parent}`).remove()
			for(var it=0;it<state[parent].length;it++) {
				state[parent][it].p1=it+1;
				tambahB3(state[parent][it])
			}
			state[`${parent}_del`].push(uuid)

		})
	}

	const actionTambahB3 = ()=>{

		$(`#tr_tambah_b3_a`).on('click',function (e){
			e.preventDefault();
			const idkomoditas = $(this).data('idkomoditas');
			const namakomoditas = $(this).data('namakomoditas');
			const pnew = {
				p1:state[`b3_a`].length+1,
				p2:'',
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
			state[`b3_a`].push(pnew)
			tambahB3(pnew)



		})

		onChangeClass('b3-a-input','b3_a')
		hapusRow('btn-hapus-b3-a','b3_a')
		//hapusB3()
	}


	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')

		actionTambahB3('a')
		onChangeId('b3_b_1','b3_b_1')
		onChangeId('b3_b_2','b3_b_2')
		onChangeId('b3_b_3','b3_b_3')

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
					url: `<?php echo base_url('Konsumsi/submithalaman2')?>`,
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
