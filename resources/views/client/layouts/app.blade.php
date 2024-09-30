<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Phê Game</title>

        <!--+++++++++++++ CSS THEME ++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />
        <link
            rel="stylesheet"
            href="{{asset('client-site/assets/owlcarousel/assets/owl.carousel.min.css')}}"
        />
        <link rel="stylesheet" href="{{asset('client-site/style.css')}}" />
        <!--+++++++++++++ JS THEME ++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <link rel="stylesheet" href="{{asset('custom/custom.css')}}">
        <!-- JQuery -->
        <script src="{{asset('client-site/assets/vendors/jquery.min.js')}}"></script>
    </head>

    <body class="mainBody-theme mainBody-mbcart template-index">
        <div
            class="mainBody-theme-container mainBody-modalshow layoutProduct_scroll"
        >
            <!-- Header -->
            @include('client.layouts.header')
            <!-- End Header -->

            <!-- Main -->
            @yield('content')
            <!-- End Main -->

            <!-- Footer -->
            @include('client.layouts.footer')
            <!-- End Footer -->
        </div>
        {{-- Slide owl carousel --}}
        <script src="{{asset('client-site/assets/owlcarousel/owl.carousel.js')}}"></script>
    
       {{-- icon phone --}}
        <script>
            $('.search-header').click(function(){
            $('.search-header-action').removeClass('hidden');
        })
        $('#inputSearchAuto').on('keyup change paste propertychange', function() {
            if($(this).val() != ''){
                $(this).parents('.search-header-action').addClass('js-is-field');
            }
            else{
                $(this).parents('.search-header-action').removeClass('js-is-field');
            }
        })
        $('.btn-close-search').click(function(){
            $('#inputSearchAuto').val('');
            $('.search-header-action').addClass('hidden');
            $(this).parents('.search-header-action').removeClass('js-is-field');
        })
        </script>

        @yield('customJs')
    </body>
</html>
