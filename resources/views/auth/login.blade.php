@extends('layouts.app')

@section('content')
<h1>Giriş Yap</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Şifre</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Giriş</button>
</form>

@if(session('error'))
    <div class="alert alert-danger mt-2">{{ session('error') }}</div>
@endif
@endsection
