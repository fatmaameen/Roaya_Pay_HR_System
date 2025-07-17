<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="...." />
    <meta name="author" content="misara adel" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>
        @if (App::getLocale() == 'ar')
        {{ $setting->ar_title }}
    @else
        {{ $setting->en_title }}
    @endif

    </title>

    <link rel="shortcut icon" href="{{ asset('logo_image/' . $setting->logo) }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('assets/css/lib/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

  </head>
  <body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')



    <script src="{{ asset('assets/js/lib/jquery4.js') }}"></script>
    <script src="{{ asset('assets/js/lib/popper.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/lib/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
