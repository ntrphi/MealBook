<!DOCTYPE html>
<html>

<head>
    <title>HOME MEALBOOK</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{asset('')}}" target="_blank, _self, _parent, _top">

    @include('patials.frontend.bottom')

    @include('patials.frontend.script')

</head>
@include('patials.frontend.header')

<body>
    <div class="wrapper">

        @yield('content')
    </div>

</body>

</html>