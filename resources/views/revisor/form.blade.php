<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center pt-5 bg-form">
            <div class="col-12 text-center pt-5 pb-4">
                <h1 class="display-4">{{__('ui.requestrevisor')}} </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <form class="bg-body-tertiary shadow-lg rounded-4 p-5 text-black" action="{{ route('become.revisor') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.name')}} </label>
                        <div class=" input-group ">
                            <div
                                class="input-group-addon border border-1  border-body-tertiary rounded-start-2 bg-smoke">
                                <i class="bi bi-person-fill fs-4 p-3"></i>
                            </div>
                            <input type="text" disabled class="form-control @error('name') is-invalid @enderror"
                                id="name" value="{{Auth::user()->name}}" name="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.email')}}  </label>
                        <div class=" input-group ">
                            <div
                                class="input-group-addon border border-1  border-body-tertiary rounded-start-2 bg-smoke">
                                <i class="bi bi-person-fill fs-4 p-3"></i>
                            </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{Auth::user()->email}}" disabled>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">{{__('ui.talkaboutyou')}} </label>
                        <div class="input-group">
                            <div class="import-group-addon border border-1 border-body-tertiary rounded-start-2">
                            </div>
                            <textarea rows="10" type="text" class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" required></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-dark">{{__('ui.sendrequest')}} </button>
                    </div>
                        </div>
                    </div>


                    
                </form>
            </div>
        </div>
    </div>
</x-layout>
