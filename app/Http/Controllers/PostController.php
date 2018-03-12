<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostType as Type;
use App\Setting;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'frontPage']);
    }

    public function index()
    {
        $posts = Post::orderBy('type', 'DESC')->get();
        $types = Type::get();

        return view('posts.index', compact('posts', 'types'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->title            = request('title');
        $post->slug             = request('slug');
        $post->featured_image   = request('featured_image');
        $post->content          = request('content');
        $post->type             = request('type');

        request('active') ? $active = 1 : $active = 0;
        $post->active           = $active;

        $post->save();

        return redirect('posts/'.$post->id.'/edit');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->times_visited += 1;
        $post->save();

        $setting = Setting::find(1);

        return view('posts.show', compact('post', 'setting'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $types = Type::get();

        return view('posts.edit', compact('post', 'types'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title            = request('title');
        $post->slug             = request('slug');
        $post->featured_image   = request('featured_image');
        $post->content          = request('content');
        $post->type             = request('type');

        request('active') ? $active = 1 : $active = 0;
        $post->active           = $active;

        $post->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect('/posts');
    }

    public function frontPage()
    {
        $post = Post::where('type', 'page')->where('slug', 'welcome')->first();

        $setting = Setting::find(1);

        return view('posts.show', compact('post', 'setting'));
    }
}