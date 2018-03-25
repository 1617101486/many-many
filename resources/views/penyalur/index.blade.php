@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Penyalur
			  	<div class="panel-title pull-right"><a href="{{ route('penyalur.create') }}">Tambah</a>
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
				  		@foreach($a as $penyalur)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $penyalur->nik }}</td>
				    	<td>{{ $penyalur->nama }}</td>
				    	<td>{{ $penyalur->alamat }}</td>
				    	
				    	
<td>
	<a class="btn btn-warning" href="{{ route('penyalur.edit',$penyalur->id) }}">Edit</a>
</td>
<td>
	<a href="{{ route('penyalur.show',$penyalur->id) }}" class="btn btn-success">Show</a>
</td>
<td>
	<form method="post" action="{{ route('penyalur.destroy',$penyalur->id) }}">
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