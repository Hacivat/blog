<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Text;
use Illuminate\Support\Facades\File;

class AdminPanelTextsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = Text::orderby('created_at', 'desc')->paginate(25);
        return view('adminpanel.texts.index', compact('texts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('adminpanel.texts.create', compact('categories'));
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
            'image' => 'max:4098',
            'catIdPosted' => 'required',
            'titlePosted' => 'required|max:191',
            'contentPosted' => 'required'
        ]);

        if ($validatedData) {
            $text = new Text();
            $text->title = $request->input('titlePosted');
            $text->content = $request->input('contentPosted');
            $text->slider = 0;
            $text->user_id = Auth::id();
            $text->cat_id = $request->input('catIdPosted');

            if ($request->hasFile('image')) {
                $imageName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/images'), $imageName);
                $text->image = $imageName;
                /*
                $img = Image::make(public_path('/uploads/images/'.$imageName));
                $img->resize(1400, 500);
                $img->save(public_path('/uploads/images/'.$imageName));
                */
            }

            if ($text->save()) {
                $texts = Text::orderby('created_at', 'desc')->get();
                return view('adminpanel.texts.index', compact('texts'));
            }
            else {
                $texts = Text::orderby('created_at', 'desc')->get();
                return view('adminpanel.texts.index', compact('texts'));
            }
        }
        else {
            $texts = Text::orderby('created_at', 'desc')->get();
            return view('adminpanel.texts.index', compact('texts'));
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
        $categories = Category::all();
        $text = Text::where('id', '=', $id)->firstOrFail();
        return view('adminpanel.texts.edit', compact('text', 'categories'));
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
        $validedData = $request->validate([
            'image' => 'max:4098',
            'cat_id' => 'required',
            'title' => 'required|max:191',
            'content' => 'required'
        ]);

        if ($validedData) {
            $text = Text::find($id);
            if ($request->hasFile('image')) {
                if ($text->image != null) {
                    File::delete('uploads/images/'.$text->image);
                }
                $imageName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/images'), $imageName);
                $text->image = $imageName;

                /*
                $img = Image::make(public_path('/uploads/images/'.$imageName));
                $img->resize(1400, 500);
                $img->save(public_path('/uploads/images/'.$imageName));
                */
            }

            if ($request->input('deleteimage') === "1") {
                if ($text->image != null) {
                    File::delete('uploads/images/'.$text->image);
                }
                $text->image = null;
            }

            $text->cat_id = $request->input('cat_id');
            if($text->slider == 1) {
                $text->slider = 1;
            }
            else {
                $text->slider = 0;
            }
            $text->user_id = Auth::id();
            $text->title = $request->input('title');
            $text->content = $request->input('content');

            if ($text->save()) {
                $texts = Text::orderby('created_at', 'desc')->get();
                return view('adminpanel.texts.index', compact('texts'));
            }
            else {
                return url($request->url());
            }
        }
        else {
            return url($request->url());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $text = Text::find($id);
        $image = $text->image;
        if (Text::where('id', '=', $id)->delete())
        {
            if ($image) {
                File::delete('uploads/images/'.$image);
            }
            $texts = Text::orderby('created_at', 'desc')->get();
            return view('adminpanel.texts.index', compact('texts'))->withSuccess('Başarıyla Silindi');
        }
        else {
            $texts = Text::orderby('created_at', 'desc')->get();
            return view('adminpanel.texts.index', compact('texts'))->withErrors('Silme işleminde hata gerçekleşti');
        }
    }

    public function slider($id) {
        $requestedData = Text::where('id', $id)
            ->value('slider');
        if ($requestedData == 1) {
            Text::where('id', $id)
                ->update(['slider' => 0]);
        }
        else {
            Text::where('id', $id)
                ->update(['slider' => 1]);
        }
            $texts = Text::select('*')->orderby('created_at', 'desc')->get();
            return view('adminpanel.texts.index', compact('texts'));
    }

    public function search(Request $request) {
        $texts = Text::find($request->input('search'));
        return view('adminpanel.texts.index', compact('texts'));
    }
}
