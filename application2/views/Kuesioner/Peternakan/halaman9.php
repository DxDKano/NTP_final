
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
							<thead class="cond-b5r1">
							<tr>
								<th scope="col" colspan="15" class="table-secondary">VI. PENGELUARAN UNTUK USAHA JASA PETERNAKAN SELAMA SETAHUN</th>
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
							<tbody class="cond-b5r1">
							<?php echo $isianBlok6; ?>
							<tr id="tr_tambah_b6">
								<td colspan="15" >
									<button type="button" class="btn btn-outline-secondary" id="btn_tambah_b6">
										<i class="bi bi-plus"></i>Tambah
									</button>
								</td>
							</tr>

							</tbody>
						</table>
						<!-- End small tables -->

						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("Peternakan/halaman8"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman 8  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Peternakan/halaman10"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>">Halaman 10 <i class="bi bi-arrow-right"></i> </button>
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
		b6:[],
		b5_del:[],
		b6_del:[]
	}
	//ambil data blok 6
	<?php foreach ($sub_b6 as $item): ?>
	state.b6.push(
		{
			p1:<?php echo $item['b6_k1']?:'0' ?>,
			p2:'<?php echo $item['b6_k2']?:'0' ?>',
			p3:'<?php echo $item['b6_k3']?:'0' ?>',
			p4:'<?php echo $item['b6_k4']?:'0' ?>',
			p5:<?php echo $item['b6_k5']?:'0' ?>,
			p6:<?php echo $item['b6_k6']?:'0' ?>,
			uuid:'<?php echo strlen($item['uuid'])>0?$item['uuid']:random_string('alnum',36) ?>',
			type_blok:`b6`
		})
	<?php endforeach; ?>
	function generateUUID() {
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = (Math.random() * 16) | 0,
				v = c === 'x' ? r : (r & 0x3) | 0x8;
			return v.toString(16);
		});
	}

	const actionTambahPengeluaran6 = ()=>{

		$(`#btn_tambah_b6`).on('click',function (e){
			e.preventDefault();
			const pnew = {
				p1:state[`b6`].length+1,
				p2:'',
				p3:'',
				p4:'',
				p5:'',
				p6:'',
				p7:'',
				uuid:generateUUID(),
				type_blok:`b6`
			}
			state[`b6`].push(pnew)
			tambahPengeluaran6(pnew)



		})
		hapusPengeluaran6()
	}

	const onChangeB6 = () => {

		$(`.b6-input`).on('change', function() {
			var nilai = $(this).val();
			const uuid = $(this).data('uuid')
			const key = $(this).data('keyx')
			state[`b6`].forEach(function(item) {
				if (item.uuid === uuid) {
					item[key] = nilai;
				}
			});
			console.log(state)
		});
	}

	const tambahPengeluaran6 =(p)=>{
		const {p1,p2,p3,p4,p5,p6,uuid}=p;


		$(`#tr_tambah_b6`).before(`
					<tr class="tr_b6">
						<td colspan="1">${p1}</td>
						<td colspan="4"><input type="text" class="form-control b6-input" data-keyx="p2" data-uuid="${uuid}" value="${p2}"></td>
						<td colspan="2"><input type="text" class="form-control b6-input" data-keyx="p3" data-uuid="${uuid}" value="${p3}"></td>
						<td colspan="2"><input type="text" class="form-control b6-input" data-keyx="p4" data-uuid="${uuid}" value="${p4}"></td>
						<td colspan="2"><input type="number" class="form-control b6-input" data-keyx="p5" data-uuid="${uuid}" value="${p5}"></td>
						<td colspan="3"><input type="number" class="form-control b6-input" data-keyx="p6" data-uuid="${uuid}" value="${p6}"></td>
						<td colspan="1"><button type="button"
									class="btn btn-danger btn-hapus-b6"
									data-uuid="${uuid}">
							<i class="ri ri-close-fill">
						</button></td>
					</tr>
				`)

		hapusPengeluaran6()
	}

	const hapusPengeluaran6 =()=>{
		//untuk hapus
		$(`.btn-hapus-b6`).on('click',function (e){
			e.preventDefault();
			//
			const uuid = $(this).data('uuid')

			var newArray = state[`b6`].filter(function(item) {
				return item.uuid !== uuid;
			});
			state[`b6`] = newArray

			$(`.tr_b6`).remove()
			for(var it=0;it<state[`b6`].length;it++) {
				state[`b6`][it].p1=it+1;
				tambahPengeluaran6(state[`b6`][it])
			}

			state.b6_del.push(uuid)

		})
		onChangeB6()
	}

	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')
		actionTambahPengeluaran6()

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
					url: `<?php echo base_url('Peternakan/submithalaman9')?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 8 `);
						$('#submitBtn').append(`Halaman 10 <i class="bi bi-arrow-right"></i> `);
						$('#submitBtn, #backBtn').attr('disabled',false);
						if(response.ok){
							/*$('#footernotif').after(`
							<div class="alert alert-success fade show response-submit-btn m-3" role="alert">
							${response.message}</div>`);*/
							location.href=url
						}else {
							$('.response-submit-btn').remove()
							$('#submitBtn, #backBtn').empty();
							$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 8 `);
							$('#submitBtn').append(`Halaman 10 <i class="bi bi-arrow-right"></i> `);
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
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman 8 `);
						$('#submitBtn').append(`Halaman 10 <i class="bi bi-arrow-right"></i> `);
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
