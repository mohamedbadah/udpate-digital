@extends('dashboard.master1')
@section('title', 'Floors')
@section('big_title', 'Floors Page')
@section('main_page', 'Floors')
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
                <h3 class="card-title">All Floors</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>room</th>
                            <th>Ip Address</th>
                            <th>Description</th>
                            <th>CREATE Room</th>
                            <th>Building </th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Settings</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($floors as $floor)
                            <tr>
                                <td>{{ $floor->id }}</td>
                                <td>{{ $floor->name }}</td>
                                <td><a href="{{ route('floors.show', $floor->id) }}"
                                    class="btn btn-info d-flex justify-content-center " >Room({{ count($floor->rooms) }})</a></td>
                                <td>{{ $floor->raspberry_pi_ip_address }}</td>
                                <td>{{ $floor->description }}</td>
                                <td><a href="{{ route('createRoom',$floor->id) }}" class="btn btn-info">CREATE Room</a></td>
                                <td class="bg-warning d-flex justify-content-center">{{ $floor->building->name }}</td>

                                <td>{{ $floor->created_at }}</td>
                                <td> {{ $floor->updated_at }} </td>
                                <td class="d-flex justify-content-center">
                                    <div class="btn-group ">
                                        <a href="{{ route('floors.edit', $floor->id) }}" class="btn btn-info">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger"
                                            onclick="confirmDestroy({{ $floor->id }} , this)">
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
