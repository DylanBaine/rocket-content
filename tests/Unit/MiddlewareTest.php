<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use \Illuminate\Auth\Middleware\Authenticate;
use \App\Post;

class MiddlewareTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_visiting_dashboard()
    {
        $this->get('/dashboard')->assertRedirect('/');

    }

    public function test_visiting_post_edit_page()
    {
        Post::create([
        	'title'=>"welcome",
        	'slug'=>"welcome",
        	'content'=>"Lorem Ipsum",
            'type'=>'page',
        	'active'=>1,
        ]);
        $post = Post::first();

    	$this->get('posts/'.$post->id.'/edit')->assertRedirect('/');
    }

    public function test_not_allowing_unauthenticated_users_to_delete_a_post()
    {
    	$post = Post::first();

    	$this->get('posts/'.$post->id.'/delete')->assertRedirect('/');
    	$this->assertDatabaseHas('posts', ['id' => $post->id]);

    	// clear test db
    	$post->delete();
    }
}
