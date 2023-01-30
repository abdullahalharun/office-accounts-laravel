<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EarningCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $earningcategory = Category::where('slug', 'earnings')->first();

        $categories = Category::where('parent_id', $earningcategory->id)->get();

        return view('earnings.category', compact('categories', 'earningcategory'));
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

        if ($request->sub_parent_id) {
            $sub_cat = new SubCategory();
            $sub_cat->parent_id    = $request->get('sub_parent_id');
            $sub_cat->order        = $request->get('order');
            $sub_cat->name         = $request->get('cat_name');
            $sub_cat->slug         = Str::slug($request->cat_name, '-');
            $sub_cat->save();
        } else {
            $category = new Category;
            $category->parent_id    = $request->get('parent_id');
            $category->order        = $request->get('order');
            $category->name         = $request->get('cat_name');
            $category->slug         = Str::slug($request->cat_name, '-');
            $category->save();
        }

        return redirect()->back()->with('success', 'Category Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit category
        $category = Category::find($id);
        $categories = Category::where('parent_id', $category->parent_id)->get();
        $parent = Category::find($category->parent_id);

        // dd($category);

        return view('earnings.edit_category', compact('category', 'categories', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::find($id);
        $category->name         = $request->get('name');
        $category->order        = $request->get('order');
        $category->admission_target = $request->get('admission_target');
        $category->save();

        return redirect()->back()->with('success', 'Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
