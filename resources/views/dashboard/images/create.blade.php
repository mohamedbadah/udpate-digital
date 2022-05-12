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
            <br>
            <!-- form start -->
            <form id="create-form" method="POST" enctype="multipart/form-data" action="{{ route('images.store') }}">
                @csrf
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
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
    </script>

@endsection
