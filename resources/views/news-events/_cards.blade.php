@foreach ($items as $item)
    @include('news-events._card', ['item' => $item])
@endforeach
