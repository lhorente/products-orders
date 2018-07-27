@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<form action="{{ url('/products') }}" method="post">
			@csrf
			<div class="form-group">
				<label for="">SKU</label>
				<input type="text" class="form-control" id="" placeholder="SKU" name="sku">
			</div>
			
			<div class="form-group">
				<label for="">Nome</label>
				<input type="text" class="form-control" id="" placeholder="Nome" name="name">
			</div>
			
			<div class="form-group">
				<label for="">Descrição</label>
				<textarea name="description" class="form-control" placeholder="Descrição"></textarea>
			</div>

			<div class="form-group">
				<label for="">Preço</label>
				<input type="text" class="form-control input-price" id="" placeholder="Nome" name="price">
			</div>
			
			<button type="submit" class="btn btn-primary">Salvar</button>
		</form>
	</div>
</div>
@endsection