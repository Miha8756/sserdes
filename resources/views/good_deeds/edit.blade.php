@extends('main')

@section('content')
<div class="container">
    <h1>Редактировать доброе дело</h1>
    <form action="{{ route('good_deeds.update', $goodDeed->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="image" name="image">
            <small>Текущее изображение: <img src="{{ asset('storage/'.$goodDeed->image) }}" alt="{{ $goodDeed->title }}" style="max-height: 100px;"></small>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $goodDeed->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $goodDeed->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Город</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $goodDeed->city }}" required>
        </div>
        <div class="mb-3">
            <label for="date_time" class="form-label">Дата и время</label>
            <input type="datetime-local" class="form-control" id="date_time" name="date_time" value="{{ $goodDeed->date_time }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
