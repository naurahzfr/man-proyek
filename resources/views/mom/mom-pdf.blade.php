<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h2>Minutes of Meeting </h2>

@foreach ($data as $mom)
<table id="customers">
<?php $no = 1; ?>
<h5>Project : {{ $mom->jadwal->proyek->nama_project }} </h5>
<h5>Tanggal : {{ $mom->jadwal->start_date }} </h5>
<h5>Agenda : {{ $mom->jadwal->agenda }} </h5>
            <tr>
                <td>{{--{{ $mom->hasil_pembahasan }}--}} {!!$mom->hasil_pembahasan!!} </td>
            </tr>
@endforeach

</table>
</body>
</html>


