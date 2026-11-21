<section class="page-banner">
    <div class="container-custom">
        @if (!empty($actionText) && !empty($actionUrl))
            <a class="page-banner-action" href="{{ $actionUrl }}">
                <span>{{ $actionIcon ?? '←' }}</span> {{ $actionText }}
            </a>
        @endif
        @if (!empty($eyebrow))
            <p class="eyebrow">{{ $eyebrow }}</p>
        @endif
        <h1>{!! $title ?? '' !!}</h1>
        @if (!empty($subtitle))
            <p class="page-banner-subtitle">{{ $subtitle }}</p>
        @endif
    </div>
</section>
