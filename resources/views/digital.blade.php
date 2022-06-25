<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('project/css/project.css')}}">
    <title>Document</title>
</head>
<body onload="startTime()">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-sm-6 left-nav">
        <span class="navbar-brand"><img src="{{asset('project/image/collage.png')}}" height="25%" width="25%">
        <span class="logo-text">كلية فلسطين التقنية</span>
        <span class="borders"></span>
    </span>
        
        <span id="clock"></span>
        {{ date('l') }}
        </div>
</nav>
<div class="container-fluid">
<div class="row content">
    <div class="col-sm-6 tab1">
        <table class="table content">
            <thead class="bg-danger text-light">
                <tr>
                    <th scope="col">الغرف</th>
                    <th scope="col">8-9</th>
                    <th scope="col">9-10</th>
                    <th scope="col">10-11</th>
                    <th scope="col">11-12</th>
                    <th scope="col">12-1</th>
                    <th scope="col">1-2</th>
                    <th scope="col">2-3</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collages as $collage)
                @if (date('l') == $collage->day->day && $floor->name == $collage->room->floor->name && $building->name == $collage->room->floor->building->name)
                <tr>
                    {{-- @if (!$collage->period_8) class="bg-danger"@endif>{{ $collage->period_8 }}</td> --}}
                           <td scope="row">{{$collage->room->name}}</td>
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
    <div class="col-md-3 std">
        <div class="inner one">
            <h5 style="margin-bottom:0;">Student Of The month</h5>
            <div style="background-image: linear-gradient(to right, rgb(70, 233, 245) , rgb(200, 233, 243),rgb(235, 246, 250)); margin-top:0;">
            @foreach ($posts as $post)
                @if ($post->category->name=="student")
                <h4 style="text-align: center;">{{$post->title}}</h4>
                <div class="row">
                    <div class="col-sm-5">
                    <img class="mt-4" src="{{asset("upload/posts/$post->image")}}" height="125px" width="125px">
                    </div>
                    <div class="col-sm-7">
                    <span>{{$post->content}}
                    </span>
                    </div>
                    </div> 
                @endif
            @endforeach  
            
            </div>
        </div>
        <div class="inner mt-2 two">
            <h5>School Messages</h5>
            @foreach ($posts as $post)
                @if ($post->category->name=="unvirsty")
                <div style="text-align: center;" class="p-3 upRoll">
                <div class="schoolMove">
                <h3>{{$post->title}}</h3>
                <div>{{$post->content}}</div>
                    
                   </div></div> 
                @endif
            @endforeach
            
                     
        </div>
    </div>
    <div class="col-md-3 upcoming">
        <div class="inner">
            <h5>upcoming event</h5>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('project/image/collage.png')}}" alt="First slide" height="350px">
                    <h1>heloo mohamed</h1>
                  </div>
                  @foreach ($posts as $post)
                      @if ($post->category->name=="event")
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset("upload/posts/$post->image")}}" alt="Second slide" height="450px">
                      </div>  
                      @endif
                  @endforeach                
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            <!-- <p>pagrahp</p> -->
        </div>
    </div>
</div>
</div>
   <div class="ticker">
        <div class="title">
            <h5> أخبار</h5>
        </div>
        <div class="news">
            <marquee direction="right">
                <p>
                    {{-- @for ($i=0;$i<count($posts);$i++)
                    <span><span>{{$posts[$i]->name}}</span>{{$posts[$i]->content}} </span>
                    @endfor --}}
                    @foreach ($posts as $post)
                    @if ($post->category->name=="news")
                    <span><span>{{$post->name}}:</span>{{$post->content}} </span>                   
                    @endif
                    @endforeach
                </p>
            </marquee>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script>
       function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
            return i;
        }
    </script>
</body>
</html>