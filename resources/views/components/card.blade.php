 <div style="width: 20rem;" class="card card-custom text-white text-center">
    <div class="card-header">
        {{__('ui.article')}} N.{{ $article->id }}
    </div>

    <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/300' }}"
            class="card-img-top" alt="">
        <h5 class="card-text truncate">{{__('ui.title')}}: {{ $article->title }}</h5>
        <p class="card-text truncate">{{__('ui.description')}}: {{ $article->description }}</p>
        <p class="card-text">{{__('ui.price')}}: {{ $article->price }}€</p>
        <p class="card-text">{{__('ui.category')}}: {{ $article->category->name }}</p>
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-custom" data-bs-toggle="modal"
            data-bs-target="#exampleModal-{{ $article->id }}">{{__('ui.seemore')}}</a>
        @if (Route::currentRouteName() == 'article.index')
            <a class="btn btn-custom2"
                href="{{ route('article.byCategory', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
        @endif
    </div>
    <div class="card-footer text-body-secondary">
        <p class="text-white">
            {{ $article->created_at->diffForHumans() }} <br>
            {{__('ui.insertby')}}: {{ $article->user->name }}
        </p>
    </div>
</div>
        {{--! NUOVA CARD --}}

