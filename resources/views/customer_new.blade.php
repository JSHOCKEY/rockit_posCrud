@extends('layout')

@section('main')
<h1>Create Customer</h1>

{{-- {{ print_r($errors->all()) }} --}}

@if($errors->count() > 0)
<div class="errors">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

<form action="{{ URL::to('customer/new') }}" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div><span>FirstName:</span><input type="text" name="first_name" value="{{ old('first_name') }}"></div>
    <div><span>LastName:</span><input type="text" name="last_name" value="{{ old('last_name') }}"></div>
    <div><span>Email: </span><input type="text" name="email" value="{{ old('email') }}"></div>
    <div><span>Phone: </span><input type="text" name="phone" value="{{ old('phone') }}"></div>
    <div><span>Gender: </span><input type="text" name="gender" value="{{ old('gender') }}"></div>
    <div><button>Save</button></div>

</form>
@endsection