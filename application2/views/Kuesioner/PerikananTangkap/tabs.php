

		<!-- Bordered Tabs Justified -->
		<ul class="nav nav-tabs nav-tabs-bordered d-flex halaman-tabs" id="borderedTabJustified" role="tablist">
			<?php for ($i=1;$i<9;$i++): ?>
				<li class="nav-item flex-fill" role="presentation">
					<button class="nav-link w-100 <?php echo $halaman==$i?"active":""?>"
							id="halaman<?php echo $i ?>Tabs" data-bs-toggle="tab"
							type="button" role="tab"
							data-url="<?php echo base_url("PerikananTangkap/halaman{$i}"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"
					>Halaman <?php echo $i ?></button>
				</li>
			<?php endfor; ?>
		</ul>
