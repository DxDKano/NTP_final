
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
						<?php $this->load->view('Kuesioner/Perkebunan/tabs'); ?>
						<?php  $colsize=7 ?>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr>
								<th scope="col" colspan="<?php echo $colsize ?>" class="table-secondary">
									IV. PENGELUARAN UNTUK KOMODITAS YANG DIPANEN SELAMA SETAHUN <br>
									(OKTOBER 2016 - SEPTEMBER 2017)
								</th>
							</tr>
							<tr>
								<td style="width: 10%">No</td>
								<td style="width: 35%">Nama Barang/Jasa</td>
								<td style="width: 10%">Satuan</td>
								<td style="width: 10%">Kode <br>(Diisi Pengawas)</td>
								<td style="width: 10%">Banyaknya</td>
								<td style="width: 15%">Nilai <br> (000 Rp.)</td>
								<td style="width: 10%">Aksi</td>
							</tr>
							<tr>
								<?php for($i=1;$i<$colsize+1;$i++): ?>
									<td >(<?php echo $i ?>)</td>
								<?php endfor;?>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td class="table-secondary" colspan="4" >A. Bibit/Benih</td>
								<td class="table-secondary"><input id="b4_a_total" type="number" class="form-control" value="<?php echo $sub['b4_a_total']?>" ></td>
								<td class="table-secondary" colspan="2"></td>
							</tr>
							<?php echo $isianBlok4a1; ?>
							<!-- <i class="bi bi-plus"></i>Tambah -->
							<tr id="tr_tambah_b4_a_1">
								<td colspan="<?php echo $colsize ?>" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b4_a_1" >
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>
							<tr>
								<td class="table-secondary" colspan="4" >B. Pupuk & Obat-obatan</td>
								<td class="table-secondary"><input id="b4_b_total" type="number" class="form-control" value="<?php echo $sub['b4_b_total']?>" ></td>
								<td class="table-secondary" colspan="2"></td>
							</tr>
							<tr>
								<td class="table-secondary" colspan="4" >B.1. Pupuk</td>
								<td class="table-secondary"><input id="b4_b_1_total" type="number" class="form-control" value="<?php echo $sub['b4_b1_total']?>" ></td>
								<td class="table-secondary" colspan="2"></td>
							</tr>
							<?php echo $isianBlok4b1; ?>
							<!-- <i class="bi bi-plus"></i>Tambah -->
							<tr id="tr_tambah_b4_b_1">
								<td colspan="<?php echo $colsize ?>" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b4_b_1" >
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>
							<tr>
								<td class="table-secondary" colspan="4" >B.2. Obat-obatan</td>
								<td class="table-secondary"><input id="b4_b_2_total" type="number" class="form-control" value="<?php echo $sub['b4_b2_total']?>" ></td>
								<td class="table-secondary" colspan="2"></td>
							</tr>
							<?php echo $isianBlok4b2; ?>
							<!-- <i class="bi bi-plus"></i>Tambah -->
							<tr id="tr_tambah_b4_b_2">
								<td colspan="<?php echo $colsize ?>" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b4_b_2" >
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>
							</tbody>

						</table>
						<br>

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

	<datalist id="list-b4-a-1">
		<?php foreach ($list_jenis_barang_b4_a_1 as $item) : ?>
		<option><?php echo $item["nama"] ?></option>
		<?php endforeach; ?>
	</datalist>

	<datalist id="list-b4-b-1">
		<?php foreach ($list_jenis_barang_b4_b_1 as $item) : ?>
			<option><?php echo $item["nama"] ?></option>
		<?php endforeach; ?>
	</datalist>

	<datalist id="list-b4-b-2">
		<?php foreach ($list_jenis_barang_b4_b_2 as $item) : ?>
			<option><?php echo $item["nama"] ?></option>
		<?php endforeach; ?>
	</datalist>

</main><!-- End #main -->


