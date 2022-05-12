@extends('dashboard.master1')
@section('title', 'Image')
@section('big_title', 'Images pages')
@section('main_page', 'Image')
@section('sub_page', 'index')


@section('content')
    <div class="col-12">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card-header">
                <h3 class="card-title">All Images</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td>{{ 5 * $current + $i }}</td>
                                <td><img class="img-circle img-bordered-sm" width="100" height="100"
                                        src="{{ asset('upload/' . $image->name) }}" alt="User Image"></td>
                                <td>{{ $image->created_at }}</td>
                                <td> {{ $image->updated_at }} </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('images.edit', $image->id) }}" class="btn btn-info">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger"
                                            onclick="confirmDestroy({{ $image->id }} , this)">
                                            <i class="far fa-trash-alt"></i>
                                        </a>


                                    </div>
                                </td>
                                <?php $i++; ?>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $images->links() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection



@section('scripts')
    <script>
        function confirmDestroy(id, referance) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id, referance);
                }
            })

        }

        function destroy(id, referance) {
            axios.delete('/images/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    referance.closest('tr').remove();
                    showMessage(response.data);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showMessage(error.response.data);
                })


        }

        function showMessage(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
@endsection
