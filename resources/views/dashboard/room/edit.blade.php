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
            <form id="create-form" method="POST" action="{{ route('rooms.update', $room->id) }}">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">room Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}"
                            placeholder="Enter Room Name">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="inputName" class="control-label">floor in building</label>
                            <select name="building" class="form-control SlectBox">
                                <!--placeholder-->
                                {{-- <option value="" selected disabled>حدد المبنى</option> --}}
                                <option selected value="{{ $room->floor->building->id }}">
                                    {{ $room->floor->building->name }}</option>
                                @foreach ($buildings as $building)
                                    @if ($building->id != $room->floor->building->id)
                                        <option value="{{ $building->id }}">
                                            {{ $building->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="inputName" class="control-label">floor in building</label>
                            <select name="floor" class="form-control SlectBox">
                                <option value="{{ $room->floor->id }}">{{ $room->floor->name }}</option>
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



@section('scripts')
    <script>
        $(document).ready(function() {
            $('select[name="building"]').on('click', function() {
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
                                $('select[name="floor"]').append(
                                    '<option selected value="' +
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
