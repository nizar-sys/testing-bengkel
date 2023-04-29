<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data User</title>
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
		<h6>Laporan Data User dari Bulan {{ $users->first()->created_at->format('F') }} s/d Bulan {{ $users->last()->created_at->format('F') }}</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Email</th>
				<th>Roles</th>
				<th>Tanggal akun dibuat</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($users as $user)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->username}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->roles}}</td>
				<td>{{$user->created_at->format('h F Y')}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>