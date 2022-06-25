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
                <h3 class="card-title"><b>{{ $building->name }}</b> Floors</h3>

                <a href="{{ route('createFloor',$building->id) }}" class="btn btn-success float-right"><i class="fas fa-plus"></i>
                    Add New Floor</a>
                <a href="{{ route('buildings.index') }}" class="btn btn-info float-right mr-2">Back</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                   <h1 class="text-danger ml-5">{{$building->name}}</h1>
                <table class="table table-hover table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Room</th>
                            <th>Ip Address</th>
                            <th>Description</th>
                            <th>Create Room</th>
                            <th>Building</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Settings</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buildingFloors as $buildingFloor)
                            <tr>
                                <td>{{ $buildingFloor->id }}</td>
                                <td>{{ $buildingFloor->name }}</td>
                                <td><a href="{{ route('floors.show', $buildingFloor->id) }}"
                                    class="btn btn-info d-flex justify-content-center " >Room({{ count($buildingFloor->rooms) }})</a></td>
                                <td>{{ $buildingFloor->raspberry_pi_ip_address }}</td>
                                <td>{{ $buildingFloor->description }}</td>
                                <td><a href="{{ route('createRoom',$buildingFloor->id) }}" class="btn btn-info">CREATE Room</a></td>
                                <td>{{ $buildingFloor->building->name }}</td>
                                <td>{{ $buildingFloor->created_at }}</td>
                                <td> {{ $buildingFloor->updated_at }} </td>
                                <td>
                                    <div class="btn-group">
                                        {{-- <a href="{{ route('buildings.edit', $buildingFloor->id) }}" class="btn btn-info"> --}}
                                        <a href="{{ route('editFloor', $buildingFloor->id) }}" class="btn btn-info">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger"
                                            onclick="confirmDestroy({{ $buildingFloor->id }} , this)">
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
            axios.delete('/floors/' + id)
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
