@extends('dashboard.master1')
@section('title', 'category to post')
@section('big_title', 'category to post Page')
@section('main_page', 'category to post')
@section('sub_page', 'show')


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All post</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>content</th>
                            <th>image</th>
                            <th>category</th>
                            <th>created_by</th>
                            <th>created_at</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ substr("$post->content", 0, 100) }}</td>
                                <td><img class="img-circle img-bordered-sm" width="100" height="100"
                                        src="{{ asset('upload/posts/' . $post->image) }}" alt="post Image"></td>
                                <td>{{ $post->category->name }}</td>
                                <td> {{ $post->created_by }} </td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger"
                                            onclick="confirmDestroy({{ $post->id }} , this)">
                                            <i class="far fa-trash-alt"></i>
                                        </a>


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

@endsection



@section('scripts')
    <script>
    </script>
@endsection
