<?php
include "../koneksi.php";
$id_keluar = $_GET['id_keluar'];
$query = "SELECT * from tb_barang_keluar where id_keluar='$id_keluar'";
$exec = mysqli_query($koneksi, $query);
$response = mysqli_fetch_array($exec);

$id_keluar = $response['id_keluar'];
$tanggal_keluar = $response['tanggal_keluar'];
$barang_id = $response['barang_id'];
$jumlah_keluar = $response['jumlah_keluar'];
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
                <label for="idkeluar">ID Keluar</label>
                <input type="text" class="form-control" id="idKeluar" value="<?php echo $id_keluar; ?>" placeholder="Id Keluar" readonly>
                <label for="tanggalKeluar">Tanggal keluar</label>
                <input type="date" class="form-control" id="TglKeluar" value="<?php echo $tanggal_keluar; ?>" placeholder="Tanggal eKluar">
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
                <label for="stok">Jumlah Keluar</label>
                <input type="number" min="0" class="form-control" id="JumlahKeluar" value="<?php echo $jumlah_keluar; ?>" placeholder="Jumlah Keluar">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="UpdateBarang();">Save changes</button>
                </div>
            </div>
        </div>
    </div>