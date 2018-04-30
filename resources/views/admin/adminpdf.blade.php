<html>
<head>
<meta charset="UTF-8">    
        <title>Report</title>
</head>
    <style>

    .test{
        border: 2px solid grey;
    }

        .table2{
            border-collapse: collapse;
            font-family: arial;
        }
        .td2{
            border: 2px solid;
            border-color: #d8d8d8;
        }

        .th2{
            font-family: calibri;
            border: 2px solid; border-color: #d8d8d8;
        }
        
    </style>
    
<body>
    @php 
        $i = 1; 
        $today = date("j F, Y.");
        $jam = date("g:i a");
    @endphp

<table class="test">
    <tr colspan="2">
        <td>Pertanggal : @php echo $today; @endphp</td>
        <td></td>
    </tr>

    <tr colspan="2">
        <td>Pukul : @php echo $jam;@endphp</td>
        <td></td>
    </tr>
</table>

    <br>
<h4>Yang Hadir</h4>
<table class="table2">
    <tr bgcolor="#d8d8d8">
        <th align="center" class="th2">No</th>
        <th align="center" class="th2">NIP</th>
        <th align="center" class="th2">Nama</th>
        <th align="center" class="th2">Jabatan</th>
        <th align="center" class="th2">Datang</th>
        <th align="center" class="th2">Hadir</th>
    </tr>
        @foreach($absen as $data)
        @if($data->hadir == 'datang' or 'pulang')
    <tr>
        <td align="center" class="td2">{{$i++}}</td>
        <td class="td2">{{$data->staff->nip}}</td>
        <td class="td2">{{$data->staff->nama}}</td>
        <td class="td2">{{$data->staff->jabatan}}</td>
        <td class="td2">{{$data->created_at}}</td>
        <td class="td2">{{$data->updated_at}}</td>
    </tr>
        @else
        @endif
        @endforeach        
</table>
<br>

<h4>Yang tidak hadir</h4>
<table class="table2">
    <tr bgcolor="#d8d8d8">
        <th align="center" class="th2">No</th>
        <th align="center" class="th2">NIP</th>
        <th align="center" class="th2">Nama</th>
        <th align="center" class="th2">Jabatan</th>
        <th align="center" class="th2">Keterangan</th>
    </tr>
        
        @foreach($absen as $data)
        @if($data->hadir == 'tidakhadir')
    <tr>
        <td align="center" class="td2">{{$i++}}</td>
        <td class="td2">{{$data->staff->nip}}</td>
        <td class="td2">{{$data->staff->nama}}</td>
        <td class="td2">{{$data->staff->jabatan}}</td>
        <td class="td2" align="justify">{!!html_entity_decode($data->keterangan)!!}</td>
    </tr>
        @else
        @endif
        @endforeach        
</table>


    
    </body>
    
</html>