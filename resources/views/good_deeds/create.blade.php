@extends('main')

@section('content')
<br>
<br>
<div class="container">
    <h1>Создать доброе дело</h1>
    <form action="{{ route('good_deeds.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Город</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="mb-3">
            <label for="date_time" class="form-label">Дата и время</label>
            <input type="datetime-local" class="form-control" id="date_time" name="date_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
<br>
<br>

@endsection
