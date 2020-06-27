{{-- <ul class="pagination-bar">
    <li class="first">
        <a href="{{route('customer.index', ['page' => 1, 'item_per_page' => $item_per_page])}}">Đầu</a>
    </li>

    @if ($total_page <= 5)
        @for ($i = 1; $i <= $total_page; $i++)
            <li>
                <a href="{{route('customer.index', ['page' => $i, 'item_per_page' => $item_per_page] )}}">{{$i}}</a>
            </li>
        @endfor                 
    @endif

    @if ($total_page > 5 && $current_page < 5 )
        @for ($i = 1; $i <= 5; $i++)
            <li>
                <a href="{{route('customer.index', ['page' => $i, 'item_per_page' => $item_per_page] )}}">{{$i}}</a>
            </li>
        @endfor
        <li>
            <a href="{{route('customer.index', ['page' => 6, 'item_per_page' => $item_per_page] )}}">...</a>
        </li>                 
    @endif

    @if ($total_page > 5 && $current_page >= 5 && $current_page <= $total_page - 4  )
        <li>
            <a href="{{route('customer.index', ['page' => $current_page - 3, 'item_per_page' => $item_per_page] )}}">...</a>
        </li> 
        @for ($i = $current_page - 2; $i <= $current_page + 2; $i++)
            <li>
                <a href="{{route('customer.index', ['page' => $i, 'item_per_page' => $item_per_page] )}}">{{$i}}</a>
            </li>
        @endfor
        <li>
            <a href="{{route('customer.index', ['page' => $current_page + 3, 'item_per_page' => $item_per_page] )}}">...</a>
        </li>                 
    @endif

    @if ($total_page > 5 && $current_page > $total_page - 4 )
        <li>
            <a href="{{route('customer.index', ['page' => $total_page - 6, 'item_per_page' => $item_per_page] )}}">...</a>
        </li> 
        @for ($i = $total_page - 4; $i <= $total_page; $i++)
            <li>
                <a href="{{route('customer.index', ['page' => $i, 'item_per_page' => $item_per_page] )}}">{{$i}}</a>
            </li>
        @endfor                  
    @endif

    <li class="last">
        <a href="{{route('customer.index', ['page' => $total_page, 'item_per_page' =>  $item_per_page])}}">Cuối</a>
    </li>
</ul>
 --}}

<div class="row">
    <div class="col-sm-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 51 to 57 of 57 entries
        </div>
    </div>
    <div class="col-sm-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination">
                <li class="paginate_button previous" id="example2_previous"><a href="#" aria-controls="example2"
                        data-dt-idx="0" tabindex="0">Previous</a></li>
                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a>
                </li>
                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a>
                </li>
                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a>
                </li>
                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a>
                </li>
                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a>
                </li>
                <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="6"
                        tabindex="0">6</a></li>
                <li class="paginate_button next disabled" id="example2_next"><a href="#" aria-controls="example2"
                        data-dt-idx="7" tabindex="0">Next</a></li>
            </ul>
        </div>
    </div>
</div>