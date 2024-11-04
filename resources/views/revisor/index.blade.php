<x-layout>

    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 ">
                <div class="rounded">
                    <h1 class="mt-5 p-5 pb-5 text-center display-4 fst-italic text-uppercase">Revisor Dashboard</h1>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-3">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('notSuccess'))
                            <div class="alert alert-success">
                                {{ session('notSuccess') }}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>


        @if ($article_to_check)
            <div class="row justify-content-around">
                <div class="col-10 col-md-6">
                    @if ($article_to_check->images->count() > 0)
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($article_to_check->images as $key => $image)
                                    <div id="{{ $image->id . 'image' }}"
                                        class="carousel-item carouselrevisor3 @if ($key == 0) active @endif">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-6 text-center">
                                                <img src="{{ $image ? $image->getUrl(300, 300) : 'https://picsum.photos/300' }}"
                                                    class="img-fluid" alt="...">
                                            </div>
                                            {{-- DEVE ANDARE QUI --}}
                                            {{-- <div class="col-12 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="text-black">Labels</h5>
                                                        @if ($article_to_check->images->count() > 0)
                                                            @foreach ($image->labels as $label)
                                                                <small
                                                                    class="text-black p-1">{{ $label }}</small>
                                                            @endforeach
                                                        @else
                                                            <p class="fst-italic text-danger">No labels</p>
                                                        @endif
                                                    </div>

                                                    <div class="card-body">
                                                        <h5 class="mt-2 text-black">Ratings</h5>
                                                        <ul class="list-unstyled">
                                                            <li class="row">
                                                                <div class="col-2 text-center">
                                                                    <span class="mx-auto {{ $image->adult }}"></span>
                                                                </div>
                                                                <div class="col-10">Adult</div>
                                                            </li>
                                                            <li class="row">
                                                                <div class="col-2 text-center">
                                                                    <span class="mx-auto {{ $image->medical }}"></span>
                                                                </div>
                                                                <div class="col-10">Medical</div>
                                                            </li>
                                                            <li class="row">
                                                                <div class="col-2 text-center">
                                                                    <span class="mx-auto {{ $image->racy }}"></span>
                                                                </div>
                                                                <div class="col-10">Racy</div>
                                                            </li>
                                                            <li class="row">
                                                                <div class="col-2 text-center">
                                                                    <span class="mx-auto {{ $image->violence }}"></span>
                                                                </div>
                                                                <div class="col-10">Violence</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button id="prev" class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button id="next" class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else
                        <p class="text-center">No images to display for this article.</p>
                    @endif
                </div>

                {{-- RATINGS --}}
                <div class="col-10 col-md-4 mt-5 m-md-0">
                    @foreach ($article_to_check->images as $key => $image)
                        <div id="{{ $image->id . 'image' }}" class="card card5">
                            <div class="card-body">
                                <h5 class="text-black">Labels</h5>
                                @if ($article_to_check->images->count() > 0)
                                    @foreach ($image->labels as $label)
                                        <small class="text-black p-1">{{ $label }}</small>
                                    @endforeach
                                @else
                                    <p class="fst-italic text-danger">No labels</p>
                                @endif
                            </div>

                            <div class="card-body">
                                <h5 class="mt-2 text-black">Ratings</h5>
                                <ul class="list-unstyled">
                                    <li class="row">
                                        <div class="col-2 text-center">
                                            <span class="mx-auto {{ $image->adult }}"></span>
                                        </div>
                                        <div class="col-10">Adult</div>
                                    </li>
                                    <li class="row">
                                        <div class="col-2 text-center">
                                            <span class="mx-auto {{ $image->medical }}"></span>
                                        </div>
                                        <div class="col-10">Medical</div>
                                    </li>
                                    <li class="row">
                                        <div class="col-2 text-center">
                                            <span class="mx-auto {{ $image->racy }}"></span>
                                        </div>
                                        <div class="col-10">Racy</div>
                                    </li>
                                    <li class="row">
                                        <div class="col-2 text-center">
                                            <span class="mx-auto {{ $image->violence }}"></span>
                                        </div>
                                        <div class="col-10">Violence</div>
                                    </li>
                                    <li class="row">
                                        <div class="col-2 text-center">
                                            <span class="mx-auto {{ $image->spoof }}"></span>
                                        </div>
                                        <div class="col-10">Spoof</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- COLONNA DESCRIZIONE ARTICOLO --}}
                <div class="col-md-12 ps-4 d-flex flex-column justify-content-between mt-5">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <p>{{ __('ui.author') }}: {{ $article_to_check->user->name }}</p>
                        <p>{{ __('ui.price') }}: {{ $article_to_check->price }}</p>
                        <p class="fst-italic"> {{ $article_to_check->category->name }}</p>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-start">
                        <form action="{{ route('revisor.accept', $article_to_check) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-custom m-2" type="submit">{{ __('ui.accept') }} </button>
                        </form>
                        <form action="{{ route('revisor.reject', $article_to_check) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-custom2 m-2" type="submit">{{ __('ui.reject') }}
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        @else
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-3">
                    <h1 class="fst-italic">{{ __('ui.noarticlesreview') }} </h1>
                    <a class="btn btn-custom" href="{{ route('welcome') }}">{{ __('ui.backhome') }} </a>
                </div>
            </div>
        @endif
    </div>
    @foreach ($lastArticle as $article)
        <h1 class="text-center pt-5">{{ __('ui.modifyreview') }}: {{ $article->title }}</h1>
        <div class="d-flex pb-4 justify-content-around">
            <form action="{{ route('revisor.undo', compact('article')) }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-custom2" type="submit">{{ __('ui.resetview') }} </button>
            </form>
        </div>
    @endforeach

    <script>
        let carouselrevisor = document.querySelectorAll('.carouselrevisor3')
        let card2 = document.querySelectorAll('.card5')
        let prev = document.querySelector('#prev')
        let next = document.querySelector('#next')
        carouselrevisor.forEach((el, index) => {
            if (el.id == card2[index].id && el.classList.contains('active')) {
                card2[index].classList.add('d-block')
                card2[index].classList.remove('d-none')
            } else {
                card2[index].classList.add('d-none')
                card2[index].classList.remove('d-block')
            }
        })

        prev.addEventListener('click', () => {
            carouselrevisor.forEach((el, index) => {
                setTimeout(() => {
                    if (el.id == card2[index].id && el.classList.contains('active')) {
                        card2[index].classList.add('d-block')
                        card2[index].classList.remove('d-none')
                    } else {
                        card2[index].classList.add('d-none')
                        card2[index].classList.remove('d-block')
                    }
                }, 800)
            })
        })

        next.addEventListener('click', () => {
            carouselrevisor.forEach((el, index) => {
                setTimeout(() => {
                    if (el.id == card2[index].id && el.classList.contains('active')) {
                        card2[index].classList.add('d-block')
                        card2[index].classList.remove('d-none')
                    } else {
                        card2[index].classList.add('d-none')
                        card2[index].classList.remove('d-block')
                    }
                }, 800)
            })
        })
    </script>
</x-layout>
