<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostType;
use App\Post;

class PostTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['menu', 'posts']);
    }

    public function menu()
    {
         $pages = Post::where('type', 'page')->get()->toArray();

         $types = PostType::where('slug', '!=', 'page')->get()->toArray();

         $array = array_merge($pages, $types);

         return $array;
    }

    public function index()
    {
        return PostType::get();
    }

    public function create()
    {
        return view('posts.types');
    }

    public function store(Request $request)
    {
        $count = PostType::get()->count();

        $postType = new PostType;

        $postType->name         = request('name');
        $postType->slug         = request('slug');

        // $in_menu $on_front_page $active 

        request('in_menu') ? $in_menu = 1 : $in_menu = 0;
        $postType->in_menu      = $in_menu;

        request('on_front_page') ? $on_front_page = 1 : $on_front_page = 0;
        $postType->on_front_page = $on_front_page;

        request('active') ? $active = 1 : $active = 0;
        $postType->active        = $active;

        $postType->order_position = $count ++;
        $postType->layout_style = request('layout');

        $postType->save();
    }

    public function update(Request $request, $id)
    {
        $postType = PostType::find($id);
        $posts = Post::where('type', $postType->slug)->get();

        $postType->name         = request('name');
        $postType->slug         = request('slug');

        // $in_menu $on_front_page $active 

        request('in_menu') ? $in_menu = 1 : $in_menu = 0;
        $postType->in_menu      = $in_menu;

        request('on_front_page') ? $on_front_page = 1 : $on_front_page = 0;
        $postType->on_front_page = $on_front_page;

        request('active') ? $active = 1 : $active = 0;
        $postType->active        = $active;
        $postType->layout_style  = request('layout_style');

        foreach($posts as $post){
            $post->type = $postType->slug;
            $post->save();
        }

        $postType->save();
    }

    public function destroy($id)
    {
        $postType = PostType::find($id);
        $posts = Post::where('type', $postType->slug)->get();
        foreach($posts as $post)
        {
            $post->title = $post->title . ' ('.$postType->name.')';
            $post->type = 'no-type';
            $post->save();
        }
        $postType->delete();
    }
}
