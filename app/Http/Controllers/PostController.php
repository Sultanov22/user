<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'hello Abror';
    }


    public function store(CreatePostRequest $request)
    {
        Post::create($request->only([
            'title',
            'description',
        ]));
        return redirect(route('posts.create'))->with('status', 'Пост  успешно добавлен');
    }

    public function create()
    {
        return view('Posts.create');

    }

    public function edit(Post $post)
    {
        $this->authorize('update-post',$post);
        return view('posts.edit',['post' => $post]);
    }
}
