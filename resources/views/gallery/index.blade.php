<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Photo and video gallery from Agasthiya Mahashiva Nadi Peedam and the Nadi Astrology tradition.">
    <title>Photo &amp; Video Gallery | Agasthiya Mahashiva Nadi Peedam</title>
    <link rel="stylesheet" href="/astrol.css"><script src="/astrol.js" defer></script>
</head>
<body>
    @php $suppress_global_banner = true; @endphp
    @include('partials.site-header')
    <main class="gallery-page">
        @include('partials.page-banner', [
            'eyebrow' => 'Photo & Video Gallery',
            'title' => 'A visual record of the<br><span>Peedam and tradition.</span>',
            'subtitle' => 'A simple gallery of the images and videos that represent our work, place, and lineage.',
            'image' => asset('images/nadi-deities.jpeg'),
            'alt' => 'Agastya and Lopamudra Devi',
        ])
        <section class="gallery-listing">
            <div class="container-custom">
                <div class="gallery-heading">
                    <h1>Photo &amp; Video Gallery</h1>
                    <div class="gallery-filters" role="tablist">
                        <button class="is-active" type="button" data-gallery-filter="all">All</button>
                        <button type="button" data-gallery-filter="photo">Photos</button>
                        <button type="button" data-gallery-filter="video">Videos</button>
                    </div>
                </div>

                <div class="gallery-masonry">
                    @foreach ($items as $item)
                        <article class="gallery-tile" data-gallery-type="{{ $item->media_type }}">
                            @if ($item->media_type === 'photo')
                                <button class="gallery-open" type="button" data-gallery-image="{{ $item->image_url }}" data-gallery-title="{{ $item->title }}">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                                    <span class="gallery-tile-icon">↗</span>
                                </button>
                            @else
                                @php
                                    $ytId = null;
                                    if ($item->video_url) {
                                        preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([A-Za-z0-9_-]{6,})/', $item->video_url, $m);
                                        $ytId = $m[1] ?? null;
                                    }
                                    $thumb = $item->image_url ?: ($ytId ? 'https://img.youtube.com/vi/'. $ytId .'/hqdefault.jpg' : null);
                                @endphp
                                <button class="gallery-video-tile" type="button" data-gallery-video="{{ $item->video_url }}" data-gallery-title="{{ $item->title }}">
                                    <span class="video-play">▶</span>
                                    @if ($thumb)
                                        <img src="{{ $thumb }}" alt="{{ $item->title }}">
                                    @else
                                        <div class="video-placeholder"></div>
                                    @endif
                                </button>
                            @endif
                        </article>
                    @endforeach
                </div>

                <p class="gallery-empty" hidden>No media in this category yet.</p>
            </div>
        </section>
    </main>
    @include('partials.site-footer')
    <div class="gallery-lightbox" data-gallery-lightbox hidden>
        <button type="button" data-gallery-close aria-label="Close media">×</button>
        <div class="gallery-lightbox-inner">
            <img data-gallery-lightbox-image alt="" style="display:none; width:100%; height:auto;">
            <div data-gallery-lightbox-video style="display:none; width:100%; position:relative;"></div>
        </div>
        <p data-gallery-lightbox-title></p>
    </div>
    <script>
    const galleryTiles = [...document.querySelectorAll('[data-gallery-type]')];
    const galleryEmpty = document.querySelector('.gallery-empty');

    document.querySelectorAll('[data-gallery-filter]').forEach(button => button.addEventListener('click', () => {
        document.querySelectorAll('[data-gallery-filter]').forEach(item => item.classList.remove('is-active'));
        button.classList.add('is-active');
        const filter = button.dataset.galleryFilter;
        let visible = 0;
        galleryTiles.forEach(tile => {
            const show = filter === 'all' || tile.dataset.galleryType === filter;
            tile.hidden = !show;
            if (show) visible++;
        });
        galleryEmpty.hidden = visible > 0;
    }));

    const lightbox = document.querySelector('[data-gallery-lightbox]');
    const lbImage = lightbox?.querySelector('[data-gallery-lightbox-image]');
    const lbVideo = lightbox?.querySelector('[data-gallery-lightbox-video]');
    const lbTitle = lightbox?.querySelector('[data-gallery-lightbox-title]');

    // helper: extract YouTube ID and return embed URL
    function youtubeEmbedUrl(url) {
        if (!url) return null;
        const m = url.match(/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([A-Za-z0-9_-]{6,})(?:\S+)?$/);
        if (m && m[1]) return 'https://www.youtube.com/embed/' + m[1] + '?autoplay=1';
        return null;
    }

    // open image lightbox
    document.querySelectorAll('[data-gallery-image]').forEach(button => button.addEventListener('click', () => {
        const src = button.dataset.galleryImage;
        lbVideo.innerHTML = '';
        lbVideo.style.display = 'none';
        lbImage.style.display = '';
        lbImage.src = src;
        lbTitle.textContent = button.dataset.galleryTitle;
        lightbox.hidden = false;
    }));

    // open video lightbox for video tiles (uses data-gallery-video attribute)
    document.querySelectorAll('[data-gallery-video]').forEach(button => button.addEventListener('click', () => {
        const url = button.dataset.galleryVideo;
        const embed = youtubeEmbedUrl(url);
        lbImage.style.display = 'none';
        lbImage.src = '';
        lbVideo.innerHTML = '';
        if (embed) {
            const iframe = document.createElement('iframe');
            iframe.src = embed;
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
            iframe.setAttribute('allowfullscreen', '');
            iframe.style.position = 'absolute';
            iframe.style.top = '0';
            iframe.style.left = '0';
            iframe.style.width = '100%';
            iframe.style.height = '100%';
            lbVideo.appendChild(iframe);
            lbVideo.style.display = 'block';
        } else {
            // fallback: open URL in new tab
            window.open(url, '_blank');
            return;
        }
        lbTitle.textContent = button.dataset.galleryTitle || '';
        lightbox.hidden = false;
    }));

    document.querySelector('[data-gallery-close]')?.addEventListener('click', () => {
        // stop any playing video
        if (lbVideo) lbVideo.innerHTML = '';
        lightbox.hidden = true;
    });

    lightbox?.addEventListener('click', event => {
        if (event.target === lightbox) {
            if (lbVideo) lbVideo.innerHTML = '';
            lightbox.hidden = true;
        }
    });
    </script>
</body>
</html>
