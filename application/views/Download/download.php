<main id="main" class="main">

    <div class="pagetitle">
      <h1>Anomali</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Download</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

      <div class="row">

          <div class="card">
            <div class="card-body pt-3">
              <div class="col-xl-12 mx-auto">
                <form class="form-horizontal" id="form_download" action="Download/raw_data" method="post">
                  <div class="row">
                    <div class="card-body w-50">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-primary text-white shadow" for="subsektor_download">Download</label>
                        </div>
                        <select class="form-select" id="subsektor_download" name="subsektor_download">
                          <option></option>
                          <option value = '1'>Tanaman Pangan</option>
                          <option value = '2'>Hortikultura</option>
                          <option value = '3'>Perkebunan</option>
                          <option value = '4'>Peternakan</option>
                          <option value = '5'>Perikanan, Kegiatan Penangkapan Ikan</option>
                          <option value = '6'>Perikanan, Kegiatan Pembudidayaan Ikan</option>
                          <option value = '7'>Kehutanan</option>
                        </select>
                      </div>
                    </div>
                    <div class="card-body w-25">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-primary text-white shadow" for="tahun_download">Tahun</label>
                        </div>
                        <select class="form-select" id="tahun_download" name="tahun_download">
                          <option></option>
                          <option value="2023">2023</option>
                          <option value="2022" selected>2022</option>
                        </select>
                      </div>
                    </div>
                    <div class="card-body w-25">
                      <button class='btn btn-primary btn-icon-split mx-auto' id="button_anomali"><span class='icon text-white-50'><i class='fa fa-search'></i></span><span class='text'>Download</span></button>
                    </div>
                  </div>
                </form>
              </div>

            </div>

          </div>

      </div>
    </section>

  </main><!-- End #main -->

<script>

    $(document).ready(function () {

        $('#form_download').submit(function (e) {
            e.preventDefault();
            var form = new FormData();
            form.append("subsektor_download", $("#subsektor_download").val());
            form.append("tahun_download", $("#tahun_download").val());
            var settings = {
                "url": "<?php echo base_url("Download/raw_data")?>",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "post",
                "contentType": false,
                "data": form
            };
            $.ajax(settings).done(function (response) {
                var link = document.createElement('a');
                link.href = response;
                link.download = `data_${(new Date()).getTime()}.xlsx`;
                document.body.appendChild(link);
                link.click();
            });
        });

    });

</script>
