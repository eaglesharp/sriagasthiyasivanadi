<aside class="admin-sidebar">
    <p class="admin-nav-label">Content</p>
    <a class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a class="{{ request()->routeIs('admin.blogs.*') ? 'is-active' : '' }}" href="{{ route('admin.blogs.index') }}">Blogs <span>{{ \App\Models\Blog::count() }}</span></a>
    <a class="{{ request()->routeIs('admin.news-events.*') ? 'is-active' : '' }}" href="{{ route('admin.news-events.index') }}">News &amp; Events <span>{{ \App\Models\NewsEvent::count() }}</span></a>
    <a class="{{ request()->routeIs('admin.gallery.*') ? 'is-active' : '' }}" href="{{ route('admin.gallery.index') }}">Photo &amp; Video Gallery <span>{{ \App\Models\GalleryItem::count() }}</span></a>
    <p class="admin-nav-label">Enquiries</p>
    <a class="{{ request()->routeIs('admin.contact.*') ? 'is-active' : '' }}" href="{{ route('admin.contact.index') }}">Contact Messages <span>{{ \App\Models\ContactMessage::where('status', 'new')->count() }}</span></a>
    <a href="{{ url('/') }}">View Website ↗</a>
</aside>