<script>

	const list_jenis_barang = {
		b4_a_1 : <?php echo json_encode($list_jenis_barang_b4_a_1) ?>,
		b4_b_1 : <?php echo json_encode($list_jenis_barang_b4_b_1) ?>,
		b4_b_2 : <?php echo json_encode($list_jenis_barang_b4_b_2) ?>,
	}

	const state={
		tahun:'<?php echo $sub['tahun'] ?>',
		id_prov:'<?php echo $sub['id_prov'] ?>',
		id_kab:'<?php echo $sub['id_kab'] ?>',
		id_kec:'<?php echo $sub['id_kec'] ?>',
		id_desa:'<?php echo $sub['id_desa'] ?>',
		no_ruta:'<?php echo $sub['no_ruta'] ?>',

		b4_a_1:[],
		b4_b_1:[],
		b4_b_2:[],
		b4_del:[],
		b4_a_1_total:<?php echo $sub['b4_a1_total']?>,
		b4_a_total:<?php echo $sub['b4_a_total']?>,
		b4_b_1_total:<?php echo $sub['b4_b1_total']?>,
		b4_b_2_total:<?php echo $sub['b4_b2_total']?>,
		b4_b_total:<?php echo $sub['b4_b_total']?>,

		b4_a_1_total_auto:0,
		b4_a_total_auto:0,
		b4_b_1_total_auto:0,
		b4_b_2_total_auto:0,
		b4_b_total_auto:0,

	}
	//ambil data blok 4 a 1
	<?php foreach ($sub_b4_a_1 as $item): ?>
	state.b4_a_1.push({
		p1:'<?php echo $item['b4_k1'] ?>',
		p2:'<?php echo $item['b4_k2'] ?>',
		p3:'<?php echo $item['b4_k3'] ?>',
		p4:'<?php echo $item['b4_k4']?:'0' ?>',
		p5:'<?php echo $item['b4_k5']?:'0' ?>',
		p6:'<?php echo $item['b4_k6']?:'0' ?>',
		uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
		uploaded:'update'
	})
	state.b4_a_1_total_auto +=<?php echo $item['b4_k5']?:'0' ?>;
	state.b4_a_total_auto +=<?php echo $item['b4_k5']?:'0' ?>;
	<?php endforeach; ?>
	//ambil data blok 4 b 1
	<?php foreach ($sub_b4_b_1 as $item): ?>
	state.b4_b_1.push({
		p1:'<?php echo $item['b4_k1'] ?>',
		p2:'<?php echo $item['b4_k2'] ?>',
		p3:'<?php echo $item['b4_k3'] ?>',
		p4:'<?php echo $item['b4_k4']?:'0' ?>',
		p5:'<?php echo $item['b4_k5']?:'0' ?>',
		p6:'<?php echo $item['b4_k6']?:'0' ?>',
		uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
		uploaded:'update'
	})
	state.b4_b_1_total_auto +=<?php echo $item['b4_k5']?:'0' ?>;
	state.b4_b_total_auto +=<?php echo $item['b4_k5']?:'0' ?>;
	<?php endforeach; ?>
	//ambil data blok b4_b_2
	<?php foreach ($sub_b4_b_2 as $item): ?>
	state.b4_b_2.push({
		p1:'<?php echo $item['b4_k1'] ?>',
		p2:'<?php echo $item['b4_k2'] ?>',
		p3:'<?php echo $item['b4_k3'] ?>',
		p4:'<?php echo $item['b4_k4']?:'0' ?>',
		p5:'<?php echo $item['b4_k5']?:'0' ?>',
		p6:'<?php echo $item['b4_k6']?:'0' ?>',
		uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
		uploaded:'update'
	})
	state.b4_b_2_total_auto +=<?php echo $item['b4_k5']?:'0' ?>;
	state.b4_b_total_auto +=<?php echo $item['b4_k5']?:'0' ?>;
	<?php endforeach; ?>
	function generateUUID() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = (Math.random() * 16) | 0,
				v = c === 'x' ? r : (r & 0x3) | 0x8;
			return v.toString(16);
		});
	}

	const parseVal = (el) => {
		var nilai = el.val()
		if(el[0].type==='number'){
			if(el.data('tipe')==='float'){
				if(nilai.length>0) nilai=parseFloat(nilai)
				else nilai=0
			}else {
				if(nilai.length>0) nilai=parseInt(nilai)
				else nilai=0
			}
		}
		return nilai
	}


	const onChangeClass = (blok, sub, no)=>{
		const stringClass = `${blok}-${sub}-${no}`
		const stringId = `${blok}_${sub}_${no}`

		$(`.${stringClass}`).on('change', function() {
			var nilai = parseVal($(this));
			/*parseVal($(this))
			console.log(nilai,nilai.length)
			if(nilai.length>0) nilai=parseInt(nilai)
			else nilai=0*/
			const uuid = $(this).data('uuid')
			const key = $(this).data('keyx')
			let oldval = 0
			state[stringId].forEach(function(item) {
				if (item.uuid === uuid) {
					oldval=item[key];
					item[key] = nilai;
				}
			});
			if(key==='p6'){
				state[`${stringId}_total_auto`]+=nilai-oldval
				state[`${blok}_${sub}_total_auto`]+=nilai-oldval
				//$(`#${stringId}_total`).val(state[`${stringId}_total`])
				//$(`#${blok}_${sub}_total`).val(state[`${blok}_${sub}_total`])
			}
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



	const onChangeAutocomplete = (className, parent) => {
		/*$('.b4-a-1-auto').autocomplete({
			onPick(el, item) {
				console.log('option', item)
			}
		})
		$('.b4-a-1-auto').on('pick.bs.autocomplete', e => {
			let item = e.item
			console.log('event', item)
		})*/
		//$(`.${className}`).autocomplete()

		$(`.${className}`).on('change', function() {
			const uuid = $(this).data('uuid')
			var nilai = $(this).val();
			const val = list_jenis_barang[parent][nilai]
			console.log(nilai)
			console.log(val)
			console.log(list_jenis_barang[parent])
			console.log(list_jenis_barang[parent][nilai])

			const tmp = {}

			if(typeof val !== 'undefined') {
				const {nama,satuan,kode} = val
				tmp.nama = nama
				tmp.satuan = satuan
				tmp.kode = kode
			}else {
				tmp.nama = ''
				tmp.satuan = ''
				tmp.kode = ''
			}

			$(`#p3-${uuid}`).text(tmp.satuan)
			$(`#p4-${uuid}`).text(tmp.kode)
			state[parent].forEach(function(item) {
				if (item.uuid === uuid) {
					item.p2 = tmp.nama;
					item.p3 = tmp.satuan;
					item.p4 = tmp.kode;
				}
			});
		});

		/*$(`.${className}`).autocomplete({
			onPick(el, item) {
				console.log("el",$(el).data('uuid'))
				console.log("item",item)
				const uuid = $(el).data('uuid')
				const val = list_jenis_barang[parent][item]
				console.log(list_jenis_barang[parent])
				console.log(list_jenis_barang[parent][item])


				if(typeof val !== 'undefined') {
					const {nama,satuan,kode} = val
					$(`#p2-${uuid}`).text(satuan)
					$(`#p3-${uuid}`).text(kode)
					state[parent].forEach(function(item) {
						if (item.uuid === uuid) {
							item.p2 = satuan;
							item.p3 = kode;
						}
					});
				}
			}
		});*/
	}

	const tambahBaris =(p, blok, sub, no)=>{
		const {p1,p2,p3,p4,p5,p6,uuid}=p;
		const stringClass = `${blok}-${sub}-${no}`
		const stringId = `${blok}_${sub}_${no}`


		$(`#tr_tambah_${stringId}`).before(`
					<tr class="tr_${stringId}">
						<td class="text-center">${p1}</td>
						<td class="text-center" id="p2-${uuid}"><input type="text" class="form-control ${stringClass}-auto" data-keyx="p2" data-uuid="${uuid}" value="${p2||""}"  list="list-${stringClass}" ></td>
						<td class="text-center" id="p3-${uuid}">${p3}</td>
						<td class="text-center" id="p4-${uuid}">${p4}</td>
						<td class="text-center"><input type="number" class="form-control ${stringClass}" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td class="text-center"><input type="number" class="form-control ${stringClass}" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td class="text-center"><button type="button"
									class="btn btn-danger btn-hapus-${stringClass}"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)
		onChangeClass(blok, sub, no)
		hapusRow(blok, sub, no)
		//hapusB3()
		//$('.b4-a-1-auto').autocomplete()
		onChangeAutocomplete(`${stringClass}-auto`,stringId)

	}

	const hapusKolom =(blok,sub,no)=>{
		const stringClass = `${blok}-${sub}-${no}`
		const stringId = `${blok}_${sub}_${no}`
		//untuk hapus
		$(`.btn-hapus-${stringClass}`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[stringId].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[stringId] = newArray

			$(`.tr_${stringId}`).remove()
			for(var it=0;it<state[stringId].length;it++) {
				state[stringId][it].p1=it+1;
				tambahBaris(state[stringId][it],blok,sub,no)
			}
			state[`${blok}_del`].push(uuid)

		})
	}

	const hapusRow =(blok,sub,no)=>{
		const stringClass = `${blok}-${sub}-${no}`
		const stringId = `${blok}_${sub}_${no}`
		//untuk hapus
		$(`.btn-hapus-${stringClass}`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')
			let p5hapus = 0

			state[stringId].forEach(function(item) {
				if (item.uuid === uuid) {
					p5hapus=item['p5'];
				}
			});
			state[`${stringId}_total_auto`] -= p5hapus
			state[`${blok}_${sub}_total_auto`] -= p5hapus
			//$(`#${stringId}_total_auto`).val(state[`${stringId}_total`])
			//$(`#${blok}_${sub}_total_auto`).val(state[`${blok}_${sub}_total`])

			var newArray = state[stringId].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[stringId] = newArray

			$(`.tr_${stringId}`).remove()
			for(var it=0;it<state[stringId].length;it++) {
				state[stringId][it].p1=it+1;
				tambahBaris(state[stringId][it],blok,sub,no)
			}
			state[`${blok}_del`].push(uuid)

		})
	}

	const actionTambahBaris = (blok, sub, no)=>{
		const stringClass = `${blok}-${sub}-${no}`
		const stringId = `${blok}_${sub}_${no}`

		$(`#tr_tambah_${stringId}`).on('click',function (e){
			e.preventDefault();
			const idkomoditas = $(this).data('idkomoditas');
			const namakomoditas = $(this).data('namakomoditas');
			const pnew = {
				p1:state[stringId].length+1,
				p2:'',
				p3:'',
				p4:'',
				p5:'',
				p6:'',
				uuid:generateUUID()
			}
			state[stringId].push(pnew)
			tambahBaris(pnew,blok,sub,no)



		})

		onChangeClass(blok, sub, no)
		hapusRow(blok,sub,no)
		//hapusB3()
	}

	const onChangeTotal = (jenis,sub)=>{

		if(typeof sub === 'undefined'){
			$(`#b4_${jenis}_total`).on('change', () => {
				state[`b4_${jenis}_total`] = parseInt($(`#b4_${jenis}_total`).val())
			})

		}else {
			$(`#b4_${jenis}_${sub}_total`).on('change', () => {
				state[`b4_${jenis}_${sub}_total`] = parseInt($(`#b4_${jenis}_${sub}_total`).val())
			})
		}

	}


	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')


		onChangeTotal('a')
		onChangeTotal('a','1')
		onChangeClass('b4','a','1')
		actionTambahBaris('b4','a','1')
		onChangeAutocomplete(`b4-a-1-auto`,`b4_a_1`)

		onChangeTotal('b')
		onChangeTotal('b','1')
		onChangeTotal('b','2')
		onChangeClass('b4','b','1')
		onChangeClass('b4','b','2')
		actionTambahBaris('b4','b','1')
		actionTambahBaris('b4','b','2')
		onChangeAutocomplete(`b4-b-1-auto`,`b4_b_1`)
		onChangeAutocomplete(`b4-b-2-auto`,`b4_b_2`)

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
