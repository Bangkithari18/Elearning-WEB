<?php include 'partial/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Master Data Barang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Master Data Barang</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <button type="button" class="btn btn-info btn-sm" id="btnAddDataBarang">Add Data</button>
                    </div>
                    <table id="tbDataBarang" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Satuan Barang</th>
                                <th>Stok Awal</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<?php
include "./koneksi.php";
$query = "SELECT MAX(id_barang) AS code_brang from tb_barang";
$exec = mysqli_query($koneksi, $query);
$response = mysqli_fetch_array($exec);
$code = $response['code_brang'];
$rand =  (int) substr($code, 1, 4);
$rand++;
$char = "B";
$code_barang = $char . sprintf("%004s", $rand);
?>
<div id="box-modal-edit"></div>
<div class="modal fade" id="modal-data-barang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="namabarang">ID Barang</label>
                <input type="text" class="form-control" id="idBarang" value="<?php echo $code_barang; ?>" readonly>
                <label for="namabarang">Nama Barang</label>
                <input type="text" class="form-control" id="namaBarang">
                <label for="jenis">Jenis Barang</label>
                <select name="jenis" class="form-control" id="jenisBarang">
                    <option>ATK</option>
                    <option>Minuman</option>
                    <option>Makanan</option>
                </select>
                <label for="satuan">Satuan Barang</label>
                <select name="satuan" class="form-control" id="satuanBarang">
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
                <input type="number" min="0" class="form-control" id="stokBarang">
                <label for="stok">Harga Barang</label>
                <input type="number" min="0" class="form-control" id="hargaBarang">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn_simpan_barang">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<?php include 'partial/footer.php'; ?>
<script src="MasterBarang/MasterDataBarang.js"></script>