@extends('dashboard.master1')
@section('title', 'rooms')
@section('big_title', 'Rooms Page')
@section('main_page', 'Rooms')
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
                <h3 class="card-title">All Rooms</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>floor</th>
                            <th>created_at</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ 5 * $current + $i }}</td>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->floor->name }}({{ $room->floor->building->name }})</td>
                                <td>{{ $room->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-info">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger"
                                            onclick="confirmDestroy({{ $room->id }} , this)">
                                            <i class="far fa-trash-alt"></i>
                                        </a>


                                    </div>
                                </td>
                                <?php $i++; ?>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $rooms->links() }}
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
            axios.delete('/rooms/' + id)
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
