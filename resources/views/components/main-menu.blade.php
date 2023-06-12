<style>
    .nav-link {
        color: white !important;
    }
    /* .menu li:hover a {
        background-color: rgb(239, 68, 68);
        color: rgb(237, 68, 68);
    } */

</style>
<nav class="navbar navbar-expand-lg bg-danger navbar-dark mainmenu">
    <div class="container">
        <div class="container-fluid">
            <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach ($list_menu as $rowmenu)
                        <x-menu-item :menu="$rowmenu" />
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>
