<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Article;
use Livewire\Component;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required')]
    public $category;
    
    public $images = [];
    public $temporary_images;
    
    public $article;

    public function messages() :array{
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'price.required' => 'Il prezzo è obbligatorio',
            'category.required' => 'La categoria è obbligatoria',
            'title.min' => 'Il titolo deve avere almeno 5 caratteri',
            'description.min' => 'La descrizione deve avere almeno 10 caratteri',
            'price.numeric' => 'Il prezzo deve essere un numero',
        ];
    }
    public function save()
    {
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::user()->id
        ]);
        if(count($this->images) > 0){
           foreach($this->images as $image){
                    $newFileName = "articles/{$this->article->id}";
                    $newImage = $this->article->images()->create([
                   'path' => $image->store($newFileName, 'public')]);
                //    dispatch(new ResizeImage($newImage->path, 300, 300));
                //    dispatch(new GoogleVisionSafeSearch($newImage->id));
                //    dispatch(new GoogleVisionLabelImage($newImage->id));
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
    
                ])->dispatch($newImage->id);
           } 
           File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('created', 'Articolo creato con successo');
        $this->reset();
    }

    public function updatedTemporaryImages()    
    {
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'images' => 'max:5'
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            };
            
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
