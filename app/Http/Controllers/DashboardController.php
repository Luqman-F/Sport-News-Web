<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Admin

    function adminHome()
    {
        // Posts aggregation
        $post = Post::all();
        $postCount = $post->count();
        $averagePostViews = $post->avg('views');
        $averageComments = $post->avg(function ($a) {
            return $a->comments()->count();
        });
        $postHistory = $post->groupBy(function ($a) {
            return $a->created_at->format('Y-m-d');
        })->map(function ($a) {
            return $a->count();
        });

        // Author aggregation
        $author = User::where('role_id', 2)->get();
        $authorCount = $author->count();
        $averageAuthorPosts = $author->avg(function ($a) {
            return $a->posts()->count();
        });

        // Tags aggregation
        $tag = Tag::all();
        $viewPerTag = $tag->map(function ($a) {
            return [
                'name' => $a->tag_name,
                'views' => $a->posts->sum('views')
            ];
        })->sortByDesc('views');

        return view('admin.dashboard', ["data" => compact(
            'postCount',
            'averagePostViews',
            'averageComments',
            'postHistory',
            'authorCount',
            'averageAuthorPosts',
            'viewPerTag'
        )]);
    }

    function manageJournalist()
    {
        $authors = User::where('role_id', 2)->get();

        return view('admin.journalist', compact('authors'));
    }

    function addAuthor()
    {
        return view('dashboard.admin.add-author');
    }

    function storeAuthor()
    {
        $author = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'role_id' => 2,
            'password' => request('password'),
        ]);

        return redirect('/dashboard/admin/manage-author');
    }

    function deleteAuthor(User $author)
    {
        $author->delete();

        return redirect()->back(200);
    }

    function managePost()
    {
        $posts = Post::all();

        return view('admin.post', compact('posts'));
    }


    // Journalist
    function journalistHome()
    {
        // Posts aggregation
        $post = Post::where('author_id', auth()->user()->id)->get();
        $postCount = $post->count();
        $averagePostViews = $post->avg('views');

        $recentComments = $post->map(function ($a) {
            return $a->comments()->orderBy('created_at', 'desc')->first();
        })->sortByDesc('created_at')->take(5);

        return view('journalist.dashboard', ["data"=>compact(
            'postCount',
            'averagePostViews',
            'recentComments'
        )]);
    }

    function journalistPost()
    {
        $posts = Post::where('author_id', auth()->user()->id)->get();

        return view('journalist.articles', compact('posts'));
    }
}
