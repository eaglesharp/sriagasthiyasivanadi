<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()->where('is_published', true)->whereNotNull('published_at')->whereDate('published_at', '<=', now())->latest('published_at')->paginate(6);
        $recentBlogs = Blog::query()->where('is_published', true)->whereNotNull('published_at')->whereDate('published_at', '<=', now())->latest('published_at')->take(4)->get();

        return view('blogs.index', compact('blogs', 'recentBlogs'));
    }

    public function show(string $slug)
    {
        $blog = Blog::query()->where('slug', $slug)->where('is_published', true)->whereDate('published_at', '<=', now())->firstOrFail();

        $recentBlogs = Blog::query()->where('is_published', true)->whereKeyNot($blog->id)->latest('published_at')->take(4)->get();

        return view('blogs.show', compact('blog', 'recentBlogs'));
    }

    public function loadMore()
    {
        $blogs = Blog::query()->where('is_published', true)->whereNotNull('published_at')->whereDate('published_at', '<=', now())->latest('published_at')->paginate(6);

        return view('blogs._cards', compact('blogs'));
    }
}
