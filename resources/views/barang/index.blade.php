@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Barang
			  	<div class="panel-title pull-right"><a href="{{ route('barang.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table" border="2">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Kode Barang</th>
					  <th>Nama Barang</th>
					  <th>Harga Jual</th>
					  <th>Harga Beli</th>
					  <th>Jumlah</th>
					  <th>Penyalur</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($a as $barang)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $barang->kode }}</td>
				    	<td><p>{{ $barang->nama }}</p></td>
				    	<td><p>Rp.{{ $barang->hargajual }},00/buah</p></td>
				    	<td><p>Rp.{{ $barang->hargabeli }},00/buah</p></td>
				    	<td><p>{{ $barang->jumlah }}</p></td>
				    	<td><p>{{ $barang->Penyalur->nama }}</p></td>
						<td>
							<a class="btn btn-warning" href="{{ route('barang.edit',$barang->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('barang.show',$barang->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('barang.destroy',$barang->id) }}">
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