@extends('dashboard.master1')
@section('big_title', 'change password')
@section('main_page', 'change-password')
@section('sub_page', 'Create')
@section('page-title','change password')
@section('main-page-title','change-password')
@section('small-page-title','small page password')
@section('content')
      <div class="container-fluid">
        <div class="row">
    <div class="col-md-12">
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">change password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="create_form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">current password</label>
                    <input type="password" class="form-control" id="current_password" placeholder="enter current password">
                  </div>
                  <div class="form-group">
                    <label for="name">new password</label>
                    <input type="password" class="form-control" id="new_password" placeholder="enter new password">
                  </div>
                  <div class="form-group">
                    <label for="name">confirm new password</label>
                    <input type="password" class="form-control" id="new_password_confirmation" placeholder="enter confirm new password">
                  </div>

                  <button class="btn btn-primary" class="form-control" onclick="updatePass()">update</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('scripts')
<script>
function updatePass(){
                axios.put('/change_password',{
                    current_password:document.getElementById('current_password').value,
                    new_password:document.getElementById('new_password').value,
                    new_password_confirmation:document.getElementById('new_password_confirmation').value
                })
        .then(function (response) {
            toastr.success(response.data.message)
            //  window.location.href="/cms/admin/categories";
            document.getElementById('create_form').reset();
            console.log(response);
        })
        .catch(function (error) {
            toastr.error(error.response.data.message)
            console.log(error);
        })
        .then(function () {
            // always executed
        });
            }
</script>
@endsection