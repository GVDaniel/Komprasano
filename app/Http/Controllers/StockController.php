<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\Status;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        $categories = Categories::with('status')->paginate( 20 );
        return view('dashboard.stock.stockList',['categories' => $categories], [ 'statuses' => $statuses ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        return view('dashboard.stock.stockList', [ 'statuses' => $statuses ]);
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
            'status_id'             => 'required'
        ]);
        $user = auth()->user();
        $category = new Categories();
        $category->name     = $request->input('name');
        $category->status_id     = $request->input('status_id');
        $category->save();
        $request->session()->flash('message', 'Categoría creada');
        return redirect()->route('stock.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSubcategories(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'           => 'required',
            'image'                   => 'nullable',
            'name'                  => 'required|min:1|max:64',
            'description_short'     => 'required|min:1|max:500',
            'descrption_large'      => 'nullable',
        ]);
        $user = auth()->user();
        $subcategory = new Subcategories();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->image = $request->input('image');
        $subcategory->name     = $request->input('name');
        $subcategory->description_short     = $request->input('description_short');
        $subcategory->description_large     = $request->input('description_large');
        $subcategory->status_id     = '5' ;
        $subcategory->save();
        $request->session()->flash('message', 'Subcategoría creada');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::find($id);
        $subcategories = $category->subcategories->load('status');
        return view('dashboard.stock.categoryShow',compact('category')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        return view('dashboard.stock.categoryEdit',[ 'category' => $category ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subcategoryEdit($id)
    {
        $subcategory = Subcategories::find($id);
        return view('dashboard.stock.subcategoryEdit',[ 'subcategory' => $subcategory ]);
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
            'status_id'             => 'required'
        ]);
        $category = Categories::find($id);
        $category->name     = $request->input('name');
        $category->status_id     = $request->input('status_id');
        $category->save();
        $request->session()->flash('message', 'Categoría editada');
        return redirect()->route('stock.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subcategoryUpdate(Request $request, $id)
    {
        //var_dump('bazinga');
        //die();
        $validatedData = $request->validate([
            'image'                         => 'required',
            'name'                          => 'required|min:1|max:64',
            'description_short'             => 'required|min:1|max:200',
            'description_large'             => 'required|min:1|max:500',
            'status_id'                     => 'required'
        ]);
        $subcategory = Subcategories::find($id);
        $subcategory->image     = $request->input('image');
        $subcategory->name     = $request->input('name');
        $subcategory->description_short     = $request->input('description_short');
        $subcategory->description_large     = $request->input('description_large');
        $subcategory->status_id     = $request->input('status_id');
        $subcategory->save();
        $request->session()->flash('message', 'Subcategoría editada');
        return redirect()->route('stock.show',[$subcategory->category_id]);
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
        return redirect()->route('stock.index');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subcategoryDestroy($id)
    {
        $subcategory = Subcategories::find($id);
        if($subcategory){
            $subcategory->delete();
        }
        return redirect()->back();
    }
}
