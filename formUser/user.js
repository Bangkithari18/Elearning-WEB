$(function () {
  $("#tbDataUser").DataTable();
  loadDataTable();

  $("#btn_add").on("click", function () {
    $("#modal-add").modal("show");
    resetModal();
  });

  function resetModal() {
    $("#userid").val("");
    $("#username").val("");
    $("#password").val("");
    $("#status").val("");
  }

  $("#btn_simpan").on("click", function () {
    var userID = $("#userid").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var status = $("#status").val();

    if (userID == "") {
      alert("User Id Wajib di isi !!!");
      return false;
    }
    if (username == "") {
      alert("Username Wajib di isi !!!");
      return false;
    }
    if (password == "") {
      alert("Password Wajib di isi !!!");
      return false;
    }
    if (status == "") {
      alert("Status Wajib di isi !!!");
      return false;
    }

    var str_data =
      "user_id=" +
      userID +
      "&username=" +
      username +
      "&password=" +
      password +
      "&status=" +
      status;

    $.ajax({
      type: "POST",
      url: "formUser/addUser.php",
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
    var userID = $("#userid_e").val();
    var username = $("#username_e").val();
    var password = $("#password_e").val();
    var status = $("#status_e").val();

    if (userID == "") {
      alert("User Id Wajib di isi !!!");
      return false;
    }
    if (username == "") {
      alert("Username Wajib di isi !!!");
      return false;
    }
    if (password == "") {
      alert("Password Wajib di isi !!!");
      return false;
    }
    if (status == "") {
      alert("Status Wajib di isi !!!");
      return false;
    }

    var str_data =
      "user_id=" +
      userID +
      "&username=" +
      username +
      "&password=" +
      password +
      "&status=" +
      status;

    $.ajax({
      type: "POST",
      url: "formUser/editUser.php",
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
    url: "formUser/getData.php",
    type: "get",
    success: function (res) {
      $("#tbDataUser").DataTable().fnClearTable;
      $("#tbDataUser").DataTable().fnDraw;
      $("#tbDataUser").DataTable().fnDestroy;
      $("#tbDataUser tbody").html(res);
      $("#tbDataUser").dataTable();
    },
  });
}

function editUser(user_id) {
  $.ajax({
    url: "formUser/modal_edit.php",
    type: "get",
    data: {
      user_id: user_id,
    },
    success: function (res) {
      $("#box-modal-edit").html(res);
      $("#modal-edit").modal("show");
    },
  });
}

function deleteUser(user_id) {
  $.ajax({
    url: "formUser/deleteUser.php",
    type: "POST",
    data: {
      user_id: user_id,
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
