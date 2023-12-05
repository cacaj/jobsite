<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.header')
<body>
<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
@include('layouts.admin.sidebar')
    <!-- Sidebar End -->
    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
@include('layouts.admin.navbar')
        <!-- Navbar End -->
        @yield('content')
        <!-- Footer Start -->
        @include('layouts.admin.footer')
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
</div>

<!-- JavaScript Libraries -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('lib/chart/chart.min.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src="{{asset('richtexteditor/plugins/all_plugins.js')}}"></script>
<!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>
<script>
    $( function() {
        $("#datepicker").datepicker();
    } );
</script>
</body>
</html>
