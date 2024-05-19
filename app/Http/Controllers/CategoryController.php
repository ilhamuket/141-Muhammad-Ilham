<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TmRefCategory;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator; 

class CategoryController extends Controller
{
    public function index()
    {
        $categories = TmRefCategory::latest()->paginate(7);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
        ]);
        
        TmRefCategory::create([
            'name' => $request->name,
        ]);
    
        
        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }



    public function edit(TmRefCategory $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, TmRefCategory $category)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $category->name = $request->name;
        
        $category->save();

        
        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }


    public function destroy(TmRefCategory $category)
    {
        try {
            
            DB::beginTransaction();
            
            
            $category->delete();
            
            
            DB::commit();
            
            
            return redirect()->route('category.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (\Exception $e) {
            
            DB::rollBack();
            
            
            Log::error('Error deleting category: '.$e->getMessage());
            
            
            return redirect()->route('category.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}
