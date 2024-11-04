@if (Route::currentRouteName() == 'welcome')
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav-custom" data-bs-theme="dark">
    @else
        <nav class="navbar navbar-expand-lg bg-body-tertiary nav-custom-other fixed-top" data-bs-theme="dark">
@endif
<div class="container-fluid">
    <img class="img-custom" src="{{ asset('media/logoVero.png') }}" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav w-100">
            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() == 'welcome') active @endif" aria-current="page"
                    href="{{ route('welcome') }}">{{ __('ui.home') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() == 'article.index') active @endif"
                    href="{{ route('article.index') }}">{{ __('ui.Articles') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Route::currentRouteName() == 'article.create') active @endif"
                    href="{{ route('article.create') }}">{{ __('ui.createarticle') }}</a>
            </li>
            @auth
                @if (Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ route('revisor.index') }}"
                            role="button">{{ __('ui.reviewerarea') }} <span
                                class="notify translate-middle badge rounded-pill bg-danger">{{ App\Models\Article::toBeRevisedCount() }}
                            </span>
                        </a>
                    </li>
                @endif
            @endauth
            <li class="nav-item dropdown" data-bs-theme="dark">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ __('ui.categories') }}
                </a>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item"
                                href="{{ route('article.byCategory', ['category' => $category]) }}">{{ __("ui.$category->name") }}</a>
                        </li>
                        @if (!$loop->last)
                            <hr class="dropdown-divider">
                        @endif
                    @endforeach
                </ul>
            </li>
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-fill"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" data-bs-theme="">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="bi bi-person-fill-dash"></i>
                                    {{ __('ui.logout') }}</button>
                            </form>
                        </li>

                    </ul>
                </li>
            @else
                <li class="nav-item dropdown" data-bs-theme="dark">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('register') }}"><i class="bi bi-person-plus-fill"></i>
                                {{ __('ui.register') }}</a></li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i>
                                {{ __('ui.login') }}</a></li>
                    </ul>
                </li>
            @endauth
            @auth
                @if (Auth::user()->is_revisor == false)
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
                                href="{{ route('revisor.form') }}">{{ __('ui.workwithus') }}</a>
                        </li>
                    </ul>
                @endif
            @else
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                            href="{{ route('revisor.form') }}">{{ __('ui.workwithus') }}</a>
                    </li>
                </ul>

            @endauth
        </ul>



        <div class="dropdown">

            <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @php
                    $lang = app()->getLocale();
                @endphp
                <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="32" height="32"
                    alt="">
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item"><x-_locale lang="en" /></li>
                <li class="dropdown-item"><x-_locale lang="it" /></li>
                <li class="dropdown-item"><x-_locale lang="es" /></li>

            </ul>
        </div>









        <form class="d-flex ms-auto" role="search" action="{{ route('article.search') }}" method="GET">
            <div class="input-group">
                <input type="search" name="query" class="form-control bg-black border-white text-white"
                    placeholder="{{ __('ui.search') }}" aria-label="search">
                <button type="submit" class="input-group-text btn btn-outline-danger" id="basic-addon2">
                    {{ __('ui.search') }}
                </button>
            </div>
        </form>
    </div>
</div>
</nav>
