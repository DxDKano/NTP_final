
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
		<form id="blok2Form" action="<?php echo base_url('PerikananTangkap/submitblok2')?>" class="row g-3">
		<div class="row">

			<div class="col-lg-12">


				<div class="card">
					<div class="card-body">
						<?php $this->load->view('Kuesioner/PerikananTangkap/tabs'); ?>
						<table class="table table-sm table-bordered small">
							<thead class="top-0">
							<tr>
								<td colspan="5" class="table-secondary"><b>C. Barang Modal</b></td>
								<td><input id="b5_c_k6_total" name="b5_c_k6_total" type="number" class="form-control align-right" placeholder="" aria-label="b5_c_k6_total" value="<?php echo $sub['b5_c_k6_total']?>" ></td>
								<td class="table-secondary"></td>
							</tr>
							<tr class="text-center">
								<td colspan="1">No</td>
								<td colspan="1">Nama Barang/Jasa</td>
								<td colspan="1">Satuan</td>
								<td colspan="1">Kode <br>
									(Diisi Pengawas)</td>
								<td colspan="1">Banyaknya</td>
								<td colspan="1">Nilai<br>
									( 000 Rp.)</td>
								<td colspan="1">Aksi</td>
							</tr>
							<tr class="text-center">
								<?php for($i=1;$i<8;$i++): ?>
									<td >(<?php echo $i ?>)</td>
								<?php endfor;?>
							</tr>
							</thead>
							<tbody>

							<?php echo $isianBlok5c; ?>
							<tr id="tr_tambah_b5_c">
								<td colspan="7" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b5_c">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>
							</tbody>
						</table>
						<!-- End small tables -->

						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("PerikananTangkap/halaman4"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman 4  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("PerikananTangkap/halaman6"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>">Halaman 6 <i class="bi bi-arrow-right"></i> </button>
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
		b5_c_k6_total:'<?php echo $sub['b5_c_k6_total'] ?>',
		b5_c:[],
		b5_del:[]
	}
	//ambil data blok 5 c
	<?php foreach ($sub_b5_c as $item): ?>
	state.b5_c.push(
		{
			p1:<?php echo $item['b5_k1']?:'0' ?>,
			p2:'<?php echo $item['b5_k2']?:'0' ?>',
			p3:'<?php echo $item['b5_k3']?:'0' ?>',
			p4:<?php echo $item['b5_k4']?:'0' ?>,
			p5:<?php echo $item['b5_k5']?:'0' ?>,
			p6:<?php echo $item['b5_k6']?:'0' ?>,
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
			type_blok:`c`
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

		$(`#btn_tambah_b5_${jenis}`).on('click',function (e){
			e.preventDefault();
			const pnew = {
				p1:state[`b5_${jenis}`].length+1,
				p2:'',
				p3:'',
				p4:'',
				p5:'',
				p6:'',
				uuid:generateUUID(),
				type_blok:`${jenis}`
			}
			state[`b5_${jenis}`].push(pnew)
			tambahPengeluaran(pnew,jenis)



		})

		onChangeB5(jenis)
		hapusPengeluaran(jenis)
	}


	const onChangeB5 = (jenis)=>{

		$(`.b5-${jenis}-input`).on('change', function() {
			const uuid = $(this).data('uuid')
			var nilai = $(this).val();
			const key = $(this).data('keyx')
			state[`b5_${jenis}`].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const tambahPengeluaran =(p,jenis)=>{
		const {p1,p2,p3,p4,p5,p6,uuid}=p;


		$(`#tr_tambah_b5_${jenis}`).before(`
					<tr class="tr_b5_${jenis}">
						<td colspan="1">${p1}</td>
						<td colspan="1"><input type="text" class="form-control b5-${jenis}-input" data-keyx="p2" data-uuid="${uuid}" value="${p2}"></td>
						<td colspan="1"><input type="text" class="form-control b5-${jenis}-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
						<td colspan="1"><input type="text" class="form-control b5-${jenis}-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
						<td colspan="1"><input type="number" class="form-control b5-${jenis}-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td colspan="1"><input type="number" class="form-control b5-${jenis}-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td colspan="1"><button type="button"
									class="btn btn-danger btn-hapus-b5-${jenis}"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)

		onChangeB5(jenis)

		hapusPengeluaran(jenis)
	}

	const hapusPengeluaran =(jenis)=>{
		//untuk hapus
		$(`.btn-hapus-b5-${jenis}`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[`b5_${jenis}`].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[`b5_${jenis}`] = newArray

			$(`.tr_b5_${jenis}`).remove()
			for(var it=0;it<state[`b5_${jenis}`].length;it++) {
				state[`b5_${jenis}`][it].p1=it+1;
				tambahPengeluaran(state[`b5_${jenis}`][it],jenis)
			}

			state.b5_del.push(uuid)

		})
	}

	$(document).ready(()=>{

		$('#b5_c_k6_total').on('change',()=>{
			state.b5_c_k6_total=`${$('#b5_c_k6_total').val()}`
		})

		$('body').addClass('toggle-sidebar')

		actionTambahPengeluaran('c')

		$('#submitBtn, #backBtn, .halaman-tabs').on('click',function (e) {
			e.preventDefault();
			$('#submitBtn, #backBtn').empty();
			$('#submitBtn, #backBtn, .halaman-tabs').append(`
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
					url: `<?php echo base_url('PerikananTangkap/submithalaman5')?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 4 `);
						$('#submitBtn').append(`Halaman 6 <i class="bi bi-arrow-right"></i> `);
						$('#submitBtn, #backBtn').attr('disabled',false);
						if(response.ok){
							/*$('#footernotif').after(`
							<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
							${response.message}</div>`);*/
							location.href=url
						}else {
							$('.response-submit-btn').remove()
							$('#submitBtn, #backBtn').empty();
							$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 4 `);
							$('#submitBtn').append(`Halaman 6 <i class="bi bi-arrow-right"></i> `);
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
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 4 `);
						$('#submitBtn').append(`Halaman 6 <i class="bi bi-arrow-right"></i> `);
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
