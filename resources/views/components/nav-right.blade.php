
        @foreach ($list_category as $item)
        <ul class="list-group list-group-flush">
           <a style="text-decoration: none" href="{{route('slug.home',['slug'=>$item->slug])}}"> {{$item->name}}<hr></a>
          </ul>
        @endforeach