<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::with("posts")->paginate(10);

        return view("admin.categories", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            "name" => 'required'
        ]);

        $category::create($request->only(["name"]));

        return redirect()->back()->with("success", "Categoria criada com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            "name" => 'required'
        ]);

        $category->update($request->all());

        return redirect()->back()->with("success", "Categoria editada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with("success", "Categoria deletada com sucesso");
    }
}
