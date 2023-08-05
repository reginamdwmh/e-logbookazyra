@extends('layouts.backend-admin.app')
@section('title')

@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fa fa-edit"></i>
                    Tambah Data Pengguna
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <form method="post" action="{{ route('simpanusers') }}">
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
                                <label>Password</label>
                                <input type="password" id="pass" name="password" class="form-control"
                                    placeholder="Password" required>
                                <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat
                                Password
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" id="konfirmasi_pass" name="konfirmasi_password" class="form-control"
                                    placeholder="Konfirmasi Password" required>
                                <input id="mybutton_konf" onclick="change_pass()" type="checkbox" class="form-checkbox"> Lihat
                                Konfirmasi Password
                                <small style="color: red; display: none;" id="beda_pass">Password tidak sama</small>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" name="no_hp" class="form-control" placeholder="No HP" required>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option>- Pilih -</option>
                                    <option>admin</option>
                                    <option>user</option>
                                    <option>public</option>
                                </select>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan
                                    Data</button>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </section>

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

@endsection
