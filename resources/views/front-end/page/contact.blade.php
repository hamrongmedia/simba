@extends('front-end.layout.main')

@section('title', 'Liên hệ')

@section('content')

     <section class="sec-main-page">
        <div class="wp-list-tin" style="margin-bottom: 50px ">
            <div class="container">
                <div class="map-lh wp-title-danhmuc-s">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d251637.95196238213!2d105.6189045!3d9.779349!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1593675945127!5m2!1svi!2s" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="texts" style="font-size: 20px;">Venus Charm</h1>
                        <div class="contnet-lienhe">
                            <div class="wp-left-lh">
                                <p>Cám ơn quý khách đã ghé thăm website chúng tôi.</p>
                                
                                <p><strong>Địa chỉ:</strong>
                                    Số 01 Đại Cồ Việt, Quận Hai Bà Trưng, Hà Nội<br>
                                    <br>
                                    <strong>Điện thoại:</strong> <a>0989.935.818</a><br>
                                    <br>
                                    <strong>Email:</strong> <a href="mailto:info.venuscharm@gmail.com">info.venuscharm@gmail.com</a><br>
                                    <br>
                                    <strong>Thời gian làm việc:</strong><br>
                                    9:00 am - 22:00 pm tất cả các ngày trong tuần</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="wp-right-lh form-lien-he">
                            <form action="{{route('contact.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="text" name="customer_name" placeholder="Họ và tên *">
                                    @error('customer_name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="Email *">
                                    @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="phone" placeholder="Điện thoại *">
                                    @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="title" placeholder="Tiêu đề thư *">
                                    @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content" placeholder="Nội dung *" rows="8"></textarea>
                                    @error('content')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <input class="btn btn-primary" type="submit" name="create" value="Gửi đi">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('custom-js')

@endsection