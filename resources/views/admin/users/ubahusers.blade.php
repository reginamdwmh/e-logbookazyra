@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Pengguna
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($users as $u)
              <form method="post" action="{{route('updateusers')}}">
                @csrf
                <input type="hidden" name="id" value="{{$u->id}}">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="name" value="{{$u->name}}" class="form-control" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" value="{{$u->email}}" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="pass" name="password" value="{{$u->password}}" required="">
                  <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
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
                  <textarea name="alamat" class="form-control" placeholder="Alamat" required>{{ $u->alamat }}</textarea>
              </div>
              <div class="form-group">
                <label>No HP</label>
                <input type="number" name="no_hp" class="form-control" placeholder="No HP" required value="{{ $u->no_hp }}">
              </div>
                <div class="form-group">
                  <label>Role</label>
                  <select name="role" id="role" class="form-control">
                    <option>- Pilih -</option>                 
                    @if( $u->role == "admin") echo "<option value='admin' selected>admin</option>";
                    @else echo "<option value='admin'>admin</option>";
                    @endif
                    @if( $u->role == "user") echo "<option value='user' selected>user</option>";
                    @else echo "<option value='user'>user</option>";
                    @endif
                    @if( $u->role == "public") echo "<option value='public' selected>public</option>";
                    @else echo "<option value='public'>public</option>";
                    @endif
                  </select>
                </div>
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Data</button>
                </div>
              </form>
            @endforeach
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

