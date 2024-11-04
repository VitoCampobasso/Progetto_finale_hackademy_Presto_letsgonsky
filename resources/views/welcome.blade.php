<x-layout>

    <div class="container-fluid ">
        <div>

            <div class="row vh-100 justify-content-center HeaderBackground">
                
                <div
                class="col-11 col-md-8 d-flex flex-md-column align-items-center align-items-md-start justify-content-center">
                
                <div class="mb-5 pb-5">
                    <h2 class="text-center p-2">{{__('ui.sellnow')}} </h2>
                    @if (session('error'))
                        <div class="alert alert-success">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <p class="fs-5 text-center text-white p-2">{{__('ui.subtitle')}} </p>

                        <a href="{{ route('article.create') }}" class="btn btn-custom mb-5">{{__('ui.sell')}} </a>
                    </div>


                </div>

            </div>
        </div>
        <section class="container-fluid bg-cards">
            <div class="row row-numbers justify-content-evenly m-5 box-shadow text-white">
                <div class="col-12 col-md-3 text-center py-4">
                    <i class="bi bi-bag-check text-success fs-1 "></i>
                    <h3>{{__('ui.soldArticles')}} </h3>
                    <span id="incraseNumberOne" class="mt-4">0</span>
                </div>

                <div class="col-12 col-md-3 text-center py-4 ">
                    <i class="bi bi-person-plus  text-primary fs-1  "></i>
                    <h3>{{__('ui.satisfiedcustomers')}} </h3>
                    <span id="incraseNumberTwo" class="mt-4"> 0</span>
                </div>

                <div class="col-12 col-md-3 text-center py-4 ">
                    <i class="bi bi-eye text-danger fs-1 "></i>
                    <h3>{{__('ui.views')}} </h3>
                    <span id="incraseNumberThree" class="mt-4"> 0</span>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <h1 class="display-4 d-flex justify-content-center m-0">{{__('ui.lastarticles')}} </h1>
                    <div class="swiper mySwiper height-custom-2 d-md-block d-none">
                        <div class="swiper-wrapper">
                            @forelse ($articles as $article)
                                <div class="swiper-slide d-flex justify-content-center align-items-center flex-column">
                                    <x-card2 :article="$article" class="card-class-swiper" />
                                </div>
                            @empty
                                <div class="col-12">
                                    <h3 class="text-center">{{__('ui.noitemsloaded')}} </h3>
                                </div>
                            @endforelse
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MEDIAQUERY --}}
        <div class="container d-block d-md-none">
            <div class="row  justify-content-center align-items-center py-4 gap-3">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-3 pt-5 d-flex justify-content-center">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">{{__('ui.noitemsloaded')}}</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


</x-layout>
