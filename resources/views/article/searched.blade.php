<x-layout>
    <div class="container-fluid height-custom">
        <div class="row mt-5 py-5 justify-content-center align-items-center text-center">
            <div class="col-12 mt-5 pt-5">
                <h1 class="display-1">{{__('ui.results')}} " <span class="fst-italic">{{ $query }}
                    </span>"
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 justify-content-center  m-4 d-flex">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        {{__('ui.noarticlesresult')}}
                    </h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>