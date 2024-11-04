<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>El Markettaro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-layout">
    <x-navbar />

    <div>

        {{ $slot }}

    </div>
    <x-footer />

    @foreach ($articles as $article)
        <div class="modal fade" id="exampleModal-{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row bg-success rowmodal">
                            <div class="col-12 p-0">
                                @if ($article->images->count() >= 0)
                                    <div id="carouselExampleDark-{{ $article->id }}"
                                        class="carousel carousel-dark slide h-100">
                                        <div class="carousel-indicators d-none">
                                            <button type="button"
                                                data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button"
                                                data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button"
                                                data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            <button type="button"
                                                data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                                data-bs-slide-to="3" aria-label="Slide 4"></button>
                                            <button type="button"
                                                data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                                data-bs-slide-to="4" aria-label="Slide 5"></button>
                                            <button type="button"
                                                data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                                data-bs-slide-to="5" aria-label="Slide 6"></button>


                                        </div>
                                        <div class="carousel-inner w-100">
                                            @forelse ($article->images as $key => $image)
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="carousel-item  @if ($loop->first) active @endif"
                                                    data-bs-interval="10000">
                                                    <img src="{{ $image->getUrl(300, 300) }}"
                                                        class=" d-block rounded shadow w-100" alt="...">
                                                </div>
                                            @empty
                                            @for ($i = 0; $i < 6; $i++)
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                    <div class="carousel-item @if ($i == 0) active @endif"
                                                        data-bs-interval="10000">
                                                        <img src="https://picsum.photos/30{{ $i }}?random"
                                                            class=" d-block rounded shadow w-100" alt="...">
                                                    </div>
                                                @endfor
                                            @endforelse
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="col-12 text-start pt-2 ps-1">
                            <small
                                class="d-inline-flex px-2 py-1 text-black">{{ __('ui.' . $article->category->name) }}</small>
                            <small
                                class="d-inline-flex px-2 py-1 text-black">{{ $article->user->name }}</small>
                            <small
                                class="d-inline-flex px-2 py-1 text-black">{{ $article->price }}€</small>
                            <h5 class="mt-3 text-center">{{__('ui.title')}}:</h5>
                            <p class="text-center fw-semibold">{{ $article->title }}</p>

                        </div>


                        <div class="row text-center">
                            <div class="col-12 text-start">
                                <h5 class="text-center">{{__('ui.description')}}:</h5>
                                <p class="text-center fst-italic">{{ $article->description }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>
