$(function () {
  $("#tbDataBarangMasuk").dataTable();
  $(".select2bs4").select2({
    theme: "bootstrap4",
  });
  loadDataTable();

  $(".btn_simpan_barang").on("click", function () {
    var IdMasuk = $("#idMasuk").val();
    var TglMasuk = $("#TglMasuk").val();
    var Idbarang = $(".select2bs4").val();
    var JumlahMasuk = $("#JumlahMasuk").val();

    if (TglMasuk == "") {
      alert("Tanggal Masuk Wajib di isi !!!");
      return false;
    }
    if (Idbarang == "") {
      alert("ID Barang Wajib di isi !!!");
      return false;
    }
    if (JumlahMasuk == "") {
      alert("Jumlah Masuk Wajib di isi !!!");
      return false;
    }

    var str_data =
      "id_masuk=" +
      IdMasuk +
      "&tanggal_masuk=" +
      TglMasuk +
      "&barang_id=" +
      Idbarang +
      "&jumlah_masuk=" +
      JumlahMasuk;
    $.ajax({
      type: "POST",
      url: "FormBarangMasuk/AddDataBarangMasuk.php",
      dataType: "text",
      data: str_data,
      success: function (res) {
        if (res == "1") {
          $("#modal-add").modal("hide");
          loadDataTable();
          toastr.success("data berhasil di simpan");
        } else {
          loadDataTable();
          toastr.warning("data gagal di simpan");
        }
      },
      error: function (xhr, status, error) {
        console.error("Failed to load data: ", error);
      },
    });
  });
});

function loadDataTable() {
  $.ajax({
    url: "FormBarangMasuk/GetDataBarang.php",
    type: "get",
    success: function (res) {
      $("#tbDataBarangMasuk").dataTable().fnClearTable();
      $("#tbDataBarangMasuk").dataTable().fnDraw();
      $("#tbDataBarangMasuk").dataTable().fnDestroy();
      $("#tbDataBarangMasuk tbody").html(res);
      $("#tbDataBarangMasuk").dataTable({
        lengthMenu: [
          [10, 25, 50, -1],
          [10, 25, 50, "All"],
        ],
        searching: true,
        dom: "Bfrtip",
        buttons: [
          {
            extend: "excelHtml5",
            text: "Report Excel",
            title: "Data Barang Masuk",
            exportOptions: {
              colum: [0, 1, 2, 3, 4, 5],
              modifier: {
                page: "current",
              },
            },
          },
          {
            extend: "pdf",
            text: "Report PDF",
            title: "Data Barang Masuk",
            exportOptions: {
              colum: [0, 1, 2, 3, 4, 5],
            },
            customize: function (params) {
              params.content[1].table.width = [
                "10%",
                "20%",
                "20%",
                "20%",
                "20%",
                "10%",
              ];
            },
          },
        ],
      });
    },
    error: function (xhr, status, error) {
      console.error("Failed to load data: ", error);
    },
  });
}

function SubmitFilterData() {
  let Start = $("#StartDate").val();
  let End = $("#EndDate").val();

  let str_data = "start=" + Start + "&end=" + End;
  $.ajax({
    url: "FormBarangMasuk/FilterData.php",
    type: "get",
    data: str_data,
    success: function (res) {
      $("#tbDataBarangMasuk tbody").html(res);
    },
    error: function (xhr, status, error) {
      console.error("Failed to load data: ", error);
    },
  });
}

function DeleteBarangMasuk(param) {
  $.ajax({
    url: "FormBarangMasuk/DeleteBarangMasuk.php",
    type: "POST",
    data: {
      id_masuk: param,
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
  $("#TglMasuk").val("");
  $("#IdBarang").val("");
  $("#NamaBarang").val("");
  $("#StokBarang  ").val("");
  $("#JumlahMasuk").val("");
}

function AddBarangMasuk() {
  $.ajax({
    url: "FormBarangMasuk/ModalAdd.php",
    type: "get",
    success: function (res) {
      debugger;
      $("#box-modal").html(res);
      $("#modal-add").modal("show");
      resetModal();
    },
    error: function (xhr, status, error) {
      console.error("Failed to load data: ", error);
    },
  });
}

function SelectedBarang(param) {
  let str_data = "Id=" + $(param).val();
  $.ajax({
    url: "FormBarangMasuk/SelectedBarang.php",
    type: "get",
    data: str_data,
    dataType: "json",
    success: function (res) {
      $("#NamaBarang").val(res[0].nama_barang);
      $("#StokBarang").val(res[0].StokSaatini);
    },
    error: function (xhr, status, error) {
      console.error("Failed to load data: ", error);
    },
  });
}

function EditBarangMasuk(param) {
  $.ajax({
    url: "FormBarangMasuk/ModalEdit.php",
    type: "get",
    data: "id_masuk=" + param,
    success: function (res) {
      $("#box-modal").html(res);
      $("#modal-edit").modal("show");
    },
  });
}

function UpdateBarang() {
  var IdMasuk = $("#idMasuk").val();
  var TglMasuk = $("#TglMasuk").val();
  var Idbarang = $(".select2bs4").val();
  var JumlahMasuk = $("#JumlahMasuk").val();

  if (TglMasuk == "") {
    alert("Tanggal Masuk Wajib di isi !!!");
    return false;
  }
  if (Idbarang == "") {
    alert("ID Barang Wajib di isi !!!");
    return false;
  }
  if (JumlahMasuk == "") {
    alert("Jumlah Masuk Wajib di isi !!!");
    return false;
  }

  var str_data =
    "id_masuk=" +
    IdMasuk +
    "&tanggal_masuk=" +
    TglMasuk +
    "&barang_id=" +
    Idbarang +
    "&jumlah_masuk=" +
    JumlahMasuk;
  $.ajax({
    type: "POST",
    url: "FormBarangMasuk/EditDataBarangMasuk.php",
    dataType: "text",
    data: str_data,
    success: function (res) {
      if (res == "1") {
        $("#modal-edit").modal("hide");
        loadDataTable();
        toastr.success("data berhasil di ubah");
      } else {
        loadDataTable();
        toastr.warning("data gagal di ubah");
      }
    },
  });
}
