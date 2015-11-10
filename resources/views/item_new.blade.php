@extends('layout')

@section('main')
<h1>Create Item</h1>


@if($errors->count() > 0)
<div class="errors">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form action="{{ URL::to('item/new') }}" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div><span>Name:</span><input type="text" name="name" value="{{ old('name') }}"></div>
    <div><span>Description: </span><input type="text" name="description" value="{{ old('description') }}"></div>
    <div><span>Price: </span><input type="text" name="price" value="{{ old('price') }}"></div>
    <div><button>Save</button></div>
</form>
<br>
<div><a class="delete" href="/item">Cancel</a></div>
@endsection
