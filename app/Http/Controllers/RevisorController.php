<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class RevisorController extends Controller implements HasMiddleware
{
    public static function middleware() : array
    {
        return [new Middleware('auth',only: ['formRevisor'])];
    }
    public function index() {
        $article_to_check = Article::where('is_accepted', null)->first();
        $lastArticle= Article::where('is_accepted', true)->orwhere('is_accepted', false)->take(1)->latest('id')->get();
        return view('revisor.index', compact('article_to_check', 'lastArticle'));
    }

    public function undo(Article $article){
        $article->setAccepted(null);
        return redirect(route('revisor.index'))->with('success', "Articolo $article->title resettato");
    } 

    public function formRevisor(){
        return view('revisor.form');
    }

    public function accept(Article $article){
        $article->setAccepted(true);
        return redirect(route('revisor.index'))->with('success', "Articolo $article->title accettato");
    } 

    public function reject(Article $article){
        $article->setAccepted(false);
        return redirect(route('revisor.index', compact('article')))->with('notSuccess', "Articolo $article->title rifiutato");
    } 

    public function becomeRevisor(Request $request){
       
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        $description = $request->description;
      
        $user = Auth::user();
        Mail::to($email)->send(new BecomeRevisor( $name, $description, $email, $user));
        return redirect()->route('welcome')->with('success', "Richiesta di revisione inviata correttamente");
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->route('welcome')->with('success', "Utente {$user->name} ora revisore");
    }

    public function submit(Request $request){
        $name = $request->name;
        $email = $request->email;
        return redirect()->route('welcome')->with('success', "Richiesta di diventare revisore inviata correttamente");
    }
}
