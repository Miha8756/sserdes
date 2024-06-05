@extends('main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar p-4 bg-light">
                <div class="profile text-center">
                    {{-- <img src="{{ asset('storage/'.auth()->user()->profile_image) }}" class="rounded-circle mb-3" alt="Профиль"> --}}
                    <h4>ID: {{ auth()->user()->id }}</h4>
                    <h5>{{ auth()->user()->name }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="content p-4">
                <h2>Добрые дела</h2>
                <div class="row mb-4">
                    @foreach($goodDeeds as $goodDeed)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset('storage/'.$goodDeed->image) }}" class="card-img-top" alt="{{ $goodDeed->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $goodDeed->title }}</h5>
                                <p class="card-text">{{ $goodDeed->description }}</p>
                                <p class="card-text"><small class="text-muted">{{ $goodDeed->city }} - {{ $goodDeed->date_time }}</small></p>
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
                <a href="{{ route('good_deeds.create') }}" class="btn btn-primary">Добавить</a>
            </div>
        </div>
    </div>
</div>
@endsection
