@extends('main')

@section('content')

<div class="container good-deed-details">
    <div class="row">
        <div class="col-12">
            <h1>{{$news->name}}</h1>
            <p>{{ $news->description }}</p>

            @foreach(json_decode($news->images) as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="Изображение">
            @endforeach
        </div>
    </div>
</div>
@endsection
