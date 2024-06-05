<div class="main-slider-block">
    <div class="main-slider">
        {{-- <img src="{{asset('img/slide-1.jpg')}}" alt="">
        <img src="{{asset('img/slide-2.jpg')}}" alt=""> --}}

        @foreach ($slides as $key => $slide)
            <img src="{{ asset('storage/' . $slide->images) }}" class="" alt="Slide Image">
        @endforeach

    </div>
</div>
