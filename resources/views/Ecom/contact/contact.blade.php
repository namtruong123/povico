@extends('Ecom.layout')
@section('title', 'Liên hệ')
@section('content')
@include('Ecom.partials.header')

<div class="main-content">

    <!-- map -->
    <div class="wrap-map">
        <div id="map-contact" class="map-contact h590" data-map-zoom="16" data-map-scroll="true"></div>
    </div>
    <!-- /map -->

    <section class="flat-spacing">
        <div class="container">
            <div class="contact-us-content">
                <div class="row">
                    <div class="col-lg-4 mb-lg-30">
                        <h4 class="mb_30 wow fadeInUp">Văn phòng Povico</h4>
                        <div class="mb_28">
                            <h6 class="mb_8">Hotline:</h6>
                            <p class="text-body-default">0972.63.00.33</p>
                        </div>
                        <div class="mb_28">
                            <h6 class="mb_8">Email:</h6>
                            <p class="text-body-default">info@povico.vn</p>
                        </div>
                        <div class="mb_28">
                            <h6 class="mb_8">Địa chỉ:</h6>
                            <p class="text-body-default">
                                Showroom: 36 Lê Văn Khương, Xã Đông Thạnh, Hóc Môn, TP. HCM, Việt Nam
                            </p>
                        </div>
                        <div>
                            <h6 class="mb_8">Giờ làm việc:</h6>
                            <p class="text-body-default mb_4 open-time">
                                <span>Thứ 2 - Thứ 7:</span>
                                8:00 - 20:00
                            </p>
                            <p class="text-body-default open-time">
                                <span>Chủ nhật:</span>
                                8:00 - 20:00
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <h4 class="mb_7 wow fadeInUp">Liên hệ với chúng tôi</h4>
                        <p class="text_secondary mb_24 wow fadeInUp" data-wow-delay="0.1s">
                            Vui lòng điền thông tin bên dưới, chúng tôi sẽ phản hồi sớm nhất!
                        </p>
                        <form id="contactform" action="#" method="post" class="form-leave-comment">
                            @csrf
                            <div class="wrap">
                                <div class="cols">
                                    <fieldset>
                                        <input type="text" placeholder="Họ tên*" name="name" id="name" required>
                                    </fieldset>
                                    <fieldset>
                                        <input type="email" placeholder="Email*" name="email" id="email" required>
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset>
                                        <input type="text" placeholder="Số điện thoại*" name="phone" id="phone" required>
                                    </fieldset>
                                    <fieldset>
                                        <input type="text" placeholder="Mã đơn hàng (nếu có)" name="order_number" id="order_number">
                                    </fieldset>
                                </div>
                                <fieldset>
                                    <textarea name="message" id="message" rows="4" placeholder="Nội dung*" required></textarea>
                                </fieldset>
                            </div>
                            <div class="button-submit send-wrap">
                                <button class="tf-btn btn-onsurface" type="submit">
                                    Gửi liên hệ <i class="icon-arrow-up-right"></i>
                                </button>
                            </div>
                        </form>
                        {{-- Hiển thị thông báo thành công/thất bại nếu cần --}}
                        @if(session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger mt-3">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuSiPhoDaOJ7aqtJVtQhYhLzwwJ7rQlmA"></script>
<script>
    // Tọa độ showroom: 36 Lê Văn Khương, Xã Đông Thạnh, Hóc Môn, TP. HCM, Việt Nam
    // Lat: 10.882246, Lng: 106.627531
    function initMapContact() {
        var showroomLatLng = { lat: 10.882246, lng: 106.627531 };
        var map = new google.maps.Map(document.getElementById('map-contact'), {
            zoom: 16,
            center: showroomLatLng,
            scrollwheel: true
        });
        var marker = new google.maps.Marker({
            position: showroomLatLng,
            map: map,
            title: 'Showroom Povico'
        });
        var infowindow = new google.maps.InfoWindow({
            content: '<strong>Showroom Povico</strong><br>36 Lê Văn Khương, Xã Đông Thạnh, Hóc Môn, TP. HCM, Việt Nam'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
        // Hiển thị info khi load map
        infowindow.open(map, marker);
    }
    window.addEventListener('load', function() {
        if (document.getElementById('map-contact')) {
            initMapContact();
        }
    });
</script>
@endpush
@endsection