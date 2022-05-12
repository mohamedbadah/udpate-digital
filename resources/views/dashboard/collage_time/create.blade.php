@extends('dashboard.master1')
@section('title', 'collage_table')
@section('big_title', 'Room collage_table')
@section('main_page', 'collage_table')
@section('sub_page', 'Create')


@section('content')
    {{-- لا نحتاج السيشن ولا الايرور عند استخدام طرسقة الجافاسكربت --}}
    @include('errors.errors')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create collage_table</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="create-form" method="POST" action="{{ route('collage_time.store') }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <label for="inputName" class="control-label">Days</label>
                        <select name="day" class="form-control SlectBox">
                            <!--placeholder-->
                            <option value="" selected disabled>حدد اليوم</option>
                            @foreach ($days as $day)
                                <option value="{{ $day->id }}">
                                    {{ $day->day }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="inputName" class="control-label">floor in building</label>
                            <select name="building" class="form-control SlectBox">
                                <!--placeholder-->
                                <option value="" selected disabled>حدد المبنى</option>
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}">
                                        {{ $building->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="inputName" class="control-label">floor in building</label>
                            <select name="floor" class="form-control SlectBox">
                                <option selected>selected</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="inputName" class="control-label">room in floor</label>
                            <select name="room" class="form-control SlectBox">
                                <option selected>selected</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">period_8</label>
                                <input type="text" class="form-control" id="name" name="period_8"
                                    value="{{ old('period_8') }}" placeholder="اسم القسم والدكتور">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">period_9</label>
                                <input type="text" class="form-control" id="name" name="period_9"
                                    value="{{ old('period_9') }}" placeholder="اسم القسم والدكتور">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">period_10</label>
                                <input type="text" class="form-control" id="name" name="period_10"
                                    value="{{ old('period_10') }}" placeholder="اسم القسم والدكتور">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">period_11</label>
                                <input type="text" class="form-control" id="name" name="period_11"
                                    value="{{ old('period_11') }}" placeholder="اسم القسم والدكتور">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">period_12</label>
                                <input type="text" class="form-control" id="name" name="period_12"
                                    value="{{ old('period_12') }}" placeholder="اسم القسم والدكتور">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">period_1</label>
                                <input type="text" class="form-control" id="name" name="period_1"
                                    value="{{ old('period_1') }}" placeholder="اسم القسم والدكتور">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">period_2</label>
                                <input type="text" class="form-control" id="name" name="period_2"
                                    value="{{ old('period_2') }}" placeholder="اسم القسم والدكتور">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
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
        $(document).ready(function() {
            $('select[name="building"]').on('change', function() {
                var buildingId = $(this).val();
                if (buildingId) {
                    $.ajax({
                        // url: "{{ URL::to('user/sections') }}/" + SectionId,,
                        url: "/rooms/" + buildingId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="floor"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="floor"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
        $(document).ready(function() {
            $('select[name="floor"]').on('click', function() {
                var floorId = $(this).val();
                if (floorId) {
                    $.ajax({
                        // url: "{{ URL::to('user/sections') }}/" + SectionId,,
                        url: "/collage_time/" + floorId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="room"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="room"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
