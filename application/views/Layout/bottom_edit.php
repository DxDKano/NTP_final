            </div>
        </div>
    <!-- App Container -->
    </div>
<!-- Page Wrapper -->
</div>


</body>

</html>

<div class="modal fade" id="Modal_delete_surtug" tabindex="-1" role="dialog" aria-labelledby="hapusSurtugLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusSurtugLabel">Hapus Surat Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_hapus_surtug" method="post" action="Rekap_Surat_Tugas/delete_surtug/">
        <div class="modal-body">
          <input type="text" readonly class="form-control-plaintext" name="nomor_hapus" id="nomor_hapus">
          <center><div><b>Apakah anda yakin ingin menghapus Surat Tugas ini?</b></div></center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button id="hapus_surtug_button" type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>
