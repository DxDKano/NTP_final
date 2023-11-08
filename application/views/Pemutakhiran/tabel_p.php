        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tabel Monitoring</h1>
          </div> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col align-middle">
                  <h5 class="font-weight-bold text-primary pt-2">Tabel Monitoring Entri</h5>
                </div>
                <div id="button_tambah" class="d-flex justify-content-end">
                  <div id="download_xls" class="px-1"></div>
                  <div id="download_pdf" class="px-1"></div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="input-group col-3 mx-auto">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-primary text-white" for="tahun_search">Tahun</label>
                </div>
                <select class="custom-select" name="tahun_search" id="tahun_search">
                  <option value="<?php echo(((int) date('y') + 1)) ?>" ><?php echo(((int) date('Y') + 1)) ?></option>
                  <option value="<?php echo(date('y')) ?>"><?php echo(date('Y')) ?></option>
                  <option value="<?php echo(((int) date('y') - 1)) ?>" selected><?php echo(((int) date('Y') - 1)) ?></option>
                  <option value="<?php echo(((int) date('y') - 2)) ?>" ><?php echo(((int) date('Y') - 2)) ?></option>
                  <option value="<?php echo(((int) date('y') - 3)) ?>" ><?php echo(((int) date('Y') - 3)) ?></option>
                  <option value="<?php echo(((int) date('y') - 4)) ?>" ><?php echo(((int) date('Y') - 4)) ?></option>
                  <option value="<?php echo(((int) date('y') - 5)) ?>" ><?php echo(((int) date('Y') - 5)) ?></option>
                  <option value="<?php echo(((int) date('y') - 6)) ?>" ><?php echo(((int) date('Y') - 6)) ?></option>
                  <option value="<?php echo(((int) date('y') - 7)) ?>" ><?php echo(((int) date('Y') - 7)) ?></option>
                  <option value="<?php echo(((int) date('y') - 8)) ?>" ><?php echo(((int) date('Y') - 8)) ?></option>
                </select>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tabelentri" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th rowspan="2">Provinsi</th>
                      <th colspan="2">Target</th>
                      <th colspan="2">Realisasi</th>
                      <th colspan="2">Persentase</th>
                    </tr>
                    <tr>
                      <th>awal</th>
                      <th>berjalan</th>
                      <th>awal</th>
                      <th>berjalan</th>
                      <th>awal</th>
                      <th>berjalan</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

  <script>
    var tabel_entri;
    $(document).ready(function() {
          tabel_entri = $('#tabelentri').DataTable({
            dom: 'Blfrtip',
            ordering: false,
            buttons:[],
            processing : true,
          ajax : {
            url : '<?= base_url('Monitoring/datatable_tabel_entri');?>',
            dataType: 'JSON',
            method: 'POST',
            data : function(a){
              a.filter_tahun = $('#tahun_search').val()
            },
            error : function(err) {
              console.log(err.responseText);
            },
          },
          dataSrc : function(result) {
            console.log(result);
          }
        });
        var button = new $.fn.dataTable.Buttons( tabel_entri, {
          buttons: [
              {
                  extend:    'excelHtml5',
                  className: 'btn btn-primary btn-icon-split',
                  text:      '<i class="bi bi-download"></i><span>Download</span>',
                  filename:  'Tabel Entri Monitoring LTP Tahun 20'+$("#tahun_search").val(),
                  title:     'Tabel Entri Monitoring LTP Tahun 20'+$("#tahun_search").val(),
                  titleAttr: 'Excel'
              }
            ]
        }).container().prependTo($('#download_xls'));

        var button2 = new $.fn.dataTable.Buttons( tabel_entri, {
          buttons: [
              {
                  extend:    'pdfHtml5',
                  className: 'btn btn-primary btn-icon-split',
                  text:      '<span class="icon text-white"><i class="fa fa-file-pdf"></i></span><span class="text">PDF</span>',
                  filename:  'Tabel Entri Monitoring LTP Tahun 20'+$("#tahun_search").val(),
                  title:     'Tabel Entri Monitoring LTP Tahun 20'+$("#tahun_search").val(),
                  titleAttr: 'PDF'
              }
            ]
        }).container().prependTo($('#download_pdf'));
    });

    $('#tahun_search').on('change',function(){
      tabel_entri.ajax.reload();
    });
  </script>
