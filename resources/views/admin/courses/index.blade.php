@extends('layouts.app')

@section('content')
<h1>Kurslar</h1>
<a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">Yeni Ekle</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Başlık</th>
            <th>Açıklama</th>
            <th>Resim</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->description }}</td>
            <td>
                @if($course->image)
                    <img src="{{ asset('storage/'.$course->image) }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Silinsin mi?')">Sil</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
