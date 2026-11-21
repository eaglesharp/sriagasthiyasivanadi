<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $item->excerpt }}"><title>{{ $item->title }} | News &amp; Events</title>
    <link rel="stylesheet" href="/astrol.css"><script src="/astrol.js" defer></script>
</head>
<body>
    @php $suppress_global_banner = true; @endphp
    @include('partials.site-header')
    <main class="article-page">
        @include('partials.page-banner', [
            'eyebrow' => $item->event_date?->format('d M Y').' · News & Events',
            'title' => e($item->title),
            'subtitle' => $item->excerpt,
            'actionText' => 'Back to News & Events',
            'actionUrl' => route('news-events.index'),
            'actionIcon' => '←',
            'image' => asset('images/nadi-deities.jpeg'),
            'alt' => 'Agastya and Lopamudra Devi',
        ])
        <article class="article-body"><div class="container-custom article-layout article-no-image"><div class="article-copy">@if (str_contains($item->content, '<')){!! $item->content !!}@else{!! nl2br(e($item->content)) !!}@endif</div><aside class="recent-sidebar article-sidebar"><div class="sidebar-heading"><p class="eyebrow">More updates</p><h3>Recent News</h3></div><div class="recent-list">@foreach ($recentItems as $recent)<a class="recent-item" href="{{ route('news-events.show', $recent->slug) }}"><img src="{{ $recent->image_url }}" alt=""><span><small>{{ $recent->published_at?->format('d M Y') }}</small><strong>{{ $recent->title }}</strong></span></a>@endforeach</div><a class="article-contact" href="{{ url('/contact-us') }}">Want to know more?<strong>Talk to our team →</strong></a></aside></div></article></main>
    @include('partials.site-footer')
</body>
</html>
