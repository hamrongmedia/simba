Showing <b>{{($current_page-1)*$paginator->per_page +1}}</b> to <b>{{$current_page*$paginator->per_page < $paginator->total_item ? $current_page*$paginator->per_page : $paginator->total_item}}</b> of <b>{{$paginator->total_item}}</b> items

<ul class="pagination pagination-sm no-margin pull-right">
    <li>
        <span class="page-link"> Start </span>
    </li>

    @if ($paginator->total_page <= 5)
        @for ($i = 1; $i <= $paginator->total_page; $i++)
            <li class="page-item {{$i == $current_page ? 'active' : ''}}">
                <span onclick="getDataPaginate(this, type)" class="page-link"> {{$i}} </span>
            </li>
        @endfor                 
    @endif

    @if ($paginator->total_page > 5 && $current_page < 5 )
        @for ($i = 1; $i <= 5; $i++)
            <li class="page-item {{$i == $current_page ? 'active' : ''}}">
                <span onclick="getDataPaginate(this, type)" class="page-link"> {{$i}} </span>
            </li>
        @endfor
        <li class="page-item ">
            <span > ... </span>
        </li>                 
    @endif

    @if ($paginator->total_page > 5 && $current_page >= 5 && $current_page <= $paginator->total_page - 4  )
        <li class="page-item ">
            <span > ... </span>
        </li>  
        @for ($i = $current_page - 2; $i <= $current_page + 2; $i++)
            <li class="page-item {{$i == $current_page ? 'active' : ''}}">
                <span onclick="getDataPaginate(this, type)" class="page-link"> {{$i}} </span>
            </li>
        @endfor
        <li class="page-item">
            <span > ... </span>
        </li>  
    @endif

    @if ($paginator->total_page > 5 && $current_page > $paginator->total_page - 4 )
        <li class="page-item">
            <span > ... </span>
        </li> 
        @for ($i = $paginator->total_page - 4; $i <= $paginator->total_page; $i++)
            <li class="page-item {{$i == $current_page ? 'active' : ''}}">
                <span onclick="getDataPaginate(this, type)" class="page-link"> {{$i}} </span>
            </li>
        @endfor                  
    @endif

    <li class="last">
        <span class="page-link"> End </span>
    </li>
</ul>

