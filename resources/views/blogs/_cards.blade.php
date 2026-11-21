@foreach ($blogs as $blog)
    @include('blogs._card', ['blog' => $blog])
@endforeach
