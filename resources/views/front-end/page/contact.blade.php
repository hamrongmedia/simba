@extends('front-end.layout.main')

@section('title', 'Liên hệ')

@section('content')
     <section class="sec-main-page">
        <div class="wp-list-tin" style="margin-bottom: 50px ">
            <div class="container">
                <div class="map-lh wp-title-danhmuc-s">
                  
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2672.5871158658224!2d105.68250400417146!3d18.681536231220818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139ce745db1d48d%3A0x71cde7f8a9174428!2zMjU5IE5ndXnhu4VuIFbEg24gQ-G7qywgSMawbmcgQsOsbmgsIFRow6BuaCBwaOG7kSBWaW5oLCBOZ2jhu4cgQW4sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1596273880773!5m2!1svi!2s"  width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="texts" style="font-size: 20px;">Sam Underwear -  Đồ Lót & Đồ Ngủ Cao Cấp</h1>
                        <div class="contnet-lienhe">
                            <div class="wp-left-lh">
                                <p>Cám ơn quý khách đã ghé thăm website chúng tôi.</p>
                                <p>
                                    <strong>Add 1:</strong> Lô 19 Lê Hoàn ( Đối Diện Dạ Lan Sự Kiện) - Tp. Thanh Hoá<br>
                                    <br>
                                    <strong>Add 2:</strong> 259 Nguyễn Văn Cừ- Tp. Vinh<br>
                                    <br>
                                    <strong>Add 3:</strong> 368A Hoàng Diệu - Đà Nẵng<br>
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