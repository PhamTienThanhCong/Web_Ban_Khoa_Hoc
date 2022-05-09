<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/user/main.css') }}">
    @yield('css')
</head>

<body>
    @include('partials.home.header')

    <div class="body">

        @include('partials.home.navbar')

        <div class="main">
            <img class="main-img" width="95%" height="350px"
                src="https://scontent.fhan2-2.fna.fbcdn.net/v/t1.15752-9/277114640_1666431013724170_5404558021918161449_n.png?_nc_cat=110&ccb=1-5&_nc_sid=ae9488&_nc_ohc=grUPfb2vV3UAX_V3vRE&_nc_ht=scontent.fhan2-2.fna&oh=03_AVKkfphCFlpUJkl163-OpncIR1jxWpcxRH-9zdaKaWkfxw&oe=628364ED"
                alt="">
            @yield('content')
        </div>
    </div>

    @include('partials.home.footer')
</body>
@yield('js')
</html>
