<?php

namespace App\Http\Controllers;

use App\Text;
use Illuminate\Http\Request;

class AdminPanelSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = Text::where('slider', 1)->orderby('created_at', 'desc')->get();
        return view('adminpanel.slider.index', compact('texts'));
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
        //
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
        $text = Text::where('id', '=', $id)->firstOrFail();
        return view('adminpanel.slider.edit', compact('text'));
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
        if (Text::where('id', '=', $id)->delete())
        {
            $texts = Text::orderby('created_at', 'desc')->get();
            return view('adminpanel.slider.index', compact('texts'))->withSuccess('Başarıyla Silindi');
        }
        else {
            $texts = Text::orderby('created_at', 'desc')->get();
            return view('adminpanel.slider.index', compact('texts'))->withErrors('Silme işleminde hata gerçekleşti');
        }
    }

    public function slider($id) {
            Text::where('id', $id)
                ->update(['slider' => 0]);

        $texts = Text::where('slider', 1)->orderby('created_at', 'desc')->get();

        return view('adminpanel.slider.index', compact('texts'));
    }
}
