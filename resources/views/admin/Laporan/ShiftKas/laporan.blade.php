<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Shift Kas</title>
</head>



<body>
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img src="{{ asset('assets/AdminLTE/dist/img/azyra.png') }}" width="120px">
            </td>
            <td>
                <font style="font-size: 28px; margin-right: 120px;">AZYRA SNACK N FOOD</font> <br>
                <font style="margin-right: 120px;" size="2">Jl. Menatos Timur No.8 Banjarbaru Utara, Kalimantan
                    Selatan 707114</font> <br>
            </td>
        </tr>
    </table>
    <hr class="my-4">
    <br>

    <div style="text-align: center;">
        <font size="5"><b>LAPORAN DATA SHIFT KAS</b></font><br>
    </div>

    <br>
    <div class="w-50 float-left mt-10">
        @foreach ($users as $u)
            @if ($u->id == Auth::user()->id)
                <font style="margin-right: 120px;" size="3">Staff / user : <span
                        class="gray-color">{{ $u->name }}</span></font><br>
            @endif
        @endforeach
        <font style="margin-right: 120px;" size="3">Tanggal Cut Off :
            {{ tanggal_indo(date('d-m-Y', strtotime($tglawal))) }} s/d
            {{ tanggal_indo(date('d-m-Y', strtotime($tglakhir))) }} <span class="gray-color"></span></font><br>
    </div>
    <div style="clear: both;"></div>
    <br>
    <table border="1" cellspacing="0" width="100%">
        <thead style="background-color: #f5b2bb; text-align: center;">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>User</th>
                <th>Status</th>
                <th>Jumlah</th>

                @php
                    $total_akhir = 0;
                    $no = 1;
                @endphp
            </tr>
        </thead>
        <tbody>
            @foreach ($tanggal as $key => $sk)
                <tr>
                    <td>
                        <center>{{ $no++ }}</center>
                    </td>
                    <td>{{ tanggal_indo(date('d-m-Y', strtotime($sk->created_at))) }}&nbsp;{{ date('H:i', strtotime($sk->created_at)) }}
                    </td>
                    @foreach ($users as $u)
                        @if ($u->id == $sk->id_user)
                            <td>{{ $u->name }}</td>
                        @endif
                    @endforeach
                    <td>
                        @if ($sk->kode_status == '1')
                            <center>Awal Shift</center>
                        @else
                            <center>Akhir Shift</center>
                        @endif
                    </td>
                    <td align="right">
                        @currency($sk->kas)
                    </td>
                </tr>
            @endforeach
            @php
                $total_akhir = $tanggal[$key]->kas + $tanggal[$key]->kas_update;
            @endphp
            <tr>

                <td colspan="4">
                    <center>Total Keseluruhan</center>
                </td>
                <td align="right">@currency($total_akhir)</td>

            </tr>
        </tbody>
    </table>
    <br><br>

    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px;">
        <label>
            <br>
            <p style="text-align: left;">

                <center>PEMILIK</center>

            </p>
            <br><br><br>
            <p style="text-align: center;">
                <b></b><br>
                Siti Maisyarah, S.E<br>

            </p>
        </label>
    </div>

</body>

</html>
