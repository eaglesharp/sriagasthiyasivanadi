<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $page['subtitle'] }}">
    <title>{{ $page['title'] }} | Agasthiya Mahashiva Nadi Peedam</title>
    <link rel="stylesheet" href="/astrol.css"><script src="/astrol.js" defer></script>
</head>
<body>
    @php $suppress_global_banner = true; @endphp
    @include('partials.site-header')
    <main class="article-page nadi-detail-page">
        @include('partials.page-banner', [
            'eyebrow' => 'Ancient wisdom · Vaitheeswaran Koil',
            'title' => e($page['title']),
            'subtitle' => $page['subtitle'],
            'actionText' => 'Nadi Astrology',
            'actionUrl' => route('nadi-astrology.overview'),
            'actionIcon' => '←',
            'image' => asset('images/nadi-deities.jpeg'),
            'alt' => 'Agastya and Lopamudra Devi',
        ])
        <article class="article-body"><div class="container-custom article-layout article-no-image"><div class="article-copy">
            @foreach ($page['sections'] ?? [] as $section)
                <section class="nadi-detail-section"><h2>{{ $section['heading'] }}</h2>@foreach ($section['paragraphs'] as $paragraph)<p>{{ $paragraph }}</p>@endforeach</section>
            @endforeach
            @if (!empty($page['table']))
                <div class="nadi-kandam-table"><div class="nadi-kandam-row nadi-kandam-head"><strong>Chapter</strong><strong>Focus Area</strong><strong>Description</strong></div>@foreach ($page['table'] as $row)<div class="nadi-kandam-row"><strong>{{ $row[0] }}</strong><span>{{ $row[1] }}</span><span>{{ $row[2] }}</span></div>@endforeach</div>
            @endif
            <a class="btn-primary nadi-detail-cta" href="{{ url('/contact-us') }}">Book an online Nadi reading →</a>
        </div><aside class="recent-sidebar article-sidebar nadi-detail-sidebar"><div class="sidebar-heading"><p class="eyebrow">Explore Nadi Astrology</p><h3>More chapters</h3></div><div class="recent-list"><a class="recent-item" href="{{ route('nadi-astrology.overview') }}"><span><strong>Overview</strong></span></a>@foreach ([['history', 'History of Nadi'], ['how-leaf-searching-works', 'How Leaf Searching Works'], ['the-kandams', 'The Kandams'], ['online-prediction-process', 'Online Prediction Process']] as [$slug, $label])<a class="recent-item" href="{{ route('nadi-astrology.show', $slug) }}"><span><strong>{{ $label }}</strong></span></a>@endforeach</div><a class="article-contact" href="{{ url('/contact-us') }}">Have a question?<strong>Speak with our team →</strong></a></aside></div></article>
    </main>
    @include('partials.site-footer')
</body>
</html>
