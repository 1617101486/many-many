@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Barang 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('barang.update',$barang->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('kode') ? ' has-error' : '' }}">
			  			<label class="control-label">Kode Barang</label>	
			  			<input type="number" name="kode" class="form-control" value="{{ $barang->kode }}" required>
			  			@if ($errors->has('kode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kode') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<input type="text" value="{{ $barang->nama }}" name="nama" class="form-control"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('hargajual') ? ' has-error' : '' }}">
			  			<label class="control-label">Harga Jual</label>	
			  			<input type="number" name="hargajual" class="form-control" value="{{ $barang->hargajual }}" required>
			  			@if ($errors->has('hargajual'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hargajual') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('hargabeli') ? ' has-error' : '' }}">
			  			<label class="control-label">Harga Beli</label>	
			  			<input type="number" name="hargabeli" class="form-control" value="{{ $barang->hargabeli }}" required>
			  			@if ($errors->has('hargabeli'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hargabeli') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jumlah') ? ' has-error' : '' }}">
			  			<label class="control-label">Jumlah</label>	
			  			<input type="number" name="jumlah" class="form-control" value="{{ $barang->jumlah }}" required>
			  			@if ($errors->has('jumlah'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('id_penyalur') ? ' has-error' : '' }}">
			  			<label class="control-label">Penyalur</label>	
			  			<select name="id_penyalur" class="form-control">
			  				@foreach($penyalur as $data)
			  				<option value="{{ $data->id }}" {{ $selectedPenyalur == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_penyalur'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_penyalur') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection