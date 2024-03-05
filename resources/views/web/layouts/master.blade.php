<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bánh ngọt ND's Bakery</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ '/style/web.css' }}" />
    <!-- Using Font Awesome from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&subset=vietnamese" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/css/lightgallery.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('/assets/web/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/web/css/owl.carousel.css') }}">
    @livewireStyles

</head>

<body>
    <div class="main-body ">
        @include('web.layouts.header')
        <main class="home">
            @yield('content')
        </main>
        @include('web.layouts.footer')
    </div>
    <script src="{{ asset('assets/web/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('livewire/index.js') }}"></script>
    <script src=" https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/js/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lg-thumbnail/1.1.0/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lg-fullscreen/1.1.0/lg-fullscreen.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    @livewireScripts
    <script>
        $('.list-slider-banner').owlCarousel({
            stagePadding: 50,
            loop: true,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".list-article-gallery").lightGallery({
                selector: '.light-link'
            });
        })
    </script>
    <script type="text/javascript">
        function initSliders() {
            $('.slider-all').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-one'
            });

            $('.slider-one').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                asNavFor: '.slider-all',
                dots: false,
                centerMode: true,
                focusOnSelect: true,
                prevArrow: '<div class="d-none"></div>',
                nextArrow: '<div class="d-none"></div'
            });
        }
    </script>
    <script>
        document.addEventListener("livewire:navigated", function() {
            initFlowbite();
        });
    </script>
    @stack('scripts')

</body>

</html>
