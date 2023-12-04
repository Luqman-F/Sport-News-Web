<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $newPosts = Post::latest()->take(5)->get();
        $popularPosts = Post::orderBy('views', 'desc')->take(5)->get();
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts', 'popularPosts', 'newPosts'));
    }

    function search()
    {
        $search = request('search');
        $posts = Post::where('title', 'like', "%$search%")->paginate(10);

        return view('posts.index', compact('posts'));
    }

    function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    function create()
    {
        return view('posts.create');
    }

    function store()
    {
        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'author_id' => auth()->user()->id,
        ]);

        return redirect('/posts/' . $post->id);
    }

    function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    function update(Post $post)
    {
        $post->update([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/posts/' . $post->id);
    }

    function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

    function addComment(Post $post)
    {
        $post->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/posts/' . $post->id);
    }

    function addTag(Post $post)
    {
        // foreach (request(['tag_id', 'tag_name']) as $tag) {
        //     if ($tag['tag_id'] == NULL) {
        //         $post->tags()->create([
        //             'tag_name' => $tag['tag_name'],
        //         ]);
        //         $tag['tag_id'] = $post->tags()->latest()->first()->id;
        //     }
        // }

        $post->tags()->attach(request('tag_id'));
        return redirect('/posts/' . $post->id);
    }

    function removeTag(Post $post)
    {
        $post->tags()->detach(request('tag_id'));
        return redirect('/posts/' . $post->id);
    }

    function addViewsCounter(Post $post)
    {
        $postId = $post->id;

        if (!session()->has("visited_posts.$postId")) {
            $post->update([
                'views' => $post->views + 1,
            ]);

            session()->put("visited_posts.$postId", true);
        }

        return redirect('/posts/' . $post->id);
    }

}
