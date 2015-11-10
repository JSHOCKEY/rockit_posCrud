@extends('layout')

@section('main')
<h1>All Customers</h1>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Customer Since</th>
        <th>Edit</th>
    </tr>

    @foreach($customers as $c)
    <tr>
        <td><a href="customer/{{ $c->id }}">{{ $c->fullName() }}</a></td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->phone }}</td>
        <td>{{ $c->funkySinceDate() }}</td>
        <td><a class="edit" href="customer/{{ $c->id }}/edit">Edit</a></td>
    </tr>
    @endforeach

</table>
<br>
<div><a class="create" href="{{ URL::to('customer/new') }}">+ New Customer</a></div>
<br>
<div><div><a class="delete" href="/home">Back Home</a></div></div>
@endsection