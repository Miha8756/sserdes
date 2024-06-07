@extends('main')

@section('content')
<div class="container achievement-details">
    <div class="row">
        <div class="col-12">
            <h1>{{ $achievement->title }}</h1>
            @if($achievement->image)
                <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}">
            @endif
            <p>{{ $achievement->description }}</p>
        </div>
    </div>
</div>
@endsection
