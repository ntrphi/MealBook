<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <base href="{{asset(' ')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include('patials.admin.head')
    @include('patials.admin.script')

</head>

<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        @include('patials.admin.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('patials.admin.sidebar')


        @yield('content')

    </div>
    <!-- ./wrapper -->
    @yield('script')

</body>

</html>