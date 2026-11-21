<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $blog->excerpt }}"><title>{{ $blog->title }} | Agasthiya Mahashiva Nadi Peedam</title>
    <link rel="stylesheet" href="/astrol.css"><script src="/astrol.js" defer></script>
</head>
<body>
    @php $suppress_global_banner = true; @endphp
    @include('partials.site-header')
    <main class="article-page">
        @include('partials.page-banner', [
            'eyebrow' => $blog->published_at?->format('d M Y').' · '.$blog->author,
            'title' => e($blog->title),
            'subtitle' => $blog->excerpt,
            'actionText' => 'Back to Blogs',
            'actionUrl' => route('blogs.index'),
            'actionIcon' => '←',
            'image' => asset('images/nadi-deities.jpeg'),
            'alt' => 'Agastya and Lopamudra Devi',
        ])
        <article class="article-body"><div class="container-custom article-layout article-no-image"><div class="article-copy">@if (str_contains($blog->content, '<')){!! $blog->content !!}@else{!! nl2br(e($blog->content)) !!}@endif</div><aside class="recent-sidebar article-sidebar"><div class="sidebar-heading"><p class="eyebrow">More to explore</p><h3>Recent Blogs</h3></div><div class="recent-list">@foreach ($recentBlogs as $recent)<a class="recent-item" href="{{ route('blogs.show', $recent->slug) }}"><img src="{{ $recent->image_url }}" alt=""><span><small>{{ $recent->published_at?->format('d M Y') }}</small><strong>{{ $recent->title }}</strong></span></a>@endforeach</div><a class="article-contact" href="{{ url('/contact-us') }}">Want to know more?<strong>Talk to our team →</strong></a></aside></div></article></main>
    @include('partials.site-footer')
</body>
</html>
