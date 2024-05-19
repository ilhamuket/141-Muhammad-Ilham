<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\TmDataArticle;
use App\Models\TmRefCategory;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index(Request $request): View
    {
        $articles = TmDataArticle::with('user', 'category')->latest()->paginate(5);
        $authors = User::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();
        $categories = TmRefCategory::all();

        return view('home.index', compact('articles', 'authors', 'categories'));
    }


    public function show(TmDataArticle $article)
    {
        $article->load('category', 'user');
        $authors = User::withCount('articles')->orderBy('articles_count', 'desc')->take(5)->get();
        $categories = TmRefCategory::all();
        $articles = TmDataArticle::with('user', 'category')->latest()->limit(3)->get();

    
        return view('home.show', compact('article','articles', 'authors', 'categories'));
    }
    

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
