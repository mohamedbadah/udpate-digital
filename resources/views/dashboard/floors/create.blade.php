@extends('dashboard.master1')
@section('title', 'Floors')
@section('big_title', 'Floors Page')
@section('main_page', 'Floors')
@section('sub_page', 'Create')

@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Floors</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create-form" action="{{ route('floors.store') }} " method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Floors Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Raspberry pi ip address</label>
                        <input type="text" class="form-control" name="raspberry_pi_ip_address"
                            value="{{ old('raspberry_pi_ip_address') }}" placeholder="Enter Raspberry pi ip address">
                    </div>


                    <div class="form-floating">
                        <label for="description">Description</label>
                        <textarea class="form-control" placeholder="Description" name="description"></textarea>
                    </div>

                    <div class="form-group  mt-3">
                        <label>Buildings </label>
                        <select class="form-control" name="building_id" style="width: 100%;" data-select2-id="1"
                            tabindex="-1" aria-hidden="true">
                            @foreach ($buildings as $building)
                                <option value="{{ $building->id }}">{{ $building->name }}</option>
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
