<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Bengkel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>SIBENG Company</h4>
		<h6>Laporan Data Bengkel dari Bulan {{ $bengkels->first()->created_at->format('F') }} s/d Bulan {{ $bengkels->last()->created_at->format('F') }}</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Bengkel</th>
				<th>Address</th>
				<th>Description</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($bengkels as $bengkel)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$bengkel->title}}</td>
				<td>{{$bengkel->address}}</td>
				<td>{{$bengkel->description}}</td>
				<td>{{$bengkel->latitude}}</td>
				<td>{{$bengkel->longitude}}</td>
				<td>{{$bengkel->created_at->format('h F Y')}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>