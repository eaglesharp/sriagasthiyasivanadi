<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;

class NewsEventController extends Controller
{
    private function publishedQuery()
    {
        return NewsEvent::query()->where('is_published', true)->whereNotNull('published_at')->whereDate('published_at', '<=', now());
    }

    public function index()
    {
        $items = $this->publishedQuery()->latest('published_at')->paginate(6);
        $recentItems = $this->publishedQuery()->latest('published_at')->take(4)->get();

        return view('news-events.index', compact('items', 'recentItems'));
    }

    public function show(string $slug)
    {
        $item = $this->publishedQuery()->where('slug', $slug)->firstOrFail();
        $recentItems = $this->publishedQuery()->whereKeyNot($item->id)->latest('published_at')->take(4)->get();

        return view('news-events.show', compact('item', 'recentItems'));
    }

    public function loadMore()
    {
        $items = $this->publishedQuery()->latest('published_at')->paginate(6);

        return view('news-events._cards', compact('items'));
    }
}
