@extends('dashboard.master1')
@section('title', 'posts')
@section('big_title', 'posts Page')
@section('main_page', 'Post')
@section('sub_page', 'Edit')


@section('content')
    {{-- لا نحتاج السيشن ولا الايرور عند استخدام طرسقة الجافاسكربت --}}
    {{-- @include('errors.errors') --}}
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create-form" method="POST" action="{{ route('posts.update', $post->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">title</label>
                        <input type="text" class="form-control" id="name" name="title" value="{{ $post->title }}"
                            placeholder="Enter Name">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <img class="img-circle img-bordered-sm" style="margin: 10px auto" width="100" height="100"
                    src="{{ asset('upload/posts/' . $post->image) }}" alt="User Image">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="img" value="{{ $post->image }}" class="custom-file-input"
                            id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea rows="4" , cols="70" id="content" name="content">{{ $post->content }}</textarea>
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
                        <option selected value="{{ $post->category->id }}">{{ $post->category->name }}</option>
                        @foreach ($categories as $category)
                            @if ($category->id != $post->category->id)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="  card-footer">
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
