@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Pembelian
			  	<div class="panel-title pull-right"><a href="{{ route('pembelian.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table" border="2">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>NIK</th>
					  <th>Nama Pembeli</th>
					  <th>Tanggal Membeli</th>
					  <th>Barang</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($a as $b)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $b->nik }}</td>
				    	<td><p>{{ $b->nama }}</p></td>
				    	<td><p>{{ $b->tanggal }}</p></td>
				    	<td><p>{{ $b->Barang->nama }}</p></td>
						<td>
							<a class="btn btn-warning" href="{{ route('pembelian.edit',$b->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('pembelian.show',$b->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('pembelian.destroy',$b->id) }}">
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