<x-layout>

    <div class="container-fluid  height-custom">
        
        <div class="row  justify-content-center align-items-center text-center ">
            <div class="col-12">
                <h1 class="display-4 ">{{__('ui.allarticles')}}</h1>
            </div>
        </div>
        <div class="row  justify-content-center align-items-center gap-3">
           
                @forelse ($articles as $article)
                    <div class="col-12 col-md-3 pt-5 d-flex justify-content-center">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center ">{{__('ui.noitemsloaded')}} </h3>
                    </div>
                @endforelse
        
               
           
           
            <div class="d-flex justify-content-center">
                <div>
                    {{ $articles->links() }}
                </div>
            </div>

        </div>
    </div>


</x-layout>
