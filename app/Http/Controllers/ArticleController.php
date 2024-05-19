<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TmDataArticle;
use App\Models\TmRefCategory;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator; 

class ArticleController extends Controller
{
    public function index()
    {
        $articles = TmDataArticle::latest()->paginate(5);
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $categories = TmRefCategory::all(); 
        return view('article.create', compact('categories')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:tm_ref_categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        // Retrieve authenticated user ID using dependency injection
        $userId = $request->user()->id;
    
        // Upload image
        $image = $request->file('image');
        $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('public/articles', $filename);
    
        // Create article
        TmDataArticle::create([
            'image' => str_replace('public', 'storage', $imagePath),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => $userId,
            'title' => $request->title,
        ]);
    
        // Redirect to index with success message
        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }



    public function edit(TmDataArticle $article)
    {
        $categories = TmRefCategory::all(); 
        return view('article.edit', compact('article','categories'));
    }

    public function update(Request $request, TmDataArticle $article)
    {
        // Validate request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:tm_ref_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow null for image
        ]);

        // Retrieve authenticated user ID using dependency injection
        $userId = $request->user()->id;

        // Update article fields
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->user_id = $userId;

        // Check if there's a new image uploaded
        if ($request->hasFile('image')) {
            // Upload new image
            $image = $request->file('image');
            $filename = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/articles', $filename);

            // Delete old image if it exists
            if ($article->image) {
                Storage::delete($article->image);
            }

            // Update image path in the article
            $article->image = str_replace('public', 'storage', $imagePath);
        }

        // Save the updated article
        $article->save();

        // Redirect back to index with success message
        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }


    public function destroy(TmDataArticle $article)
    {
        try {
            
            DB::beginTransaction();
            
            
            $article->delete();
            
            
            DB::commit();
            
            
            return redirect()->route('article.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (\Exception $e) {
            
            DB::rollBack();
            
            
            Log::error('Error deleting article: '.$e->getMessage());
            
            
            return redirect()->route('article.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
