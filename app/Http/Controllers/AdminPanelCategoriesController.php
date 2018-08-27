<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class AdminPanelCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::get();
        return view('adminpanel.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'postedCat' => 'required|max:20'
        ]);
        if ($validatedData) {
            $categories = new Category();
            $categories->title = $request->input('postedCat');
            $saved = $categories->save();
            if ($saved) {
                $categories = Category::get();
                return view('adminpanel.categories.index', compact('categories'));
            }
        }
        else{
            $categories = Category::get();
            return view('adminpanel.categories.index', compact('categories'));
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Category::where('id', '=', $id)->delete())
        {
            $categories = Category::get();
            return view('adminpanel.categories.index', compact('categories'));
        }
        else {
            $categories = Category::get();
            return view('adminpanel.categories.index', compact('categories'));
        }
    }
}
