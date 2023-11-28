<?php
include "../koneksi.php";
$id_satuan = $_GET['id_satuan'];
$result = mysqli_query($koneksi, "SELECT * FROM tb_satuan WHERE id_satuan='$id_satuan'");
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
          <label for="">ID Satuan</label>
          <input type="text" class="form-control" id="idsatuan" name="idsatuan" value="<?php echo $res['id_satuan'] ?>" readonly>
          <label for="">Satuan Barang</label>
          <input type="text" class="form-control" id="satuan_barang" name="satuan_barang" value="<?php echo $res['satuan'] ?>">
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

<script src="MasterSatuan/MasterDataSatuan.js"></script>