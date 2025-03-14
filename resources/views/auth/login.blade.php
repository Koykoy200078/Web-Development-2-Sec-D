@extends('base')
@section('title', 'Login')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

@if(Session::has('fail'))
<div class="alert alert-danger" role="alert">
    {{ Session::get('fail') }}
</div>
@endif

<form action="{{ route('auth.login') }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
            <label for="stdEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stdPwd" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<a href="{{ route('auth.register') }}" class="btn btn-secondary mt-3">Register</a>