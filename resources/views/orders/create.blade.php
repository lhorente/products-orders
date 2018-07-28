@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<form action="{{ url('/orders') }}" method="post">
			@csrf
			<div class="form-group">
				<label for="">Produto</label>
				<select name="product_id" class="form-control">
					<option value=""></option>
					@foreach($products as $product)
						<option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->sku }}: {{ $product->name }}</option>
					@endforeach
				</select>
			</div>
			
			<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
</div>
@endsection