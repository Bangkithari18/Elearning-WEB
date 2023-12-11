$(function () {
  $("#tbJenisBarang").dataTable();
  loadDataTable();

  $("#btn_simpan").on("click", function () {
    var JenisId = $("#idJenis").val();
    var SatuanJenis = $("#satuan_jenis").val();

    if (JenisId == "") {
      alert("Id Jenis Wajib di isi !!!");
      return false;
    }
    if (SatuanJenis == "") {
      alert("Satuan Jenis Wajib di isi !!!");
      return false;
    }
    var str_data = "id_jenis=" + JenisId + "&satuan_jenis=" + SatuanJenis;
    $.ajax({
      type: "POST",
      url: "MasterJenisBarang/AddJenisBarang.php",
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
    var JenisId = $("#IdJenis").val();
    var SatuanJenis = $("#satuan_jenis").val();

    if (JenisId == "") {
      alert("Id Jenis Wajib di isi !!!");
      return false;
    }
    if (SatuanJenis == "") {
      alert("Satuan Jenis Wajib di isi !!!");
      return false;
    }
    var str_data = "id_jenis=" + JenisId + "&satuan_jenis=" + SatuanJenis;

    $.ajax({
      type: "POST",
      url: "MasterJenisBarang/EditJenisBarang.php",
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
    url: "MasterJenisBarang/GetData.php",
    type: "get",
    success: function (res) {
      $("#tbJenisBarang").dataTable().fnClearTable();
      $("#tbJenisBarang").dataTable().fnDraw();
      $("#tbJenisBarang").dataTable().fnDestroy();
      $("#tbJenisBarang tbody").html(res);
      $("#tbJenisBarang").dataTable();
    },
  });
}

function AddJenisBarang() {
  $.ajax({
    url: "MasterJenisBarang/ModalAdd.php",
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

function EditJenisBrang(id_jenis) {
  $.ajax({
    url: "MasterJenisBarang/ModalEdit.php",
    type: "get",
    data: {
      id_jenis: id_jenis,
    },
    success: function (res) {
      $("#box-modal").html(res);
      $("#modal-edit").modal("show");
    },
  });
}

function DeleteJenisBrang(id_jenis) {
  $.ajax({
    url: "MasterJenisBarang/DeleteJenisBarang.php",
    type: "POST",
    data: {
      id_jenis: id_jenis,
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
