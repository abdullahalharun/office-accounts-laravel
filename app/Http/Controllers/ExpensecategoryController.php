<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expensecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpensecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expense.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expensecategory = Category::where('slug', 'expense')->first();

        $categories = Category::where('parent_id', $expensecategory->id)->get();

        return view('expense/category/create', compact('categories', 'expensecategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cat_name' => 'required'
        ]);

        $category = new Category;
        $category->parent_id    = $request->get('parent_id');
        $category->order        = $request->get('order');
        $category->name         = $request->get('cat_name');
        $category->slug         = Str::slug($request->cat_name, '-');
        $category->save();

        return redirect()->back()->with('success', 'Category Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expensecategory  $expensecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Expensecategory $expensecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expensecategory  $expensecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Expensecategory $expensecategory, $id)
    {
        $categories = Expensecategory::all();
        $category = Expensecategory::find($id);

        return view('expense.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expensecategory  $expensecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cat_name' => 'required'
        ]);

        $post = Expensecategory::find($id);
        $post->name = $request->get('cat_name');
        $post->save();

        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expensecategory  $expensecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Expensecategory::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

    public function slug(Request $request)
{
    // $slug = str_slug($request->title);
    $slug = Str::slug($request->cat_name, '-');
    return $slug;
    return response()->json(['slug' => $slug]);
}
}
