<div class="mobile-main-menu">
    <div class="la-scroll-fix-infor-user">
        <div class="la-nav-menu-items">
            <ul class="la-nav-list-items ul-b">
                <!-- khi có sub-menu (menu con ) thì thêm 1 class  menu-item-has-children -->
                @if(isset($main_menu))
                    @foreach ($main_menu->child as $item)
                    @if($item->child->isNotEmpty())
                        <li class="ng-scope ng-has-child1 menu-item-has-children">
                    @else
                        <li class="ng-scope ng-has-child1">
                    @endif
                        <a href="{{$item->link ?? '#'}}">{{$item->title ?? ''}}</a>
                        @if ($item->child->isNotEmpty())
                            <ul class="sub-menu ul-b">
                                @foreach ($item->child as $child)
                                    <li class="ng-scope ng-has-child2">
                                        <a href="{{$item->link ?? '#'}}">{{$child->title ?? ''}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endforeach
                @endif 
            </ul>
        </div>
    </div>
</div> <!-- emd menu-main-mobile -->