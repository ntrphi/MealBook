<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MealBook | Log in</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="admin/plugins/iCheck/square/blue.css">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="admin/home"><b>MealBook</b> Login</a>
		</div>

		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your manager</p>

			<form action="login" method="post">
				{{ csrf_field()}}
				@if ($errors->has('errlogin'))
				<div class="alert alert-danger">
					{{ $errors->first('errlogin')}}
				</div>
				@endif
				<div class="form-group has-feedback">

					<input type="text" class="form-control" name="email" placeholder="Email">

					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				@if( $errors->has('email') )
				<p class="text-warning">{{ $errors->first('email')}}</p>
				@endif
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password">

					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				@if( $errors->has('password') )
				<p class="text-warning">{{ $errors->first('password')}}</p>
				@endif
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox"> Remember Me
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<a href="/sign-in">Register as a new member </a><br>

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="admin/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function() {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' /* optional */
			});
		});
	</script>
</body>

</html>