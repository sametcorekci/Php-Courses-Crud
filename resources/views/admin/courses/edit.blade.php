@extends('layouts.app')

@section('content')
<h1>Kursu Düzenle</h1>

<form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="title">Başlık:</label>
    <input type="text" id="title" name="title" value="{{ $course->title }}" placeholder="Başlık">

    <label for="description">Açıklama:</label>
    <textarea id="description" name="description" placeholder="Açıklama">{{ $course->description }}</textarea>

    <label for="image">Resim:</label>
    <input type="file" id="image" name="image">

    <button type="submit">Güncelle</button>
</form>
@endsection
