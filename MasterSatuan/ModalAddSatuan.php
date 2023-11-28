<?php
include "../koneksi.php";
$query = "SELECT MAX(id_satuan) AS code_barang from tb_satuan";
$exec = mysqli_query($koneksi, $query);
$response = mysqli_fetch_array($exec);
$code = $response['code_barang'];
$rand =  (int) substr($code, 1, 4);
$rand++;
$char = "C";
$code_barang = $char . sprintf("%004s", $rand);
?>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Input Data Satuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">ID Satuan</label>
                <input type="text" class="form-control" id="idsatuan" name="idsatuan" value="<?php echo $code_barang; ?>" readonly>
                <label for="">Satuan Barang</label>
                <input type="text" class="form-control" id="satuan_barang" name="satuanbarang">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_simpan">Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="MasterSatuan/MasterDataSatuan.js"></script>
<!-- /.modal -->