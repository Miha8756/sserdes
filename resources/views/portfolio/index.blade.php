@extends('main')

@section('content')

    <section class="portfolio-page">

        @foreach ($news as $key => $news)
            <a href="{{route('portfolio-show', ['id' => $news->id])}}" class="portfolio-item">
                @if ($news->images)
                    @php
                        $img = json_decode($news->images, true)[0];
                    @endphp
                    <img src="{{ asset('storage/'. $img) }}" class="" alt="Изображение">
                @endif
                <div class="name">
                    {{$news->name}}
                </div>
            </a>
        @endforeach
    </section>

@endsection
