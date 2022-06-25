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
                <tr>
                    <th scope="row">مختبر فيزياء</th>
                    <td>Jacob</td>
                    <td>Thorn</td>
                    <td>@fat</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">مختبر فيزياء</th>
                    <td>Jacob</td>
                    <td>Thorn</td>
                    <td>@fat</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">مختبر فيزياء</th>
                    <td>Jacob</td>
                    <td>Thorn</td>
                    <td>@fat</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">Room 4</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">Room 4</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">Room 4</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">2مختبر الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
                <tr>
                    <th scope="row">3 الكتروميات</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>هندسة سنة رابعة</td>
                </tr>
            </tbody>         
        </table>
    </div>
    <div class="col-md-3 std">
        <div class="inner one">
            <h5 style="margin-bottom:0;">Student Of The month</h5>
            <div style="background-image: linear-gradient(to right, rgb(70, 233, 245) , rgb(200, 233, 243),rgb(235, 246, 250)); margin-top:0;">
            <h6 >mohamed m badah</h6>
            <div class="row">
            <div class="col-sm-5">
            <img class="mt-4" src="images.jpg" height="125px" width="125px">
            </div>
            <div class="col-sm-7">
            <span>pagrahp pagrahp pagrahp pagrahp pagrahpfvddddddd pagrahp pagrahp pagrahp pagrahp pagrahpfvddddddd
                pagrahp pagrahp pagrahp pagrahp pagrahpfvddddddd pagrahp pagrahp pagrahp pagrahp pagrahpfvddddddd
            </span>
            </div>
            </div>
            </div>
        </div>
        <div class="inner mt-2 two">
            <h5>School Messages</h5>
            <div style="text-align: center;" class="p-3 upRoll"><div class="schoolMove"><h3>w3schoo</h3><div>pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp</div>
            <h3>w3schoo</h3>
            <div>pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp
                pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp</div>
                <h3>w3schoo</h3>
                <div>pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp
                    pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp</div>
                    <h3>w3schoo</h3>
                    <div>pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp
                        pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp pagrahp</div>
               </div></div>         
        </div>
    </div>
    <div class="col-md-3 upcoming">
        <div class="inner">
            <h5>upcoming event</h5>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="collage.png" alt="First slide" height="350px">
                    <h1>heloo mohamed</h1>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="images.jpg" alt="Second slide" height="450px">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="collage.png" alt="Third slide" height="450px">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="collage.png" alt="..." height="450px">
                  </div>
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
                    <span><span>gdm:</span>hello mohamed dsfdsfdsfs. </span>
                    <span>hello mohamed dfsfdsfds. </span>
                    <span>رام الله - دنيا الوطن
                        باشرت النيابة العامة إجراءات التحقيق فيما باشرت الشرطة إجراءات البحث والتحري في واقعة وفاة
                        مواطن (53 عاما) وابنه (15 عاما) جنوب نابلس.

                        وأوضح الناطق الإعلامي باسم الشرطة العقيد لؤي ارزيقات، في بيان صحفي، اليوم الجمعة، بأن بلاغا
                        ورد حول وجود جثتين لأب وابنه داخل حفرة بمنطقة بيتا جنوب نابلس، وقد جرى انتشالهما من قبل
                        الدفاع المدني ونقلهما للمستشفى الوطني بنابلس.

                        وأكد العقيد ارزيقات أن النيابة العامة تحركت على رأس قوة من الشرطة والمباحث بمرافقة الطب
                        الشرعي للمكان وتم إجراء الكشف والمعاينة اللازمة وفقا للأصول، مضيفا أن النيابة أمرت بالتحفظ
                        على الجثمانين وإحالتهما لمعهد الطب العدلي لإجراء الصفة التشريحية للوقوف على أسباب الوفاة.

                        المزيد على دنيا الوطن ..
                    </span>
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