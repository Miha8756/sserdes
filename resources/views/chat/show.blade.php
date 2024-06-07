@extends('main')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <a href="{{ route('chat') }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Чат с {{ $user->name }}</h2>
            <div class="chat-box mb-4 p-4 bg-white rounded shadow-custom">
                @foreach($messages as $message)
                <div class="message mb-3">
                    <strong>{{ $message->sender->name }}</strong>: {{ $message->message }}
                    <div class="text-muted"><small>{{ $message->created_at->format('H:i, d M Y') }}</small></div>
                </div>
                @endforeach
            </div>
            <form action="{{ route('chat.send', $user) }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Введите сообщение" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
