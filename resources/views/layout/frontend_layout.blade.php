<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{asset('')}}" target="_blank, _self, _parent, _top">
    @include('patials.admin.head')
    @include('patials.frontend.bottom')
    <title>HOME MEALBOOK</title>
</head>
@include('patials.frontend.header')
<body>
<div class="wrapper">
  
    @yield('content')
</div>
@include('patials.admin.script')

</body>
</html>