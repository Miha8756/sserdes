@extends('main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar p-4 bg-light rounded shadow-custom">
                <div class="profile text-center mb-4">
                    <h4>ID: {{ auth()->user()->id }}</h4>
                    <h5>{{ auth()->user()->name }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#good-deeds">Добрые дела</a></li>
                    <li class="list-group-item"><a href="#achievements">Достижения</a></li>
                    <li class="list-group-item"><a href="{{route('chat')}}">Чат</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="content p-4">
                <h2 id="good-deeds" class="mb-4">Добрые дела</h2>
                <div class="row mb-4">
                    @foreach($goodDeeds as $goodDeed)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-custom">
                            <img src="{{ asset('storage/'.$goodDeed->image) }}" class="card-img-top" alt="{{ $goodDeed->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $goodDeed->title }}</h5>
                                <p class="card-text">{{ $goodDeed->description }}</p>
                                <p class="card-text"><small class="text-muted">{{ $goodDeed->city }} - {{ $goodDeed->date_time }}</small></p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between">
                                <a href="{{ route('good_deeds.show', $goodDeed->id) }}" class="btn btn-info btn-sm">Просмотреть</a>
                                <a href="{{ route('good_deeds.edit', $goodDeed->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                                <form action="{{ route('good_deeds.destroy', $goodDeed->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('good_deeds.create') }}" class="btn btn-primary mb-4">Добавить Доброе Дело</a>

                <h2 id="achievements" class="mb-4">Достижения</h2>
                <div class="row mb-4">
                    @foreach($achievements as $achievement)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-custom">
                            <img src="{{ asset('storage/'.$achievement->image) }}" class="card-img-top" alt="{{ $achievement->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $achievement->title }}</h5>
                                <p class="card-text">{{ $achievement->description }}</p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between">
                                <a href="{{ route('achievements.show', $achievement->id) }}" class="btn btn-info btn-sm">Просмотреть</a>
                                <a href="{{ route('achievements.edit', $achievement->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                                <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('achievements.create') }}" class="btn btn-primary">Добавить Достижение</a>
            </div>
        </div>
    </div>
</div>
@endsection
