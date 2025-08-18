<footer id="footer" class="footer" style="margin-top: 10px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-body">
                    <div class="footer-left">
                        <div class="footer-infor flex-grow-1">
                            <div class="footer-menu">
                                <div class="footer-col-block">
                                    <h5 class="footer-heading text_white footer-heading-mobile">
                                        {{ $footer->info_title ?? 'Infomation' }}
                                    </h5>
                                    <div class="tf-collapse-content">
                                        <ul class="footer-menu-list">
                                            <li class="text-body-default">
                                                <a href="{{ $footer->about_link ?? '#' }}" class="link footer-menu_item">{{ $footer->about_text ?? 'About Us' }}</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="{{ $footer->stories_link ?? '#' }}" class="link footer-menu_item">{{ $footer->stories_text ?? 'Our Stories' }}</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="{{ $footer->size_guide_link ?? '#' }}" class="link footer-menu_item">{{ $footer->size_guide_text ?? 'Size Guide' }}</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="{{ $footer->contact_link ?? '#' }}" class="link footer-menu_item">{{ $footer->contact_text ?? 'Contact us' }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col-block">
                                    <h5 class="footer-heading text_white footer-heading-mobile">
                                        {{ $footer->customer_service_title ?? 'Customer Services' }}
                                    </h5>
                                    <div class="tf-collapse-content">
                                        <ul class="footer-menu-list">
                                            <li class="text-body-default">
                                                <a href="{{ $footer->shipping_link ?? '#' }}" class="link footer-menu_item">{{ $footer->shipping_text ?? 'Shipping' }}</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="{{ $footer->return_link ?? '#' }}" class="link footer-menu_item">{{ $footer->return_text ?? 'Return & Refund' }}</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="{{ $footer->privacy_link ?? '#' }}" class="link footer-menu_item">{{ $footer->privacy_text ?? 'Privacy Policy' }}</a>
                                            </li>
                                            <li class="text-body-default">
                                                <a href="{{ $footer->terms_link ?? '#' }}" class="link footer-menu_item">{{ $footer->terms_text ?? 'Terms & Conditions' }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-phone-number">
                                <h4 class="text_white number">{{ $footer->hotline ?? '' }}</h4>
                                <h4 class="text_white mail">{{ $footer->email ?? '' }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="footer-col-block footer-newsletter">
                        <h3 class="footer-heading footer-heading-mobile text_white">
                            {{ $footer->newsletter_title ?? 'Stay in the loop with Weekly newsletters' }}
                        </h3>
                        <div class="tf-collapse-content">
                            <form id="subscribe-form" action="#" class="form-newsletter subscribe-form"
                                method="post" accept-charset="utf-8" data-mailchimp="true">
                                <div id="subscribe-content" class="subscribe-content">
                                    <fieldset class="email">
                                        <input id="subscribe-email" type="email" name="email-form"
                                            class="subscribe-email" placeholder="{{ $footer->newsletter_placeholder ?? 'Enter your e-mail' }}"
                                            tabindex="0" aria-required="true">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button id="subscribe-button" class="subscribe-button text-body-default "
                                            type="button">{{ $footer->newsletter_button ?? 'Subscribe' }}<i class="icon-arrow-up-right"></i></button>
                                    </div>
                                </div>
                                <div id="subscribe-msg" class="subscribe-msg"></div>
                            </form>
                            <ul class="tf-social-icon type-2">
                                @if($footer && $footer->facebook)
                                    <li><a href="{{ $footer->facebook }}" class="social-facebook" target="_blank"><i class="icon icon-facebook"></i></a></li>
                                @endif
                                @if($footer && $footer->zalo)
                                    <li><a href="{{ $footer->zalo }}" class="social-zalo" target="_blank"><img src="{{ asset('assets/frontend/images/social/zalo.svg') }}" alt="Zalo" style="width:22px"></a></li>
                                @endif
                                @if($footer && $footer->tiktok)
                                    <li><a href="{{ $footer->tiktok }}" class="social-tiktok" target="_blank"><i class="icon icon-tiktok"></i></a></li>
                                @endif
                                @if($footer && $footer->youtube)
                                    <li><a href="{{ $footer->youtube }}" class="social-youtube" target="_blank"><i class="icon icon-youtube"></i></a></li>
                                @endif
                                @if($footer && $footer->instagram)
                                    <li><a href="{{ $footer->instagram }}" class="social-instagram" target="_blank"><i class="icon icon-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-wrap">
                            <div class="left">
                                <p class="text-body-default text_white">{{ $footer->copyright ?? 'Copyright ©2025 Povico. All Rights Reserved.' }}</p>
                            </div>
                            <div class="center">
                                <div class="tf-currencies">
                                    <select class="image-select center style-default style-box  type-currencies">
                                        <option selected data-thumbnail="images/country/us.svg">English (USD)</option>
                                        <option data-thumbnail="images/country/vn.svg">Vietnam (VND)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tf-payment">
                                <ul>
                                    <li>
                                        <img src="{{ asset('assets/frontend/images/payment/payment-1.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/frontend/images/payment/payment-2.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/frontend/images/payment/payment-3.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/frontend/images/payment/payment-4.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/frontend/images/payment/payment-5.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/frontend/images/payment/payment-6.png') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>