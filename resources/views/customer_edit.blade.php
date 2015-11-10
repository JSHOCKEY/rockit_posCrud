@extends('layout')

@section('main')
<h1>Edit Customer</h1>

@if($errors->count() > 0)
<div class="errors">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form action="{{ URL::to('customer') }}/{{$customer->id}}/edit" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
    <div><span>FirstName:</span><input type="text" name="first_name" value="{{ $customer->first_name }}"></div>
    <div><span>LastName:</span><input type="text" name="last_name" value="{{ $customer->last_name }}"></div>
    <div><span>Email: </span><input type="text" name="email" value="{{ $customer->email }}"></div>
    <div><span>Phone: </span><input type="text" name="phone" value="{{ $customer->phone }}"></div>
    <div><span>Gender: </span><input type="text" name="gender" value="{{ $customer->gender }}"></div>

    <div><button>Save</button></div>
</form>
<br>
<div><a class="delete" href="/customer">Cancel</a></div>
@endsection