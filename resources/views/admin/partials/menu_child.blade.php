<ol class="dd-list" >
    @php
        $list = $list->sortBy('sort');
    @endphp
    @foreach ($list as $item)
        <li class="dd-item" data-id="{{$item->id}}">
            <div class="dd-handle" >
                <i class="fa {{$item->icon}}"></i> 
                <span>{{$item->title}}</span>
                
                <span class="pull-right dd-nodrag">
                    <a href="{{route('admin.menu.edit', $item->id)}}"><i
                            class="fa fa-edit"></i></a>
                    <a data-id="{{$item->id}}" class="remove-menu"><i class="fa fa-trash"></i></a>
                </span>
            </div>
            @if ($item->child)
                @include('admin.partials.menu_child', ['list' => $item->child])
            @endif
        </li>
    @endforeach
</ol>