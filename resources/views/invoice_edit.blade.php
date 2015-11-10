@extends('layout')

@section('main')
<h1>Edit Invoice</h1>

@if($errors->count() > 0)
<div class="errors">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form action="{{ URL::to('invoice') }}/{{$invoice->id}}/edit" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
    <div><span>Name:</span><input type="text" name="name" value=""></div>
    <div><span>Description: </span><input type="text" name="description" value=""></div>
    <div><span>Price: </span><input type="text" name="price" value=""></div>
    <div><button>Save</button></div>
</form>
<br>
<div><a class="delete" href="/invoice">Cancel</a></div>
@endsection