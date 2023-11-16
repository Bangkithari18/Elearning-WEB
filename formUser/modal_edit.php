<?php
    include "../koneksi.php";
    $user_id = $_GET['user_id']; 
    $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE user_id='$user_id'");
    while ($res = mysqli_fetch_array($result)){
?>
<div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="">User ID</label>
              <input type="text" class="form-control" id="userid_e" name="userid_e" value="<?php  echo $res['user_id']?>" readonly>
              <label for="">Username</label>
              <input type="text" class="form-control" id="username_e" name="username_e" value="<?php  echo $res['username']?>">
              <label for="">Password</label>
              <input type="text" class="form-control" id="password_e" name="password_e" value="<?php  echo $res['password']?>">
              <label for="">Status</label>
              <select name="status_e" id="status_e" class="form-control">
                <option value="1" <?php if($res['status'] == "1") {echo 'selected';} ?>>Aktif</option>
                <option value="2" <?php if($res['status'] == "2") {echo 'selected';} ?>>Tidak Aktif</option>
              </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn_update">Update</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<?php }?>
<script src="formUser/user.js"></script>