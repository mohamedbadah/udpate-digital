@extends('dashboard.master1')
@section('title', 'Floors')
@section('big_title', 'Floors Page')
@section('main_page', 'Building Floors')
@section('sub_page', 'Index')


@section('content')
    <div class="col-12">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-header">
                <h3 class="card-title">Floor <b class="text text-danger">{{ $floor->name }}</b> & building <b class="text text-danger">{{$floor->building->name }}</b></h3>

                <a href="{{ route('createRoom',$floor->id) }}" class="btn btn-success float-right"><i class="fas fa-plus"></i>
                    Add New Room</a>
                <a href="{{ route('buildings.index') }}" class="btn btn-info float-right mr-2">Back</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Updated at</th>
                            <th>Settings</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($floor_Rooms as $floor_Room)
                            <tr>
                                <td>{{ $floor_Room->id }}</td>
                                <td>{{ $floor_Room->name }}</td>
                                <td>{{ $floor_Room->description }}</td>
                                <td>{{ $floor_Room->created_at }}</td>
                                <td> {{ $floor_Room->updated_at }} </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('editRoom', $floor_Room->id) }}" class="btn btn-info">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger"
                                            onclick="confirmDestroy({{ $floor_Room->id }} , this)">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            
            
                        @empty
                            <tr>No data Found</tr>
                        @endforelse
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
