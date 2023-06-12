    @foreach ($list_menu1 as $footermenu)
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

            <x-footer-menu-item :menu="$footermenu" />
        </div>
    @endforeach
