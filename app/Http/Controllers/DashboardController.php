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

        return view('dashboard.admin.home', compact(
            'postCount',
            'averagePostViews',
            'averageComments',
            'postHistory',
            'authorCount',
            'averageAuthorPosts',
            'viewPerTag'
        ));
    }

    function manageAuthor()
    {
        $author = User::where('role_id', 2)->get();

        return view('dashboard.admin.manage-author', compact('author'));
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

        return redirect('/dashboard/admin/manage-author');
    }

    function managePost()
    {
        $post = Post::all();

        return view('dashboard.admin.manage-post', compact('post'));
    }


    // Journalist
}
