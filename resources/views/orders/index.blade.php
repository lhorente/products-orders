@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ url('/orders/create') }}" class="btn btn-primary">Novo pedido</a>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
	@if($orders)
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Data</th>
							<th>Total</th>
							<th>Produto</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td>{{ $order->id }}</td>
							<td>{{ $order->created_at }}</td>
							<td>{{ number_format($order->total,2,",",".") }}</td>
							<td>{{ $order->product->sku }}: {{ $order->product->name }}</td>
							<td><a href="{{ url('orders/remove/'.$order->id) }}" onclick="return confirm('Tem certeza?')">Excluir</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-md-12">
				<div class="well">Nenhum pedido cadastrado</div>
			</div>
		</div>
	@endif
	</div>
</div>
@endsection