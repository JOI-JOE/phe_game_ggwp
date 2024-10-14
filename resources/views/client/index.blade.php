@extends('client.layouts.app')

@section('content')
<main class="wrapperMain_content">
    <section class="section-home-slider">
        <div class="container">
            <div class="homepage-slider">
                <div class="slider-owl owl-carousel">
                    <div class="slider-item">
                        <div class="slide--image">
                            <a
                                href="/collections/all"
                                title="ALt banner 1"
                                aria-label="slide 1"
                            >
                                <picture>
                                    <source
                                        media="(max-width: 767px)"
                                        srcset="{{asset('client-site/img/slide_1_img.jpg')}}"
                                    />
                                    <source
                                        media="(min-width: 768px)"
                                        srcset="{{asset('client-site/img/slide_1_img.jpg')}}"
                                    />
                                    <img
                                        src="{{asset('client-site/img/slide_1_img.jpg')}}"
                                        alt="ALt banner 1"
                                        width="900"
                                        height="270"
                                    />
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div
            class="hrv-pmo-coupon"
            data-hrvpmo-layout="grids"
        ></div>
        <div
            class="hrv-pmo-discount"
            data-hrvpmo-layout="grids"
        ></div>
    </div>
    <section class="home-collection">
        <div class="container">
            <div class="row listProduct-row listProduct-filter">
                @foreach ($products as $product)
                @php
                    $productImage = $product->product_images->first();
				@endphp
                    <div
                        class="col-md-3 col-6 product-loop"
                        data-id="{{$product->id}}"
                    >
                        <div
                            class="product-inner"
                            data-proid="1055345396"
                            id="_loop_2"
                        >
                            <div class="proloop-image">
                                <div
                                    class="gift product_gift_label d-none"
                                    data-id="1055345396"
                                >
                                    {{-- <img
                                        class="lazyload"
                                        data-src="https://file.hstatic.net/200000593853/file/gift-filled_774ac33d774c4a29aa86ed5620d5b902.png"
                                        src="https://file.hstatic.net/200000593853/file/gift-filled_774ac33d774c4a29aa86ed5620d5b902.png"
                                        alt="icon quà tặng"
                                    /> --}}
                                </div>

                                <div class="product--image">
                                    <a
                                        href="{{route('detai_product',$product->handle)}}"
                                    >
                                        <div
                                            class="first-image"
                                        >
                                            {{-- <picture> --}}
                                                {{-- <source
                                                    media="(max-width: 480px)"
                                                    data-srcset="{{asset('client-site/img/Product/8_46e59d9aa2aa45c2a100c6182244dd59_medium.jpg')}}"
                                                    srcset="
                                                        {{asset('client-site/img/Product/8_46e59d9aa2aa45c2a100c6182244dd59_medium.jpg')}}
                                                    "
                                                />
                                                <source
                                                    media="(min-width: 481px)"
                                                    data-srcset="{{asset('client-site/img//Product/8_46e59d9aa2aa45c2a100c6182244dd59_large.jpg')}}"
                                                    srcset="{{asset('client-site/img//Product/8_46e59d9aa2aa45c2a100c6182244dd59_large.jpg')}}"
                                                /> --}}
                                                @if ($productImage)
                                                    <img
                                                    class="img-loop lazyloaded"
                                                    data-src="{{ Storage::url('product/' . $productImage->src) }}"
                                                    src="{{ Storage::url('product/' . $productImage->src) }}"
                                                    alt=" Tạp chí GGWP số 01 "
                                                />
                                                @else
                                                    No Photo
                                                @endif
                                            {{-- </picture> --}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="proloop-detail">
                                <h3>
                                    <a
                                        href="{{route('detai_product',$product->handle)}}"
                                        class="quickview-product"
                                        data-handle="{{route('detai_product',$product->handle)}}"
                                        >{{ $product->name }}</a
                                    >
                                </h3>
                                <div class="wrapper-action-loop">
                                    <p
                                        class="proloop--price prices-ctas"
                                    >
                                        <span class="price"
                                            >{{$product->price}}</span
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection

@section('customJs')
<script>
    if ($(".homepage-slider").length > 0) {
        $(".homepage-slider .owl-carousel").owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            lazyLoad: true,
            loop:
                $(".homepage-slider .slider-item").length > 1
                    ? true
                    : false,
            autoplay: true,
            autoplayTimeout: 8000,
            slideSpeed: 4000,
            animateIn: "fadeIn",
            animateOut: "fadeOut",
            navText: [
                '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(-1,-1.2246467991473532e-16,1.2246467991473532e-16,-1,511.9994964599609,511.99959468841564)"><g><g><path d="M367.954,213.588L160.67,5.872c-7.804-7.819-20.467-7.831-28.284-0.029c-7.819,7.802-7.832,20.465-0.03,28.284l207.299,207.731c7.798,7.798,7.798,20.486-0.015,28.299L132.356,477.873c-7.802,7.819-7.789,20.482,0.03,28.284c3.903,3.896,9.016,5.843,14.127,5.843c5.125,0,10.25-1.958,14.157-5.873l207.269-207.701C391.333,275.032,391.333,236.967,367.954,213.588z"></path></g></g></g></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g><g><path d="M367.954,213.588L160.67,5.872c-7.804-7.819-20.467-7.831-28.284-0.029c-7.819,7.802-7.832,20.465-0.03,28.284l207.299,207.731c7.798,7.798,7.798,20.486-0.015,28.299L132.356,477.873c-7.802,7.819-7.789,20.482,0.03,28.284c3.903,3.896,9.016,5.843,14.127,5.843c5.125,0,10.25-1.958,14.157-5.873l207.269-207.701C391.333,275.032,391.333,236.967,367.954,213.588z"></path></g></g></g></svg>',
            ],
            responsive: {
                0: {
                    nav: false,
                },
                768: {
                    nav: true,
                },
            },
            onChanged: function (event) {
                setTimeout(function () {
                    $(".homepage-slider")
                        .find(".owl-dot")
                        .each(function (index) {
                            $(this).attr("aria-label", index + 1);
                        });
                }, 400);
            },
        });
        $(".homepage-slider")
            .find(".owl-next")
            .attr("aria-label", "next slide");
        $(".homepage-slider")
            .find(".owl-prev")
            .attr("aria-label", "prev slide");
    }
</script>


@endsection