$(function () {
  $("#tbDataSatuan")
    .DataTable({
      destroy: true, // Destroy the existing DataTable instance
      paging: true, // Enable pagination
      ordering: true, // Enable sorting
      searching: true, // Enable searching
    })
    .clear()
    .draw(); // Clear });
  loadDataTable();

  $("#btn_simpan").on("click", function () {
    var satuanId = $("#idsatuan").val();
    var satuan_barang = $("#satuan_barang").val();

    if (satuanId == "") {
      alert("Id Satuan Wajib di isi !!!");
      return false;
    }
    if (satuan_barang == "") {
      alert("Satuan Barang Wajib di isi !!!");
      return false;
    }
    var str_data = "id_satuan=" + satuanId + "&satuan=" + satuan_barang;
    $.ajax({
      type: "POST",
      url: "MasterSatuan/AddDataSatuan.php",
      dataType: "text",
      data: str_data,
      success: function (res) {
        if (res == "1") {
          $("#modal-add").modal("hide");
          loadDataTable();
          toastr.success("data berhasil di simpan");
        } else {
          loadDataTable();
          toastr.success("data gagal di simpan");
        }
      },
    });
  });

  $("#btn_update").on("click", function () {
    var satuanId = $("#idsatuan").val();
    var satuan_barang = $("#satuan_barang").val();

    if (satuanId == "") {
      alert("Id Satuan Wajib di isi !!!");
      return false;
    }
    if (satuan_barang == "") {
      alert("Satuan Barang Wajib di isi !!!");
      return false;
    }

    var str_data = "id_satuan=" + satuanId + "&satuan=" + satuan_barang;

    $.ajax({
      type: "POST",
      url: "MasterSatuan/EditDataSatuan.php",
      dataType: "text",
      data: str_data,
      success: function (res) {
        if (res == "1") {
          $("#modal-edit").modal("hide");
          loadDataTable();
          toastr.success("data berhasil di Update");
        } else {
          loadDataTable();
          toastr.success("data gagal di Update");
        }
      },
    });
  });
});

function loadDataTable() {
  $.ajax({
    url: "MasterSatuan/GetDataSatuan.php",
    type: "get",
    success: function (res) {
      $("#tbDataSatuan")
        .DataTable({
          destroy: true, // Destroy the existing DataTable instance
          paging: true, // Enable pagination
          ordering: true, // Enable sorting
          searching: true, // Enable searching
        })
        .clear()
        .draw(); // Clear existing data and redraw the table

      $("#tbDataSatuan tbody").html(res);
    },
  });
}

function AddDataSatuan() {
  $.ajax({
    url: "MasterSatuan/ModalAddSatuan.php",
    type: "get",
    success: function (res) {
      $("#box-modal").html(res);
      $("#modal-add").modal("show");
      resetModal();
    },
    error: function (xhr, status, error) {
      alert("failed");
    },
  });
}

function resetModal() {
  $("#satuan_barang").val("");
}

function EditDataSatuan(id_satuan) {
  $.ajax({
    url: "MasterSatuan/ModalEditSatuan.php",
    type: "get",
    data: {
      id_satuan: id_satuan,
    },
    success: function (res) {
      $("#box-modal").html(res);
      $("#modal-edit").modal("show");
    },
  });
}

function DeleteDataSatuan(id_satuan) {
  $.ajax({
    url: "MasterSatuan/DeleteDataSatuan.php",
    type: "POST",
    data: {
      id_satuan: id_satuan,
    },
    success: function (res) {
      if (res == "1") {
        toastr.success("data berhasil di hapus");
      } else {
        toastr.warning("Gagal melakukan Delete");
      }
      loadDataTable();
    },
  });
}
