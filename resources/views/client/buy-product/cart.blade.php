@section('title', 'Giỏ hàng của bạn')

@extends('client.layouts.app')

@section('content')
<main class="wrapperMain_content">
    <div id="layout-cart">
    </div>
    <div class="wrapper-mainCart">
      <div class="content-bodyCart">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 contentCart-detail">
              <div class="mainCart-detail">
                <div class="heading-cart heading-row">
                  <h1>
                    Giỏ hàng của bạn
                  </h1>
                  <a href="/collections/all" class="cart-continue">
                    Tiếp tục mua sắm
                  </a>
                </div>
                <div class="hrv-pmo-coupon" data-hrvpmo-layout="grids">
                </div>
                <div class="hrv-pmo-discount" data-hrvpmo-layout="grids">
                </div>
                <div class="list-pageform-cart">
                  <form action="/cart" method="post" id="cartformpage">
                    <div class="cart-row">
                      <div class="table-cart">
                        <div class="media-line-item line-item" data-line="1" data-variant-id="1124698448"
                        data-product-id="1055345396">
                          <div class="media-left">
                            <div class="item-img">
                              <a href="/products/tap-chi-ggwp-so-01">
                                <img src="  //product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59_medium.jpg"
                                alt="Tạp chí GGWP số 01" />
                              </a>
                            </div>
                            <div class="item-remove item-remove-mb">
                              <a href="javascript:void(0)" onclick="HRT.Cart.removeItemCart(this,'/cart/change?line=1&quantity=0')"
                              class="cart">
                                Xóa
                              </a>
                            </div>
                          </div>
                          <div class="media-right">
                            <div class="item-info">
                              <h3 class="item--title">
                                <a href="/products/tap-chi-ggwp-so-01">
                                  Tạp chí GGWP số 01
                                </a>
                              </h3>
                              <p class="item-variant item-variant-edit cart-variant-edit" data-edit="/products/tap-chi-ggwp-so-01?variant=1124698448">
                                <span>
                                  Số 1
                                </span>
                              </p>
                            </div>
                            <div class="item-price">
                              <p>
                                <span>
                                  139,000₫
                                </span>
                              </p>
                            </div>
                          </div>
                          <div class="media-total">
                            <div class="item-total-price">
                              <div class="price">
                                <span class="line-item-total">
                                  139,000₫
                                </span>
                              </div>
                            </div>
                            <div class="item-qty">
                              <div class="qty quantity-partent qty-click clearfix">
                                <button type="button" class="qtyminus qty-btn">
                                  <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0">
                                    <polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5">
                                    </polygon>
                                  </svg>
                                </button>
                                <input type="text" size="4" name="updates[]" min="1" oriPrice="13900000"
                                line="1" productId="1055345396" variantId="1124698448" id="updates_1124698448"
                                data-price="13900000" value="1" readonly class="tc line-item-qty item-quantity"
                                />
                                <button type="button" class="qtyplus qty-btn">
                                  <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0">
                                    <polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5">
                                    </polygon>
                                  </svg>
                                </button>
                              </div>
                              <div class="item-remove item-remove-pc">
                                <a href="javascript:void(0)" onclick="HRT.Cart.removeItemCart(this,'/cart/change?line=1&quantity=0')"
                                class="cart">
                                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26"
                                  viewBox="0 0 26 26">
                                    <path d="M 11.5 -0.03125 C 9.542969 -0.03125 7.96875 1.59375 7.96875 3.5625 L 7.96875 4 L 4 4 C 3.449219 4 3 4.449219 3 5 L 3 6 L 2 6 L 2 8 L 4 8 L 4 23 C 4 24.644531 5.355469 26 7 26 L 19 26 C 20.644531 26 22 24.644531 22 23 L 22 8 L 24 8 L 24 6 L 23 6 L 23 5 C 23 4.449219 22.550781 4 22 4 L 18.03125 4 L 18.03125 3.5625 C 18.03125 1.59375 16.457031 -0.03125 14.5 -0.03125 Z M 11.5 2.03125 L 14.5 2.03125 C 15.304688 2.03125 15.96875 2.6875 15.96875 3.5625 L 15.96875 4 L 10.03125 4 L 10.03125 3.5625 C 10.03125 2.6875 10.695313 2.03125 11.5 2.03125 Z M 6 8 L 11.125 8 C 11.25 8.011719 11.371094 8.03125 11.5 8.03125 L 14.5 8.03125 C 14.628906 8.03125 14.75 8.011719 14.875 8 L 20 8 L 20 23 C 20 23.5625 19.5625 24 19 24 L 7 24 C 6.4375 24 6 23.5625 6 23 Z M 8 10 L 8 22 L 10 22 L 10 10 Z M 12 10 L 12 22 L 14 22 L 14 10 Z M 16 10 L 16 22 L 18 22 L 18 10 Z">
                                    </path>
                                  </svg>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
              <div class="wrap-order-summary">
                <div class="order-summary-block">
                  <h2 class="summary-title">
                    Thông tin đơn hàng
                  </h2>
                  <div class="row">
                    <div class="col-md-4 col-12">
                    </div>
                    <div class="offset-md-4 col-md-4 col-12">
                      <div class="summary-total">
                        <p>
                          Tổng tiền:
                          <span>
                            139,000₫
                          </span>
                        </p>
                      </div>
                      <div class="summary-action">
                        <p>
                          Phí vận chuyển sẽ được tính ở trang thanh toán.
                        </p>
                        <p>
                          Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.
                        </p>
                        <div class="summary-alert alert alert-danger ">
                          Giỏ hàng của bạn hiện chưa đạt mức tối thiểu để thanh toán.
                        </div>
                      </div>
                      <div class="hrv-pmo-coupon" data-hrvpmo-layout="minimum">
                      </div>
                      <div class="hrv-pmo-discount" data-hrvpmo-layout="minimum">
                      </div>
                      <div class="summary-button">
                        <a id="btnCart-checkout" class="checkout-btn btnred " data-price-min="0"
                        data-price-total="139000" href="#">
                          THANH TOÁN
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    {{-- <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <!-- -->
      <div class="modal-content mdlcart-detail">
        <div class="modal-header mdlcart-detail__header">
          <div class="block-thumb mdcart-image">
            <img src="//product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59_compact.jpg"
            alt="Tạp chí GGWP số 01">
          </div>
          <div class="block-title">
            <h3>
              Tạp chí GGWP số 01
            </h3>
            <p class="mdcart-price">
              <span>
                139,000₫
              </span>
            </p>
            <p class="mdcart-variant">
              Số 1
            </p>
          </div>
          <button type="button" class="close btn-close-modal" data-dismiss="modal"
          aria-label="Close">
            <svg viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
              <line fill="none" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13">
              </line>
              <line fill="none" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13">
              </line>
            </svg>
          </button>
        </div>
        <div class="modal-body   mdlcart-detail__body">
          <div class="product-detail-special">
            <div class="product-variants mdcart-variants">
              <form id="add-item-form-quickview" action="/cart/add" method="post" class="variants clearfix">
                <div class="select clearfix">
                  <div class="selector-wrapper">
                    <label>
                      LOẠI
                    </label>
                    <span class="custom-dropdown custom-dropdown--white">
                      <select class="single-option-selector custom-dropdown__select custom-dropdown__select--white"
                      data-option="option1" id="product-select-quickview-option-0">
                        <option value="Số 1">
                          Số 1
                        </option>
                        <option value="Số 0 và 1">
                          Số 0 và 1
                        </option>
                      </select>
                    </span>
                  </div>
                  <select id="product-select-quickview" name="id" style="display:none;">
                    <option value="1124698448">
                      Số 1 - 139,000₫
                    </option>
                    <option value="1124698446">
                      Số 0 và 1 - 298,000₫
                    </option>
                  </select>
                </div>
                <div class="select-swatch clearfix">
                  <div id="variant-swatch-0-quickview" class="swatch clearfix" data-option="option1"
                  data-option-index="0">
                    <div class="title-swap header">
                      LOẠI:
                    </div>
                    <div class="select-swap">
                      <div data-value="Số 1" class="n-sd swatch-element so-1  ">
                        <input class="variant-0" id="swatch-0-so-1-quickview" type="radio" name="option1"
                        value="Số 1" data-vhandle="so-1" checked="">
                        <label for="swatch-0-so-1-quickview" class="sd">
                          <span>
                            Số 1
                          </span>
                        </label>
                      </div>
                      <div data-value="Số 0 và 1" class="n-sd swatch-element so-0-va-1  soldout">
                        <input class="variant-0" id="swatch-0-so-0-va-1-quickview" type="radio"
                        name="option1" value="Số 0 và 1" data-vhandle="so-0-va-1">
                        <label for="swatch-0-so-0-va-1-quickview">
                          <span>
                            Số 0 và 1
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <p class="mdcart-linkdetail">
              <a href="/products/tap-chi-ggwp-so-01" class="btn-mdcart-detail">
                Xem chi tiết sản phẩm
                <svg viewBox="0 0 12 12" fill="none" class="HAW5Go">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M9.293 6L4.146.854l.708-.708L10 5.293a1 1 0 010 1.414l-5.146 5.147-.708-.707L9.293 6z"
                  fill="currentColor">
                  </path>
                </svg>
              </a>
            </p>
          </div>
        </div>
        <div class="modal-footer mdlcart-detail__footer">
          <div class="mdlcart-product-actions">
            <div class="mdcart-quantity">
              <label class="mdcart-quantity--label">
                Số lượng:
              </label>
              <div class="mdcart-quantity--box">
                <button type="button" onclick="HRT.Quickview.minusQtyView()" class="qty-btn">
                  <svg focusable="false" class="icon icon--minus " viewBox="0 0 10 2" role="presentation">
                    <path d="M10 0v2H0V0z">
                    </path>
                  </svg>
                </button>
                <input type="text" readonly="" id="quickview-qtyvalue" name="quantity"
                value="1" min="1" class="qty-value quickview-qtyvalue">
                <button type="button" onclick="HRT.Quickview.plusQtyView()" class="qty-btn">
                  <svg focusable="false" class="icon icon--plus " viewBox="0 0 10 10" role="presentation">
                    <path d="M6 4h4v2H6v4H4V6H0V4h4V0h2v4z">
                    </path>
                  </svg>
                </button>
              </div>
            </div>
            <div class="mdcart-actions">
              <button class="button btnred btn-mdcart-confirm" data-title="Tạp chí GGWP số 01"
              data-id="1055345396">
                <span>
                  Xác nhận
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </main>
@endsection


@section('customJs')
<script>	
	var line_picked = -1;
	var option_value = '';

	jQuery(document).ready(function(){ 
		/* Edit sản phẩm chính */
		$(document).on('click','.cart-variant-edit',function(e){
			e.preventDefault();
			var link_edit = $(this).attr('data-edit');
			line_picked = $(this).parents('.media-line-item').attr('data-line');
			option_value =  $(this).parents('.media-line-item').find('.item-variant span').html();
			qty_edit = Number($(this).parents('.media-line-item').find('.line-item-qty').val());
			var qvid = $(this).parents('.media-line-item').attr('data-product-id'),title = $(this).parents('.media-line-item').attr('data-title');
			$.ajax({
				url:link_edit +'&view=quickview-cart',
				success:function(e){
					$('#mdlcart-product-edit .mdlcart-detail').html(e);	
					$('#mdlcart-product-edit .mdcart-variant').html(option_value);
					$('#mdlcart-product-edit #quickview-qtyvalue').val(qty_edit);
					$('#mdlcart-product-edit').modal('show');		
					if(promotionApp){	
						if (promotionApp_name == 'app_buyxgety'){
							buyXgetY.getQuickCartPromotionRecommended(qvid,title);
						}
					}
				}
			});
		});
		/* Update Cart */
		$(document).on('click','.mdcart-actions .btn-mdcart-confirm',function(e){
			e.preventDefault();
			var id = $('#mdlcart-product-edit #product-select-quickview').val();
			var qty = $('#mdlcart-product-edit #quickview-qtyvalue').val();
			var product_id = $(this).attr('data-prodId'),title = $(this).attr('data-title');

			$.post("/cart/change.js",{line: line_picked, quantity: 0}).done(function(){
				/*$.post("/cart/add.js",{id: id, quantity: qty}).done(function(){
					//$('#mdlcart-product-edit').modal('hide');	
					$('.cart-ajloading').show();
					setTimeout(function() {
						window.location.reload();
					},120);

				}).fail(function(){
					alert('Sản phẩm bạn vừa mua đã vượt quá tồn kho');
				});*/
				if (promotionApp && promotionApp_name == 'app_buyxgety'){
					buyXgetY.addCartBuyXGetY_detail(false,id,product_id,qty,title,'normal',function(){
						$('.cart-ajloading').show();
						setTimeout(function() {
							window.location.reload();
						},120);
					});
				} else {
					$.post("/cart/add.js",{id: id, quantity: qty}).done(function(){
						//$('#mdlcart-product-edit').modal('hide');	
						$('.cart-ajloading').show();
						setTimeout(function() {
							window.location.reload();
						},120);

					}).fail(function(){
						alert('Sản phẩm bạn vừa mua đã vượt quá tồn kho');
					});
				}
			});
		});
	});
</script>


<script>	
	function delayTime2 (func, wait) {
		return function() {
			var that = this,
					args = [].slice(arguments);
			clearTimeout(func._throttleTimeout);
			func._throttleTimeout = setTimeout(function() {
				func.apply(that, args);
			}, wait);
		};
	}
	 $(document).on('click', '.qty-click .qtyplus', function(e){
		 e.preventDefault();
		 var input = $(this).parent('.quantity-partent').find('input');
		 var currentVal = parseInt(input.val());
		 if (!isNaN(currentVal)) {
			 input.val(currentVal + 1);
		 } else {
			 input.val(1);
		 }
	 });
	 $(document).on('click', ".qty-click .qtyminus", function(e){
		 e.preventDefault();
		 var input = $(this).parent('.quantity-partent').find('input');
		 var currentVal = parseInt(input.val());
		 if (!isNaN(currentVal) && currentVal > 1) {
			 input.val(currentVal - 1);
		 } else {
			 input.val(1);
		 }
	 });	 
		$(document).on('click', '.qty-click .qtyplus,.qty-click .qtyminus', delayTime2(function(){
			comboApp.comboUpdateCart();
		},500));
		 $(document).on('change', '.qty-click .item-quantity', delayTime2(function() {				
			 comboApp.comboUpdateCart();
		 }, 500));
</script>
@endsection