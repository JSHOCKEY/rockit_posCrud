@extends('layout')

@section('main')
<h1>{{ $customer->fullName() }}'s Invoices</h1>

<table>
    <tr>
        <th>Invoice #</th>
        <th>Creation Date</th>
        <th>Total</th>
    </tr>
    @foreach($invoices as $invoice)
    <tr>
        <td><a href="/invoice/{{ $invoice->id }}">{{ $invoice->id }}</a></td>
        <td>{{ $invoice->created_at }}</td>
        <td>{{ $invoice->total }}</td>
    </tr>
    @endforeach
</table>
<br>
<div><a class="create" href="{{ URL::to('/customer/' . $customer->id . '/invoices/new') }}">+ Create New Invoice</a></div>
<br>
<div><div><a class="delete" href="/customer">Back</a></div></div>
@endsection