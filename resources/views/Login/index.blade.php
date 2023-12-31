<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | E-LogBook</title>
	<link rel="icon" href="{{ asset('assets/AdminLTE/dist/img/e-booklogo.png')}}">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/icheck-boostrap/icheck-boostrap.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/adminlte.min.css')}}">
	<!-- Google Font : Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" background="assets/AdminLTE/dist/img/merah.jpg">
	
	
	<div class="login-box">
		<!--/.Login-Logo -->
		<div class="card">
			
			<div class="card-head" align="center">
			<a href="#">
				<img src="{{ asset('assets/AdminLTE/dist/img/azyra.png')}}" width="180px" height="160px" /><br>
				<font color="grey" size="6"> 
					<b>LOGIN</b>
				</font>
			</a>
			</div>
			<div class="card-body">				
				<form action="/login" method="post">
					@csrf 
					<div class="input-group mb-3">
						<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="name@example.com" id="email" autofocus required value="{{ old('email') }}">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
						@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="input-group mb-3">
						<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
						@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					
					<div class="row">
						<div class="col-12">
							<button class="w-100 btn-lg btn-success" type="submit">
							 	<b>Masuk</b>
							 </button>
						</div>
					</div>
					<br>
					<p class="card-subtitle" align="center">Baru Di Azyra?<span><a href="/register/" class="card-link"> Register</a></span></p>
				</form>
			</div>
		</div>
	</div>
	<!-- /.Login-box -->
	
	<!-- jQuery -->
	<script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets/AdminLTE/dist/js/adminlte.min.js')}}"></script>
	<!-- Alert -->
	<script src="{{ asset('assets/AdminLTE/plugins/alert.js')}}"></script>

	@include('sweetalert::alert')
</body>
</html>