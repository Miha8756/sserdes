@extends('main')

@section('content')
<section class="banner d-flex align-items-center justify-content-center text-center text-white">
    <div class="container">
        <h1 class="mb-4">Крупнейшая платформа для добрых дел</h1>
        <div class="d-flex justify-content-center">
            <a href="#" class="banner-btn">Хочу помочь</a>
            <a href="#" class="banner-btn-2">Стать организатором</a>
        </div>
    </div>
</section>
<main class="">
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <h2>Добрые дела рядом с вами</h2>
            </div>
        </div>
        <div class="row">
            @foreach($goodDeeds as $goodDeed)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$goodDeed->image) }}" class="card-img-top" alt="{{ $goodDeed->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $goodDeed->title }}</h5>
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> Город: {{ $goodDeed->city }}</p>
                        <p class="card-text"><i class="fas fa-calendar-alt"></i> Дата: {{ $goodDeed->date_time }}</p>
                        <p class="card-text"><i class="fas fa-clock"></i> Время: {{ $goodDeed->date_time }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Новости</h2>
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

        <div class="">
            <div class="row text-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="icon mb-3">
                        <i class="fas fa-hands-helping fa-3x"></i>
                    </div>
                    <h3>Добрые дела</h3>
                    <p>Мы объединяем людей, чтобы совершать добрые дела и делать наш мир лучше.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="icon mb-3">
                        <i class="fas fa-newspaper fa-3x"></i>
                    </div>
                    <h3>Новости</h3>
                    <p>Следите за последними новостями и событиями в нашем сообществе.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="icon mb-3">
                        <i class="fas fa-trophy fa-3x"></i>
                    </div>
                    <h3>Достижения</h3>
                    <p>Ознакомьтесь с нашими достижениями и успехами на пути к лучшему будущему.</p>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card h-100">
                        <img src="./assets/600x300.png" class="card-img-top" alt="Большая новость">
                        <div class="card-body">
                            <h5 class="card-title">Большая Новость</h5>
                            <p class="card-text">Это описание самой большой новости. Здесь можно разместить краткое содержание события.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="card h-100">
                        <img src="./assets/300x300.png" class="card-img-top" alt="Средняя новость">
                        <div class="card-body">
                            <h5 class="card-title">Средняя Новость</h5>
                            <p class="card-text">Описание средней новости. Краткое содержание для быстрого ознакомления.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card h-100">
                                <img src="./assets/300x150.png" class="card-img-top" alt="Маленькая новость 1">
                                <div class="card-body">
                                    <h5 class="card-title">Маленькая Новость 1</h5>
                                    <p class="card-text">Краткое описание маленькой новости 1.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card h-100">
                                <img src="./assets/300x150.png" class="card-img-top" alt="Маленькая новость 2">
                                <div class="card-body">
                                    <h5 class="card-title">Маленькая Новость 2</h5>
                                    <p class="card-text">Краткое описание маленькой новости 2.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="col-12">
                    <h2>Тесты</h2>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">16 Personalities</h5>
                            <p class="card-text">Пройдите тест MBTI и узнайте свой тип личности.</p>
                            <a href="https://www.16personalities.com/ru" target="_blank" class="btn btn-primary">Пройти тест</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Big Five Personality Test</h5>
                            <p class="card-text">Оцените свою личность по пяти основным чертам.</p>
                            <a href="https://www.truity.com/test/big-five-personality-test" target="_blank" class="btn btn-primary">Пройти тест</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Enneagram Test</h5>
                            <p class="card-text">Узнайте свой эннеаграммный тип и лучше поймите себя.</p>
                            <a href="https://www.testometrika.com/personality-and-temper/enneagram/" target="_blank" class="btn btn-primary">Пройти тест</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Psychology Today Tests</h5>
                            <p class="card-text">Пройдите разнообразные тесты от Psychology Today.</p>
                            <a href="https://www.psychologytoday.com/us/tests/personality" target="_blank" class="btn btn-primary">Пройти тест</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Short Dark Triad (SD3) Test</h5>
                            <p class="card-text">Узнайте больше о тёмных чертах своей личности.</p>
                            <a href="https://openpsychometrics.org/tests/SD3/" target="_blank" class="btn btn-primary">Пройти тест</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">DISC Personality Test</h5>
                            <p class="card-text">Определите свой тип личности по модели DISC.</p>
                            <a href="https://www.123test.com/disc-personality-test/" target="_blank" class="btn btn-primary">Пройти тест</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Humanmetrics Jung Typology Test</h5>
                            <p class="card-text">Пройдите тест на основе теории Юнга и узнайте свой тип.</p>
                            <a href="https://www.humanmetrics.com/cgi-win/jtypes2.asp" target="_blank" class="btn btn-primary">Пройти тест</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">The Color Personality Test</h5>
                            <p class="card-text">Определите свою личность по предпочтению цветов.</p>
                            <a href="https://www.verywellmind.com/the-color-personality-test-5183055" target="_blank" class="btn btn-primary">Пройти тест</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
