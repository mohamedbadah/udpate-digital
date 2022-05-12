@extends('dashboard.master1')
@section('title', 'rooms')
@section('big_title', 'collage_time_table Page')
@section('style')
    .search{
    background-image: url('/css/searchicon.png');
    background-position: 10px 12px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
    }
@endsection
@section('main_page', 'collage_time_table')
@section('sub_page', 'index')
@section('content')
    <div class="card-header">
        <h3 class="card-title">All collage_time_table</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body table-responsive p-0">
        <div class="row">
            <div class="col-sm-6">
                <input class="search" type="text" id="myInput" onkeyup="myFunction()" placeholder="search in room"
                    title="Type in a name">
            </div>
            <div class="col-sm-6">
                <input class="search" type="text" id="myInput2" onkeyup="myFunction2()" placeholder="search in floor"
                    title="Type in a name">
            </div>
        </div>
        <table class="table table-hover table-bordered text-nowrap">
            <thead>
                <tr>
                    <th>الغرف</th>
                    <th>day</th>
                    <th>المبنى</th>
                    <th>الطابق</th>
                    <th>8-9</th>
                    <th>9-10</th>
                    <th>10-11</th>
                    <th>11-12</th>
                    <th>12-1</th>
                    <th>1-2</th>
                    <th>2-3</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody id="table">
                @foreach ($collages as $collage)
                    <tr>
                        <td>{{ $collage->room->name }}</td>
                        <td>{{ $collage->day->day }}</td>
                        <td>{{ $collage->room->floor->building->name }}
                        </td>
                        <td>{{ $collage->room->floor->name }}
                        </td>
                        <td>{{ $collage->period_8 }}</td>
                        <td>{{ $collage->period_9 }}</td>
                        <td>{{ $collage->period_10 }}</td>
                        <td>{{ $collage->period_11 }}</td>
                        <td>{{ $collage->period_12 }}</td>
                        <td>{{ $collage->period_13 }}</td>
                        <td>{{ $collage->period_14 }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('collage_time.edit', $collage->id) }}" class="btn btn-info">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger" onclick="confirmDestroy({{ $collage->id }} , this)">
                                    <i class="far fa-trash-alt"></i>
                                </a>


                            </div>
                        </td>
                    </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- Button trigger modal -->
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

        function myFunction() {
            var input, filter, table, tr, td, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0] || tr[i].getElementsByTagName("th")[0];
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        function myFunction2() {
            var input, filter, table, tr, td, txtValue;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3] || tr[i].getElementsByTagName("th")[3];
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
        //delete
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
            axios.delete('/collage_time/' + id)
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
