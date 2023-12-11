<?php
include "../koneksi.php";
$query = "SELECT MAX(id_keluar) AS id_keluar from tb_barang_keluar";
$exec = mysqli_query($koneksi, $query);
$response = mysqli_fetch_array($exec);
$code = $response['id_keluar'];
$rand =  (int) substr($code, 12, 4);
$rand++;
$char = "TK";
$tgl = date("Ymd");
$code_barang = $char . '-' . $tgl . '-' . sprintf("%04s", $rand);
?>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data Barang keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="idkeluar">ID Keluar</label>
                <input type="text" class="form-control" id="idKeluar" value="<?php echo $code_barang; ?>" placeholder="Id Keluar" readonly>
                <label for="tanggalkeluar">Tanggal keluar</label>
                <input type="date" class="form-control" id="TglKeluar" placeholder="Tanggal Keluar">
                <label for="idbarang">ID Barang</label>
                <select name="idbarang" class="form-control select2bs4" id="IdBarang" title="IdBarang" onchange="SelectedBarang(this);">
                    <?php
                    include "./koneksi.php";
                    $query = "SELECT * FROM tb_barang";
                    $exec = mysqli_query($koneksi, $query);
                    while ($response = mysqli_fetch_array($exec)) {
                        echo "<option value='" . $response["id_barang"] . "'>"  . $response["id_barang"] . '-' . $response["nama_barang"] . "</option>";
                    }
                    ?>
                </select>
                <label for="namabarang">Nama Barang</label>
                <input type="text" class="form-control" id="NamaBarang" placeholder="Nama Barang" readonly>
                <label for="stok">Stok Barang</label>
                <input type="number" min="0" class="form-control" id="StokBarang" placeholder="Stok Barang" readonly>
                <label for="stok">Jumlah keluar</label>
                <input type="number" min="0" class="form-control" id="JumlahKeluar" placeholder="Jumlah keluar">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm btn_simpan_barang" id="btn_simpan_barang">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="FormBarangkeluar/MasterDataBarangkeluar.js"></script>
<!-- /.modal -->