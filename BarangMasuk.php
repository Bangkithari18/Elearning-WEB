<?php include 'partial/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang Masuk</li>
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
                            <h3 class="card-title">Data Barang Masuk</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-left">
                            <label for="start">From</label>
                            <input type="date" name="start" style="width: 150px;border-radius: 5px;border: 1px solid #e1e1e1;padding: 3px 3px 3px 3px;height: 35px;" id="StartDate">
                            <label for="end">To</label>
                            <input type="date" name="end" style="width: 150px;border-radius: 5px;border: 1px solid #e1e1e1;padding: 3px 3px 3px 3px;height: 35px;" id="EndDate">
                            <button class="btn btn-info btn-sm" onclick="SubmitFilterData();">Filter Data</button>
                        </div>
                        <div class="col-6 text-right">
                            <div class="form-group">
                                <button type="button" class="btn btn-info btn-sm" onclick="AddBarangMasuk();">Add Data</button>
                            </div>
                        </div>
                    </div>
                    <table id="tbDataBarangMasuk" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>ID Masuk</th>
                                <th>Tanggal Masuk</th>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Action</th>
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
<!-- /.content -->
<div id="box-modal"></div>


<?php include 'partial/footer.php'; ?>
<script src="FormBarangMasuk/MasterDataBarangMasuk.js"></script>