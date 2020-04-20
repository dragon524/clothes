<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Real Estate') }}</title>

    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome-free-5.13.0-web/css/all.css') }}">    
    <!-- scrollchat -->
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <!-- <link rel="stylesheet" href="{{ URL::asset('assets/css/3.4.1.bootstrap.min.css') }}">     -->
    <link rel="stylesheet" href="{{ URL::asset('assets/assets/css/bootstrap-responsive.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/ionicons.min.css') }}">    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <!-- add styles -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/check.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/new.css') }}">
    <!-- <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-image-checkbox.css') }}"> -->

<!--
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link href="{{ asset('frontend/css/materialize.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style type="text/css">
        .btn, .btn-large, .btn-small, .btn-flat{
            text-transform: capitalize;
        }
    </style>
-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet">
    @yield('styles')

    
</head>

    <body>
        
        {{-- MAIN NAVIGATION BAR --}}
        @include('frontend.partials.navbar')

        {{-- SLIDER SECTION --}}
        @if(Request::is('/'))
            @include('frontend.partials.slider')
        @endif

        
        {{-- MAIN CONTENT --}}
        <div class="main">
            @yield('content')
        </div>

        {{-- FOOTER --}}
        @include('frontend.partials.footer')

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/aos.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scrollax.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/google-map.js') }}"></script>

    <script src="{{ URL::asset('assets/js/main.js') }}"></script>
    <!-- scrolls -->
    <script src="{{ URL::asset('assets/assets/js/util.js') }}"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="{{ URL::asset('assets/assets/js/swipe-content.js') }}"></script> <!-- A Vanilla JavaScript plugin to detect touch interactions -->
    <script src="{{ URL::asset('assets/assets/js/main.js') }}"></script>


<!--
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/materialize.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="{{asset('frontend/js/gijgo.js')}}" type="text/javascript"></script>
    
-->
    {!! Toastr::message() !!}
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButtor: true,
                    progressBar: true 
                });
            @endforeach
        @endif
    </script>

    @yield('scripts')

    <script>
        $(document).ready(function(){

            $('.modal').modal();

            var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
            $('#startDate').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                minDate: today,
                maxDate: function () {
                    return $('#endDate').val();
                }
            });
            $('#endDate').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                minDate: function () {
                    return $('#startDate').val();
                }
            });

            $('.materialboxed').materialbox();
            
            $('.sidenav').sidenav();

            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true,
            });

            $('.carousel.testimonials').carousel({
                indicators: true,
            });

            var city_list =<?php echo json_encode($citylist);?>;
            $('input.autocomplete').autocomplete({
                data: city_list
            });

            $(".dropdown-trigger").dropdown({
                top: '65px'
            });

            $('.tooltipped').tooltip();

        });
    </script>

    </body>
  </html>