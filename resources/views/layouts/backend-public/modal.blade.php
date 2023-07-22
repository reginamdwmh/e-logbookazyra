<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Ubah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    @if (!empty(Auth::user()))
                        @foreach ($users as $u)
                            @if ($u->id == Auth::user()->id)
                                <form method="post" action="{{ route('update_user') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $u->id }}">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" value="{{ $u->name }}"
                                            class="form-control" placeholder="Nama" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ $u->email }}"
                                            class="form-control" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="pass" name="password"
                                            required="">
                                        <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox">
                                        Lihat Password
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" placeholder="Alamat" required>{{ $u->alamat }}</textarea>
                                    </div>
                                    <div class="form-group d-none">
                                        <label>Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option>- Pilih -</option>
                                            @if ($u->role == 'admin')
                                                echo "<option value='admin' selected>admin</option>";
                                            @else
                                                echo "<option value='admin'>admin</option>";
                                            @endif
                                            @if ($u->role == 'user')
                                                echo "<option value='user' selected>user</option>";
                                            @else
                                                echo "<option value='public'>public</option>";
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update
                                            Data</button>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                    @endif
                </table>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update changes</button>
            </div> --}}
        </div>
    </div>
</div>
