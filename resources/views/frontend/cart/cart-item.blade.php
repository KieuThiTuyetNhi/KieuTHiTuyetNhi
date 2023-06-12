@if (Session::has('Cart') != null)
    <table class="table table-bordered" id="myTable">

        <tbody>
            @foreach (Session::get('Cart')->products as $item)
                {{-- @php
        $arr_image=$pro->producthinh;
        $hinh = 'hinh.png';
        if(count($arr_image)>0)
        {                  
        $hinh=$arr_image[0]['image'];
        }
        @endphp --}}
                @php
                    // $arr_image=$pro->producthinh;
                    $hinh = 'hinh.png';
                    // if(count($arr_image)>0)
                    // {
                    // $hinh=$arr_image[0]['image'];
                    // }
                @endphp
                <tr>
                    <td>
                        <img style="width:100px; height=100px;" src="{{ asset('images/product/' . $hinh) }}"
                            class="img-fluid" alt="{{ $hinh }}" />

                    </td>
                    <td style="font-size: 20px">
                        <span>{{ $item['productInfo']->name }}</span> <br>
                        <span>{{ $item['quanty'] }} x {{ number_format($item['productInfo']->price_buy) }}</span>
                    </td>
                    <td class="si-close">

                        <button style="font-size: 20px" type="button" class="btn-close"
                            data-id="{{ $item['productInfo']->id }}"></button>
                    </td>

                </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>
                    <h6>
                        Tổng tiền
                    </h6>
                </th>
                <td>
                    <input hidden id="total-quanty-cart" type="number" value="{{ Session::get('Cart')->totalQuanty }}">
                    {{ number_format(Session::get('Cart')->totalPrice, 0) }}
                </td>
            </tr>

        </tfoot>
    </table>


@endif
