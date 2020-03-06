<?php

namespace Tests\Feature;


use App\Post;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_as_a_guest_I_can_register()
    {
        $user = factory(User::class)->create();
        $response = $this->post('register', $user->toArray());
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_as_a_user_I_can_login()
    {
        $user = factory(User::class)->create();
        $response = $this->post('login', [ $user->username , $user->password ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_as_a_user_I_can_create_a_post()
    {
        Storage::fake('public');
        $user = factory(User::class)->create();
        $file = UploadedFile::fake()->image('new_post.jpg', 400 , 400);
        //echo $file;
        $response = $this->actingAs($user)
            ->post('posts', [
                'user_id' => $user->id,
                'image' => $file,
                'caption' => 'caption',
                ]);
        $latest_post = Post::latest()->first();
        $this->assertEquals('images/posts/' . $file->hashName(), $latest_post->image);
        Storage::disk('public')->assertExists('images/posts/' . $file->hashName());
        $response->assertStatus(302);
        $response->assertRedirect('posts/' . $latest_post->user->id);
    }

    public function test_as_a_user_I_can_follow_someone_else()
    {
        $user = factory(User::class)->create();
        $user_to_follow = factory(User::class)->create();
        $response = $this->actingAs($user)
            ->post('follow', [
                'follow' => $user_to_follow->id,
            ]);
        $response->assertStatus(302);
        $response->assertRedirect('profile/'.$user_to_follow->id);
    }

    public function test_as_a_user_I_can_comment_on_someone_elses_post()
    {
        $user = factory(User::class)->create();
        $post = $user->posts()->save(factory(Post::class)->make());
        $response = $this->actingAs($user)
            ->post('comments', [
                'post_id' => $post->id,
                'comment' => 'blabla',
            ]);
        $response->assertStatus(302);
        $response->assertRedirect('posts/'.$post->id);
    }
}
