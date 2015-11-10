@extends('layout')

@section('main')

<h1>Create New Invoice</h1>

<form action="{{ URL::to('item/new') }}" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div><span>Name:</span><input type="text" name="name" value=""></div>
    <div><span>Description: </span><input type="text" name="description" value=""></div>
    <div><span>Price: </span><input type="text" name="price" value=""></div>
    <div><button>Save</button></div>
</form>
<br>
<div><a class="delete" href="/invoice">Cancel</a></div>
@endsection
