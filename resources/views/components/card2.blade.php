<div class="card mb-3 card-custom" style="width: 30rem; height: 19.8rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/300' }}" class="img-fluid  rounded-start-1 h-100" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title text-truncate">{{__('ui.title')}}: {{ $article->title }}</h5>
          <p class="card-text text-truncate">{{__('ui.description')}}: {{ $article->description }}</p>
          <p class="card-text">{{__('ui.price')}}: {{ $article->price }}€</p>
          <p class="card-text">{{__('ui.category')}}: {{ __('ui.' . $article->category->name) }}</p>
          @if (Route::currentRouteName() == 'article.index')
          <a class="btn btn-grad"
          href="{{ route('article.byCategory', ['category' => $article->category]) }}">{{ __('ui.' . $article->category->name) }}</a>
          @endif
          <p class="card-text text-white"><small class="text-white">{{ $article->created_at->diffForHumans() }} <br>
            {{__('ui.insertby')}}: {{ $article->user->name }}</small></p>
            <div class="col-12 d-flex justify-content-end align-items-end">
                <button class="btn btn-custom w-50" data-bs-toggle="modal"
                  data-bs-target="#exampleModal-{{ $article->id }}">{{__('ui.seemore')}}</button>
            </div>
        </div>
      </div>
    </div>
  </div>