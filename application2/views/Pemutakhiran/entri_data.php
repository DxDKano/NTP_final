<main id="main" class="main">

    <div class="pagetitle">
      <h1>Entri Data Pemutakhiran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pemutakhiran/entri_data">Pemutakhiran</a></li>
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
                  <button class="nav-link w-100 active" data-bs-toggle="tab" data-bs-target="#sampel-utama">Sampel Utama</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#sampel-pengganti">Sampel pengganti</button>
                </li>

                <li class="nav-item flex-fill">
                  <button class="nav-link w-100" data-bs-toggle="tab" data-bs-target="#sampel-tambahan">Sampel Tambahan</button>
                </li>

              </ul>

              <div class="tab-content pt-2">

                <!-- Sampel Utama -->
                <div class="tab-pane fade show active" id="sampel-utama">
                  <h5 class="card-title">Sampel Utama</h5>
                  <div>
                    <table class="table table-center table-striped table-bordered" id="tabel_sampel_utama" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">No. Sampel</th>
                          <th class="text-center">Desa</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Alamat</th>
                          <th class="text-center">Status Entri</th>
                          <th class="text-center">Status Sampel</th>
                          <th style="width:160px;">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- End Sampel Utama -->

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="sampel-pengganti">

                  <!-- Sampel Pengganti -->
                  <h5 class="card-title">Sampel Pengganti</h5>
                  <div>
                    <table class="table table-center table-striped table-bordered" id="tabel_sampel_pengganti" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">No. Sampel</th>
                          <th class="text-center">Desa</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Alamat</th>
                          <th class="text-center">Status Entri</th>
                          <th class="text-center">Status Sampel</th>
                          <th style="width:160px;">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- End Sampel Pengganti -->

                </div>

                <div class="tab-pane fade pt-3" id="sampel-tambahan">

                  <!-- Sampel Tambahan -->
                  <div class="row d-flex justify">
                    <h5 class="card-title">Sampel Tambahan</h5>
                        <!-- <button type="button" data-toggle="modal" data-target="#Modal_tambah_direktori" class='btn btn-primary btn-circle'><i class='bi bi-plus'></i></button> -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#Modal_tambah_sampel" class='btn btn-primary btn-circle btn-sm'><i class='bi bi-plus'></i></button>
                  </div>
                  <div>
                    <table class="table table-center table-striped table-bordered" id="tabel_sampel_tambahan" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">No. Sampel</th>
                          <th class="text-center">Desa</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Alamat</th>
                          <th class="text-center">Status Entri</th>
                          <th class="text-center">Status Sampel</th>
                          <th style="width:160px;">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <!-- End Sampel Tambahan -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>

            <div class="modal fade" id="Modal_tambah_sampel" tabindex="-1">
              <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Sampel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- <?php echo $this->session->flashdata('error')?> -->
                    <form id="form_tambah_sampel" method="post">
                      <table class="table table-borderless">
                        <tbody>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Provinsi </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="provinsi_tambah_sampel" id="provinsi_tambah_sampel">
                                <option></option>
                                <option value = '71' selected>Sulawesi Utara</option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Kabupaten </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="kabupaten_tambah_sampel" id="kabupaten_tambah_sampel">
                                <option></option>
                                <option value = '07' selected>Bolaang Mongondow Utara</option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Kecamatan </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="kecamatan_tambah_sampel" id="kecamatan_tambah_sampel">
                                <option></option>
                                <?php
                                  foreach ($kecamatan as $row => $value) {
                                      echo "<option value='".$value['id_kec']."'>".$value['nama_kec']."</option>";
                                  }
                                ?>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Desa </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="desa_tambah_sampel" id="desa_tambah_sampel">
                                <option></option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Nomor Urut Rumah Tangga </b>
                            </td>
                            <!-- <td class="pb-0">
                              <b>:</b>
                            </td> -->
                            <td class="pb-0">
                              <input type="text" class="form-control" name="nurt_tambah_sampel" id="nurt_tambah_sampel">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Nama Kepala Rumah Tangga </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="nama_tambah_sampel" id="nama_tambah_sampel">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Alamat </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="alamat_tambah_sampel" id="alamat_tambah_sampel">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Subsektor Sampel </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="subsektor_tambah_sampel" id="subsektor_tambah_sampel">
                                <option></option>
                                <option value = '1'>Tanaman Pangan</option>
                                <!-- <option value = '2'>Hortikultura</option> -->
                                <option value = '3'>Perkebunan</option>
                                <option value = '4'>Peternakan</option>
                                <option value = '5'>Perikanan, Kegiatan Penangkapan Ikan</option>
                                <!-- <option value = '6'>Perikanan, Kegiatan Pembudidayaan Ikan</option> -->
                                <!-- <option value = '7'>Kehutanan</option> -->
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Komoditas Sampel </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="komoditas_tambah_sampel" id="komoditas_tambah_sampel">
                                <option></option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Kode Hasil Pencacahan </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="pencacahan_tambah_sampel" id="pencacahan_tambah_sampel">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah rumah tangga tani? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_10_tambah" id="kol_10_tambah">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah jumlah ART 2-10? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_11_tambah" id="kol_11_tambah">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah subsektor utama masih sama dengan isian kolom (7)? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_12_tambah" id="kol_12_tambah">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah sumber penghasilan >50% berasal dari sektor pertanian? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_13_tambah" id="kol_13_tambah">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah output merupakan produk standar? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_14_tambah" id="kol_14_tambah">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah kolom (10),(11),(12),(13),(14) berkode "Ya"? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_15_tambah" id="kol_15_tambah">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                    <button id="simpan_tambah_sampel" type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="Modal_terima_sampel" tabindex="-1">
              <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Pemutakhiran Sampel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- <?php echo $this->session->flashdata('error')?> -->
                    <!-- <form id="form_terima_sampel" method="post" action="Pemutakhiran/terima_sampel"> -->
                    <form id="form_terima_sampel" method="post">
                      <table class="table table-borderless">
                        <tbody>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Provinsi </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="provinsi_terima_sampel" id="provinsi_terima_sampel" disabled>
                                <option></option>
                                <option value = '71' selected>Sulawesi Utara</option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Kabupaten </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="kabupaten_terima_sampel" id="kabupaten_terima_sampel" disabled>
                                <option></option>
                                <option value = '07' selected>Bolaang Mongondow Utara</option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Kecamatan </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="kecamatan_terima_sampel" id="kecamatan_terima_sampel" disabled>
                                <option></option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Desa </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="desa_terima_sampel" id="desa_terima_sampel" disabled>
                                <option></option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Nomor Urut Rumah Tangga </b>
                            </td>
                            <!-- <td class="pb-0">
                              <b>:</b>
                            </td> -->
                            <td class="pb-0">
                              <input type="text" class="form-control" name="nurt_terima_sampel" id="nurt_terima_sampel" disabled>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Nama Kepala Rumah Tangga </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="nama_terima_sampel" id="nama_terima_sampel" disabled>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Alamat </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="alamat_terima_sampel" id="alamat_terima_sampel" disabled>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Subsektor Sampel </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="subsektor_terima_sampel" id="subsektor_terima_sampel" disabled>
                                <option></option>
                                <option value = '1'>Tanaman Pangan</option>
                                <!-- <option value = '2'>Hortikultura</option> -->
                                <option value = '3'>Perkebunan</option>
                                <option value = '4'>Peternakan</option>
                                <option value = '5'>Perikanan, Kegiatan Penangkapan Ikan</option>
                                <!-- <option value = '6'>Perikanan, Kegiatan Pembudidayaan Ikan</option> -->
                                <!-- <option value = '7'>Kehutanan</option> -->
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Komoditas Sampel </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="komoditas_terima_sampel" id="komoditas_terima_sampel" disabled>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Kode Hasil Pencacahan </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="pencacahan_terima_sampel" id="pencacahan_terima_sampel">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah rumah tangga tani? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_10_terima" id="kol_10_terima">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah jumlah ART 2-10? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_11_terima" id="kol_11_terima">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah subsektor utama masih sama dengan isian kolom (7)? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_12_terima" id="kol_12_terima">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah sumber penghasilan >50% berasal dari sektor pertanian? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_13_terima" id="kol_13_terima">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah output merupakan produk standar? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_14_terima" id="kol_14_terima">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Apakah kolom (10),(11),(12),(13),(14) berkode "Ya"? </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="kol_15_terima" id="kol_15_terima">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                    <button id="simpan_terima_sampel" type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="Modal_edit_sampel" tabindex="-1">
              <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Pemutakhiran Sampel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- <?php echo $this->session->flashdata('error')?> -->
                    <form id="form_edit_sampel" method="post">
                      <table class="table table-borderless">
                        <tbody>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Provinsi </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="provinsi_edit_sampel" id="provinsi_edit_sampel" disabled>
                                <option></option>
                                <option value = '71' selected>Sulawesi Utara</option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Kabupaten </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="kabupaten_edit_sampel" id="kabupaten_edit_sampel" disabled>
                                <option></option>
                                <option value = '07' selected>Bolaang Mongondow Utara</option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Kecamatan </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="kecamatan_edit_sampel" id="kecamatan_edit_sampel">
                                <option></option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Desa </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="desa_edit_sampel" id="desa_edit_sampel">
                                <option></option>
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Nomor Urut Rumah Tangga </b>
                            </td>
                            <!-- <td class="pb-0">
                              <b>:</b>
                            </td> -->
                            <td class="pb-0">
                              <input type="text" class="form-control" name="nurt_edit_sampel" id="nurt_edit_sampel" disabled>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Nama Kepala Rumah Tangga </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="nama_edit_sampel" id="nama_edit_sampel">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Alamat </b>
                            </td>
                            <td class="pb-0">
                              <input type="text" class="form-control" name="alamat_edit_sampel" id="alamat_edit_sampel">
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Subsektor Sampel</b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="subsektor_ubah_sampel" id="subsektor_ubah_sampel">
                                <option></option>
                                <option value = '1'>Tanaman Pangan</option>
                                <!-- <option value = '2'>Hortikultura</option> -->
                                <option value = '3'>Perkebunan</option>
                                <option value = '4'>Peternakan</option>
                                <option value = '5'>Perikanan, Kegiatan Penangkapan Ikan</option>
                                <!-- <option value = '6'>Perikanan, Kegiatan Pembudidayaan Ikan</option> -->
                                <!-- <option value = '7'>Kehutanan</option> -->
                              </select>
                            </td>
                          </tr>
                          <tr class="pb-0">
                            <td class="pb-0">
                              <b>Komoditas Sampel </b>
                            </td>
                            <td class="pb-0">
                              <select class="form-select" name="komoditas_edit_sampel" id="komoditas_edit_sampel">
                                <option></option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                    <button id="simpan_edit_sampel" type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          </div>

      </div>
    </section>

  </main><!-- End #main -->

