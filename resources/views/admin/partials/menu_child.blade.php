<ol class="dd-list" >
    @php
        $list = $list->sortBy('sort');
    @endphp
    @foreach ($list as $item)
        <li class="dd-item" data-id="{{$item->id}}">
            <div class="dd-handle" >
                <i class="fa {{$item->icon}}"></i> {{$item->name}}
                <span class="pull-right dd-nodrag">
                    <a href="https://demo.s-cart.org/sc_admin/menu/edit/54"><i
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