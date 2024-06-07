@extends('main')

@section('content')
<div class="container good-deed-details">
    <div class="row">
        <div class="col-12">
            <h1>{{ $goodDeed->title }}</h1>
            <img src="{{ asset('storage/' . $goodDeed->image) }}" alt="{{ $goodDeed->title }}">
            <p><i class="fas fa-map-marker-alt"></i> Город: {{ $goodDeed->city }}</p>
            <p><i class="fas fa-calendar-alt"></i> Дата: {{ $goodDeed->date_time }}</p>
            <p><i class="fas fa-clock"></i> Время: {{ $goodDeed->date_time }}</p>
            <p>{{ $goodDeed->description }}</p>
        </div>
    </div>
</div>
@endsection
