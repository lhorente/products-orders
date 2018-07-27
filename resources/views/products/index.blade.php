@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ url('/products/create') }}" class="btn btn-primary">Cadastrar produto</a>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
	@if($products)
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>SKU</th>
							<th>Nome</th>
							<th>Preço</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td>{{ $product->id }}</td>
							<td>{{ $product->sku }}</td>
							<td>{{ $product->name }}</td>
							<td>R$ {{ number_format($product->price,2,".",",") }}</td>
							<td><a href="{{ url('products/edit/'.$product->id) }}">Editar</a></td>
							<td><a href="{{ url('products/remove/'.$product->id) }}" onclick="return confirm('Tem certeza?')">Excluir</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-md-12">
				<div class="well">Nenhum produto cadastrado</div>
			</div>
		</div>
	@endif
	</div>
</div>
@endsection