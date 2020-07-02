<div class="wp-main-menu clearfix">
    <nav id="main-menu" class=" navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="padding: 0px;">
            <ul class="nav navbar-nav navbar-left" id="primary-menu">
                @if(isset($main_menu))
                    @foreach ($main_menu->child as $item)
                    <li class="dropdown">
                        <a href="{{$item->link ?? '#'}}"><span>{{$item->title ?? ''}}</span></a>
                        @if ($item->child->isNotEmpty())
                            <span class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></span>
                            <ul class="dropdown-menu">
                            @foreach ($item->child as $child)
                                    <li>
                                        <a href="{{$item->link ?? '#'}}" title="Bộ đồ lót đệm dày">{{$child->title ?? ''}}</a>
                                    </li>
                            @endforeach
                            </ul>
                        @endif
                    </li>
                    @endforeach
                @endif
                <li>
                    <a href="#"><span>Blog</span></a>
                </li>
            </ul>
        </div>
    </nav>
</div> <!-- end wp-main-menu -->
