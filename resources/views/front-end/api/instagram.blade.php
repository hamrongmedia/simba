<section class="sec-home-11 ">
        <div class="container-fluid pd-0">
            <div class="sec-instagam">
                <div class="wp-title-sec">
                    <div class="title-instagram text-center">
                        <span><i class="fab fa-instagram" aria-hidden="true"></i></span>
                        <h2>SHOP OUR INSTAGRAM</h2>
                        <h4>#samunderwear</h4>
                    </div>
                </div>
                <div class="owl-carousel slider-instagram">

                    <?php
                        $api = DB::table('db_instagram')->select('*')->where('id', '=', 1)->get();
                        foreach ($api as $r) {
                            $r->id_user;
                            $r->token;
                        }
                        $url='https://graph.instagram.com/'.$r->id_user.'/media?fields=username,id,ig_id,media_url,permalink,username&access_token='.$r->token.'';
                        
                        $content = null;
                        try {
                            $content = file_get_contents($url);
                        } catch (\Exception $e) {
                            $content = null;
                        }
                        $json = json_decode($content, true);
                    ?>
                    @if ($content)
                        @for ($i = 0 ;$i < 10 ; $i++)
                                <div class="item">
                                    <img class="el_image" src="{{ $json['data'][$i]['media_url'] }}" alt="banner0">
                                    <a href="{{ $json['data'][$i]['permalink'] }}" target="_bank">  
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </div> 
                        @endfor   
                    @endif
                       
                </div>
            </div>
        </div>
        @include('front-end.content.modal_inatagram')
    </section> <!-- end sec-home-11 -->