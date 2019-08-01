<!DOCTYPE html>
<html>
<head>
	<title>FORM PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
            <br/>
			<h4>Form Dompdf</h4>
		</center>
		<br/>
		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

		<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			UPLOAD FILE
		</button>

		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/upload/proses" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
						</div>
						<div class="modal-body">

							{{ csrf_field() }}

							<div class="form-group">
								<b>Nama File</b>
								<input type="text" class="form-control" name="name"></input>
							</div>

							<div class="form-group">
								<b>File</b><br/>
								<input type="file" name="file">
							</div>
						</form>		
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Upload</button>
						</div>
					</div>
				</form>
			</div>
		</div>

        <br/><br/>

		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>File</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($form as $f)
				<tr>
					<td width="5%">{{ $i++ }}</td>
					<td width="35%">{{$f->name}}</td>
					<td width="40%">{{$f->file}}</td>
                    <td width="30%">
                        <a href="/form/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
                        <a href="/form/hapus/{{$f->id}}" class="btn btn-danger" target="_blank">HAPUS</a>
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>