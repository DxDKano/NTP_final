

		<!-- Bordered Tabs Justified -->
		<ul class="nav nav-tabs nav-tabs-bordered d-flex halaman-tabs" id="borderedTabJustified" role="tablist">
			<?php for ($i=1;$i<8;$i++): ?>
				<li class="nav-item flex-fill" role="presentation">
					<button class="nav-link w-100 <?php echo $halaman==$i?"active":""?>"
							id="halaman<?php echo $i ?>Tabs" data-bs-toggle="tab"
							type="button" role="tab"
							data-url="<?php echo base_url("TanamanPangan/halaman{$i}"
									."?tahun={$sub['tahun']}"
									."&id_prov={$sub['id_prov']}"
									."&id_kab={$sub['id_kab']}"
									."&id_kec={$sub['id_kec']}"
									."&id_desa={$sub['id_desa']}"
									."&no_ruta={$sub['no_ruta']}")?>"
					>Halaman <?php echo $i ?></button>
				</li>
			<?php endfor; ?>
			<li class="nav-item flex-fill" role="presentation">
				<button class="nav-link w-100 <?php echo $halaman==99?"active":""?>"
						id="halaman99Tabs" data-bs-toggle="tab"
						type="button" role="tab"
						data-url="<?php echo base_url("TanamanPangan/halaman99"
								."?tahun={$sub['tahun']}"
								."&id_prov={$sub['id_prov']}"
								."&id_kab={$sub['id_kab']}"
								."&id_kec={$sub['id_kec']}"
								."&id_desa={$sub['id_desa']}"
								."&no_ruta={$sub['no_ruta']}")?>"
				>Validasi</button>
			</li>
		</ul>
