<main id="main" class="main">

    <div class="pagetitle">
      <h1>Monitoring</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Monitoring">Monitoring</a></li>
          <li class="breadcrumb-item active">Monitoring</li>
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

                <!-- Monitoring KOR-->
                <div class="tab-pane fade show active" id="kuesioner-kor">
                  <div class="col-xl-6 mx-auto">
                    <div class="card-body">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-primary text-white shadow" for="monitoring_search_kor">Monitoring</label>
                        </div>
                        <select class="form-select" id="monitoring_search_kor">
                          <option></option>
                          <option value="01" selected>01. Monitoring Per Subsektor</option>
                          <option value="02" >02. Monitoring Operator Entri</option>
                          <option value="03">03. Monitoring Per Kecamatan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div id="button_tambah" class="d-flex justify-content-end">
                    <div id="download_xls_kor" class="px-1"></div>
                  </div>
                  <h5 id="title_monitoring_kor" class="card-title"></h5>
                  <div>
                    <table class="table table-center table-striped table-bordered" id="tabel_monitoring_kor" width="100%" cellspacing="0">
                      <thead>
                        <tr id="kolom_monitoring_kor">
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- End Monitoring KOR -->

                </div>

                <!-- Monitoring Konsumsi -->
                <div class="tab-pane fade show active" id="kuesioner-konsumsi">
                  <div class="col-xl-6 mx-auto">
                    <div class="card-body">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-primary text-white shadow" for="monitoring_search_konsum">Monitoring</label>
                        </div>
                        <select class="form-select" id="monitoring_search_konsum">
                          <option></option>
                          <option value="01" selected>01. Monitoring Per Subsektor</option>
                          <option value="02" >02. Monitoring Operator Entri</option>
                          <option value="03">03. Monitoring Per Kecamatan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div id="button_tambah" class="d-flex justify-content-end">
                    <div id="download_xls_konsum" class="px-1"></div>
                  </div>
                  <h5 id="title_monitoring_konsum" class="card-title"></h5>
                  <div>
                    <table class="table table-center table-striped table-bordered" id="tabel_monitoring_konsum" width="100%" cellspacing="0">
                      <thead>
                        <tr id="kolom_monitoring_konsum">
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- End Monitoring Konsumsi -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>

          </div>

      </div>
    </section>

  </main><!-- End #main -->

