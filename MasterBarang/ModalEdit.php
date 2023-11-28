<?php
include "../koneksi.php";
$id_barang = $_GET['id_barang'];
$query = "SELECT * from tb_barang where id_barang='$id_barang'";
$exec = mysqli_query($koneksi, $query);
$response = mysqli_fetch_array($exec);

$id_barang = $response['id_barang'];
$nama_barang = $response['nama_barang'];
$jenis_barang = $response['jenis_barang'];
$satuan_barang = $response['satuan_barang'];
$stok_awal = $response['stok_awal'];
$harga = $response['harga'];
?>
<div class="modal fade" id="modal-edit-barang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="namabarang">ID Barang</label>
                <input type="text" class="form-control" id="idBarang" value="<?php echo $id_barang; ?>" readonly>
                <label for="namabarang">Nama Barang</label>
                <input type="text" class="form-control" id="namaBarang" value="<?php echo $nama_barang; ?>">
                <label for="jenis">Jenis Barang</label>
                <select name="jenis" class="form-control" id="jenisBarang">
                    <option <?php if ($jenis_barang == "ATK") {
                                echo 'selected';
                            } ?>>ATK</option>
                    <option <?php if ($jenis_barang == "Minuman") {
                                echo 'selected';
                            } ?>>Minuman</option>
                    <option <?php if ($jenis_barang == "Makanan") {
                                echo 'selected';
                            } ?>>Makanan</option>
                </select>
                <label for="satuan">Satuan Barang</label>
                <select name="satuan" class="form-control" id="satuanBarang">
                    <?php
                    include "./koneksi.php";
                    $query = "SELECT * FROM tb_satuan";
                    $exec = mysqli_query($koneksi, $query);
                    while ($response = mysqli_fetch_array($exec)) {
                        if ($satuan_barang == $response['id_satuan']) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        echo "<option $selected value='" . $response["id_satuan"] . "'>" . $response["satuan"] . "</option>";
                    }
                    ?>
                </select>
                <label for="stok">Stok Awal</label>
                <input type="number" min="0" class="form-control" id="stokBarang" value="<?php echo $stok_awal; ?>">
                <label for="stok">Harga Barang</label>
                <input type="number" min="0" class="form-control" id="hargaBarang" value="<?php echo $harga; ?>">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn_update_barang">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="MasterBarang/MasterDataBarang.js"></script>