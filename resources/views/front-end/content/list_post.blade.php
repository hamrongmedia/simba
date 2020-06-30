<div class="row">
   <!--  bắt đầu vòng lắp -->
    @foreach($posts as $post)
    <div class="col-md-4 col-sm-6 col-xs-12 blog-item">
        <div class="wp-item-tin-a">
            <div class="wp-img-tin-a img-cover">
                <a href="{{$post->link}}">
                 <!--    anh cắt 600x600 -->
                    <img src="{{$post->image}}" alt="{{$post->name}}">
                </a>
            </div>
            <div class="wp-text-tin-a">
                <h3 class="h3-title" style="line-height: 17px">
                    <a href="{{$post->link}}">{{$post->name}}</a>
                </h3>
                <div style="" class="desssss">{{$post->name}}</div>
            </div>
        </div>
    </div> <!-- end -->
    @endforeach
</div>