<style>
    .footer-item:hover {
        color: red !important;
    }
</style>
@if ($sub == false)
    <!-- Links -->
    <h6 class="text-uppercase fw-bold mb-4">
        {{ $menu->name }}
    </h6>
@else
    <!-- Links -->
    <h6 class="text-uppercase fw-bold mb-4">
        {{ $menu->name }}
    </h6>
    @foreach ($list_menu_sub as $item)
        <p>
            <a href="{{ $item->link }}" class="text-decoration-none text-secondary footer-item">{{ $item->name }}</a>
        </p>
    @endforeach
@endif
