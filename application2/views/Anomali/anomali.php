<main id="main" class="main">

    <div class="pagetitle">
      <h1>Anomali</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Anomali/tanaman_pangan">Anomali</a></li>
          <li class="breadcrumb-item active">Tanaman Pangan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

      <div class="row">

          <div class="card">
            <div class="card-body pt-3">
              <div class="col-xl-12 mx-auto">
                <div class="row">
                  <div class="card-body w-50">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-white shadow" for="anomali_search">Anomali</label>
                      </div>
                      <select class="form-select" id="anomali_search">
                        <option></option>
                        <option value = '1'>Anomali 1. Pengecekan Produkivitas</option>
                        <option value = '2'>Anomali 2. Pengecekan Harga Nilai Produksi yang Dijual</option>
                        <option value = '3'>Anomali 3. Pengecekan Komoditas</option>

                      </select>
                    </div>
                  </div>
                  <div class="card-body w-25">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-white shadow" for="tahun_search">Tahun</label>
                      </div>
                      <select class="form-select" id="tahun_search">
                        <option></option>
                        <option value="2023">2023</option>
                        <option value="2022" selected>2022</option>
                      </select>
                    </div>
                  </div>
                  <div class="card-body w-25">
                    <button class='btn btn-primary btn-icon-split mx-auto' id="button_anomali"><span class='icon text-white-50'><i class='fa fa-search'></i></span><span class='text'>Proses</span></button>
                  </div>
                </div>
              </div>

              <div class="tab-content pt-2">
                <div id="warning">

                </div>

                <!-- Monitoring -->
                <div class="tab-pane fade show active" id="monitoring_body">
                  <div id="button_tambah" class="d-flex justify-content-end">
                    <div id="download_xls" class="px-1"></div>
                  </div>
                  <h5 id="title_anomali" class="card-title"></h5>
                  <div>
                    <table class="table table-striped table-bordered" id="tabel_anomali" width="100%" cellspacing="0">
                    </table>
                  </div>
                  <!-- End Sampel Utama -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>

          </div>

      </div>
    </section>

  </main><!-- End #main -->

