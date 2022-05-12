@extends('dashboard.master1')
@section('title', 'Buildings')
@section('big_title', 'Buildings Page')
@section('main_page', 'Buildings')
@section('sub_page', 'Create')


@section('content')
    @include('errors.errors')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Building</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create-form" method="POST" action="{{ route('buildings.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Building Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter Building Name">
                    </div>

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

@endsection