<script>
  var tabel_sampel_utama;
  var tabel_sampel_pengganti;
  var tabel_sampel_tambahan;

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
    tabel_sampel_utama = $('#tabel_sampel_utama').DataTable({
      dom: 'Blfrtip',
      buttons:[],
      ordering: false,
      select: true,
      processing : true,
      ajax : {
        url : '<?= base_url('Pemutakhiran/datatable_sampel');?>',
        dataType: 'JSON',
        method: 'POST',
        data : function(d){
          d.filter_tahun = $('#tahun_search').val(),
          d.filter_sampel = '1'
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

  function show_modal_edit(ruta, id_prov, id_kab) {
    console.log(ruta);
    console.log(id_prov);
    console.log(id_kab);
  };

  // ---end of sampel utama---

  // ---Sampel Pengganti---
  //  --Menampilkan Tabel--
  $(document).ready(function() {
    tabel_sampel_pengganti = $('#tabel_sampel_pengganti').DataTable({
      dom: 'Blfrtip',
      buttons:[],
      ordering: false,
      select: true,
      processing : true,
      ajax : {
        url : '<?= base_url('Pemutakhiran/datatable_sampel');?>',
        dataType: 'JSON',
        method: 'POST',
        data : function(d){
          d.filter_tahun = $('#tahun_search').val(),
          d.filter_sampel = '2'
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

  // ---Modal Sampel Utama dan Pengganti---
  function show_modal_sampel(ruta) {
    var tahun = $('#tahun_search').val();
    // console.log(ruta);
    // console.log(id_prov);
    // console.log(id_kab);
    // console.log(tahun);
    var id_prov = "71";
    var id_kab = "07";
    $.ajax({
      url:'<?php echo(base_url('Pemutakhiran/ambil_data_sampel/'));?>'+ruta+'/'+id_prov+'/'+id_kab+'/'+tahun,
      dataType: 'json',
      error : function(err) {
        console.log(err.responseText);
      },
      success: function(data) {
        // console.log(data);
          $.ajax({
            url : '<?= base_url('Pemutakhiran/data_sampel_kecamatan/');?>'+id_prov+'/'+id_kab,
            dataType: 'html',
            error : function(err) {
              console.log(err.responseText);
            },
            success: function(html) {
              $('#kecamatan_terima_sampel').empty().html(html);
              document.getElementById("kecamatan_terima_sampel").value = data.id_kec;
            }
          })
        var kode_kec_ubah = data.id_kec;
        // var kode_desa_ubah = data.id_desa;
        // console.log(kode_desa_ubah);
          $.ajax({
            url : '<?= base_url('Pemutakhiran/data_sampel_desa/');?>'+id_prov+'/'+id_kab+'/'+kode_kec_ubah,
            dataType: 'html',
            error : function(err) {
              console.log(err.responseText);
            },
            success: function(html) {
              $('#desa_terima_sampel').empty().html(html);
              document.getElementById("desa_terima_sampel").value = data.id_desa;
            }
          })
        document.getElementById("nurt_terima_sampel").value = data.no_ruta;
        document.getElementById("nama_terima_sampel").value = data.nama_ruta;
        document.getElementById("alamat_terima_sampel").value = data.alamat_ruta;
        document.getElementById("subsektor_terima_sampel").value = data.subsektor;
        document.getElementById("komoditas_terima_sampel").value = '['+data.kode_komoditas+'] '+data.komoditas;
      }
    })
    $('#Modal_terima_sampel').modal('show');
  };

  $('#Modal_terima_sampel').on('hide.bs.modal', function(e) {
    $('#pencacahan_terima_sampel').val('');
    $('#kol_10_terima').val('');
    $('#kol_11_terima').val('');
    $('#kol_12_terima').val('');
    $('#kol_13_terima').val('');
    $('#kol_14_terima').val('');
    $('#kol_15_terima').val('');
  });

  $('#simpan_terima_sampel').click(function(){
    $('#provinsi_terima_sampel').prop('disabled', false);
    $('#kabupaten_terima_sampel').prop('disabled', false);
    $('#kecamatan_terima_sampel').prop('disabled', false);
    $('#desa_terima_sampel').prop('disabled', false);
    $('#nurt_terima_sampel').prop('disabled', false);
    $('#alamat_terima_sampel').prop('disabled', false);
    $('#subsektor_terima_sampel').prop('disabled', false);
    $('#komoditas_terima_sampel').prop('disabled', false);
    var tahun = $('#tahun_search').val();
    $('#form_terima_sampel').attr('action', 'Pemutakhiran/terima_sampel/'+tahun);
  });
  // ---end of Modal Sampel Utama dan Pengganti---

  // --- Edit Modal Sampel Utama dan Pengganti---
  function show_emodal_sampel(ruta) {
    var tahun = $('#tahun_search').val();
    var id_prov = "71";
    var id_kab = "07";
    // console.log(ruta);
    // console.log(id_prov);
    // console.log(id_kab);
    // console.log(tahun);

    $.ajax({
      url:'<?php echo(base_url('Pemutakhiran/ambil_data_sampel/'));?>'+ruta+'/'+id_prov+'/'+id_kab+'/'+tahun,
      dataType: 'json',
      error : function(err) {
        console.log(err.responseText);
      },
      success: function(data) {
        // console.log(data);
          $.ajax({
            url : '<?= base_url('Pemutakhiran/data_sampel_kecamatan/');?>'+id_prov+'/'+id_kab,
            dataType: 'html',
            error : function(err) {
              console.log(err.responseText);
            },
            success: function(html) {
              $('#kecamatan_edit_sampel').empty().html(html);
              document.getElementById("kecamatan_edit_sampel").value = data.id_kec;
            }
          })
        var kode_kec_ubah = data.id_kec;
        // var kode_desa_ubah = data.id_desa;
        // console.log(kode_desa_ubah);
          $.ajax({
            url : '<?= base_url('Pemutakhiran/data_sampel_desa/');?>'+id_prov+'/'+id_kab+'/'+kode_kec_ubah,
            dataType: 'html',
            error : function(err) {
              console.log(err.responseText);
            },
            success: function(html) {
              $('#desa_edit_sampel').empty().html(html);
              document.getElementById("desa_edit_sampel").value = data.id_desa;
            }
          })

          var subsektor_ubah = data.subsektor;
          $.ajax({
            url : '<?= base_url('Pemutakhiran/ambil_data_komoditas/');?>'+subsektor_ubah,
            dataType: 'html',
            error : function(err) {
              console.log(err.responseText);
            },
            success: function(html) {
              $('#komoditas_edit_sampel').empty().html(html);
              document.getElementById("komoditas_edit_sampel").value = data.kode_komoditas;
            }
          })
        document.getElementById("nurt_edit_sampel").value = data.no_ruta;
        document.getElementById("nama_edit_sampel").value = data.nama_ruta;
        document.getElementById("alamat_edit_sampel").value = data.alamat_ruta;
        document.getElementById("subsektor_ubah_sampel").value = data.subsektor;
      }
    })
    $('#Modal_edit_sampel').modal('show');
  };

  // $('#Modal_edit_sampel').on('hide.bs.modal', function(e) {
  //   $('#pencacahan_edit_sampel').val('');
  //   $('#kol_10_edit').val('');
  //   $('#kol_11_edit').val('');
  //   $('#kol_12_edit').val('');
  //   $('#kol_13_edit').val('');
  //   $('#kol_14_edit').val('');
  //   $('#kol_15_edit').val('');
  // });

  $('#simpan_edit_sampel').click(function(){
    $('#provinsi_edit_sampel').prop('disabled', false);
    $('#kabupaten_edit_sampel').prop('disabled', false);
    $('#nurt_edit_sampel').prop('disabled', false);
    var tahun = $('#tahun_search').val();
    $('#form_edit_sampel').attr('action', 'Pemutakhiran/edit_sampel/'+tahun);
  });
  // ---end of Edit Modal Sampel Utama dan Pengganti---

  // ---Modal edit sampel---

  $(document).ready(function() {
    tabel_sampel_tambahan = $('#tabel_sampel_tambahan').DataTable({
      dom: 'Blfrtip',
      buttons:[],
      ordering: false,
      select: true,
      processing : true,
      ajax : {
        url : '<?= base_url('Pemutakhiran/datatable_sampel');?>',
        dataType: 'JSON',
        method: 'POST',
        data : function(d){
          d.filter_tahun = $('#tahun_search').val(),
          d.filter_sampel = '3'
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

  $('#simpan_tambah_sampel').click(function(){
    $('#nurt_tambah_sampel').prop('disabled', false);
    var tahun = $('#tahun_search').val();
    $('#form_tambah_sampel').attr('action', 'Pemutakhiran/penambahan_sampel/'+tahun);
  });

  $('#provinsi_terima_sampel,#kabupaten_terima_sampel,#kecamatan_terima_sampel').on('change', function() {
    var id_prov = $('#provinsi_terima_sampel').val();
    var id_kab = $('#kabupaten_terima_sampel').val();
    var id_kec = $('#kecamatan_terima_sampel').val();
    $.ajax({
      url : '<?= base_url('Pemutakhiran/data_sampel_desa/');?>'+id_prov+'/'+id_kab+'/'+id_kec,
      dataType: 'html',
      error : function(err) {
        console.log(err.responseText);
      },
      success: function(html) {
        $('#desa_terima_sampel').empty().html(html);
      }
    })
  });

  $('#provinsi_edit_sampel,#kabupaten_edit_sampel,#kecamatan_edit_sampel').on('change', function() {
    var id_prov = $('#provinsi_edit_sampel').val();
    var id_kab = $('#kabupaten_edit_sampel').val();
    var id_kec = $('#kecamatan_edit_sampel').val();
    $.ajax({
      url : '<?= base_url('Pemutakhiran/data_sampel_desa/');?>'+id_prov+'/'+id_kab+'/'+id_kec,
      dataType: 'html',
      error : function(err) {
        console.log(err.responseText);
      },
      success: function(html) {
        $('#desa_edit_sampel').empty().html(html);
      }
    })
  });

  $('#provinsi_tambah_sampel,#kabupaten_tambah_sampel,#kecamatan_tambah_sampel').on('change', function() {
    var id_prov = $('#provinsi_tambah_sampel').val();
    var id_kab = $('#kabupaten_tambah_sampel').val();
    var id_kec = $('#kecamatan_tambah_sampel').val();
    $.ajax({
      url : '<?= base_url('Pemutakhiran/data_sampel_desa/');?>'+id_prov+'/'+id_kab+'/'+id_kec,
      dataType: 'html',
      error : function(err) {
        console.log(err.responseText);
      },
      success: function(html) {
        $('#desa_tambah_sampel').empty().html(html);
      }
    })
  });

  $('#subsektor_ubah_sampel').on('change', function() {
    var subsektor = $('#subsektor_ubah_sampel').val();
    $.ajax({
      url : '<?= base_url('Pemutakhiran/ambil_data_komoditas/');?>'+subsektor,
      dataType: 'html',
      error : function(err) {
        console.log(err.responseText);
      },
      success: function(html) {
        $('#komoditas_edit_sampel').empty().html(html);
      }
    })
  });

  $('#subsektor_tambah_sampel').on('change', function() {
    var subsektor = $('#subsektor_tambah_sampel').val();
    $.ajax({
      url : '<?= base_url('Pemutakhiran/ambil_data_komoditas/');?>'+subsektor,
      dataType: 'html',
      error : function(err) {
        console.log(err.responseText);
      },
      success: function(html) {
        $('#komoditas_tambah_sampel').empty().html(html);
      }
    })
  });

  $('#provinsi_tambah_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_tambah_sampel'),
  } );

  $('#kabupaten_tambah_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_tambah_sampel'),
  } );

  $('#kecamatan_tambah_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_tambah_sampel'),
  } );

  $('#desa_tambah_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_tambah_sampel'),
  } );

  $('#subsektor_tambah_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_tambah_sampel'),
  } );

  $('#komoditas_tambah_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_tambah_sampel'),
  } );

  $('#provinsi_edit_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_edit_sampel'),
  } );

  $('#kabupaten_edit_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_edit_sampel'),
  } );

  $('#kecamatan_edit_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_edit_sampel'),
  } );

  $('#desa_edit_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_edit_sampel'),
  } );

  $('#subsektor_ubah_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_edit_sampel'),
  } );

  $('#komoditas_edit_sampel').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    dropdownParent: $('#Modal_edit_sampel'),
  } );

</script>
