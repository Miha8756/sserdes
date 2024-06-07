@extends('main')

@section('content')
<section class="banner">
    <div class="container">
        <h1 class="mb-4">Крупнейшая платформа для добрых дел</h1>
        <div class="button-group">
            <a href="#" class="banner-btn">Хочу помочь</a>
            <a href="#" class="banner-btn-2">Стать организатором</a>
        </div>
    </div>
</section>
<main class="main-content">
    <div class="container">
        <!-- Добрые дела -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Добрые дела рядом с вами</h2>
            </div>
        </div>
        <div class="row">
            @foreach($goodDeeds as $goodDeed)
            <a href="{{ route('good_deeds.show', $goodDeed->id) }}" class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$goodDeed->image) }}" class="card-img-top" alt="{{ $goodDeed->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $goodDeed->title }}</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> Город: {{ $goodDeed->city }}</p>
                        <p class="card-text"><i class="fas fa-calendar-alt"></i> Дата: {{ $goodDeed->date_time }}</p>
                        <p class="card-text"><i class="fas fa-clock"></i> Время: {{ $goodDeed->date_time }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Достижения -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Достижения</h2>
            </div>
        </div>
        <div class="row">
            @foreach($achievements as $achievement)
            <a href="{{ route('achievements.show', $achievement->id) }}" class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$achievement->image) }}" class="card-img-top" alt="{{ $achievement->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $achievement->title }}</h5>
                        <p class="card-text">{{ $achievement->description }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Новости -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Новости</h2>
            </div>
        </div>
        <div class="row">
            @foreach($news as $item)
            <a href="{{route('portfolio-show', ['id' => $item->id])}}" class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    @if ($item->images)
                    @php
                    $img = json_decode($item->images, true)[0];
                    @endphp
                    <img src="{{ asset('storage/'. $img) }}" class="" alt="Изображение">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">Описание новости.</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Тесты -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Тесты</h2>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">16 Personalities</h5>
                        <p class="card-text">Пройдите тест MBTI и узнайте свой тип личности.</p>
                        <a href="https://www.16personalities.com/ru" target="_blank" class="btn">Пройти тест</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Big Five Personality Test</h5>
                        <p class="card-text">Оцените свою личность по пяти основным чертам.</p>
                        <a href="https://www.truity.com/test/big-five-personality-test" target="_blank" class="btn">Пройти тест</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Enneagram Test</h5>
                        <p class="card-text">Узнайте свой эннеаграммный тип и лучше поймите себя.</p>
                        <a href="https://www.testometrika.com/personality-and-temper/enneagram/" target="_blank" class="btn">Пройти тест</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Psychology Today Tests</h5>
                        <p class="card-text">Пройдите разнообразные тесты от Psychology Today.</p>
                        <a href="https://www.psychologytoday.com/us/tests/personality" target="_blank" class="btn">Пройти тест</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Short Dark Triad (SD3) Test</h5>
                        <p class="card-text">Узнайте больше о тёмных чертах своей личности.</p>
                        <a href="https://openpsychometrics.org/tests/SD3/" target="_blank" class="btn">Пройти тест</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">DISC Personality Test</h5>
                        <p class="card-text">Определите свой тип личности по модели DISC.</p>
                        <a href="https://www.123test.com/disc-personality-test/" target="_blank" class="btn">Пройти тест</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Humanmetrics Jung Typology Test</h5>
                        <p class="card-text">Пройдите тест на основе теории Юнга и узнайте свой тип.</p>
                        <a href="https://www.humanmetrics.com/cgi-win/jtypes2.asp" target="_blank" class="btn">Пройти тест</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">The Color Personality Test</h5>
                        <p class="card-text">Определите свою личность по предпочтению цветов.</p>
                        <a href="https://www.verywellmind.com/the-color-personality-test-5183055" target="_blank" class="btn">Пройти тест</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
