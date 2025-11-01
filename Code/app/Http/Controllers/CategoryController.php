<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    /**
     * Display all category list
     * 
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Store a newly created category
     * 
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::firstOrCreate([
            'name' => $validate['name'], 
        ]);


        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }

    /**
     * Update specified category resource from storage
     * 
     * 
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category =  Category::find($id);
        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category update successfully');
    }

    /**
     * Remove specified category from storage
     * 
     * 
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }

    /**
     * Show the form for creating new category
     * 
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function create() 
    {
        return view('categories.create');
    }

    /**
     * Display specified category
     * 
     * 
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for edit category
     * 
     * 
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }
}
