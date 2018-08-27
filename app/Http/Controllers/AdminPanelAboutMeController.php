<?php

namespace App\Http\Controllers;

use App\Text;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminPanelAboutMeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('adminpanel.aboutme.index', compact('user'));
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
        $user = User::find($id);

        if ($user->image == null || $user->image == '') {
            $validator = Validator::make($request->all(), [
                'image' => 'required|max:4098'
            ]);

        }
        else {
            $validator = Validator::make($request->all(), [
                'image' => 'required|max:4098'
            ]);
        }

        if ($validator) {
            if ($user) {
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->dob = $request->input('dob');
                $user->job = $request->input('job');
                $user->about_me = $request->input('aboutme');

                $user->facebook = $request->input('facebook');
                $user->twitter = $request->input('twitter');
                $user->instagram = $request->input('instagram');
                $user->github = $request->input('github');
                $user->linkedin = $request->input('linkedin');
                $user->google = $request->input('google');
                $user->reddit = $request->input('reddit');

                if ($request->hasFile('image')) {
                    $imageName = time().'-'.$request->image->getClientOriginalName();
                    $request->image->move(public_path('/uploads/profiles/'), $imageName);
                    $user->image = $imageName;
                }
            }
            if ($user->save()){
                $texts = Text::orderby('created_at', 'desc')->get();
                return view('adminpanel.texts.index', compact('texts'));
            }
            else {
                return back();
            }
        }
        else {
            return back();
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
        //
    }
}
