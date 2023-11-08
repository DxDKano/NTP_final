
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

						<?php  $colsize=3 ?>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr>
								<td rowspan="2" style="width: 60%">Rincian</td>
								<td colspan="2" style="width: 40%">Dalam Rupiah</td>
							</tr>
							<tr>
								<td >Sebulan</td>
								<td >Setahun</td>
							</tr>
							<tr>
								<?php for($i=1;$i<$colsize+1;$i++): ?>
									<td >(<?php echo $i ?>)</td>
								<?php endfor;?>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td class="table-secondary" >C Kesehatan</td>
								<td class="table-secondary"><input id="b6_2_c_bln" type="number" class="form-control blok-6" data-kode="b6_2_c_bln" value="<?php echo $sub['b6_2_c_bln']?>" ></td>
								<td class="table-secondary"><input id="b6_2_c_thn" type="number" class="form-control blok-6" data-kode="b6_2_c_thn" value="<?php echo $sub['b6_2_c_thn']?>" ></td>
							</tr>
							<tr>
								<td>
									C.1. Jasa Kesehatan (dari Blok V.C.1 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_c1_bln" type="number" class="form-control blok-6" data-kode="b6_2_c1_bln" value="<?php echo $sub['b6_2_c1_bln']?>" >
								</td>
								<td>
									<input id="b6_2_c1_thn" type="number" class="form-control blok-6" data-kode="b6_2_c1_thn" value="<?php echo $sub['b6_2_c1_thn']?>" >
								</td>
							</tr>
							<tr>
								<td>
									C.2. Obat-obatan (dari Blok V.C.2 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_c2_bln" type="number" class="form-control blok-6" data-kode="b6_2_c2_bln" value="<?php echo $sub['b6_2_c2_bln']?>" >
								</td>
								<td>
									<input id="b6_2_c2_thn" type="number" class="form-control blok-6" data-kode="b6_2_c2_thn" value="<?php echo $sub['b6_2_c2_thn']?>" >
								</td>
							</tr>
							<tr>
								<td>
									C.3. Perawatan Jasmani & Kosmetik (dari Blok V.C.3 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_c3_bln" type="number" class="form-control blok-6" data-kode="b6_2_c3_bln" value="<?php echo $sub['b6_2_c3_bln']?>" >
								</td>
								<td>
									<input id="b6_2_c3_thn" type="number" class="form-control blok-6" data-kode="b6_2_c3_thn" value="<?php echo $sub['b6_2_c3_thn']?>" >
								</td>
							</tr>
							<tr>
								<td class="table-secondary" >D Pendidikan, Rekreasi, & Olahraga</td>
								<td class="table-secondary"><input id="b6_2_d_bln" type="number" class="form-control blok-6" data-kode="b6_2_d_bln" value="<?php echo $sub['b6_2_d_bln']?>" ></td>
								<td class="table-secondary"><input id="b6_2_d_thn" type="number" class="form-control blok-6" data-kode="b6_2_d_thn" value="<?php echo $sub['b6_2_d_thn']?>" ></td>
							</tr>
							<tr>
								<td>
									D.1. Pendidikan (dari Blok V.D.1 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_d1_bln" type="number" class="form-control blok-6" data-kode="b6_2_d1_bln" value="<?php echo $sub['b6_2_d1_bln']?>" >
								</td>
								<td>
									<input id="b6_2_d1_thn" type="number" class="form-control blok-6" data-kode="b6_2_d1_thn" value="<?php echo $sub['b6_2_d1_thn']?>" >
								</td>
							</tr>
							<tr>
								<td>
									D.2. Perlengkapan/Peralatan Pendidikan (dari Blok V.D.2 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_d2_bln" type="number" class="form-control blok-6" data-kode="b6_2_d2_bln" value="<?php echo $sub['b6_2_d2_bln']?>" >
								</td>
								<td>
									<input id="b6_2_d2_thn" type="number" class="form-control blok-6" data-kode="b6_2_d2_thn" value="<?php echo $sub['b6_2_d2_thn']?>" >
								</td>
							</tr>
							<tr>
								<td>
									D.3. Rekreasi/Hiburan (dari Blok V.D.3 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_d3_bln" type="number" class="form-control blok-6" data-kode="b6_2_d3_bln" value="<?php echo $sub['b6_2_d3_bln']?>" >
								</td>
								<td>
									<input id="b6_2_d3_thn" type="number" class="form-control blok-6" data-kode="b6_2_d3_thn" value="<?php echo $sub['b6_2_d3_thn']?>" >
								</td>
							</tr>
							<tr>
								<td>
									D.4. Olahraga (dari Blok V.D.4 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_d4_bln" type="number" class="form-control blok-6" data-kode="b6_2_d4_bln" value="<?php echo $sub['b6_2_d4_bln']?>" >
								</td>
								<td>
									<input id="b6_2_d4_thn" type="number" class="form-control blok-6" data-kode="b6_2_d4_thn" value="<?php echo $sub['b6_2_d4_thn']?>" >
								</td>
							</tr>
							<tr>
								<td class="table-secondary" >E Transportasi, Komunikasi & Jasa Keuangan</td>
								<td class="table-secondary"><input id="b6_2_e_bln" type="number" class="form-control blok-6" data-kode="b6_2_e_bln" value="<?php echo $sub['b6_2_e_bln']?>" ></td>
								<td class="table-secondary"><input id="b6_2_e_thn" type="number" class="form-control blok-6" data-kode="b6_2_e_thn" value="<?php echo $sub['b6_2_e_thn']?>" ></td>
							</tr>
							<tr>
								<td>
									E.1. Transportasi (dari Blok V.E.1 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_e1_bln" type="number" class="form-control blok-6" data-kode="b6_2_e1_bln" value="<?php echo $sub['b6_2_e1_bln']?>" >
								</td>
								<td>
									<input id="b6_2_e1_thn" type="number" class="form-control blok-6" data-kode="b6_2_e1_thn" value="<?php echo $sub['b6_2_e1_thn']?>" >
								</td>
							</tr>
							<tr>
								<td>
									E.2. Komunikasi & Pengiriman (dari Blok V.E.2 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_e2_bln" type="number" class="form-control blok-6" data-kode="b6_2_e2_bln" value="<?php echo $sub['b6_2_e2_bln']?>" >
								</td>
								<td>
									<input id="b6_2_e2_thn" type="number" class="form-control blok-6" data-kode="b6_2_e2_thn" value="<?php echo $sub['b6_2_e2_thn']?>" >
								</td>
							</tr>
							<tr>
								<td>
									E.3. Sarana & Penunjang Transportasi (dari Blok V.E.3 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_e3_bln" type="number" class="form-control blok-6" data-kode="b6_2_e3_bln" value="<?php echo $sub['b6_2_e3_bln']?>" >
								</td>
								<td>
									<input id="b6_2_e3_thn" type="number" class="form-control blok-6" data-kode="b6_2_e3_thn" value="<?php echo $sub['b6_2_e3_thn']?>" >
								</td>
							</tr>
							<tr>
								<td>
									E4. Jasa Keuangan (dari Blok V.E.4 kolom (5) & (6))
								</td>
								<td>
									<input id="b6_2_e4_bln" type="number" class="form-control blok-6" data-kode="b6_2_e4_bln" value="<?php echo $sub['b6_2_e4_bln']?>" >
								</td>
								<td>
									<input id="b6_2_e4_thn" type="number" class="form-control blok-6" data-kode="b6_2_e4_thn" value="<?php echo $sub['b6_2_e4_thn']?>" >
								</td>
							</tr>
							<tr>
								<td class="table-secondary" >F Pengeluaran Lain (dari Blok V.F kolom (5) & (6))</td>
								<td class="table-secondary"><input id="b6_2_f_bln" type="number" class="form-control blok-6" data-kode="b6_2_f_bln" value="<?php echo $sub['b6_2_f_bln']?>" ></td>
								<td class="table-secondary"><input id="b6_2_f_thn" type="number" class="form-control blok-6" data-kode="b6_2_f_thn" value="<?php echo $sub['b6_2_f_thn']?>" ></td>
							</tr>
							<tr>
								<td class="table-secondary" >Jumlah 2 (A+B+C+D+E+F)</td>
								<td class="table-secondary"><input id="b6_2_bln" type="number" class="form-control blok-6" data-kode="b6_2_bln" value="<?php echo $sub['b6_2_bln']?>" ></td>
								<td class="table-secondary"><input id="b6_2_thn" type="number" class="form-control blok-6" data-kode="b6_2_thn" value="<?php echo $sub['b6_2_thn']?>" ></td>
							</tr>
							</tbody>
						</table>
						<table class="table table-sm table-bordered small">
							<thead class="text-center top-0">
							<tr><th class="table-secondary">VII. CATATAN</th></tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<textarea id="catatan" class="form-control blok-6" data-kode="catatan" style="height: 100px" ><?php echo $sub['catatan']?></textarea>
								</td>
							</tr>
							</tbody>
						</table>

						<br>

						<div id="footernotif" class="text-center">
							<button id="backBtn" type="button" class="btn btn-secondary" data-url="<?php echo base_url("Konsumsi/halaman".($halaman-1)
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"><i class="bi bi-arrow-left"></i> Halaman <?php echo ($halaman-1)?>  </button>
							<button id="submitBtn" type="button" class="btn btn-primary" data-url="<?php echo base_url("Kuesioner/entri_data")?>">Selesai  <i class="bi bi-arrow-right"></i> </button>
						</div>

					</div>
				</div>


			</div>
		</div>


		</form>
	</section>


</main><!-- End #main -->


<script>

	const state = {
		tahun:'<?php echo $sub['tahun'] ?>',
		id_prov:'<?php echo $sub['id_prov'] ?>',
		id_kab:'<?php echo $sub['id_kab'] ?>',
		id_kec:'<?php echo $sub['id_kec'] ?>',
		id_desa:'<?php echo $sub['id_desa'] ?>',
		no_ruta:'<?php echo $sub['no_ruta'] ?>',

		b6_1:<?php echo $sub['b6_1'] ?>,
		b6_1_a:<?php echo $sub['b6_1_a'] ?>,
		b6_1_b:<?php echo $sub['b6_1_b'] ?>,
		b6_1_a1:<?php echo $sub['b6_1_a1'] ?>,
		b6_1_a2:<?php echo $sub['b6_1_a2'] ?>,
		b6_1_a3:<?php echo $sub['b6_1_a3'] ?>,
		b6_1_a4:<?php echo $sub['b6_1_a4'] ?>,
		b6_1_a5:<?php echo $sub['b6_1_a5'] ?>,
		b6_1_a6:<?php echo $sub['b6_1_a6'] ?>,
		b6_1_a7:<?php echo $sub['b6_1_a7'] ?>,
		b6_1_a8:<?php echo $sub['b6_1_a8'] ?>,
		b6_1_a9:<?php echo $sub['b6_1_a9'] ?>,
		b6_1_a10:<?php echo $sub['b6_1_a10'] ?>,
		b6_1_a11:<?php echo $sub['b6_1_a11'] ?>,
		b6_1_a12:<?php echo $sub['b6_1_a12'] ?>,
		b6_1_b1:<?php echo $sub['b6_1_b1'] ?>,
		b6_1_b2:<?php echo $sub['b6_1_b2'] ?>,
		b6_1_b3:<?php echo $sub['b6_1_b3'] ?>,
		b6_2_bln:<?php echo $sub['b6_2_bln'] ?>,
		b6_2_a_bln:<?php echo $sub['b6_2_a_bln'] ?>,
		b6_2_b_bln:<?php echo $sub['b6_2_b_bln'] ?>,
		b6_2_c_bln:<?php echo $sub['b6_2_c_bln'] ?>,
		b6_2_d_bln:<?php echo $sub['b6_2_d_bln'] ?>,
		b6_2_e_bln:<?php echo $sub['b6_2_e_bln'] ?>,
		b6_2_f_bln:<?php echo $sub['b6_2_f_bln'] ?>,
		b6_2_a1_bln:<?php echo $sub['b6_2_a1_bln'] ?>,
		b6_2_a2_bln:<?php echo $sub['b6_2_a2_bln'] ?>,
		b6_2_a3_bln:<?php echo $sub['b6_2_a3_bln'] ?>,
		b6_2_a4_bln:<?php echo $sub['b6_2_a4_bln'] ?>,
		b6_2_b1_bln:<?php echo $sub['b6_2_b1_bln'] ?>,
		b6_2_b2_bln:<?php echo $sub['b6_2_b2_bln'] ?>,
		b6_2_b3_bln:<?php echo $sub['b6_2_b3_bln'] ?>,
		b6_2_b4_bln:<?php echo $sub['b6_2_b4_bln'] ?>,
		b6_2_c1_bln:<?php echo $sub['b6_2_c1_bln'] ?>,
		b6_2_c2_bln:<?php echo $sub['b6_2_c2_bln'] ?>,
		b6_2_c3_bln:<?php echo $sub['b6_2_c3_bln'] ?>,
		b6_2_d1_bln:<?php echo $sub['b6_2_d1_bln'] ?>,
		b6_2_d2_bln:<?php echo $sub['b6_2_d2_bln'] ?>,
		b6_2_d3_bln:<?php echo $sub['b6_2_d3_bln'] ?>,
		b6_2_d4_bln:<?php echo $sub['b6_2_d4_bln'] ?>,
		b6_2_e1_bln:<?php echo $sub['b6_2_e1_bln'] ?>,
		b6_2_e2_bln:<?php echo $sub['b6_2_e2_bln'] ?>,
		b6_2_e3_bln:<?php echo $sub['b6_2_e3_bln'] ?>,
		b6_2_e4_bln:<?php echo $sub['b6_2_e4_bln'] ?>,
		b6_2_thn:<?php echo $sub['b6_2_thn'] ?>,
		b6_2_a_thn:<?php echo $sub['b6_2_a_thn'] ?>,
		b6_2_b_thn:<?php echo $sub['b6_2_b_thn'] ?>,
		b6_2_c_thn:<?php echo $sub['b6_2_c_thn'] ?>,
		b6_2_d_thn:<?php echo $sub['b6_2_d_thn'] ?>,
		b6_2_e_thn:<?php echo $sub['b6_2_e_thn'] ?>,
		b6_2_f_thn:<?php echo $sub['b6_2_f_thn'] ?>,
		b6_2_a1_thn:<?php echo $sub['b6_2_a1_thn'] ?>,
		b6_2_a2_thn:<?php echo $sub['b6_2_a2_thn'] ?>,
		b6_2_a3_thn:<?php echo $sub['b6_2_a3_thn'] ?>,
		b6_2_a4_thn:<?php echo $sub['b6_2_a4_thn'] ?>,
		b6_2_b1_thn:<?php echo $sub['b6_2_b1_thn'] ?>,
		b6_2_b2_thn:<?php echo $sub['b6_2_b2_thn'] ?>,
		b6_2_b3_thn:<?php echo $sub['b6_2_b3_thn'] ?>,
		b6_2_b4_thn:<?php echo $sub['b6_2_b4_thn'] ?>,
		b6_2_c1_thn:<?php echo $sub['b6_2_c1_thn'] ?>,
		b6_2_c2_thn:<?php echo $sub['b6_2_c2_thn'] ?>,
		b6_2_c3_thn:<?php echo $sub['b6_2_c3_thn'] ?>,
		b6_2_d1_thn:<?php echo $sub['b6_2_d1_thn'] ?>,
		b6_2_d2_thn:<?php echo $sub['b6_2_d2_thn'] ?>,
		b6_2_d3_thn:<?php echo $sub['b6_2_d3_thn'] ?>,
		b6_2_d4_thn:<?php echo $sub['b6_2_d4_thn'] ?>,
		b6_2_e1_thn:<?php echo $sub['b6_2_e1_thn'] ?>,
		b6_2_e2_thn:<?php echo $sub['b6_2_e2_thn'] ?>,
		b6_2_e3_thn:<?php echo $sub['b6_2_e3_thn'] ?>,
		b6_2_e4_thn:<?php echo $sub['b6_2_e4_thn'] ?>,

		catatan:'<?php echo $sub['catatan'] ?>',
	}

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


	const onChangeClass = ()=>{

		$(`.blok-6`).on('change', function() {
			var nilai = parseVal($(this));
			const key = $(this).data('kode')
			state[key]=nilai
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


	$(document).ready(()=>{

		$('body').addClass('toggle-sidebar')

		onChangeClass()

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
					url: `<?php echo base_url("Konsumsi/submithalaman".$halaman)?>`,
					type: 'POST',
					data: JSON.stringify(state),
					contentType: 'application/json',
					success: function(response) {
						response=JSON.parse(response)
						$('.response-submit-btn').remove()
						$('#submitBtn, #backBtn').empty();
						$('#backBtn').append(`<i class="bi bi-arrow-left"></i> Halaman <?php echo ($halaman-1)?> `);
						$('#submitBtn').append(`Selesai <i class="bi bi-arrow-right"></i> `);
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
							$('#submitBtn').append(`Selesai <i class="bi bi-arrow-right"></i> `);
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
						$('#submitBtn').append(`Selesai <i class="bi bi-arrow-right"></i> `);
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
