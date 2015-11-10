@extends('layout')

@section('main')
<h1>All Invoices</h1>

<table>
    <tr>
        <th>Invoice #</th>
        <th>Customer Name</th>
        <th>Total</th>
        <th>Creation Date</th>
        <th>Details</th>
    </tr>
    @foreach($invoices as $invoice)
    <tr>
        <td>{{ $invoice->id }}</td>
        <td><a href="customer/{{ $invoice->c_id }}">{{ $invoice->first_name }} {{ $invoice->last_name }}</a></td>
        <td>{{ $invoice->total }}</td>
        <td>{{ $invoice->created_at }}</td>
        <td><a href="invoice/{{ $invoice->id }}">Details</a></td>
    </tr>
    @endforeach
</table>
<br>
<div><div><a class="delete" href="/">Back Home</a></div></div>
@endsection