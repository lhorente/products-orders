@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<form action="{{ url('/products') }}" method="post">
			@csrf
			<input type="hidden" name="id" value="{{ $product->id }}">
			
			<div class="form-group">
				<label for="">SKU</label>
				<input type="text" class="form-control" id="" placeholder="SKU" name="sku" value="{{ $product->sku }}">
			</div>
			
			<div class="form-group">
				<label for="">Nome</label>
				<input type="text" class="form-control" id="" placeholder="Nome" name="name" value="{{ $product->name }}">
			</div>
			
			<div class="form-group">
				<label for="">Descrição</label>
				<textarea name="description" class="form-control" placeholder="Descrição">{{ $product->description }}</textarea>
			</div>

			<div class="form-group">
				<label for="">Preço</label>
				<input type="text" class="form-control input-price" id="" placeholder="Nome" name="price" value="{{ $product->price }}">
			</div>
			
			<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
</div>
@endsection