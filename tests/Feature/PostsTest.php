<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
Use \App\Post;
use \App\User;
use \App\PostType;
use Auth;

class PostsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_creating_a_post()
    {
        $posts = Post::get();
        foreach($posts as $post){
            $post->delete();
        }

        Post::create([
        	'title'=>"welcome",
        	'slug'=>"welcome",
        	'content'=>"Lorem Ipsum",
            'type'=>'page',
        	'active'=>1,
        ]);

        $this->get('/welcome')->assertSee('Lorem Ipsum');
    }

    public function test_editing_a_post()
    {
        $post = Post::first();
        $post->content = 'New Content';
        $post->save();

        $this->actingAs(User::find(1))->get('posts/'.$post->id.'/edit')->assertSee('New Content')->assertStatus(200);
    }

    public function test_deleting_a_post()
    {
        $post = Post::first();

        $this->actingAs(User::find(1))->get('posts/'.$post->id.'/delete')->assertRedirect('/posts');
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_creating_a_post_type()
    {

        $type = new PostType;

        $type->name = 'Page';
        $type->slug = 'page';
        $type->layout_style = 'Basic Card';
        $type->order_position = 1;
        $type->save();

        $this->actingAs(User::find(1))->get('/posts')->assertSee($type->name);
    }

    public function test_editing_a_post_type()
    {
        $post = new Post;
            $post->title = "Page Here";
            $post->slug = "page-here";
            $post->content = 'Random Stuff!';
            $post->type = 'page';
            $post->active = 1;
        $post->save();

        $type = PostType::first();

        $this->actingAs(User::find(1))->put('component-api/post-types/'.$type->id, ['name'=>'Edited', 'slug'=>'edited', 'layout_style'=>'Basic Card', 'order_position'=>1]);

        $this->assertTrue(Post::where('title', 'Page Here')->first()->type == 'edited');

        $post->delete();
    }

    public function test_deleting_a_post_type()
    {
        $type = PostType::first();

        $this->actingAs(User::find(1))->delete('/component-api/post-types/'.$type->id)->assertStatus(200);
        $this->assertDatabaseMissing('post_types', ['id'=>$type->id]);

    }
}
