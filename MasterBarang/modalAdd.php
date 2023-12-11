<?php
include "../koneksi.php";
$query = "SELECT MAX(id_barang) AS code_brang from tb_barang";
$exec = mysqli_query($koneksi, $query);
$response = mysqli_fetch_array($exec);
$code = $response['code_brang'];
$rand =  (int) substr($code, 1, 4);
$rand++;
$char = "B";
$code_barang = $char . sprintf("%004s", $rand);
?>
<div class="modal fade" id="modal-add-barang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="namabarang">ID Barang</label>
                <input type="text" class="form-control" id="idBarang" value="<?php echo $code_barang; ?>" placeholder="Id barang" readonly>
                <label for="namabarang">Nama Barang</label>
                <input type="text" class="form-control" id="namaBarang" placeholder="Nama Brang">
                <label for="jenis">Jenis Barang</label>
                <select name="jenis" class="form-control" id="jenisBarang" title="jenisbarang">
                    <?php
                    include "./koneksi.php";
                    $query = "SELECT * FROM tb_jenis_barang";
                    $exec = mysqli_query($koneksi, $query);
                    while ($response = mysqli_fetch_array($exec)) {
                        echo "<option value='" . $response["Id_Jenis"] . "'>" . $response["Jenis"] . "</option>";
                    }
                    ?>
                </select>
                <label for="satuan">Satuan Barang</label>
                <select name="satuan" class="form-control" id="satuanBarang" title="satuanBarang">
                    <?php
                    include "./koneksi.php";
                    $query = "SELECT * FROM tb_satuan";
                    $exec = mysqli_query($koneksi, $query);
                    while ($response = mysqli_fetch_array($exec)) {
                        echo "<option value='" . $response["id_satuan"] . "'>" . $response["satuan"] . "</option>";
                    }
                    ?>
                </select>
                <label for="stok">Stok Awal</label>
                <input type="number" min="0" class="form-control" id="stokBarang" placeholder="Stok Barang">
                <label for="stok">Harga Barang</label>
                <input type="number" min="0" class="form-control" id="hargaBarang" placeholder="Harga Barang">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm btn_simpan_barang" id="btn_simpan_barang">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="MasterBarang/MasterDataBarang.js"></script>
<!-- /.modal -->