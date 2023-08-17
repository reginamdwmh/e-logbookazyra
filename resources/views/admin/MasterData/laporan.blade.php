<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Data Barang</title>
</head>
    


 
<body>
    <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
        <img src="{{asset ('assets/AdminLTE/dist/img/azyra.png')}}" width="120px">
            </td>
            <td>
                <font style="font-size: 28px; margin-right: 120px;">AZYRA SNACK N FOOD</font> <br>
                <font style="margin-right: 120px;" size="2">Jl. Menatos Timur No.8 Banjarbaru Utara, Kalimantan Selatan 707114</font> <br>
            </td>
        </tr>
    </table>
    <hr class="my-4">
    <br>

    <div style="text-align: center;">
        <font size="5"><b>LAPORAN BARANG</b></font><br>
    </div>
       
    <br>
    <div class="w-50 float-left mt-10">
        @foreach ($users as $u)
            @if($u->id == Auth::user()->id)
            <font style="margin-right: 120px;" size="3">Staff / user : <span class="gray-color">{{ $u->name }}</span></font><br>
            @endif
        @endforeach
        
    </div>
    <div style="clear: both;"></div>
    <br>    
    <table border="1" cellspacing="0" width="100%">
        <thead style="background-color: #f5b2bb; text-align: center;">
        <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Stok</th>
                
            @php
                $total_akhir = 0;
                $no = 1;
            @endphp
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $t) 
            <tr>
                <td><center>{{$no++}}</center></td>
                <td><center>{{$t->created_at->format('d F Y')}}</center></td>    
                <td>{{$t->KD_BRG}}</td>
                <td><center>{{ $t->NM_BRG }}</center></td>
                <td><center>{{$t->JENIS}}</center></td>
                <td><center>{{ $t->STOK }}</center></td>
            </tr>
            @endforeach
           
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
