@extends('layout')

@section('main')

<h1>Invoice #{{ $id }}:</h1>
<table>
    <tr>
        <th>Quantity</th>
        <th>Item</th>
        <th>Cost</th>
        <th>Sub-Total</th>
        <th>Remove</th>
    </tr>
    @foreach($invoice as $lineItem)
	<tr>
		<td>{{ $lineItem->quantity }}</td>
        <td>{{ $lineItem->name }}</td>
        <td>{{ $lineItem->price }}</td>
        <td>{{ $lineItem->subtotal }}</td>
        <td><a class="delete" href="/invoice/{{ $id }}/deleteItem/{{ $lineItem->item_id }}">Remove</a></td>
	</tr>
	@endforeach
</table>
<br>
<div class="formwrap">
	<h3>Add Below:</h3>
	<form method="POST" action="{{ $id }}/addItem">
	
		{{-- CSRF TOKEN --}}
		<input type="hidden" value="{{ csrf_token() }}" name="_token">

		<label>Quantity:</label><br>
		<input type="number" name="quantity" style="width:60px" required><br>
		<label>Choose Item:</label><br>
		<select name="items" id="">
			@foreach($items as $item)
				<option value="{{ $item->id }}">{{ $item->name }}</option>
			@endforeach
		</select><br> <br>
		<button>Submit</button>
	</form><br>
</div>
<br>
<div><a class="delete" href="/invoice">Back</a></div>
@endsection
