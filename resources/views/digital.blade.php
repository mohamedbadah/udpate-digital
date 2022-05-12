@extends('dashboard.master1')
@section('title', 'rooms')
@section('big_title', 'Rooms Page')
@section('main_page', 'Rooms')
@section('sub_page', 'index')
@section('head')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="refresh" content="300" >
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('style')
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

a {
    color: #fff;
    text-decoration: none;
}
.container{
    width:100%;
}
.ticker {
    display: flex;
    flex-wrap: wrap;
    width: 80%;
    height: 60px;
    margin: 0 auto;
}
.news {
    width: 76%;
    background: #cc4444;
    padding: 0 2%;
    display:flex;
    align-items: center;
    justify-content: center;
    color:white;
}
.title {
    width: 20%;
    text-align: center;
    background: #c81c1c;
    position: relative;
}
.title h5 {
    font-size: 18px;
    position: absolute;
    margin: 8% 0;
}
.news marquee {
    font-size: 18px;
}
@endsection
@section('content')
@if (session()->has('sucess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('sucess') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php sleep(5) ?>
@endif
    {{-- <div class="card-header">
        <h3 class="card-title">All Rooms</h3>
    </div> --}}
    <!-- /.card-header -->
    <div  class="card-body table-responsive p-0 col-md-8 overflow-hidden" style=" ">

        <table class="table table-hover table-bordered text-wrap overflow-hidden">
            <thead>
                <tr>
                    <th>الغرف</th>
                    <th>8-9</th>
                    <th>9-8</th>
                    <th>10-11</th>
                    <th>11-12</th>
                    <th>12-1</th>
                    <th>1-2</th>
                    <th>2-3</th>
                </tr>
            </thead>
            <tbody>
                {{ date('l') }}
                @foreach ($collages as $collage)
                    @if (date('l') == $collage->day->day && $floor->raspberry_pi_ip_address == $collage->room->floor->raspberry_pi_ip_address && $building->name == $collage->room->floor->building->name)
                        <tr>
                            <td>{{ $collage->room->name }}</td>
                            {{-- <td>{{ $collage->room->floor->raspberry_pi_ip_address }}</td> --}}
                            <td @if (!$collage->period_8) class="bg-danger"@endif>{{ $collage->period_8 }}</td>
                            <td @if (!$collage->period_9) class="bg-danger"@endif>{{ $collage->period_9 }}</td>
                            <td @if (!$collage->period_10) class="bg-danger"@endif>{{ $collage->period_10 }}</td>
                            <td @if (!$collage->period_11) class="bg-danger"@endif>{{ $collage->period_11 }}</td>
                            <td @if (!$collage->period_12) class="bg-danger"@endif>{{ $collage->period_12 }}</td>
                            <td @if (!$collage->period_1)   class="bg-danger" @endif >{{ $collage->period_1 }}</td>
                            <td @if (!$collage->period_2)   class="bg-danger" @endif >{{ $collage->period_2 }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table> 
    </div>
    
    <!-- /.card-body -->
@endsection
<div class="container">
    <div class="ticker">
      <div class="title"><h5>collage News</h5></div>
      <div class="news">
        <marquee direction="right">
          <p>
              {{-- <div class="row"> --}}
                  {{-- @foreach ($posts as $post) --}}
                  @for ($i=0;$i<count($posts);$i++)
                  <span><span>{{$posts[$i]->name}}</span>{{$posts[$i]->content}} </span>
                  @endfor
                      {{-- <span><span>{{$post->name}}</span>{{$post->content}} </span>
                  @endforeach --}}
              {{-- </div> --}}
        </p>
        </marquee>
      </div>
    </div>
  </div>
@section('scripts')
    <script>
        function a(){ 
        axios.get('/digital_show/collage-enginnering/17665-258')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });
  }
  a();
  
    </script>
@endsection
