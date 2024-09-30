@extends('client.layouts.app')

@section('content')
<main class="wrapperMain_content">
    <div class="layout-collections">
      <div class="wrapper-mainCollection">
        <div class="collection-listproduct" id="collection-body">
          <div class="collection-content">
            <div class="collection-heading">
              <div class="collection-heading__content">
                <div class="container">
                  <h1 class="col-title">
                    Tất cả sản phẩm
                  </h1>
                  <div class="collection-filter-tags">
                    <div class="heading-box">
                      <div class="filter-box noBorder">
                        (
                        <span class="title-count">
                          <b>
                            {{ $total }}
                          </b>
                          sản phẩm
                        </span>
                        )
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container container-pd-parent">
              <div class="hrv-pmo-coupon" data-hrvpmo-layout="grids">
              </div>
              <div class="hrv-pmo-discount" data-hrvpmo-layout="grids">
              </div>
              <div class="collection-wraper">
                <div class="wraplist-collection">
                  <div class="row listProduct-row listProduct-filter">
                    @foreach ($products as $product )
                    <div class=" col-md-3 col-6 product-loop" data-id="1124782248">
                      <div class="product-inner" data-proid="1055378660" id="collection_loop_1">
                        <div class="proloop-image">
                          <div class="gift product_gift_label d-none" data-id="1055378660">
                            <img class="lazyload" data-src="https://file.hstatic.net/200000593853/file/gift-filled_774ac33d774c4a29aa86ed5620d5b902.png"
                            src="https://file.hstatic.net/200000593853/file/gift-filled_774ac33d774c4a29aa86ed5620d5b902.png"
                            alt="icon quà tặng">
                          </div>
                          <div class="product--image">
                            <a href="/products/ggwp-2024-phien-ban-dat-truoc-ca-nam">
                              <div class="lazy-img first-image">
                                <picture>
                                  <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000249781/product/2_e4f6ede4917344e39c4eeeea7dbad21a_medium.jpg"
                                  srcset="//product.hstatic.net/200000249781/product/2_e4f6ede4917344e39c4eeeea7dbad21a_medium.jpg">
                                    <source media="(min-width: 481px)" data-srcset="//product.hstatic.net/200000249781/product/2_e4f6ede4917344e39c4eeeea7dbad21a_large.jpg"
                                    srcset="//product.hstatic.net/200000249781/product/2_e4f6ede4917344e39c4eeeea7dbad21a_large.jpg">
                                      <img class="img-loop ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000249781/product/2_e4f6ede4917344e39c4eeeea7dbad21a_small.jpg"
                                      src="//product.hstatic.net/200000249781/product/2_e4f6ede4917344e39c4eeeea7dbad21a_small.jpg"
                                      alt=" GGWP 2024 |Phiên bản đặt trước cả năm| ">
                                </picture>
                              </div>
                              <div class="lazy-img second-image hovered-img">
                                <picture>
                                  <source media="(min-width: 481px) and (max-width:767px)" data-srcset="//product.hstatic.net/200000249781/product/6_10808bccb820436a99db6fbfd4b1501c_medium.jpg"
                                  srcset="//product.hstatic.net/200000249781/product/6_10808bccb820436a99db6fbfd4b1501c_medium.jpg">
                                    <source media="(min-width:768px)" data-srcset="//product.hstatic.net/200000249781/product/6_10808bccb820436a99db6fbfd4b1501c_large.jpg"
                                    srcset="//product.hstatic.net/200000249781/product/6_10808bccb820436a99db6fbfd4b1501c_large.jpg">
                                      <img class="img-loop ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000249781/product/6_10808bccb820436a99db6fbfd4b1501c_small.jpg"
                                      src="//product.hstatic.net/200000249781/product/6_10808bccb820436a99db6fbfd4b1501c_small.jpg"
                                      alt=" GGWP 2024 |Phiên bản đặt trước cả năm| ">
                                </picture>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="proloop-detail">
                          <h3>
                            <a href="/products/ggwp-2024-phien-ban-dat-truoc-ca-nam" class="quickview-product"
                            data-handle="/products/ggwp-2024-phien-ban-dat-truoc-ca-nam">
                              {{$product->name}}
                            </a>
                          </h3>
                          <div class="wrapper-action-loop ">
                            <p class="proloop--price    prices-ctas ">
                              <span class="price">
                                {{$product->price}}₫
                              </span>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                 
                  </div>
                  <div class="collection-loadmore text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <input type="text" class="d-none" id="coll-handle" value="(collectionid:product>0)">
      </div>
    </div>
  </main>
@endsection

    