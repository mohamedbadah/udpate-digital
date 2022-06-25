 @extends('dashboard.master1')
 @section('title', 'Dashboard')
 @section('big_title', 'Dashboard')
 @section('main_page', 'Home')
 @section('sub_page', 'Home')
 @section('content')
     <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="row">
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-info">
                     <div class="inner">
                         <h3>{{$post->count()}}</h3>

                         <p>post</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-bag"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-success">
                     <div class="inner">
                        <?php $a=[]; ?>
                        @foreach ($post_e as $p)
                        @if (!is_null($p->category))
                        <?php array_push($a,$p->category->name) ?>
                        @endif 
                        @endforeach
                        <h3>{{count($a)}}</h3>
                         <p>post event</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-warning">
                    <div class="inner">
                        <?php $a=[]; ?>
                        @foreach ($post_n as $p)
                        @if (!is_null($p->category))
                        <?php array_push($a,$p->category->name) ?>
                        @endif 
                        @endforeach
                        <h3>{{count($a)}}</h3>
                         <p>post new</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-person-add"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-danger">
                    <div class="inner">
                        <?php $a=[]; ?>
                        @foreach ($post_n as $p)
                        @if (!is_null($p->category))
                        <?php array_push($a,$p->category->name) ?>
                        @endif 
                        @endforeach
                        <h3>{{count($a)}}</h3>
                         <p>post unvirsty</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
         </div>
         <!-- /.row -->


     @stop
