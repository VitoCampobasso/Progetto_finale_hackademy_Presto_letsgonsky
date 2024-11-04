<form class="bg-body-tertiary shadow rounded p-5 my-5 text-black" wire:submit='save'>
    @if (session('created'))
        <div class="alert alert-success">
            {{ session('created') }}
        </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">{{__('ui.title')}}</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.live="title">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">{{__('ui.description')}} </label>
        <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" id="description"
            wire:model.live="description"></textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">{{__('ui.price')}} </label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
            wire:model.live="price">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <select class="form-control @error('category') is-invalid @enderror" name="category" id="category"
            wire:model.live="category">
            <option label value="">{{__('ui.selectcategory')}} </option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{__("ui.$category->name")}}</option>
            @endforeach
        </select>
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="file"  placeholder="Img/" class="form-control shadow @error('temporary_images.*') is-invalid @enderror" id="image" wire:model.live="temporary_images" multiple required >
        @error('temporary_images.*')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('temporary_images')       
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror          
    </div>
    @if(!empty($images))    
        <div class="row">
            <div class="col-12">
                <p>Photo Preview: </p>
                <div class="row border border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key=>$image)
                    <div class="col-4 d-flex flex-column align-items-center my-3 ">
                        <div class="img-preview mx-auto rounded shadow" style="background-image: url({{ $image->temporaryUrl()}})"></div>
                        <button type="button" class="btn btn-danger mt-1" wire:click="removeImage({{ $key }})">X</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark">{{__('ui.create')}} </button>
    </div>

</form>
