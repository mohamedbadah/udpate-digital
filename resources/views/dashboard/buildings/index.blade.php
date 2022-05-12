@extends('dashboard.master1')
@section('title', 'Buildings')
@section('big_title', 'Buildings Page')
@section('main_page', 'Buildings')
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
            @include('errors.errors')
            <div class="card-header">
                <h3 class="card-title">All Buildings</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Floors</th>
                            <th>create floor</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Settings</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buildings as $building)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $building->name }}</td>
                                <td> <a href="{{ route('buildings.show', $building->id) }}"
                                        class="btn btn-info d-flex justify-content-center ">Floors({{ $building->floors_count }})
                                    </a></td>
                                    <td><a href="{{ route('createFloor',$building->id) }}"
                                        class="btn btn-info d-flex justify-content-center ">create floor
                                    </a></td>

                                <td>{{ $building->created_at }}</td>
                                <td> {{ $building->updated_at }} </td>
                                <td class="d-flex justify-content-center">
                                    <div class="btn-group">
                                        <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-info">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger"
                                            onclick="confirmDestroy({{ $building->id }} , this)">
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
            axios.delete('/buildings/' + id)
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
