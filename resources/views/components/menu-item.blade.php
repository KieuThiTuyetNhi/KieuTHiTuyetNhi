     @if ($sub==false)    
     <li class="nav-item">
        <a class="nav-link" href="{{ $menu->link }}">{{ $menu->name }}</a>
      </li>
     @else
    
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ $menu->link }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $menu->name }}
        </a>
        <ul class="dropdown-menu">
            @foreach ($list_menu_sub as $menu_sub)
            <a class="dropdown-item" href="{{ $menu_sub->link }}">{{ $menu_sub->name }}</a>
            @endforeach
        </ul>
      </li>

     @endif

     
   
     
     
     
    


                  