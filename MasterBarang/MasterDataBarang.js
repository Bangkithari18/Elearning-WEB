$(function () {
  $("#tbDataBarang").DataTable();
  loadDataTable();

  $("#btnAddDataBarang").on("click", function () {
    resetModal();
    $.ajax({
      url: "MasterBarang/modalAdd.php",
      type: "get",
      success: function (res) {
        console.log(res);
        $(".modal-add-barang").html(res);
        $("#modal-data-barang").modal("show");
      },
    });
  });

  function resetModal() {
    $("#namaBarang").val("");
    $("#jenisBarang").val("");
    $("#satuanBarang").val("");
    $("#stokBarang").val("");
    $("#hargaBarang").val("");
  }

  $("#btn_simpan_barang").on("click", function () {
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
    console.log(str_data);
    $.ajax({
      type: "POST",
      url: "MasterBarang/addDataBarang.php",
      dataType: "text",
      data: str_data,
      success: function (res) {
        if (res == "1") {
          $("#modal-data-barang").modal("hide");
          loadDataTable();
          toastr.success("data berhasil di simpan");
        } else {
          loadDataTable();
          toastr.success("data gagal di simpan");
        }
      },
    });
  });

  //   $("#btn_update").on("click", function () {
  //     var userID = $("#userid_e").val();
  //     var username = $("#username_e").val();
  //     var password = $("#password_e").val();
  //     var status = $("#status_e").val();

  //     if (userID == "") {
  //       alert("User Id Wajib di isi !!!");
  //       return false;
  //     }
  //     if (username == "") {
  //       alert("Username Wajib di isi !!!");
  //       return false;
  //     }
  //     if (password == "") {
  //       alert("Password Wajib di isi !!!");
  //       return false;
  //     }
  //     if (status == "") {
  //       alert("Status Wajib di isi !!!");
  //       return false;
  //     }

  //     var str_data =
  //       "user_id=" +
  //       userID +
  //       "&username=" +
  //       username +
  //       "&password=" +
  //       password +
  //       "&status=" +
  //       status;

  //     $.ajax({
  //       type: "POST",
  //       url: "formUser/editUser.php",
  //       dataType: "text",
  //       data: str_data,
  //       success: function (res) {
  //         if (res == "1") {
  //           $("#modal-edit").modal("hide");
  //           loadDataTable();
  //           toastr.success("data berhasil di Update");
  //         } else {
  //           loadDataTable();
  //           toastr.success("data gagal di Update");
  //         }
  //       },
  //     });
  //   });
});

function loadDataTable() {
  $.ajax({
    url: "MasterBarang/getDataBarang.php",
    type: "get",
    success: function (res) {
      $("#tbDataBarang").DataTable().fnClearTable;
      $("#tbDataBarang").DataTable().fnDraw;
      $("#tbDataBarang").DataTable().fnDestroy;
      $("#tbDataBarang tbody").html(res);
      $("#tbDataBarang").dataTable();
    },
  });
}

// function editUser(user_id) {
//   $.ajax({
//     url: "formUser/modal_edit.php",
//     type: "get",
//     data: {
//       user_id: user_id,
//     },
//     success: function (res) {
//       $("#box-modal-edit").html(res);
//       $("#modal-edit").modal("show");
//     },
//   });
// }

// function deleteUser(user_id) {
//   $.ajax({
//     url: "formUser/deleteUser.php",
//     type: "POST",
//     data: {
//       user_id: user_id,
//     },
//     success: function (res) {
//       if (res == "1") {
//         toastr.success("data berhasil di hapus");
//       } else {
//         toastr.warning(res);
//       }
//       loadDataTable();
//     },
//   });
// }
