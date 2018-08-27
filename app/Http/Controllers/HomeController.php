<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Text;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $texts = Text::orderby('created_at', 'desc')->paginate(5);
        return view('index', compact('texts'));
    }

    public function post($id) {
        if ($id) {
            $featuredPosts = Text::orderby('clicked', 'desc')->paginate(5);
            $categories = Category::all();
            $text = Text::find($id);
            $comments = Comment::where('text_id', $id)->orderby('created_at', 'desc')->paginate(10);
            $text->increment('clicked', 1);
            $message = "main";
            return view('post', compact('comments', 'text', 'categories', 'featuredPosts', 'message'));
        }
        else {
            $this->index();
        }
    }

    public function about ($id) {
        if ($id) {
            $user = User::find($id);
            return view ('aboutme', compact('user'));
        }
        else {
            $this->index();
        }
    }

    public function error(){
        return view('404');
    }

    public function categoriesPost($id) {
        if ($id) {
            $texts = Text::where('cat_id', $id)->paginate(5);
            return view ('index', compact('texts'));
        }
    }

    public function comment(Request $request, $id) {
        $validatedData = $request->validate([
           'name' => 'required|max:20',
           'content' => 'required|max:1000'
        ]);
        if ($validatedData) {
            Comment::create([
               'name' => request('name'),
                'content' => request('content'),
                'text_id' => $id,
                'ip' => request()->ip()
            ]);
            return back();
        }
        else {
            $texts = Text::orderby('created_at', 'desc')->paginate(5);
            return view('index', compact('texts'));
        }
    }

    public function destroycomment($id) {
        Comment::where('id', '=', $id)->delete();
        return back();
    }
}
