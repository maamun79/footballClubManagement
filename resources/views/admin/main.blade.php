<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminex.themebucket.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Sep 2015 19:54:15 GMT -->
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  @yield('title')
  <!-- Placed js at the end of the document so the pages load faster -->
  <!-- <script src="{{ asset('admin/js/jquery-1.10.2.min.js')}}"></script> -->

  <!--jquery -->
  <script src="{{ asset('vendor/jquery/jquery-3.4.1.min.js')}}"></script>

  <!--icheck-->
  <link href="{{ asset('admin/js/iCheck/skins/minimal/minimal.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/js/iCheck/skins/square/square.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/js/iCheck/skins/square/red.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/js/iCheck/skins/square/blue.css')}}" rel="stylesheet">

  @yield('style')

  <!--dashboard calendar-->
  <link href="{{ asset('admin/css/clndr.css')}}" rel="stylesheet">

  <!--common-->
  <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- player page -->
  <link href="{{ asset('admin/css/jquery.stepy.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/css/style-responsive.css')}}" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    @include('admin.inc.leftSideBar')
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        @include('admin.inc.topBar')
        <!-- header section end-->

        <!--body wrapper start-->
        @yield('content')
        <!--body wrapper end-->

        <!--footer section start-->
        @include('admin.inc.footer')
        <!--footer section end-->
    </div>
    <!-- main content end-->
</section>

<!-- sweetalert cdn -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script> -->
@yield('script')
<script src="{{ asset('admin/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
<script src="{{ asset('admin/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{ asset('admin/js/jquery.stepy.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/js/modernizr.min.js')}}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.js')}}"></script>


<!--easy pie chart-->
<script src="{{ asset('admin/js/easypiechart/jquery.easypiechart.js')}}"></script>
<script src="{{ asset('admin/js/easypiechart/easypiechart-init.js')}}"></script>

<!--Sparkline Chart-->
<script src="{{ asset('admin/js/sparkline/jquery.sparkline.js')}}"></script>
<script src="{{ asset('admin/js/sparkline/sparkline-init.js')}}"></script>

<!--icheck -->
<script src="{{ asset('admin/js/iCheck/jquery.icheck.js')}}"></script>
<script src="{{ asset('admin/js/icheck-init.js')}}"></script>

<!-- jQuery Flot Chart-->
<!-- <script src="{{ asset('admin/js/flot-chart/jquery.flot.js')}}"></script> -->
<!-- <script src="{{ asset('admin/js/flot-chart/jquery.flot.tooltip.js')}}"></script>
<script src="{{ asset('admin/js/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('admin/js/flot-chart/jquery.flot.pie.resize.js')}}"></script>
<script src="{{ asset('admin/js/flot-chart/jquery.flot.selection.js')}}"></script>
<script src="{{ asset('admin/js/flot-chart/jquery.flot.stack.js')}}"></script>
<script src="{{ asset('admin/js/flot-chart/jquery.flot.time.js')}}"></script>
<script src="{{ asset('admin/js/main-chart.js')}}"></script> -->



<!--common scripts for all pages-->
<script src="{{ asset('admin/js/scripts.js')}}"></script>


<script>
    /*=====STEPY WIZARD====*/
    $(function() {
        $('#default').stepy({
            backLabel: 'Previous',
            block: true,
            nextLabel: 'Next',
            titleClick: true,
            titleTarget: '.stepy-tab'
        });
    });
</script>

</body>

<!-- Mirrored from adminex.themebucket.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Sep 2015 19:54:53 GMT -->
</html>
