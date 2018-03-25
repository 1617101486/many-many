@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Post 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('faktur.update',$fkr->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('kode') ? ' has-error' : '' }}">
			  			<label class="control-label">Kode Faktur</label>	
			  			<input type="number" name="kode" class="form-control" value="{{ $fkr->kode }}" readonly>
			  			@if ($errors->has('kode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kode') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tanggal') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal</label>	
			  			<input type="text" value="{{ $fkr->tanggal }}" name="tanggal" class="form-control"  readonly>
			  			@if ($errors->has('tanggal'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('id_kasir') ? ' has-error' : '' }}">
			  			<label class="control-label">Kasir</label>
			  			<input type="text" value="{{ $fkr->Kasir->nama }}" name="id_kasir" class="form-control"  readonly>
			  			@if ($errors->has('id_kasir'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_kasir') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection