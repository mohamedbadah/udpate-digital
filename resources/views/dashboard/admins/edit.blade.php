@extends('dashboard.master1')
@section('title', 'Admins')
@section('big_title', 'Admins')
@section('main_page', 'Home')
@section('sub_page', 'Update')


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
            <form id="create-form" method="POST" action="{{ route('admins.update', $admin->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Admin Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}"
                            placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="email">Admin Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $admin->email }}"
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
                    {{-- <div class="form-group">
                        <label for="password">Admin Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ $admin->password }}" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            value="{{ $admin->password }}" placeholder="Enter Email">
                    </div> --}}

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="active"
                                @if ($admin->active) checked @else disable @endif value="checked" id="active">
                            <label class="custom-control-label" for="active">Active</label>
                        </div>
                    </div>
                </div>

                {{-- <div class="card-footer">
            <button type="button" onclick="store()" class="btn btn-primary">Add</button>
          </div> --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </div>
        <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->

    </div>

@endsection



@section('scripts')


@endsection
