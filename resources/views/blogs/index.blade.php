<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Insights on Nadi Astrology, palm-leaf readings, spiritual practice, and preparing for a consultation.">
    <title>Blogs | Agasthiya Mahashiva Nadi Peedam</title>
    <link rel="stylesheet" href="/astrol.css"><script src="/astrol.js" defer></script>
</head>
<body>
    @php $suppress_global_banner = true; @endphp
    @include('partials.site-header')
    <main class="insights-page">
        @include('partials.page-banner', [
            'eyebrow' => 'Media & Insights',
            'title' => 'Stories that help you<br><span>understand the tradition.</span>',
            'subtitle' => 'Thoughtful notes on Nadi Astrology, palm-leaf readings, and the questions we carry into a consultation.',
            'image' => asset('images/nadi-deities.jpeg'),
            'alt' => 'Agastya and Lopamudra Devi',
        ])
        <section class="blog-listing"><div class="container-custom"><div class="listing-heading"><div><p class="eyebrow">Latest from the Peedam</p><h2>Explore our insights.</h2></div><span>{{ $blogs->total() }} articles</span></div><div class="blog-content-layout"><div class="blog-main"><div class="blog-grid">
            @forelse ($blogs as $blog)
                @include('blogs._card', ['blog' => $blog])
            @empty
                <p class="empty-state">New insights will be published here soon.</p>
            @endforelse
        </div><div class="load-more-wrap">@if ($blogs->hasMorePages())<button class="load-more-button" type="button" data-load-more data-next-page="2">Load More Articles <span>↓</span></button>@endif</div></div><aside class="recent-sidebar"><div class="sidebar-heading"><p class="eyebrow">Keep reading</p><h3>Recent Blogs</h3></div><div class="recent-list">@foreach ($recentBlogs as $recent)<a class="recent-item" href="{{ route('blogs.show', $recent->slug) }}"><img src="{{ $recent->image_url }}" alt=""><span><small>{{ $recent->published_at?->format('d M Y') }}</small><strong>{{ $recent->title }}</strong></span></a>@endforeach</div><a class="sidebar-cta" href="{{ url('/contact-us') }}">Have a question?<strong>Speak with our team →</strong></a></aside></div></div></section>
        <script>document.querySelector('[data-load-more]')?.addEventListener('click', async function () { const button = this; const page = button.dataset.nextPage; button.disabled = true; button.innerHTML = 'Loading...'; try { const response = await fetch('{{ route('blogs.load-more') }}?page=' + page, { headers: { 'X-Requested-With': 'XMLHttpRequest' } }); const html = await response.text(); document.querySelector('.blog-grid').insertAdjacentHTML('beforeend', html); const next = Number(page) + 1; button.dataset.nextPage = next; if (!html.trim() || !html.includes('blog-card')) button.remove(); else { button.disabled = false; button.innerHTML = 'Load More Articles <span>↓</span>'; } } catch (error) { button.disabled = false; button.innerHTML = 'Try Again <span>↻</span>'; } });</script>
    </main>
    @include('partials.site-footer')
</body>
</html>
