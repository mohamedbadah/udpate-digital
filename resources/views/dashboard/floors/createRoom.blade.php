@extends('dashboard.master1')
@section('title', 'Sections')
@section('big_title', 'Room Page')
@section('main_page', 'Room')
@section('sub_page', 'Create')


@section('content')
    {{-- لا نحتاج السيشن ولا الايرور عند استخدام طرسقة الجافاسكربت --}}
    @include('errors.errors')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Room</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create-form" method="POST" action="{{ route('rooms.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">room Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Enter Room Name">
                    </div>
                    <div class="form-floating">
                        <label for="description">Description</label>
                        <textarea class="form-control" placeholder="Description" name="description"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="inputName" class="control-label"> building</label>
                            <select name="building" class="form-control SlectBox">
                                <!--placeholder-->
                                <option value=""  disabled>حدد المبنى</option>
                                    <option selected value="{{ $floor->building->id }}">
                                        {{ $floor->building->name }}
                                    </option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="inputName" class="control-label">floor in building</label>
                            <select name="floor" class="form-control SlectBox">
                                <option selected value="{{ $floor->id }}">
                                    {{ $floor->name }}
                                </option>
                            </select>
                        </div>
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
