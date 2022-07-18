@extends('dashboard.master1')
@section('title', 'title')
@section('styles')
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('page-title', 'Roles-permission')
@section('main-page-title', 'Roles-permission')
@section('small-page-title', 'Roles-permission')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $user->name }}-permission</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>guard</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td><span class=" badge  bg-success">{{ $permission->guard_name }}</span></td>
                                            <td>
                                                <div class="icheck-primary d-inline">
                                                    {{-- @foreach ($roles as $role) --}}
                                                    <input
                                                        onchange="assignPermission({{ $user->id }},{{ $permission->id }})"
                                                        type="checkbox" id="checkboxPrimary_{{ $permission->id }}"
                                                        @if ($permission->assigned) checked @endif>
                                                    {{-- @endforeach --}}
                                                    <label for="checkboxPrimary_{{ $permission->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
@endsection
@section('scripts')
    <script>
        // function assignPermission(roleId,permissionId){
        //    axios.post('/cms/admin/roles/'+roleId+'/permissions',{
        //        permission_id:permissionId
        //    })
        //     .then(function (response) {
        //         // handle success
        //        showMessage(response.data);
        //     //    ref.closest('tr').remove();
        //     //    console.log(response.data);
        //     })
        //     .catch(function (error) {
        //         // handle error
        //           showMessage(response.data.error)
        //         console.log(error);
        //     })
        //     .then(function () {
        //         // always executed
        //     });
        // }
        // user/{user}/prmission
        function assignPermission(roleId, permissionId) {
            axios.post('/user/' + roleId + '/prmission', {
                    // cms/admin/user/{user}/prmission
                    permission_id: permissionId
                }).then(function(response) {
                    toastr.success(response.data.message)
                    //  window.location.href="/cms/admin/role/"
                    console.log(response);
                })
                .catch(function(error) {
                    toastr.error(error.response.data.message)
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
@endsection