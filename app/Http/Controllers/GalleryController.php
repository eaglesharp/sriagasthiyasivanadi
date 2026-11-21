<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::query()->where('is_published', true)->orderBy('sort_order')->latest('created_at')->get();

        return view('gallery.index', compact('items'));
    }
}
