@extends('dashboard.master1')
@section('title', 'Admins')
@section('big_title', 'Admins Page')
@section('main_page', 'Admins')
@section('sub_page', 'Create')


@section('content')
    {{-- لا نحتاج السيشن ولا الايرور عند استخدام طرسقة الجافاسكربت --}}
    @include('errors.errors')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create-form" method="POST" action="{{ route('admins.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Admin Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="email">Admin Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter Email">
                    </div>

                    {{-- <div class="form-group">
            <label>Role Name</label>
            <select class="form-control roles " id="role_name" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}"  >{{$role->name}}</option>
                @endforeach
            </select>
          </div> --}}
                    <div class="form-group">
                        <label for="password">Admin Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ old('password') }}" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            value="{{ old('confirm_password') }}" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="active" class="custom-control-input" id="active">
                            <label class="custom-control-label" for="active">active</label>
                        </div>
                    </div>
                </div>

                {{-- <div class="card-footer">
            <button type="button" onclick="store()" class="btn btn-primary">Add</button>
          </div> --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
        </div>
        <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->

    </div>

@endsection



@section('scripts')

    <script>
        //Initialize Select2 Elements
        $('.roles').select2({
            theme: 'bootstrap4'
        })



        function store() {


            axios.post('/cms/admin/admins', {
                    'name': document.getElementById('name').value,
                    'email': document.getElementById('email').value,
                    'role_name': document.getElementById('role_name').value,
                    'active': document.getElementById('active').checked ? 1 : 0,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);

                    // document.getElementById('create-form').reset();
                    window.location.href = "/cms/admin/admins";

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);
                })
        }
    </script>

@endsection
