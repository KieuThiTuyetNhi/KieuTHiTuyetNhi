@foreach ($list_brand as $item)
    <ul class="list-group list-group-flush ">
        <a class="cat-item-meomeo text-danger" href="{{ route('slug.home', ['slug' => $item->slug]) }}">
            {{ $item->name }}
            <hr>
        </a>
    </ul>
@endforeach
