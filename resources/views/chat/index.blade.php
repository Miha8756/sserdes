@extends('main')

@section('content')
    <br>
    <br>
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
                    @if($admin)
                        <li class="list-group-item list-group-item-warning">
                            <a href="{{ route('chat.show', $admin) }}">Поддержка: {{ $admin->name }}</a>
                        </li>
                    @endif
                    @foreach($users as $user)
                        <li class="list-group-item">
                            <a href="{{ route('chat.show', $user) }}">{{ $user->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <br>
@endsection
