@extends('main')

@section('content')
    <br>
    <br>
<div class="container">
    <h1>Редактировать достижение</h1>
    <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $achievement->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{{ $achievement->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($achievement->image)
                <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}" class="img-thumbnail mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
<br>

@endsection
