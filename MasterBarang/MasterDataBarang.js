$(function () {
  $("#tbDataBarang").dataTable();
  loadDataTable();

  $(".btn_simpan_barang").on("click", function () {
    var idBarang = $("#idBarang").val();
    var namaBarang = $("#namaBarang").val();
    var jenisBarang = $("#jenisBarang").val();
    var satuanBarang = $("#satuanBarang").val();
    var stokBarang = $("#stokBarang").val();
    var hargaBarang = $("#hargaBarang").val();

    if (namaBarang == "") {
      alert("Nama Barang Wajib di isi !!!");
      return false;
    }
    if (jenisBarang == "") {
      alert("Jenis Barang Wajib di isi !!!");
      return false;
    }
    if (satuanBarang == "") {
      alert("Satuan Barang Wajib di isi !!!");
      return false;
    }
    if (stokBarang == "") {
      alert("Stok Barang Wajib di isi !!!");
      return false;
    }
    if (hargaBarang == "") {
      alert("Harga Barang Wajib di isi !!!");
      return false;
    }

    var str_data =
      "id_barang=" +
      idBarang +
      "&nama_barang=" +
      namaBarang +
      "&jenis_barang=" +
      jenisBarang +
      "&satuan_barang=" +
      satuanBarang +
      "&stok_awal=" +
      stokBarang +
      "&harga=" +
      hargaBarang;
    $.ajax({
      type: "POST",
      url: "MasterBarang/addDataBarang.php",
      dataType: "text",
      data: str_data,
      success: function (res) {
        if (res == "1") {
          $("#modal-add-barang").modal("hide");
          loadDataTable();
          toastr.success("data berhasil di simpan");
        } else {
          loadDataTable();
          toastr.warning("data gagal di simpan");
          console.log(res);
        }
      },
    });
  });

  $("#btn_update_barang").on("click", function () {
    var idBarang = $("#idBarang").val();
    var namaBarang = $("#namaBarang").val();
    var jenisBarang = $("#jenisBarang").val();
    var satuanBarang = $("#satuanBarang").val();
    var stokBarang = $("#stokBarang").val();
    var hargaBarang = $("#hargaBarang").val();

    if (namaBarang == "") {
      alert("Nama Baranag Wajib di isi !!!");
      return false;
    }
    if (jenisBarang == "") {
      alert("Jenis Barang Wajib di isi !!!");
      return false;
    }
    if (satuanBarang == "") {
      alert("Satuan Barang Wajib di isi !!!");
      return false;
    }
    if (stokBarang == "") {
      alert("Stok Barang Wajib di isi !!!");
      return false;
    }
    if (hargaBarang == "") {
      alert("Harga Barang Wajib di isi !!!");
      return false;
    }

    var str_data =
      "id_barang=" +
      idBarang +
      "&nama_barang=" +
      namaBarang +
      "&jenis_barang=" +
      jenisBarang +
      "&satuan_barang=" +
      satuanBarang +
      "&stok_awal=" +
      stokBarang +
      "&harga=" +
      hargaBarang;
    $.ajax({
      type: "POST",
      url: "MasterBarang/EditDataBarang.php",
      dataType: "text",
      data: str_data,
      success: function (res) {
        if (res == "1") {
          $("#modal-edit-barang").modal("hide");
          loadDataTable();
          toastr.success("data berhasil di ubah");
        } else {
          loadDataTable();
          toastr.warning("data gagal di ubah");
          console.log(res);
        }
      },
    });
  });
});

function loadDataTable() {
  $.ajax({
    url: "MasterBarang/getDataBarang.php",
    type: "get",
    success: function (res) {
      $("#tbDataBarang").dataTable().fnClearTable();
      $("#tbDataBarang").dataTable().fnDraw();
      $("#tbDataBarang").dataTable().fnDestroy();
      $("#tbDataBarang tbody").html(res);
      $("#tbDataBarang").dataTable();
    },
  });
}

function DeleteDataBarang(param) {
  $.ajax({
    url: "MasterBarang/DeleteBarang.php",
    type: "POST",
    data: {
      id_barang: param,
    },
    success: function (res) {
      if (res == "1") {
        toastr.success("data berhasil di hapus");
      } else {
        toastr.warning(res);
      }
      loadDataTable();
    },
  });
}

function resetModal() {
  $("#namaBarang").val("");
  $("#jenisBarang").val("");
  $("#satuanBarang").val("");
  $("#stokBarang").val("");
  $("#hargaBarang").val("");
}

function AddDataBarang() {
  $.ajax({
    url: "MasterBarang/ModalAdd.php",
    type: "get",
    success: function (res) {
      $(".box-modal").html(res);
      $("#modal-add-barang").modal("show");
      resetModal();
    },
    error: function (xhr, status, error) {
      alert("fail");
    },
  });
}

function EditDataBarang() {
  var Selected = $(".chk_barang:checked");
  if (Selected.length > 0) {
    if (Selected.length == 1) {
      let CheckId = new Array();
      $(Selected).each(function () {
        CheckId.push($(this).val());
        let param = "id_barang=" + CheckId;
        EditDetail(param);
      });
    } else {
      alert("Maksimum pilih barang 1");
    }
  } else {
    alert("Pilih Satu Barang");
  }
}

function EditDetail(id_barang) {
  $.ajax({
    url: "MasterBarang/ModalEdit.php",
    type: "get",
    data: id_barang,
    success: function (res) {
      $(".box-modal").html(res);
      $("#modal-edit-barang").modal("show");
    },
  });
}

function Delete() {
  var Selected = $(".chk_barang:checked");
  if (Selected.length > 0) {
    $(Selected).each(function () {
      DeleteDataBarang($(this).val());
    });
  } else {
    alert("Pilih Barang terlebih dahulu");
  }
}
