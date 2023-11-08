
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
								<th scope="col" colspan="13" class="table-secondary">IV. PENGELUARAN UNTUK KOMODITAS YANG DIHASILKAN SELAMA SETAHUN</th>
							</tr>
							<tr>
								<td colspan="1">No</td>
								<td colspan="3">Nama Barang/Jasa</td>
								<td colspan="2">Satuan</td>
								<td colspan="2">Kode <br>
									(Diisi Pengawas)</td>
								<td colspan="2">Banyaknya</td>
								<td colspan="2">Nilai<br>
									( 000 Rp.)</td>
								<td colspan="1">Aksi</td>
							</tr>
							<tr>
								<?php for($i=1;$i<8;$i++): ?>
									<td colspan="<?php echo $i==1?'1':($i==2?'3':'2') ?>">(<?php echo $i ?>)</td>
								<?php endfor;?>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td class="table-secondary" colspan="10" >A. Bibit/Benih dan Bakalan Ternak</td>
								<td class="table-secondary" colspan="2"><input id="b4a_k6_total" type="number" class="form-control" value="<?php echo $sub['b4a_k6_total']?>" ></td>
								<td class="table-secondary" colspan="1"></td>
							</tr>
							<tr>
								<td class="table-secondary" colspan="10" >A.1. Bibit/Benih</td>
								<td class="table-secondary" colspan="2"><input id="b4a1_k6_total" type="number" class="form-control" value="<?php echo $sub['b4a1_k6_total']?>" ></td>
								<td class="table-secondary" colspan="1"></td>
							</tr>
							<?php echo $isianBlok4a1; ?>
							<tr id="tr_tambah_b4_a1">
								<td colspan="13" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b4_a1">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>
							<tr>
								<td class="table-secondary" colspan="10" >A.2. Bakalan Ternak</td>
								<td class="table-secondary" colspan="2"><input id="b4a2_k6_total" type="number" class="form-control" value="<?php echo $sub['b4a2_k6_total']?>" ></td>
								<td class="table-secondary" colspan="1"></td>
							</tr>
							<?php echo $isianBlok4a2; ?>
							<tr id="tr_tambah_b4_a2">
								<td colspan="13" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b4_a2">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>

							<tr>
								<td class="table-secondary" colspan="10" >B. Obat-obatan dan Pakan Terna/Unggas</td>
								<td class="table-secondary" colspan="2"><input id="b4b_k6_total" type="number" class="form-control" value="<?php echo $sub['b4b_k6_total']?>" ></td>
								<td class="table-secondary" colspan="1"></td>
							</tr>
							<tr>
								<td class="table-secondary" colspan="10" >B.1. Obat-Obatan</td>
								<td class="table-secondary" colspan="2"><input id="b4b1_k6_total" type="number" class="form-control" value="<?php echo $sub['b4b1_k6_total']?>" ></td>
								<td class="table-secondary" colspan="1"></td>
							</tr>
							<?php echo $isianBlok4b1; ?>
							<tr id="tr_tambah_b4_b1">
								<td colspan="13" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b4_b1">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>

							</tbody>
						</table>
						<!-- End small tables -->


						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("Peternakan/halaman".($halaman-1)
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman <?php echo ($halaman-1)?>  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Peternakan/halaman".($halaman+1)
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
		b4_a1:[],
		b4_a2:[],
		b4_b1:[],
		b4_del:[],
		b4a_k6_total:'<?php echo $sub['b4a_k6_total']?>',
		b4a1_k6_total:'<?php echo $sub['b4a1_k6_total']?>',
		b4a2_k6_total:'<?php echo $sub['b4a2_k6_total']?>',
		b4b_k6_total:'<?php echo $sub['b4b_k6_total']?>',
		b4b1_k6_total:'<?php echo $sub['b4b1_k6_total']?>',
	}

	//ambil data blok 4 a1
	<?php foreach ($sub_b4_a1 as $item): ?>
	state.b4_a1.push(
		{
			p1:<?php echo $item['b4_k1']?:'0' ?>,
			p2:'<?php echo $item['b4_k2']?:'0' ?>',
			p3:'<?php echo $item['b4_k3']?:'0' ?>',
			p4:<?php echo $item['b4_k4']?:'0' ?>,
			p5:'<?php echo $item['b4_k5']?:'0' ?>',
			p6:'<?php echo $item['b4_k6']?:'0' ?>',
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
			type_blok:`a1`
		})
	<?php endforeach; ?>

	//ambil data blok 4 a2
	<?php foreach ($sub_b4_a2 as $item): ?>
	state.b4_a2.push(
		{
			p1:<?php echo $item['b4_k1']?:'0' ?>,
			p2:'<?php echo $item['b4_k2']?:'0' ?>',
			p3:'<?php echo $item['b4_k3']?:'0' ?>',
			p4:<?php echo $item['b4_k4']?:'0' ?>,
			p5:'<?php echo $item['b4_k5']?:'0' ?>',
			p6:'<?php echo $item['b4_k6']?:'0' ?>',
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
			type_blok:`a2`
		})
	<?php endforeach; ?>

	//ambil data blok 4 b1
	<?php foreach ($sub_b4_b1 as $item): ?>
	state.b4_b1.push(
		{
			p1:<?php echo $item['b4_k1']?:'0' ?>,
			p2:'<?php echo $item['b4_k2']?:'0' ?>',
			p3:'<?php echo $item['b4_k3']?:'0' ?>',
			p4:<?php echo $item['b4_k4']?:'0' ?>,
			p5:'<?php echo $item['b4_k5']?:'0' ?>',
			p6:'<?php echo $item['b4_k6']?:'0' ?>',
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
			type_blok:`b1`
		})
	<?php endforeach; ?>

	function generateUUID() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = (Math.random() * 16) | 0,
				v = c === 'x' ? r : (r & 0x3) | 0x8;
			return v.toString(16);
		});
	}

	const actionTambahPengeluaran = (jenis)=>{

		$(`#btn_tambah_b4_${jenis}`).on('click',function (e){
			e.preventDefault();
			const pnew = {
				p1:state[`b4_${jenis}`].length+1,
				p2:'',
				p3:'',
				p4:'',
				p5:'',
				p6:'',
				uuid:generateUUID(),
				type_blok:`${jenis}`
			}
			state[`b4_${jenis}`].push(pnew)
			tambahPengeluaran(pnew,jenis)



		})

		onChangeB4(jenis)
		hapusPengeluaran(jenis)
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

	const tambahPengeluaran =(p,jenis)=>{
		const {p1,p2,p3,p4,p5,p6,uuid}=p;


		$(`#tr_tambah_b4_${jenis}`).before(`
					<tr class="tr_b4_${jenis}">
						<td colspan="1">${p1}</td>
						<td colspan="3"><input type="text" class="form-control b4-${jenis}-input" data-keyx="p2" data-uuid="${uuid}" value="${p2}"></td>
						<td colspan="2"><input type="text" class="form-control b4-${jenis}-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
						<td colspan="2"><input type="text" class="form-control b4-${jenis}-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
						<td colspan="2"><input type="number" class="form-control b4-${jenis}-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td colspan="2"><input type="number" class="form-control b4-${jenis}-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td colspan="1"><button type="button"
									class="btn btn-danger btn-hapus-b4-${jenis}"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)

		onChangeB4(jenis)

		hapusPengeluaran(jenis)
	}

	const hapusPengeluaran =(jenis)=>{
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
				tambahPengeluaran(state[`b4_${jenis}`][it],jenis)
			}
			state.b4_del.push(uuid)
			console.log(state)

		})
	}


	const onChangeTotal = (jenis,sub)=>{

		if(typeof sub === 'undefined'){
			$(`#b4${jenis}_k6_total`).on('change', () => {
				state[`#b4${jenis}_k6_total`] = parseInt($(`#b4${jenis}_k6_total`).val())
			})

		}else {
			$(`#b4${jenis}${sub}_k6_total`).on('change', () => {
				state[`#b4${jenis}${sub}_k6_total`] = parseInt($(`#b4${jenis}${sub}_k6_total`).val())
			})
		}

	}

	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')

		$('#b4a_k6_total').on('change',()=>{
			state.b4a_k6_total=`${$('#b4a_k6_total').val()}`
		})
		$('#b4a1_k6_total').on('change',()=>{
			state.b4a1_k6_total=`${$('#b4a1_k6_total').val()}`
		})
		$('#b4a2_k6_total').on('change',()=>{
			state.b4a2_k6_total=`${$('#b4a2_k6_total').val()}`
		})
		$('#b4b_k6_total').on('change',()=>{
			state.b4b_k6_total=`${$('#b4b_k6_total').val()}`
		})
		$('#b4b1_k6_total').on('change',()=>{
			state.b4b1_k6_total=`${$('#b4b1_k6_total').val()}`
		})

		actionTambahPengeluaran('a1')
		actionTambahPengeluaran('a2')
		actionTambahPengeluaran('b1')

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
					url: `<?php echo base_url("Peternakan/submithalaman".$halaman)?>`,
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