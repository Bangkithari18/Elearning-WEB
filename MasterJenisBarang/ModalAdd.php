<?php
include "../koneksi.php";
$query = "SELECT MAX(id_jenis) AS code_barang from tb_jenis_barang";
$exec = mysqli_query($koneksi, $query);
$response = mysqli_fetch_array($exec);
$code = $response['code_barang'];
$rand =  (int) substr($code, 1, 4);
$rand++;
$char = "J";
$code_barang = $char . sprintf("%004s", $rand);
?>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Input Data Jenis Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">ID jenis</label>
                <input type="text" class="form-control" id="idJenis" name="idJenis" value="<?php echo $code_barang; ?>" readonly>
                <label for="">Satuan Jenis</label>
                <input type="text" class="form-control" id="satuan_jenis" name="satuanjenis">
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
<script src="MasterJenisBarang/MasterJenisBarang.js"></script>

<!-- /.modal -->