<script>

  $("#button_anomali").click(function(){
    $(".anomaliWarning").remove();
    if ($('#anomali_search').val() == '-') {
      $("<span class='d-flex justify-content-center text-danger anomaliWarning'> Harap Pilih Tabel Anomali</span>").insertAfter("#warning");
    };

    $('#tabel_anomali').append("<thead>"
    +"<tr>"
    +"<th></th>"
    +"</tr>"
    +"</thead>");

    if ($('#anomali_search').val() == 1) {
      document.getElementById("title_anomali").innerHTML = "";
      document.getElementById("title_anomali").innerHTML = "Pengecekan Produkivitas";
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th class='text-center'>NO SAMPEL</th>"
      +"<th class='text-center'>NAMA</th>"
      +"<th class='text-center'>B3_K2A</th>"
      +"<th class='text-center'>B3_K4</th>"
      +"<th class='text-center'>B3_K5</th>"
      +"<th class='text-center'>PRODUKTIVITAS</th>"
      +"<th class='text-center'>BATAS BAWAH</th>"
      +"<th class='text-center'>BATAS ATAS</th>"
      +"</tr>"
      +"<tr>"
      +"<th class='text-center'>(1)</th>"
      +"<th class='text-center'>(2)</th>"
      +"<th class='text-center'>(3)</th>"
      +"<th class='text-center'>(4)</th>"
      +"<th class='text-center'>(5)</th>"
      +"<th class='text-center'>(6)</th>"
      +"<th class='text-center'>(7)</th>"
      +"<th class='text-center'>(8)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 2) {
      document.getElementById("title_anomali").innerHTML = "";
      document.getElementById("title_anomali").innerHTML = "Pengecekan Harga Nilai Produksi yang Dijual";
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th class='text-center'>NO SAMPEL</th>"
      +"<th class='text-center'>NAMA</th>"
      +"<th class='text-center'>B3_K2A</th>"
      +"<th class='text-center'>B3_K6</th>"
      +"<th class='text-center'>B3_K7</th>"
      +"<th class='text-center'>NILAI PER KG</th>"
      +"<th class='text-center'>BATAS BAWAH</th>"
      +"<th class='text-center'>BATAS ATAS</th>"
      +"</tr>"
      +"<tr>"
      +"<th class='text-center'>(1)</th>"
      +"<th class='text-center'>(2)</th>"
      +"<th class='text-center'>(3)</th>"
      +"<th class='text-center'>(4)</th>"
      +"<th class='text-center'>(5)</th>"
      +"<th class='text-center'>(6)</th>"
      +"<th class='text-center'>(7)</th>"
      +"<th class='text-center'>(8)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 3) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>PN/PD/PERSERO</th>"
      +"<th>PT/NV</th>"
      +"<th>CV</th>"
      +"<th>Firma</th>"
      +"<th>Koperasi</th>"
      +"<th>Lainnya</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 4) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Tanpa Cabang</th>"
      +"<th>Induk/Pusat</th>"
      +"<th>Cabang</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 5) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Penangkapan Ikan</th>"
      +"<th>Penangkapan dan Pengolahan</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 6) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='2'>Produksi</th>"
      +"<th colspan='2'>Non Produksi</th>"
      +"<th rowspan='2'>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Laki-laki</th>"
      +"<th>Perempuan</th>"
      +"<th>Laki-laki</th>"
      +"<th>Perempuan</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 7) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='2'>Produksi</th>"
      +"<th colspan='2'>Non Produksi</th>"
      +"<th rowspan='2'>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Tetap</th>"
      +"<th>Tidak Tetap</th>"
      +"<th>Tetap</th>"
      +"<th>Tidak Tetap</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 8) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Universitas/D4</th>"
      +"<th>Diploma I/II/III/Akademi</th>"
      +"<th>SMK</th>"
      +"<th>SMA</th>"
      +"<th>SMP</th>"
      +"<th>SD</th>"
      +"<th>Tdk/Belum Tamat SD</th>"
      +"<th>Tdk/Belum Pernah Sekolah</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"<th>(9)</th>"
      +"<th>(10)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 9) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Universitas/D4</th>"
      +"<th>Diploma I/II/III/Akademi</th>"
      +"<th>SMK</th>"
      +"<th>SMA</th>"
      +"<th>SMP</th>"
      +"<th>SD</th>"
      +"<th>Tdk/Belum Tamat SD</th>"
      +"<th>Tdk/Belum Pernah Sekolah</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"<th>(9)</th>"
      +"<th>(10)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 10) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='2'>Produksi</th>"
      +"<th colspan='2'>Non Produksi</th>"
      +"<th rowspan='2'>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Laki-laki</th>"
      +"<th>Perempuan</th>"
      +"<th>Laki-laki</th>"
      +"<th>Perempuan</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 11) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='2'>Produksi</th>"
      +"<th colspan='2'>Non Produksi</th>"
      +"<th rowspan='2'>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Tetap</th>"
      +"<th>Tidak Tetap</th>"
      +"<th>Tetap</th>"
      +"<th>Tidak Tetap</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 12) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Universitas/D4</th>"
      +"<th>Diploma I/II/III/Akademi</th>"
      +"<th>SMK</th>"
      +"<th>SMA</th>"
      +"<th>SMP</th>"
      +"<th>SD</th>"
      +"<th>Tdk/Belum Tamat SD</th>"
      +"<th>Tdk/Belum Pernah Sekolah</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"<th>(9)</th>"
      +"<th>(10)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 13) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Universitas/D4</th>"
      +"<th>Diploma I/II/III/Akademi</th>"
      +"<th>SMK</th>"
      +"<th>SMA</th>"
      +"<th>SMP</th>"
      +"<th>SD</th>"
      +"<th>Tdk/Belum Tamat SD</th>"
      +"<th>Tdk/Belum Pernah Sekolah</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"<th>(9)</th>"
      +"<th>(10)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 14) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='3'>Kapal Motor Pengangkut</th>"
      +"<th colspan='3'>Kapal Motor Penangkapan</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Perahu Tanpa Motor</th>"
      +"<th>Perahu Motor Tempel</th>"
      +"<th>Kapal Motor</th>"
      +"<th>Perahu Tanpa Motor</th>"
      +"<th>Perahu Motor Tempel</th>"
      +"<th>Kapal Motor</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 15) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='3'>Provinsi</th>"
      +"<th rowspan='3'>Volume (Ton)</th>"
      +"<th rowspan='3'>Nilai (Juta Rupiah)</th>"
      +"<th colspan='4'>Penggunaan Produksi (Ton)</th>"
      +"</tr>"
      +"<tr>"
      +"<th colspan='2'>Dijual Dalam Bentuk Segar/Hidup</th>"
      +"<th rowspan='2'>Bahan Baku Olahan</th>"
      +"<th rowspan='2'>Stok/Sisa</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Di Dalam Negeri</th>"
      +"<th>Ekspor</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 16) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='2'>Tuna</th>"
      +"<th colspan='2'>Cakalang</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Produksi (Ton)</th>"
      +"<th>Nilai (Juta)</th>"
      +"<th>Produksi (Ton)</th>"
      +"<th>Nilai (Juta)</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 17) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='2'>Tongkol</th>"
      +"<th colspan='2'>Cucut</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Produksi (Ton)</th>"
      +"<th>Nilai (Juta)</th>"
      +"<th>Produksi (Ton)</th>"
      +"<th>Nilai (Juta)</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"<th>(9)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 18) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='2'>Udang</th>"
      +"<th colspan='2'>Komoditi Lain</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Produksi (Ton)</th>"
      +"<th>Nilai (Juta)</th>"
      +"<th>Produksi (Ton)</th>"
      +"<th>Nilai (Juta)</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(10)</th>"
      +"<th>(11)</th>"
      +"<th>(12)</th>"
      +"<th>(13)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 19) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th colspan='2'>Upah/Gaji Termasuk Tunjangan</th>"
      +"<th rowspan='2'>Pengeluaran Lainnya (Selain Upah/Gaji dan Tunjangan)</th>"
      +"<th rowspan='2'>Pengeluaran untuk Pekerja Harian Lepas/Borongan</th>"
      +"<th rowspan='2'>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Pekerja Tetap</th>"
      +"<th>Pekerja Tidak Tetap</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 20) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Bahan Bakar dan Pelumas</th>"
      +"<th>Listrik</th>"
      +"<th>Air PDAM</th>"
      +"<th>Gas PGN</th>"
      +"<th>Total</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 21) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Bahan Bakar dan Pelumas</th>"
      +"<th>Listrik</th>"
      +"<th>Air PDAM</th>"
      +"<th>Gas PGN</th>"
      +"<th>Total</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 22) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Bahan Bakar dan Pelumas</th>"
      +"<th>Listrik</th>"
      +"<th>Air PDAM</th>"
      +"<th>Gas PGN</th>"
      +"<th>Total</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 23) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Umpan</th>"
      +"<th>garam, Es, dsb</th>"
      +"<th>Kemasan, Pembungkus, dan Pengepak</th>"
      +"<th>Konsumsi</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 24) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th rowspan='2'>Provinsi</th>"
      +"<th rowspan='2'>Jasa</th>"
      +"<th colspan='2'>Sewa</th>"
      +"<th rowspan='2'>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>Tanah</th>"
      +"<th>Gedung, Kapal, Mesin, dll</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 25) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Suku Cadang, Bahan untuk Pemeliharaan dan Perbaikan Kecil Barang Modal</th>"
      +"<th>Barang Keperluan Kantor dan Alat Kerja</th>"
      +"<th>Pajak Tidak Langsung</th>"
      +"<th>Penyusutan</th>"
      +"<th>Transportasi</th>"
      +"<th>Telekomunikasi</th>"
      +"<th>Lainnya</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"<th>(9)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 26) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Pekerja</th>"
      +"<th>Bahan-Bahan</th>"
      +"<th>Jasa</th>"
      +"<th>Bahan Bakar</th>"
      +"<th>Listrik, Air, dan Gas (PGN)</th>"
      +"<th>Lainnya</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"<th>(7)</th>"
      +"<th>(8)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() == 27) {
      $('#tabel_anomali').DataTable().clear().destroy();
      $('#tabel_anomali').empty();
      $('#tabel_anomali').append("<thead>"
      +"<tr>"
      +"<th>Provinsi</th>"
      +"<th>Nilai Produksi</th>"
      +"<th>Jasa Perikanan</th>"
      +"<th>Keuntungan Penjualan Barang</th>"
      +"<th>Penerimaan Lain</th>"
      +"<th>Jumlah</th>"
      +"</tr>"
      +"<tr>"
      +"<th>(1)</th>"
      +"<th>(2)</th>"
      +"<th>(3)</th>"
      +"<th>(4)</th>"
      +"<th>(5)</th>"
      +"<th>(6)</th>"
      +"</tr>"
      +"</thead>");
    };

    if ($('#anomali_search').val() != '-'){
      ambil_anomali();
    }
  });


  function ambil_anomali() {
    var tabel_anomali
    var tahun_download = $('#tahun_search').val();
    // $('#tabel_anomali').DataTable().clear().destroy();
      tabel_anomali = $('#tabel_anomali').DataTable({
        dom: 'Blfrtip',
        processing : true,
        ordering : false,
        pageLength : 50,
        buttons: [],
        ajax : {
          url : '<?= base_url('Anomali/ajax_ambil_anomali');?>',
          dataType: 'JSON',
          method: 'POST',
          data : function(d){
            d.filter_anom = $('#anomali_search').val(),
            d.filter_tahun = $('#tahun_search').val()
          },
          // success : function(data){
          //
          // },
          error : function(err) {
            console.log(err.responseText);
          }
        },
        dataSrc : function(result) {
          console.log(result);
        }
      });

      if ($('#anomali_search').val() == '1') {
        var button = new $.fn.dataTable.Buttons( tabel_anomali, {
          buttons: [
              {
                  extend:    'excelHtml5',
                  className: 'btn btn-primary btn-icon-split',
                  text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                  filename:  'Anomali 1. Pengecekan Produkivitas Tahun '+tahun_download,
                  title:     'Pengecekan Produkivitas Tahun '+tahun_download,
                  titleAttr: 'Excel'
              }
            ]
        }).container().prependTo($('#download_xls'));
      }

      if ($('#anomali_search').val() == '2') {
        var button = new $.fn.dataTable.Buttons( tabel_anomali, {
          buttons: [
              {
                  extend:    'excelHtml5',
                  className: 'btn btn-primary btn-icon-split',
                  text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                  filename:  'Anomali 2. Pengecekan Harga Nilai Produksi Per Kg Tahun '+tahun_download,
                  title:     'Pengecekan Harga Nilai Produksi Per Kg Tahun '+tahun_download,
                  titleAttr: 'Excel'
              }
            ]
        }).container().prependTo($('#download_xls'));
      }


    if ($('#anomali_search').val() == '3') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 1.3. Jumlah Perusahaan Penangkapan Ikan Menurut Provinsi dan Bentuk Badan Usaha Tahun 20'+tahun_download,
                title:     'Jumlah Perusahaan Penangkapan Ikan Menurut Provinsi dan Bentuk Badan Usaha Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '4') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 1.4. Jumlah Perusahaan Penangkapan Ikan Menurut Provinsi dan Status Perusahaan Tahun 20'+tahun_download,
                title:     'Jumlah Perusahaan Penangkapan Ikan Menurut Provinsi dan Status Perusahaan Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '5') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 1.5. Jumlah Perusahaan Penangkapan Ikan Menurut Provinsi dan Jenis Kegiatan Utama Tahun 20'+tahun_download,
                title:     'Jumlah Perusahaan Penangkapan Ikan Menurut Provinsi dan Jenis Kegiatan Utama Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '6') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 2.1. Jumlah Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi, Bidang Pekerjaan dan Jenis Kelamin Tahun 20'+tahun_download,
                title:     'Jumlah Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi, Bidang Pekerjaan dan Jenis Kelamin Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '7') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 2.2. Jumlah Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi, Bidang Pekerjaan dan Status Tahun 20'+tahun_download,
                title:     'Jumlah Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi, Bidang Pekerjaan dan Status Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '8') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 2.3. Jumlah Pekerja Produksi Perusahaan Penangkapan Ikan Menurut Provinsi dan Pendidikan Tahun 20'+tahun_download,
                title:     'Jumlah Pekerja Produksi Perusahaan Penangkapan Ikan Menurut Provinsi dan Pendidikan Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '9') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 2.4. Jumlah Pekerja Non Produksi Perusahaan Penangkapan Ikan Menurut Provinsi dan Pendidikan Tahun 20'+tahun_download,
                title:     'Jumlah Pekerja Non Produksi Perusahaan Penangkapan Ikan Menurut Provinsi dan Pendidikan Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '10') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 2.5. Rata-Rata Jumlah Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi, Bidang Pekerjaan dan Jenis Kelamin Tahun 20'+tahun_download,
                title:     'Rata-Rata Jumlah Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi, Bidang Pekerjaan dan Jenis Kelamin Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '11') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 2.6. Rata-Rata Jumlah Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi, Bidang Pekerjaan dan Status Tahun 20'+tahun_download,
                title:     'Rata-Rata Jumlah Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi, Bidang Pekerjaan dan Status Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '12') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 2.7. Rata-Rata Jumlah Pekerja Produksi Perusahaan Penangkapan Ikan Menurut Provinsi dan Pendidikan Tahun 20'+tahun_download,
                title:     'Rata-Rata Jumlah Pekerja Produksi Perusahaan Penangkapan Ikan Menurut Provinsi dan Pendidikan Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '13') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 2.8. Rata-Rata Jumlah Pekerja Non Produksi Perusahaan Penangkapan Ikan Menurut Provinsi dan Pendidikan Tahun 20'+tahun_download,
                title:     'Rata-Rata Jumlah Pekerja Non Produksi Perusahaan Penangkapan Ikan Menurut Provinsi dan Pendidikan Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '14') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 3. Jumlah Perahu dan Kapal yang Dikuasai Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download,
                title:     'Jumlah Perahu dan Kapal yang Dikuasai Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '15') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 4.1. Produksi Perusahaan Penangkapan Ikan dan Penggunaan Menurut Provinsi Tahun 20'+tahun_download,
                title:     'Produksi Perusahaan Penangkapan Ikan dan Penggunaan Menurut Provinsi Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '16') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 4.2. Volume dan Nilai Produksi Tuna dan Cakalang Perusahaan Menurut Jenis Ikan dan Provinsi Tahun 20'+tahun_download,
                title:     'Volume dan Nilai Produksi Tuna dan Cakalang Perusahaan Menurut Jenis Ikan dan Provinsi Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '17') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 4.3. Volume dan Nilai Produksi Tongkol dan Cucut Perusahaan Menurut Jenis Ikan dan Provinsi Tahun 20'+tahun_download,
                title:     'Volume dan Nilai Produksi Tongkol dan Cucut Perusahaan Menurut Jenis Ikan dan Provinsi Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '18') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 4.4. Volume dan Nilai Produksi Udang dan Komoditi Lain Perusahaan Menurut Jenis Ikan dan Provinsi Tahun 20'+tahun_download,
                title:     'Volume dan Nilai Produksi Udang dan Komoditi Lain Perusahaan Menurut Jenis Ikan dan Provinsi Tahun 20'+tahun_download,
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '19') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 5. Pengeluaran Untuk Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi dan Jenis Pengeluaran Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Pengeluaran Untuk Pekerja Perusahaan Penangkapan Ikan Menurut Provinsi dan Jenis Pengeluaran Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '20') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 6.1. Pengeluaran Bahan Bakar, Listrik, Air, dan Gas Perusahaan Penangkapan Ikan Menurut Provinsi dan Jenis Kegiatan Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Pengeluaran Bahan Bakar, Listrik, Air, dan Gas Perusahaan Penangkapan Ikan Menurut Provinsi dan Jenis Kegiatan Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '21') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 6.2. Pengeluaran Bahan Bakar, Listrik, Air, dan Gas Perusahaan Penangkapan Ikan untuk Operasi Penangkapan Menurut Provinsi dan Jenis Kegiatan Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Pengeluaran Bahan Bakar, Listrik, Air, dan Gas Perusahaan Penangkapan Ikan untuk Operasi Penangkapan Menurut Provinsi dan Jenis Kegiatan Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '22') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 6.3. Pengeluaran Bahan Bakar, Listrik, Air, dan Gas Perusahaan Penangkapan Ikan Diluar Operasi Penangkapan Menurut Provinsi dan Jenis Kegiatan Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Pengeluaran Bahan Bakar, Listrik, Air, dan Gas Perusahaan Penangkapan Ikan Diluar Operasi Penangkapan Menurut Provinsi dan Jenis Kegiatan Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '23') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 7. Pengeluaran Bahan-Bahan Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Pengeluaran Bahan-Bahan Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '24') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 8. Pengeluaran Jasa dan Sewa Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Pengeluaran Jasa dan Sewa Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '25') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 9. Pengeluaran Lainnya Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Pengeluaran Lainnya Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '26') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 10. Total Pengeluaran Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Total Pengeluaran Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }

    if ($('#anomali_search').val() == '27') {
      var button = new $.fn.dataTable.Buttons( tabel_anomali, {
        buttons: [
            {
                extend:    'excelHtml5',
                className: 'btn btn-primary btn-icon-split',
                text:      '<span class="icon text-white"><i class="fa fa-file-excel"></i></span><span class="text">Excel</span>',
                filename:  'Tabel 11. Total Penerimaan Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                title:     'Total Penerimaan Perusahaan Penangkapan Ikan Menurut Provinsi Tahun 20'+tahun_download+' (Juta Rupiah)',
                titleAttr: 'Excel'
            }
          ]
      }).container().prependTo($('#download_xls'));
    }
  }

</script>
