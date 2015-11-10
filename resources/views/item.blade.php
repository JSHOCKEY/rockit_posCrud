@extends('layout')

@section('main')
{{-- {{ print_r($item) }} --}}
<h1>Item: {{ $item->id }}</h1>
<div><span>Name:</span><span>{{ $item->name }}</span></div>
<div><span>Description: </span><span>{{ $item->description }}</span></div>
<div><span>Price: </span><span>${{ $item->price }}</span></div>
<div><a class="edit" href="{{ URL::to('item') }}/{{ $item->id  }}/edit">Edit</a></div>
<br>
<div><a href="/item">Back</a></div>
@endsection
