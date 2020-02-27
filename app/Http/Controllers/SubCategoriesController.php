<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_category)
    {
        $categories = Categories::all();
        $subCategory = SubCategories::find($id);
      return view('dashboard.categories.sub-categories',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.subCategoriesList',[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'             => 'required|min:1|max:64',
        ]);
        $user = auth()->user();
        $subCategory = new Categories();
        $subCategory->icon     = $request->input('icon');
        $subCategory->name     = $request->input('name');
        $subCategory->description     = $request->input('description');
        $subCategory->status     = $request->input('status');
        $subCategory->save();
        $request->session()->flash('message', 'Categoría creada');
        return redirect()->route('subCategories.index');
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
        $subCategories = SubCategories::all();
        $subCategory = SubCategories::find($id);
        return view('dashboard.subCategories.edit',compact('subCategories'), [ 'subCategory' => $subCategory ]);
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
        //var_dump('bazinga');
        //die();
        $validatedData = $request->validate([
            'name'             => 'required|min:1|max:64',
        ]);
        $subCategory = Categories::find($id);
        $subCategory->name     = $request->input('name');
        $subCategory->save();
        $request->session()->flash('message', 'Categoría editada');
        return redirect()->route('subCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        if($category){
            $category->delete();
        }
        return redirect()->route('categories.index');
    }
}
