@extends('dashboard.master1')
@section('title', 'Admins')
@section('big_title', 'Admins Page')
@section('main_page', 'Admins')
@section('sub_page', 'Create')
@section('head')
   
@endsection


@section('content')
    {{-- لا نحتاج السيشن ولا الايرور عند استخدام طرسقة الجافاسكربت --}}
    {{-- @include('errors.errors') --}}
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create-form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">title</label>
                        <input type="text" class="form-control" id="name" name="title" value="{{ old('name') }}"
                            placeholder="Enter Name">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea rows="4" , cols="70" id="content" name="content">content</textarea>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="inputName" class="control-label">category</label>
                    <select name="category" class="form-control SlectBox">
                        <!--placeholder-->
                        <option value="" selected disabled>حدد القسم</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
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
