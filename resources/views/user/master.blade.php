
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('userbackend/panel/assets/images/favicon.png') }}" >
        <!--Page title-->
        <title>News Portal User</title>
        <!--bootstrap-->
        <link rel="stylesheet" href="{{ asset('userbackend/panel/assets/css/bootstrap.min.css') }}">
        <!--font awesome-->
        <link rel="stylesheet" href="{{ asset('userbackend/panel/assets/css/all.min.css') }}">
        <!-- metis menu -->
        <link rel="stylesheet" href="{{ asset('userbackend/panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('userbackend/panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css') }}">
        <!-- chart -->
   
        <!-- <link rel="stylesheet" href="{{ asset('userbackend/panel/plugins/chartjs-bar-chart/chart.css') }}"> -->
        <!--Custom CSS-->
        <link rel="stylesheet" href="{{ asset('userbackend/panel/assets/css/style.css') }}">
         
        <!--toaster-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    </head>
    <body id="page-top">
        <!-- preloader -->
        <div class="preloader">
            <img src="{{ asset('userbackend/panel/assets/images/preloader.gif') }}" alt="">
        </div>
        <!-- wrapper -->
        <div class="wrapper">
         
           @include('user.header')
           
           @include('user.sidebar')

  
        <div class="content_wrapper">
                <!--middle content wrapper-->
            @yield('user')
        </div><!--/ content wrapper -->




        </div><!--/ wrapper -->


        
        <!-- jquery -->
        <script src="{{ asset('userbackend/panel/assets/js/jquery.min.js') }}"></script>
        <!-- popper Min Js -->
        <script src="{{ asset('userbackend/panel/assets/js/popper.min.js') }}"></script>
        <!-- Bootstrap Min Js -->
        <script src="{{ asset('userbackend/panel/assets/js/bootstrap.min.js') }}"></script>
        <!-- Fontawesome-->
        <script src="{{ asset('userbackend/panel/assets/js/all.min.js') }}"></script>
        <!-- metis menu -->
        <script src="{{ asset('userbackend/panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js') }}"></script>
        <script src="{{ asset('userbackend/panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js') }}"></script>
        <!-- nice scroll bar -->
        <script src="{{ asset('userbackend/panel/assets/plugins/scrollbar/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('userbackend/panel/assets/plugins/scrollbar/scroll.active.js') }}"></script>
        <!-- counter -->
        <script src="{{ asset('userbackend/panel/assets/plugins/counter/js/counter.js') }}"></script>
        <!-- chart -->
   <script src="{{ asset('userbackend/panel/assets/plugins/chartjs-bar-chart/Chart.min.js') }}"></script>
        <script src="{{ asset('userbackend/panel/assets/plugins/chartjs-bar-chart/chart.js') }}"></script>
        <!-- pie chart -->
        <script src="{{ asset('userbackend/panel/assets/plugins/pie_chart/chart.loader.js') }}"></script>
        <script src="{{ asset('userbackend/panel/assets/plugins/pie_chart/pie.active.js') }}"></script>
 
 
        <!-- Main js -->
        <script src="{{ asset('userbackend/panel/assets/js/main.js') }}"></script>

    <!-- Toster js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info')}}"
            switch(type){
                case 'info': 
                toastr.info("{{ Session::get('message') }}");
                break;

                case 'success': 
                toastr.success("{{ Session::get('message') }}");
                break;

                case 'warning': 
                toastr.warning("{{ Session::get('message') }}");
                break;

                case 'error': 
                toastr.error("{{ Session::get('message') }}");
                break;
            }
            @endif
        </script>


    </body>
</html>