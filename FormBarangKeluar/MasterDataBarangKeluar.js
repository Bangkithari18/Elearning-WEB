$(function () {
  $(".select2bs4").select2({
    theme: "bootstrap4",
  });
  loadDataTable();

  $(".btn_simpan_barang").on("click", function () {
    var IdKeluar = $("#idKeluar").val();
    var TglKeluar = $("#TglKeluar").val();
    var Idbarang = $(".select2bs4").val();
    var JumlahKeluar = $("#JumlahKeluar").val();

    if (TglKeluar == "") {
      alert("Tanggal Keluar Wajib di isi !!!");
      return false;
    }
    if (Idbarang == "") {
      alert("ID Barang Wajib di isi !!!");
      return false;
    }
    if (JumlahKeluar == "") {
      alert("Jumlah Keluar Wajib di isi !!!");
      return false;
    }

    var str_data =
      "id_keluar=" +
      IdKeluar +
      "&tanggal_keluar=" +
      TglKeluar +
      "&barang_id=" +
      Idbarang +
      "&jumlah_keluar=" +
      JumlahKeluar;
    $.ajax({
      type: "POST",
      url: "FormBarangKeluar/AddDataBarangKeluar.php",
      dataType: "text",
      data: str_data,
      success: function (res) {
        debugger;
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
    url: "FormBarangKeluar/GetDataBarang.php",
    type: "get",
    success: function (res) {
      $("#tbDataBarangKeluar").dataTable().fnClearTable();
      $("#tbDataBarangKeluar").dataTable().fnDraw();
      $("#tbDataBarangKeluar").dataTable().fnDestroy();
      $("#tbDataBarangKeluar tbody").html(res);
      $("#tbDataBarangKeluar").dataTable({
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
            title: "Data Barang Keluar",
            exportOptions: {
              colum: [0, 1, 2, 3, 4],
              modifier: {
                page: "current",
              },
            },
          },
          {
            extend: "pdf",
            text: "Report PDF",
            title: "Data Barang Keluar",
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
    url: "FormBarangKeluar/FilterData.php",
    type: "get",
    data: str_data,
    success: function (res) {
      $("#tbDataBarangKeluar tbody").html(res);
    },
    error: function (xhr, status, error) {
      console.error("Failed to load data: ", error);
    },
  });
}

function DeleteBarangKeluar(param) {
  $.ajax({
    url: "FormBarangKeluar/DeleteBarangKeluar.php",
    type: "POST",
    data: {
      id_keluar: param,
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
  $("#TglKeluar").val("");
  $("#IdBarang").val("");
  $("#NamaBarang").val("");
  $("#StokBarang  ").val("");
  $("#JumlahKeluar").val("");
}

function AddBarangKeluar() {
  $.ajax({
    url: "FormBarangKeluar/ModalAdd.php",
    type: "get",
    success: function (res) {
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
    url: "FormBarangKeluar/SelectedBarang.php",
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

function EditBarangkeluar(param) {
  $.ajax({
    url: "FormBarangKeluar/ModalEdit.php",
    type: "get",
    data: "id_keluar=" + param,
    success: function (res) {
      $("#box-modal").html(res);
      $("#modal-edit").modal("show");
    },
  });
}

function UpdateBarang() {
  var IdKeluar = $("#idKeluar").val();
  var TglKeluar = $("#TglKeluar").val();
  var Idbarang = $(".select2bs4").val();
  var JumlahKeluar = $("#JumlahKeluar").val();

  if (TglKeluar == "") {
    alert("Tanggal Keluar Wajib di isi !!!");
    return false;
  }
  if (Idbarang == "") {
    alert("ID Barang Wajib di isi !!!");
    return false;
  }
  if (JumlahKeluar == "") {
    alert("Jumlah Keluar Wajib di isi !!!");
    return false;
  }

  var str_data =
    "id_keluar=" +
    IdKeluar +
    "&tanggal_keluar=" +
    TglKeluar +
    "&barang_id=" +
    Idbarang +
    "&jumlah_keluar=" +
    JumlahKeluar;
  $.ajax({
    type: "POST",
    url: "FormBarangKeluar/EditDataBarangKeluar.php",
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
