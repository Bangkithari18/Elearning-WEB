<?php
include "../koneksi.php";
$id_masuk = $_GET['id_masuk'];
$query = "SELECT * from tb_barang_masuk where id_masuk='$id_masuk'";
$exec = mysqli_query($koneksi, $query);
$response = mysqli_fetch_array($exec);

$id_masuk = $response['id_masuk'];
$tanggal_masuk = $response['tanggal_masuk'];
$barang_id = $response['barang_id'];
$jumlah_masuk = $response['jumlah_masuk'];
?>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="idmasuk">ID Masuk</label>
                <input type="text" class="form-control" id="idMasuk" value="<?php echo $id_masuk; ?>" placeholder="Id Masuk" readonly>
                <label for="tanggalmasuk">Tanggal Masuk</label>
                <input type="date" class="form-control" id="TglMasuk" value="<?php echo $tanggal_masuk; ?>" placeholder="Tanggal Masuk">
                <label for="idbarang">ID Barang</label>
                <select name="idbarang" class="form-control select2bs4" id="IdBarang" title="IdBarang" onchange="SelectedBarang(this);">
                    <?php
                    include "./koneksi.php";
                    $query = "SELECT * FROM tb_barang";
                    $exec = mysqli_query($koneksi, $query);
                    while ($response = mysqli_fetch_array($exec)) {
                        if ($barang_id == $response['id_barang']) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        echo "<option $selected value='" . $response["id_barang"] . "'>" . $response["id_barang"] . '-' . $response["nama_barang"] . "</option>";
                    }
                    ?>
                </select>
                <label for="stok">Jumlah Masuk</label>
                <input type="number" min="0" class="form-control" id="JumlahMasuk" value="<?php echo $jumlah_masuk; ?>" placeholder="Jumlah Masuk">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="UpdateBarang();">Save changes</button>
                </div>
            </div>
        </div>
    </div>