<script>
  var tabel_monitoring_kor;
  var tabel_monitoring_konsum;
  var title_mon_kor;
  var title_mon_konsum;

  // ---Search Tahun---
  $('#tahun_search').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
  } );
  // ---end of search tahun---

  // ---Search Tahun---
  $('#monitoring_search').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
  } );
  // ---end of search tahun---

  // ---Sampel Utama---
  //  --Menampilkan Tabel--
  $(document).ready(function() {
    if ($('#monitoring_search_kor').val() == "01") {
      document.getElementById("title_monitoring_kor").innerHTML = "";
      document.getElementById("title_monitoring_kor").innerHTML = "Monitoring Per Subsektor";
      document.getElementById("kolom_monitoring_kor").innerHTML = "";
      document.getElementById("kolom_monitoring_kor").innerHTML = '<th class="text-center">Subsektor</th><th class="text-center">Target</th><th class="text-center">Realisasi</th><th class="text-center">Persentase</th>';
      title_mon = "Monitoring Per Subsektor";
    } else if ($('#monitoring_search_kor').val() == "02") {
      document.getElementById("title_monitoring_kor").innerHTML = "";
      document.getElementById("title_monitoring_kor").innerHTML = "Monitoring Operator Entri";
      document.getElementById("kolom_monitoring_kor").innerHTML = "";
      document.getElementById("kolom_monitoring_kor").innerHTML = '<th class="text-center">Nama Operator</th><th class="text-center">Realisasi</th>';
      title_mon ="Monitoring Operator Entri";
    } else if ($('#monitoring_search_kor').val() == "03") {
      document.getElementById("title_monitoring_kor").innerHTML = "";
      document.getElementById("title_monitoring_kor").innerHTML = "Monitoring Per Kecamatan";
      document.getElementById("kolom_monitoring_kor").innerHTML = "";
      document.getElementById("kolom_monitoring_kor").innerHTML = '<th class="text-center">Kecamatan</th><th class="text-center">Realisasi</th>';
      title_mon = "Monitoring Per Kecamatan"
    }

    tabel_monitoring_kor = $('#tabel_monitoring_kor').DataTable({
      dom: 'Blfrtip',
      buttons:[],
      ordering: false,
      select: true,
      processing : true,
      ajax : {
        url : '<?= base_url('Kuesioner/datatable_monitoring');?>',
        dataType: 'JSON',
        method: 'POST',
        data : function(d){
          d.filter_tahun = $('#tahun_search').val(),
          d.filter_monitoring = $('#monitoring_search_kor').val()
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
    var button = new $.fn.dataTable.Buttons( tabel_monitoring_kor, {
          buttons: [
              {
                  extend:    'excelHtml5',
                  className: 'btn btn-primary btn-icon-split',
                  text:      'Download',
                  filename:  'Tabel Pemutakhiran '+title_mon_kor+' Tahun '+$("#tahun_search").val(),
                  title:     'Tabel Pemutakhiran '+title_mon_kor+' Tahun '+$("#tahun_search").val(),
                  titleAttr: 'Download'
              }
            ]
    }).container().prependTo($('#download_xls_kor'));

    if ($('#monitoring_search_konsum').val() == "01") {
      document.getElementById("title_monitoring_konsum").innerHTML = "";
      document.getElementById("title_monitoring_konsum").innerHTML = "Monitoring Per Subsektor";
      document.getElementById("kolom_monitoring_konsum").innerHTML = "";
      document.getElementById("kolom_monitoring_konsum").innerHTML = '<th class="text-center">Subsektor</th><th class="text-center">Target</th><th class="text-center">Realisasi</th><th class="text-center">Persentase</th>';
      title_mon = "Monitoring Per Subsektor";
    } else if ($('#monitoring_search_konsum').val() == "02") {
      document.getElementById("title_monitoring_konsum").innerHTML = "";
      document.getElementById("title_monitoring_konsum").innerHTML = "Monitoring Operator Entri";
      document.getElementById("kolom_monitoring_konsum").innerHTML = "";
      document.getElementById("kolom_monitoring_konsum").innerHTML = '<th class="text-center">Nama Operator</th><th class="text-center">Realisasi</th>';
      title_mon ="Monitoring Operator Entri";
    } else if ($('#monitoring_search_konsum').val() == "03") {
      document.getElementById("title_monitoring_konsum").innerHTML = "";
      document.getElementById("title_monitoring_konsum").innerHTML = "Monitoring Per Kecamatan";
      document.getElementById("kolom_monitoring_konsum").innerHTML = "";
      document.getElementById("kolom_monitoring_konsum").innerHTML = '<th class="text-center">Kecamatan</th><th class="text-center">Realisasi</th>';
      title_mon = "Monitoring Per Kecamatan"
    }

    tabel_monitoring_konsum = $('#tabel_monitoring_konsum').DataTable({
      dom: 'Blfrtip',
      buttons:[],
      ordering: false,
      select: true,
      processing : true,
      ajax : {
        url : '<?= base_url('Kuesioner/datatable_monitoring');?>',
        dataType: 'JSON',
        method: 'POST',
        data : function(d){
          d.filter_tahun = $('#tahun_search').val(),
          d.filter_monitoring = $('#monitoring_search_konsum').val()
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
    var button = new $.fn.dataTable.Buttons( tabel_monitoring_konsum, {
          buttons: [
              {
                  extend:    'excelHtml5',
                  className: 'btn btn-primary btn-icon-split',
                  text:      'Download',
                  filename:  'Tabel Pemutakhiran '+title_mon_konsum+' Tahun '+$("#tahun_search").val(),
                  title:     'Tabel Pemutakhiran '+title_mon_konsum+' Tahun '+$("#tahun_search").val(),
                  titleAttr: 'Download'
              }
            ]
    }).container().prependTo($('#download_xls_konsum'));
  });

  $('#tahun_search').on('change',function(){
    tabel_monitoring.clear().destroy();
    if ($('#monitoring_search').val() == "01") {
      document.getElementById("title_monitoring").innerHTML = "";
      document.getElementById("title_monitoring").innerHTML = "Monitoring Per Subsektor";
      document.getElementById("kolom_monitoring").innerHTML = "";
      document.getElementById("kolom_monitoring").innerHTML = '<th class="text-center">Subsektor</th><th class="text-center">Target</th><th class="text-center">Realisasi</th><th class="text-center">Persentase</th>';
      title_mon = "Monitoring Per Subsektor";
    } else if ($('#monitoring_search').val() == "02") {
      document.getElementById("title_monitoring").innerHTML = "";
      document.getElementById("title_monitoring").innerHTML = "Monitoring Operator Entri";
      document.getElementById("kolom_monitoring").innerHTML = "";
      document.getElementById("kolom_monitoring").innerHTML = '<th class="text-center">Nama Operator</th><th class="text-center">Realisasi</th>';
      title_mon ="Monitoring Operator Entri";
    } else if ($('#monitoring_search').val() == "03") {
      document.getElementById("title_monitoring").innerHTML = "";
      document.getElementById("title_monitoring").innerHTML = "Monitoring Per Kecamatan";
      document.getElementById("kolom_monitoring").innerHTML = "";
      document.getElementById("kolom_monitoring").innerHTML = '<th class="text-center">Kecamatan</th><th class="text-center">Realisasi</th>';
      title_mon = "Monitoring Per Kecamatan"
    }
    tabel_monitoring = $('#tabel_monitoring').DataTable({
      dom: 'Blfrtip',
      buttons:[],
      ordering: false,
      select: true,
      processing : true,
      ajax : {
        url : '<?= base_url('Pemutakhiran/datatable_monitoring');?>',
        dataType: 'JSON',
        method: 'POST',
        data : function(d){
          d.filter_tahun = $('#tahun_search').val(),
          d.filter_monitoring = $('#monitoring_search').val()
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
    var button = new $.fn.dataTable.Buttons( tabel_monitoring, {
          buttons: [
              {
                  extend:    'excelHtml5',
                  className: 'btn btn-primary btn-icon-split',
                  text:      'Download',
                  filename:  'Tabel Pemutakhiran '+title_mon+' Tahun '+$("#tahun_search").val(),
                  title:     'Tabel Pemutakhiran '+title_mon+' Tahun '+$("#tahun_search").val(),
                  titleAttr: 'Download'
              }
            ]
        }).container().prependTo($('#download_xls'));
  });

  $('#monitoring_search').on('change',function(){
    tabel_monitoring.clear().destroy();
    if ($('#monitoring_search').val() == "01") {
      document.getElementById("title_monitoring").innerHTML = "";
      document.getElementById("title_monitoring").innerHTML = "Monitoring Per Subsektor";
      document.getElementById("kolom_monitoring").innerHTML = "";
      document.getElementById("kolom_monitoring").innerHTML = '<th class="text-center">Subsektor</th><th class="text-center">Target</th><th class="text-center">Realisasi</th><th class="text-center">Persentase</th>';
      title_mon = "Monitoring Per Subsektor";
    } else if ($('#monitoring_search').val() == "02") {
      document.getElementById("title_monitoring").innerHTML = "";
      document.getElementById("title_monitoring").innerHTML = "Monitoring Operator Entri";
      document.getElementById("kolom_monitoring").innerHTML = "";
      document.getElementById("kolom_monitoring").innerHTML = '<th class="text-center">Nama Operator</th><th class="text-center">Realisasi</th>';
      title_mon ="Monitoring Operator Entri";
    } else if ($('#monitoring_search').val() == "03") {
      document.getElementById("title_monitoring").innerHTML = "";
      document.getElementById("title_monitoring").innerHTML = "Monitoring Per Kecamatan";
      document.getElementById("kolom_monitoring").innerHTML = "";
      document.getElementById("kolom_monitoring").innerHTML = '<th class="text-center">Kecamatan</th><th class="text-center">Realisasi</th>';
      title_mon = "Monitoring Per Kecamatan"
    }
    tabel_monitoring = $('#tabel_monitoring').DataTable({
      dom: 'Blfrtip',
      buttons:[],
      ordering: false,
      select: true,
      processing : true,
      ajax : {
        url : '<?= base_url('Pemutakhiran/datatable_monitoring');?>',
        dataType: 'JSON',
        method: 'POST',
        data : function(d){
          d.filter_tahun = $('#tahun_search').val(),
          d.filter_monitoring = $('#monitoring_search').val()
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
    var button = new $.fn.dataTable.Buttons( tabel_monitoring, {
          buttons: [
              {
                  extend:    'excelHtml5',
                  className: 'btn btn-primary btn-icon-split',
                  text:      'Download',
                  filename:  'Tabel Pemutakhiran '+title_mon+' Tahun '+$("#tahun_search").val(),
                  title:     'Tabel Pemutakhiran '+title_mon+' Tahun '+$("#tahun_search").val(),
                  titleAttr: 'Download'
              }
            ]
        }).container().prependTo($('#download_xls'));
  });
</script>
