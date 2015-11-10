@extends('layout')

@section('main')
<h1>Edit Item</h1>

@if($errors->count() > 0)
<div class="errors">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form action="{{ URL::to('item') }}/{{$item->id}}/edit" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
    <div><span>Name:</span><input type="text" name="name" value="{{ $item->name }}"></div>
    <div><span>Description: </span><input type="text" name="description" value="{{ $item->description }}"></div>
    <div><span>Price: </span><input type="text" name="price" value="{{ $item->price }}"></div>
    <div><button>Save</button></div>
</form>
<br>
<div><a class="delete" href="/item">Cancel</a></div>
@endsection