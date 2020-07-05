<div class="slide-uudai owl-carousel">
    @foreach($list_hightline_post as $post)
    <div class="item">
        <div class="wp-item-uudai">
            <div class="img-uudai">
                <a href="{{route('post.detail', $post->slug)}}">
                    <img class="el_image" src="{{$post->image}}" alt="">
                </a>
            </div>
            <div class="text-uudai text-center hidden-xs">
                <h3 class="h3-title" style="">{{$post->title}}</h3>

                <div class="wp-shopnow">
                    <a href="{{route('post.detail', $post->slug)}}" class="btn btn-default btn-now btn-hover" style="border: 0px">Xem
                    thêm</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>