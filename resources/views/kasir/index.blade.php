@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Kasir
			  	<div class="panel-title pull-right"><a href="{{ route('kasir.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>NIK</th>
					  <th>Nama</th>
					  <th>Alamat</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		
				  		@php $no = 1; @endphp
				  		@foreach($a as $kasir)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $kasir->nik }}</td>
				    	<td>{{ $kasir->nama }}</td>
				    	<td>{{ $kasir->alamat }}</td>
				    	
				    	
<td>
	<a class="btn btn-warning" href="{{ route('kasir.edit',$kasir->id) }}">Edit</a>
</td>
<td>
	<a href="{{ route('kasir.show',$kasir->id) }}" class="btn btn-success">Show</a>
</td>
<td>
	<form method="post" action="{{ route('kasir.destroy',$kasir->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection