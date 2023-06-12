<style>
    .cat-item-meomeo {
        text-decoration: none;
        transition: all .4s;
    }

    .cat-item-meomeo:hover {
        color: #000 !important;
    }
</style>
@foreach ($list_category as $item)
    <ul class="list-group list-group-flush">
        <a class="cat-item-meomeo text-danger" href="{{ route('slug.home', ['slug' => $item->slug]) }}">
            {{ $item->name }}
            <hr>
        </a>
    </ul>
@endforeach
