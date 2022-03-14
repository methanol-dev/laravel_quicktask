<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ route('home') }}">{{ trans('home.home') }}</a>
                @else
                    <a href="{{ route('login') }}">{{ trans('home.login') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ trans('home.register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
        </div>
    </div>
</body>

</html>
