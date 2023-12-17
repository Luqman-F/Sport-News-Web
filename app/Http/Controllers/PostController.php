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

        return view('home', compact('posts', 'popularPosts', 'newPosts'));
    }

    function search()
    {
        $search = request('q');
        $posts = Post::where('title', 'like', "%$search%")->paginate(10);
        return view('search', compact('posts'));
    }

    static function addViewsCounter(Post $post)
    {
        $postId = $post->id;

        if (!session()->has("visited_posts.$postId")) {
            $post->update([
                'views' => $post->views + 1,
            ]);

            session()->put("visited_posts.$postId", true);
        }
    }

    function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $this::addViewsCounter($post);
        return view('post', compact('post'));
    }

    function create()
    {
        return view('editor');
    }

    function store()
    {
        // return response(json_encode([request()->all(), auth()->check()]), 200);
        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'author_id' => request('id'),
        ]);

        return response('article saved', 200);
    }

    function edit(Post $post)
    {
        $data = [
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
        ];
        return view('editor', compact('data'));
    }

    function update(Post $post)
    {
        $post->update([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return response('article updated', 200);
    }

    function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully');
    }

    function addComment(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);
        $post->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
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



}
