<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\GalleryItem;
use App\Models\NewsEvent;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'blogCount' => Blog::count(),
            'newsCount' => NewsEvent::count(),
            'galleryCount' => GalleryItem::count(),
            'messageCount' => ContactMessage::where('status', 'new')->count(),
        ]);
    }
}
