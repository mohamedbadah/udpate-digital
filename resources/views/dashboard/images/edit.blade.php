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
            <img class="img-circle img-bordered-sm" style="margin: 10px auto" width="100" height="100"
                src="{{ asset('upload/' . $image->name) }}" alt="User Image">
            <form id="create-form" method="POST" enctype="multipart/form-data"
                action="{{ route('images.update', $image->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

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
