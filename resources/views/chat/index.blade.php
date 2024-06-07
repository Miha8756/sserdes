@extends('main')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <a href="{{ route('lk') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Список пользователей</h2>
            <ul class="list-group">
                @foreach($users as $user)
                <li class="list-group-item">
                    <a href="{{ route('chat.show', $user) }}">{{ $user->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
