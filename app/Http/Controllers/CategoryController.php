<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
        $categories = Category::paginate(20);
        $current = $categories->currentPage() - 1;
        return view('dashboard.categories.index', ['categories' => $categories, 'i' => $i, 'current' => $current]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string'
        ]);
        if ($validation) {
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            return redirect()->route('categories.index')->with('success', 'category created successfully')->with('type', 'success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = $category->posts;
        return view('dashboard.categories.category_post', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|string'
        ]);
        $category = Category::findOrFail($id);
        if ($validation) {
            $category->name = $request->name;
            $category->save();
            return redirect()->route('categories.index')->with('success', 'category update successfully')->with('type', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $isDeleted = $category->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Success', 'text' => 'category Deleted Successfuly', 'icon' => 'success'
            ], Response::HTTP_OK);
        } else {

            return response()->json([
                'title' => 'Failde', 'text' => 'category Delete Failde', 'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
