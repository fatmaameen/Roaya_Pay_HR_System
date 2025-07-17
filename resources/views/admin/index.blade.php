@extends('admin.layouts.app')
@section('content')

    <!-- eCommerce statistic -->
       <div class="row">

           {{--  <div class="col-xl-6 col-lg-6 col-12">
               <div class="card pull-up">
                   <div class="card-content">
                       <div class="card-body">
                           <div class="media d-flex">
                               <div class="media-body text-left">
                                   <h3 class="warning">{{ $today }}</h3>
                                       <h6>عدد زيارات اليوم</h6>
                               </div>
                               <div>
                                   <i class="la la-user warning font-large-2 float-right"></i>
                               </div>
                           </div>
                           <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                               <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%" aria-valuenow="65" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-xl-6 col-lg-6 col-12">
               <div class="card pull-up">
                   <div class="card-content">
                       <div class="card-body">
                           <div class="media d-flex">
                               <div class="media-body text-left">
                                   <h3 class="warning">{{ $total }}</h3>
                                       <h6>إجمالي زيارات الموقع</h6>
                               </div>
                               <div>
                                   <i class="la la-users warning font-large-2 float-right"></i>
                               </div>
                           </div>
                           <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                               <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%" aria-valuenow="65" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>  --}}
           {{-- <div class="col-xl-4 col-lg-6 col-12">
               <div class="card pull-up">
                   <div class="card-content">
                       <div class="card-body">
                           <div class="media d-flex">
                               <div class="media-body text-left">
                                   <h3 class="info">{{ $size }}</h3>
                                       <h6>عدد الأحجام</h6>
                               </div>
                               <div>
                                   <i class="la la-cubes info fa-3x float-right"></i>
                               </div>
                           </div>
                           <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                               <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-xl-4 col-lg-6 col-12">
               <div class="card pull-up">
                   <div class="card-content">
                       <div class="card-body">
                           <div class="media d-flex">
                               <div class="media-body text-left">
                                   <h3 class="info">{{ $item }}</h3>
                                       <h6>عدد المكونات</h6>
                               </div>
                               <div>
                                   <i class="la la-cutlery info la-3x float-right"></i>
                               </div>
                           </div>
                           <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                               <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-xl-4 col-lg-6 col-12">
               <div class="card pull-up">
                   <div class="card-content">
                       <div class="card-body">
                           <div class="media d-flex">
                               <div class="media-body text-left">
                                   <h3 class="info">{{ $additional }}</h3>
                                       <h6>عدد الإضافات</h6>
                               </div>
                               <div>
                                   <i class="la la-birthday-cake info fa-3x float-right"></i>
                               </div>
                           </div>
                           <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                               <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div> --}}


       </div>
       <!--/ eCommerce statistic -->
       <!-- Column Chart -->
   <div class="row">
     <div class="col-12">
       <div class="card">
         <div class="card-header">
           <h4 class="card-title">زيارات الموقع خلال فترات معينة</h4>
           <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
           <div class="heading-elements">
             <ul class="list-inline mb-0">
               <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
               <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
               <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
               <li><a data-action="close"><i class="ft-x"></i></a></li>
             </ul>
           </div>
         </div>
         <div class="card-content collapse show">
           <div class="card-body">
             <canvas id="column-chart" height="400"></canvas>
           </div>
         </div>
       </div>
     </div>
   </div>
@endsection

@section('scripts')
    <script>
       $(window).on("load", function(){

           //Get the context of the Chart canvas element we want to select
           var ctx = $("#column-chart");

           // Chart Options
           var chartOptions = {
               // Elements options apply to all of the options unless overridden in a dataset
               // In this case, we are setting the border of each bar to be 2px wide and green
               elements: {
                   rectangle: {
                       borderWidth: 2,
                       borderColor: 'rgb(0, 255, 0)',
                       borderSkipped: 'bottom'
                   }
               },
               responsive: true,
               maintainAspectRatio: false,
               responsiveAnimationDuration:500,
               legend: {
                   position: 'top',
               },
               scales: {
                   xAxes: [{
                       display: true,
                       gridLines: {
                           color: "#f3f3f3",
                           drawTicks: false,
                       },
                       scaleLabel: {
                           display: true,
                       }
                   }],
                   yAxes: [{
                       display: true,
                       gridLines: {
                           color: "#f3f3f3",
                           drawTicks: false,
                       },
                       scaleLabel: {
                           display: true,
                       }
                   }]
               },
               title: {
                   display: true,
                   text: 'إحصائية زيارات الموقع'
               }
           };

           // Chart Data
           var chartData = {
               labels: ["اليوم", "الاسبوع", "الشهر", "السنة", "جميع الزيارات"],
               datasets: [{
                   label: "عدد الزيارات",
                   data: [{{ $today ?? 0 }}, {{ $date7 ?? 0 }}, {{ $date30 ?? 0 }}, {{ $date365 ?? 0 }}, {{ $total ?? 0 }}],
                   backgroundColor: "#28D094",
                   hoverBackgroundColor: "rgba(22,211,154,.9)",
                   borderColor: "transparent"
               }]
           };

           var config = {
               type: 'bar',

               // Chart Options
               options : chartOptions,

               data : chartData
           };

           // Create the chart
           var lineChart = new Chart(ctx, config);
       });
       </script>
@endsection
