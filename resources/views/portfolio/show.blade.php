@extends('main')

@section('content')

    <section class="portfolio-show">
        <a class="back-link" href="{{Route('portfolio')}}">Назад</a>
        <div class="title">
            {{$portfolio->name}}
        </div>
        <div class="portfolio-wrapper">
            @foreach(json_decode($portfolio->images) as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="Изображение">
            @endforeach
        </div>
    </section>

@endsection
