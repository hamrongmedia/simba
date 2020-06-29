<ul class="pagination pagination-sm no-margin pull-right">
    <li>
        <span class="page-link pjax-container"> Start </span>
    </li>

    @if ($paginator->total_page <= 5)
        @for ($i = 1; $i <= $paginator->total_page; $i++)
            <li>
                <span class="page-link pjax-container"> {{$i}} </span>
            </li>
        @endfor                 
    @endif

    @if ($paginator->total_page > 5 && $current_page < 5 )
        @for ($i = 1; $i <= 5; $i++)
            <li>
                <span class="page-link pjax-container"> {{$i}} </span>
            </li>
        @endfor
        <li>
            <span class="page-link pjax-container"> {{$i}} </span>
        </li>                 
    @endif

    @if ($paginator->total_page > 5 && $current_page >= 5 && $current_page <= $paginator->total_page - 4  )
        <li>
            <span class="page-link pjax-container"> Start </span>
        </li> 
        @for ($i = $current_page - 2; $i <= $current_page + 2; $i++)
            <li>
                <span class="page-link pjax-container"> {{$i}} </span>
            </li>
        @endfor
        <li>
            <span class="page-link pjax-container"> End </span>
        </li>                 
    @endif

    @if ($paginator->total_page > 5 && $current_page > $paginator->total_page - 4 )
        <li>
            <span class="page-link pjax-container"> {{$i}} </span>
        </li> 
        @for ($i = $paginator->total_page - 4; $i <= $paginator->total_page; $i++)
            <li>
                <span class="page-link pjax-container"> {{$i}} </span>
            </li>
        @endfor                  
    @endif

    <li class="last">
        <span class="page-link pjax-container"> End </span>
    </li>
</ul>

