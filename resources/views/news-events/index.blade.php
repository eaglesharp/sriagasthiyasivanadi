<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="News, events, observances, and updates from Agasthiya Mahashiva Nadi Peedam.">
    <title>News &amp; Events | Agasthiya Mahashiva Nadi Peedam</title>
    <link rel="stylesheet" href="/astrol.css"><script src="/astrol.js" defer></script>
</head>
<body>
    @php $suppress_global_banner = true; @endphp
    @include('partials.site-header')
    <main class="insights-page">
        @include('partials.page-banner', [
            'eyebrow' => 'Media & Insights',
            'title' => 'Stay close to the<br><span>life of the Peedam.</span>',
            'subtitle' => 'Updates on observances, consultation schedules, important notices, and the living tradition of Nadi Astrology.',
            'image' => asset('images/nadi-deities.jpeg'),
            'alt' => 'Agastya and Lopamudra Devi',
        ])
        <section class="blog-listing"><div class="container-custom"><div class="listing-heading"><div><p class="eyebrow">News &amp; Events</p><h2>What is happening.</h2></div><span>{{ $items->total() }} updates</span></div><div class="blog-content-layout"><div class="blog-main"><div class="blog-grid">@forelse ($items as $item)@include('news-events._card', ['item' => $item])@empty<p class="empty-state">New updates will be published here soon.</p>@endforelse</div><div class="load-more-wrap">@if ($items->hasMorePages())<button class="load-more-button" type="button" data-news-load-more data-next-page="2">Load More Updates <span>↓</span></button>@endif</div></div><aside class="recent-sidebar"><div class="sidebar-heading"><p class="eyebrow">Stay informed</p><h3>Recent News</h3></div><div class="recent-list">@foreach ($recentItems as $recent)<a class="recent-item" href="{{ route('news-events.show', $recent->slug) }}"><img src="{{ $recent->image_url }}" alt=""><span><small>{{ $recent->published_at?->format('d M Y') }}</small><strong>{{ $recent->title }}</strong></span></a>@endforeach</div><a class="sidebar-cta" href="{{ url('/contact-us') }}">Need an update?<strong>Contact our team →</strong></a></aside></div></div></section>
    </main>
    @include('partials.site-footer')
    <script>document.querySelector('[data-news-load-more]')?.addEventListener('click', async function () { const button = this; const page = button.dataset.nextPage; button.disabled = true; button.textContent = 'Loading...'; try { const response = await fetch('{{ route('news-events.load-more') }}?page=' + page, { headers: { 'X-Requested-With': 'XMLHttpRequest' } }); const html = await response.text(); document.querySelector('.blog-grid').insertAdjacentHTML('beforeend', html); button.dataset.nextPage = Number(page) + 1; if (!html.trim() || !html.includes('blog-card')) button.remove(); else { button.disabled = false; button.innerHTML = 'Load More Updates <span>↓</span>'; } } catch (error) { button.disabled = false; button.innerHTML = 'Try Again <span>↻</span>'; } });</script>
</body>
</html>
