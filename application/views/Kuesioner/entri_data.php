<main id="main" class="main">

    <div class="pagetitle">
      <h1>Entri Data Pemutakhiran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Kuesioner/entri_data">Kuesioner</a></li>
          <li class="breadcrumb-item active">Entri Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

      <div class="col-xl-4 mx-auto">
        <div class="card-body">
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
      </div>

      <div class="row">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex">

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100 active" data-bs-toggle="tab" data-bs-target="#kuesioner-kor">Kuesioner KOR</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#kuesioner-konsumsi">Kuesioner Konsumsi</button>
                </li>

              </ul>

              <div class="tab-content pt-2">

                <!-- Sampel Utama -->
                <div class="tab-pane fade show active" id="kuesioner-kor">
                  <h5 class="card-title">Kuesioner KOR</h5>
                  <div>
                    <table class="table table-center table-striped table-bordered" id="tabel_kuesioner_kor" width="100%" cellspacing="0">
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
                  <!-- End Sampel Utama -->

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="kuesioner-konsumsi">

                  <!-- Sampel Pengganti -->
                  <h5 class="card-title">Kuesioner Konsumsi</h5>
                  <div>
                    <table class="table table-center table-striped table-bordered" id="tabel_kuesioner_konsumsi" width="100%" cellspacing="0">
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
	  tabel_kuesioner_konsumsi = $('#tabel_kuesioner_konsumsi').DataTable({
		  dom: 'Blfrtip',
		  buttons:[],
		  ordering: false,
		  select: true,
		  processing : true,
		  ajax : {
			  url : '<?= base_url('Kuesioner/datatable_konsumsi');?>',
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
