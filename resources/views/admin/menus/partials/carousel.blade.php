<div id="image-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($menu->images as $image)
            <li
                data-target="#image-carousel"
                data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}"
            ></li>
        @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach ($menu->images as $image)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ url($image->url) }}" class="d-block w-100" alt="">
            </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#image-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#image-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
