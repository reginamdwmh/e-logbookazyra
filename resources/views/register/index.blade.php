<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | E-LogBook</title>
    <link rel="icon" href="{{ asset('assets/AdminLTE/dist/img/e-booklogo.png') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/icheck-boostrap/icheck-boostrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/adminlte.min.css') }}">
    <!-- Google Font : Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" background="assets/AdminLTE/dist/img/merah.jpg">


    <div class="login-box">
        <!--/.Login-Logo -->
        <div class="card">

            <div class="card-head" align="center">
                <a href="#">
                    <font color="grey" size="6">
                        <b>Daftar</b>
                    </font>
                </a>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('simpanregis') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="number" name="nohp" class="form-control" placeholder="Nomor Handphone" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="pass" name="password" class="form-control"
                            placeholder="Password" required>
                        <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" id="konfirmasi_pass" name="konfirmasi_password" class="form-control"
                            placeholder="Konfirmasi Password">
                        <input id="mybutton_konf" onclick="change_pass()" type="checkbox" class="form-checkbox"> Lihat
                        Konfirmasi Password
                        <small style="color: red; display: none;" id="beda_pass">Password tidak sama</small>
                    </div>
                    <div class="form-group" style="display: none">
                        <label>Role</label>
                        <input type="text" name="role" class="form-control" placeholder="role" value="public">
                    </div>
                    <div class="form-group text-right">
                        <button class="w-100 btn-lg btn-success" id="daftar" type="submit" disabled><b>Daftar</b></button>
                    </div>
                    <p class="card-subtitle" align="center"><span><a href="/login/" class="card-link">Kembali</a></span>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <!-- /.Login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- Alert -->
    <script src="{{ asset('assets/AdminLTE/plugins/alert.js') }}"></script>

    <script type="text/javascript">
        function change() {
            var x = document.getElementById('pass').type;

            if (x == 'password') {
                document.getElementById('pass').type = 'text';
                document.getElementById('mybutton').innerHTML;
            } else {
                document.getElementById('pass').type = 'password';
                document.getElementById('mybutton').innerHTML;
            }
        }

        function change_pass() {
            var y = document.getElementById('konfirmasi_pass').type;

            if (y == 'password') {
                document.getElementById('konfirmasi_pass').type = 'text';
                document.getElementById('mybutton_konf').innerHTML;
            } else {
                document.getElementById('konfirmasi_pass').type = 'password';
                document.getElementById('mybutton_konf').innerHTML;
            }
        }

        document.getElementById('konfirmasi_pass').addEventListener('keyup', function() {
            var password = document.getElementById('pass').value;
            var konfirmasi_pass = document.getElementById('konfirmasi_pass').value;

            if (password != konfirmasi_pass) {
                document.getElementById('beda_pass').style.display = 'block';
				document.getElementById("daftar").disabled = true;
                document.getElementById('daftar').style.backgroundColor  = 'grey';
            } else {
				document.getElementById('beda_pass').style.display = 'none';
				document.getElementById("daftar").disabled = false;
                document.getElementById('daftar').style.backgroundColor  = '#28a745';
            }
        })
    </script>


    @include('sweetalert::alert')
</body>

</html>
