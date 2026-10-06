<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with("posts")->paginate(10);

        return view("admin.categories", compact("categories"));
    }

    public function create()
    {}

    public function store(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            "name" => 'required'
        ]);

        Category::create($request->only(["name"]));

        return redirect()->back()->with("success", "Categoria criada com sucesso");
    }

    public function show(Category $category)
    {}

    public function edit(Category $category)
    {}

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            "name" => 'required'
        ]);

        $category->update($request->all());

        return redirect()->back()->with("success", "Categoria editada com sucesso");
    }

    public function destroy(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with("success", "Categoria deletada com sucesso");
    }
}
