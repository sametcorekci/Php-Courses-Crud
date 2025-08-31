@extends('layouts.app')

@section('content')
<h1>Kurs Ekle</h1>

<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Başlık</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label>Açıklama</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Resim</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Kaydet</button>
</form>
@endsection
