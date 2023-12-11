<?php
include "../koneksi.php";
$id_jenis = $_GET['id_jenis'];
$result = mysqli_query($koneksi, "SELECT * FROM tb_jenis_barang WHERE Id_Jenis='$id_jenis'");
while ($res = mysqli_fetch_array($result)) {
?>
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Edit Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="">ID Jenis</label>
          <input type="text" class="form-control" id="IdJenis" name="IdJenis" value="<?php echo $res['Id_Jenis'] ?>" readonly>
          <label for="">Jenis Barang</label>
          <input type="text" class="form-control" id="satuan_jenis" name="satuan_jenis" value="<?php echo $res['Jenis'] ?>">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn_update">Update</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<?php } ?>

<script src="MasterJenisBarang/MasterJenisBarang.js"></script>