<main id="main" class="main">

    <div class="pagetitle">
      <h1>Entri Data Pemutakhiran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Kuesioer/entri_data">Kuesioner</a></li>
          <li class="breadcrumb-item"><a href="Kuesioer/entri_data">Entri Data</a></li>
          <li class="breadcrumb-item active">Tanaman Pangan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

      <div class="row">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex">

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100 active" data-bs-toggle="tab" data-bs-target="#halaman-1">Halaman 1</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#halaman-2">Halaman 2</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#halaman-3">Halaman 3</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#halaman-4">Halaman 4</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#halaman-5">Halaman 5</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#halaman-6">Halaman 6</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#halaman-7">Halaman 7</button>
                </li>

              </ul>

              <div class="tab-content pt-2">

                <!-- Sampel Utama -->
                <div class="tab-pane fade show active" id="halaman-1">
                  <!-- <h5 class="card-title">Kuesioner KOR</h5> -->
                  <div class="text-center">
                      <!-- <img src="PERIKANAN_files/pancasila.png" style="width:100px;height:100px;"> -->
                      <img style="height: 18%; width: 18%" src="<?='assets/icon/garuda_pancasila.png';?>" alt="GARUDA PANCASILA"/>
                  </div>



                  <!-- <div id="loadingDiv" style="z-index: 10; position: absolute; margin-left: 45%; margin-top: 200px; display: none;">
                      <img src="PERIKANAN_files/loader.gif" style="widtht:150px;height:150px">
                  </div> -->

                  <div style="margin: -90px 0 0 70px;" class="float-left">
                    <img style="height: 10%; width: 10%;" src="<?='assets/icon/logo_bps.png';?>" alt="LOGO BPS"/>
                      <!-- <table border="1px">
                          <tbody><tr style="background-color: #F1F1F1;">
                              <td style="padding-left: 10px;padding-right: 10px;"><h4>RAHASIA</h4></td>
                          </tr>
                      </tbody></table> -->
                  </div>

                  <div style="margin: -70px 40px 0 0;" class="float-right">
                      <table border="1px">
                          <tbody><tr style="background-color: #F1F1F1;">
                              <td style="padding-left: 10px;padding-right: 10px;"><h4>SPDT22-TP</h4></td>
                          </tr>
                      </tbody></table>
                  </div>


                  <div class="text-center">
                    <h4>KABUPATEN BOLAANG MPNGONDOW UTARA</h4>
                    <h4>BADAN PERENCANAAN, PENELITIAN DAN PENGEMBANGAN</h4>
                    <h4>SURVEI PENYEMPURNAAN DIAGRAM TIMBANG NILAI TUKAR PETANI</h4>
                  </div>


                  <div class="text-center">
                    <h5><b>2022</b></h5>
                    <h5><b>Subsektor Tanaman Pangan</b></h5>
                    <h5><b>PERHATIAN</b></h5>
                  </div>
                  <!-- End Sampel Utama -->

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="kuesioner-konsumsi">

                  <!-- Sampel Pengganti -->
                  <h5 class="card-title">Kuesioner Konsumsi</h5>
                  <div>
                    <table class="table-center table-striped table-sm" id="tabel_kuesioner_konsumsi" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">No. Sampel</th>
                          <th class="text-center">Desa</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Alamat</th>
                          <th class="text-center">Subsektor</th>
                          <th class="text-center">Komoditas</th>
                          <th class="text-center">Status Entri</th>
                          <th style="width:160px;">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- End Sampel Pengganti -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>

          </div>

      </div>
    </section>

  </main><!-- End #main -->

<script>
  var tabel_kuesioner_kor;
  var tabel_kuesioner_konsumsi;

  // ---Search Tahun---
  $('#tahun_search').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
  } );
  // ---end of search tahun---

  // ---Sampel Utama---
  //  --Menampilkan Tabel--
  $(document).ready(function() {
    console.log($('#tahun_search').val());
    tabel_kuesioner_kor = $('#tabel_kuesioner_kor').DataTable({
      dom: 'Blfrtip',
      buttons:[],
      ordering: false,
      select: true,
      processing : true,
      ajax : {
        url : '<?= base_url('Kuesioner/datatable_kor');?>',
        dataType: 'JSON',
        method: 'POST',
        data : function(d){
          d.filter_tahun = $('#tahun_search').val()
        },
        // success: function(data){
        //             console.log(data);
        // },
        error : function(err) {
          console.log(err.responseText);
        }
      },
      dataSrc : function(result) {
        console.log(result);
      }
    });
  });

  // ---end of sampel utama---

</script>
