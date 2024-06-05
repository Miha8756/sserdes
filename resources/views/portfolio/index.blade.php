@extends('main')

@section('content')

    <section class="portfolio-page">

        @foreach ($portfolios as $key => $portfolio)
            <a href="{{route('portfolio-show', ['id' => $portfolio->id])}}" class="portfolio-item">
                @if ($portfolio->images)
                    @php
                        $img = json_decode($portfolio->images, true)[0];
                    @endphp
                    <img src="{{ asset('storage/'. $img) }}" class="" alt="Изображение">
                @endif
                <div class="name">
                    {{$portfolio->name}}
                </div>
            </a>
        @endforeach
    </section>

@endsection
