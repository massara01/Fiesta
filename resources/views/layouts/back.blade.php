<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>La Fiesta | BACKOFFICE</title>

    <meta name="description" content="" />

    <link rel="icon" href="{{asset('/assets/images/Fiesta_B.png')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('/backAssets/fonts/boxicons.css')}}" />

    <link rel="stylesheet" href="{{asset('/backAssets/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('/backAssets/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('/backAssets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('/backAssets/css/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('/backAssets/css/apex-charts.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <script src="{{asset('/backAssets/js/config.js')}}"></script>

  </head>

  <body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            @include('back.includes.aside')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('back.includes.nav')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    @yield('content')
                    <!-- /content -->

                    <!-- footer -->
                    @include('back.includes.footer')
                    <!-- /footer-->

                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- / Layout wrapper -->

    
   	<!-- fraimwork - jquery include -->
     <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
     @yield('script')

     <script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

  <script src="{{asset('/backAssets/js/perfect-scrollbar.js')}}"></script>
  <!-- <script src="{{asset('/backAssets/js/apexcharts.js')}}"></script>-->
   <!-- <script src="{{asset('/backAssets/js/main.js')}}"></script>-->
   <script src="{{asset('/backAssets/js/dashboards-analytics.js')}}"></script>
   <script src="{{asset('/backAssets/js/ui-modals.js')}}"></script>
   <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>

  </body>
</html>
