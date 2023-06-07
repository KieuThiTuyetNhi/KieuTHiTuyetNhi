@if (Session::has("Cart") != null)
   <table class="table table-bordered" id="myTable">
  
    <tbody>
        @foreach (Session::get('Cart')->products as $item)
        <tr>
            <td></td>
            <td style="font-size: 20px">
                <span>{{$item['productInfo']->name}}</span> <br>
                <span>{{$item['quanty']}} x {{number_format($item['productInfo']->price_buy)}}</span>
            </td>
            <td class="si-close">

                <button
                style="font-size: 20px"
                type="button"
                class="btn-close" data-id="{{$item['productInfo']->id}}"
            ></button>
            </td>

        </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th>
                <h6 style="width:80px;">
                    Tổng tiền
                </h6>
            </th>
            <td>
               <input hidden  id="total-quanty-cart" type="number" value="{{Session::get('Cart')->totalQuanty}}">
                {{number_format(Session::get('Cart')->totalPrice,0)}}
            </td>
        </tr>
     
    </tfoot>
  </table>
  
  

@endif