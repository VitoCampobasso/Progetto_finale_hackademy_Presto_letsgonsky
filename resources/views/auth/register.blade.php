<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center pt-5 bg-form">
            <div class="col-12 text-center pt-5 pb-4">
                <h1 class="display-4">{{__('ui.register')}} </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <form class="bg-body-tertiary shadow-lg rounded-4 p-5 text-black" action="{{ route('register') }}" method="POST">
                    @csrf


                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.name')}} </label>
                        <div class=" input-group ">
                            <div
                                class="input-group-addon border border-1  border-body-tertiary rounded-start-2 bg-smoke">
                                <i class="bi bi-person-fill fs-4 p-3"></i>
                            </div>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">{{__('ui.email')}} </label>
                        <div class="input-group">
                            <div class="import-group-addon border border-1 border-body-tertiary rounded-start-2">
                                <i class="bi bi-envelope-at-fill fs-4 p-3"></i>
                            </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="registerEmail" name="email">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.password')}} </label>
                        <div class="input-group">
                            <div class="import-group-addon border border-1 border-body-tertiary rounded-start-2">
                                <i class="bi bi-key-fill fs-4 p-3"></i>
                            </div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{__('ui.passwordconfirmation')}} </label>
                        <div class="input-group">
                            <div class="import-group-addon border border-1 border-body-tertiary rounded-start-2">
                                <i class="bi bi-key-fill fs-4 p-3"></i>
                            </div>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                    </div>


                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-dark">{{__('ui.register')}} </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>
