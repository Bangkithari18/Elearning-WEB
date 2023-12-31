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
                        <button type="button" class="btn btn-info btn-sm" onclick="AddDataBarang();">Add Data</button>
                        <button type="button" class="btn btn-warning btn-sm" onclick="EditDataBarang();">Edit Data</button>
                        <button type="button" class="btn btn-danger btn-sm" id="btnDeleteDataBarang" onclick="Delete();">Delete</button>
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
<div class="box-modal"></div>
<!-- /.modal -->
<?php include 'partial/footer.php'; ?>
<script src="MasterBarang/MasterDataBarang.js"></script>