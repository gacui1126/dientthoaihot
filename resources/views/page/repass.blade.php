
<input type="submit" class="btn btn-warning" data-toggle="modal" data-target="#myModal" value="Đổi mật khẩu"></input>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Đổi mật khẩu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <form action="{{route('password.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="password">Mật khẩu cũ</label>
                    <input type="password" name="password_old" class="form-control" id="password_old" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu mới</label>
                    <input type="password" name="password_new" class="form-control" id="password_new" required>
                </div>
                <div class="form-group">
                    <label for="password">Nhập lại mật khẩu</label>
                    <input type="password" name="password_re" class="form-control" id="password_re" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Đổi mật khẩu" style="margin-left:160px">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
