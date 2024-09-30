    var currentId = 1055345396;
    var check_variant_add = false;
    var pro_template = "style_01";

    var vrIdParam  = true,  current_id = 1124698448;
    
    var selectedVariant = {
        id: 1124698448,
            option1: "Số 1",
                option2: "",
                    option3: ""
    };
        var productImg_size = 8;
        var has360 = false, hasVideo = false ;
    
        function StickerAndPrice(obj, target){		
            var domLoop = $(target);
            var viewed_frame = [0,0,0,0,0];
            //Kiểm tra icon
            var viewed_frame_size = prmt_icon.frame.tag.length;
            //Sticker Frame
            for (var i = 0; i < viewed_frame_size; i++){
                if(prmt_icon.frame.tag[i] != "null"){
                    if(obj.tags.includes(prmt_icon.frame.tag[i])){
                        viewed_frame[i] = 1;
                    }
                }
            }
            $.each(viewed_frame,function(j,k){
                if(k == 1){
                    domLoop.find('.proloop-image').append('<div class="sticker_frame"><a href="'+ obj.url +'"><img class="lazyload" src="'+prmt_icon.frame.icon[j]+'" alt="sticker frame"/></a></div>');
                    return false;
                }
            });
        }
        var ProductScript = {
            init: function() {
                var that = this;
                that.renderViewedProduct();
                that.expandableDescProduct();
                that.showModalSizeProduct();
                that.faqsProduct();
                that.fancyboxProduct();
            },		
            renderViewedProduct: function(){
                if(jQuery('.productDetail-recently-viewed').length > 0) {
                    var d = new Date();
                    var n = d.getTime();
                    var last_viewed_pro_date = localStorage.getItem('products_viewed_date');
                    if (last_viewed_pro_date < n ) {
                        localStorage.setItem('products_viewed_date',n + (30*86400000));
                        localStorage.removeItem('products_viewed');
                    }
                    var product_handle = 'tap-chi-ggwp-so-01';
                    var last_viewed_pro = localStorage.getItem('products_viewed');
                    var last_viewed_pro_new = "";
                    if(last_viewed_pro == null){
                        last_viewed_pro_new = product_handle;
                    }
                    else{ 
                        var list_array = last_viewed_pro.split('##');//[]		
                        if(!list_array.includes(product_handle)){
                            last_viewed_pro_new = product_handle + '##' + last_viewed_pro;
                        }
                        else {
                            last_viewed_pro_new = list_array.join('##');
                        }
                    }
    
                    var last_viewd_pro_array = last_viewed_pro_new.split('##');
                    var handle_error;	
    
                    var limitpro = last_viewd_pro_array.length;		 
                    if(last_viewd_pro_array.length > 8)  limitpro = 8;	
                    var recentview_promises = [];
                    var countValid = 0;
                    for(var i = 0; i < limitpro; i++){		
                        if(countValid >=8) return false;
                        if(typeof last_viewd_pro_array[i] == 'string'){
                            countValid++;
                            var promise = new Promise(function(resolve, reject) {
                                $.ajax({
                                    url:'/products/' + last_viewd_pro_array[i] + '?view=viewed',
                                    success: function(product){
                                        product = product.trim();
                                        resolve(product,countValid);
                                    },
                                    error: function(err){
                                        resolve('',countValid);
                                    }
                                })
                            });
                            recentview_promises.push(promise);
                        }
                    }
    
                    Promise.all(recentview_promises).then(function(values,countValid) {
                        var viewed_items = [];
                        $.each(values, function(i, v){
                            if(v != ''){
                                v = v.replace('viewed-loop-','viewed-loop-'+(i+1));
                                $('#listViewed').append(v);
                                viewed_items.push(viewed);
                                countValid++;
                            }
                            else{
                                viewed_items.push(null);
                            }
                        });				
                        $.each(viewed_items,function(i,v){
                            if(v != null){
                                StickerAndPrice(v,'#viewed-loop-'+(i+1));
                            }
                        });
                        HRT.Product.sliderProductRelated('#listViewed');
                    });		
    
                    var filtered = last_viewd_pro_array.filter(function (el) {
                        return el != '';
                    });
                    localStorage.setItem('products_viewed',filtered.join('##'));
                }
            },
            expandableDescProduct: function(){
                var expandable_content_height = $('.expandable-toggle .description-productdetail').height();
                if(expandable_content_height > 220){
                    $('.expandable-toggle .description-productdetail').css({
                        "height": "220px",
                        "overflow": "hidden"
                    });
                }
                else{
                    $('.expandable-content_toggle').addClass('d-none');
                }
                $('body').on('click', '.js_expandable_content', function (e) {
                    if (!$('.expandable-toggle').hasClass('opened')) {		
                        $('.expandable-content_toggle').removeClass('btn-closemore').addClass('btn-viewmore').find('.expandable-content_toggle-text').html('Xem thêm nội dung');
                        var curHeight = $('.expandable-toggle .description-productdetail').height();
                        expandable_content_height = 220;
                        $('.expandable-toggle .description-productdetail').height(curHeight).animate({
                            height: expandable_content_height
                        }, 300,  function () {
                            $(this).parent().addClass('opened');
                        });
                        var x = $('.product-description').offset().top;
                        HRT.All.smoothScroll(x - 90, 250); 
                    } 
                    else {
                        $('.expandable-toggle .description-productdetail').css('height', 'auto');
                        $('.expandable-toggle').removeClass('opened');
                        $('.expandable-content_toggle').removeClass('btn-viewmore').addClass('btn-closemore').find('.expandable-content_toggle-text').html('Rút gọn nội dung');
                    }
                }); 
            },
            showModalSizeProduct: function(){
                $('.btn-size-guide').on('click', function(e){
                    e.preventDefault();	
                    $('#modal-sizeguide').modal('show'); 
                });
            },
            faqsProduct:function(){
                $('.js-btn-faq').click(function(){
                    $(this).hide();
                    $(".faq-item").removeClass('d-none');
                });
                $('.product-question .header-faqs').on('click', function(){
                    if(!$(this).hasClass('opened')){ 
                        jQuery('.product-question .header-faqs').removeClass('opened').parent().find('.content-faqs').stop().slideUp('medium');
                        jQuery(this).toggleClass('opened').parent().find('.content-faqs').stop().slideToggle('medium');
                    }else{
                        jQuery(this).toggleClass('opened').parent().find('.content-faqs').stop().slideToggle('medium');
                    }
                });
            },
            fancyboxProduct:function(){
                $('.product-gallery__item[data-fancybox="gallery"]').fancybox({
                    protect: true,
                    hash : false,
                    buttons : [
                        "slideShow",
                        'zoom',
                        "thumbs",
                        'close'
                    ],
                    animationEffect: "zoom",
                    infobar : false,
                });
            }
        };
        $(document).ready(function(){
            ProductScript.init();
            if (pro_template == "style_01"){
                if (productImg_size > 1 || (productImg_size >= 1 &&  hasVideo) || (productImg_size == 0 &&  hasVideo) || (productImg_size >= 1 && has360) || (hasVideo && has360)){
                    var slider = $('#productCarousel-slider');
                    var thumbnailSlider = $('#productCarousel-thumb');
                    var duration = 500;	
    
                    slider.owlCarousel({
                        items:1,
                        nav: true,
                        dots: true,
                        loop: false,	
                        smartSpeed: 1000,
                        //touchDrag: false,
                        //mouseDrag: false
                    })
                    slider.on('changed.owl.carousel', function (e) {
                        thumbnailSlider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                        thumbnailSlider.find(".owl-item").removeClass("current");
                        thumbnailSlider.find('.owl-item:nth-child('+ (e.item.index + 1) +')').addClass('current');
                    });
                    thumbnailSlider.on('initialized.owl.carousel', function() {
                        thumbnailSlider.find(".owl-item").eq(0).addClass("current");
                    })
                    thumbnailSlider.owlCarousel({
                        loop:false,	
                        nav:false,
                        margin:15,
                        center:false,
                        responsive: {
                            0: {
                                items: 5,	
                            },
                            768: {
                                items: 5,
                            },
                            992: {
                                items: 6,
                            },
                            1200: {
                                items: 6,
                            }
                        }
                    })
                    thumbnailSlider.on('changed.owl.carousel', function (e) {
                        slider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                        slider.find(".owl-item").removeClass("current");
                        slider.find('.owl-item:nth-child('+ (e.item.index + 1) +')').addClass('current');
                    });
                    thumbnailSlider.on("click", ".owl-item", function(e) {
                        e.preventDefault();
                        thumbnailSlider.find(".owl-item").removeClass("current");
                        $(this).addClass("current");
                        var number = $(this).index();
                        slider.data('owl.carousel').to(number, duration, true);
                    });
                }
            }
            else if(pro_template == "style_02"){
                $('body').scrollspy({
                    target: "#productScroll-spy", 
                    offset: $('.productDetail-information').offset().top
                });
                $('#productScroll-spy a[href*="#"]').click(function(e){
                    e.preventDefault();
                    $('#productScroll-spy .product-thumb').removeClass('active');
                    $('html, body').animate({
                        scrollTop: $($.attr(this, 'href')).offset().top + 20,
                    }, 500);		
                });	
                var sliderMobile = $('#productCarousel-slider-mobile');	
                sliderMobile.owlCarousel({
                    items:1,
                    nav: true,
                    dots: true,
                    lazyLoad:true,		
                    loop: false,	
                    smartSpeed: 1000,
                    //touchDrag: false,
                    //mouseDrag: false
                })
            }
            else if(pro_template == "style_03"){
                if (productImg_size > 1 || (productImg_size >= 1 &&  hasVideo) || (productImg_size == 0 &&  hasVideo) || (productImg_size >= 1 && has360) || (hasVideo && has360)){
                    var slickSlider = $('#productSlick-slider');
                    var thumbnailSlider = $('#productSlick-thumb');
                    slickSlider.slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        fade: false,
                        infinite: false,
                        speed: 1000,
                        draggable: false,
                        swipe: false,
                        asNavFor: '#productSlick-thumb',
                        dots: false,
                        prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"></button>',
                        nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"></button>',
                    });
                    thumbnailSlider.slick({
                        slidesToShow: 6,
                        slidesToScroll: 1,
                        asNavFor: '#productSlick-slider',
                        dots: false,
                        arrows: false,
                        vertical: true,
                        verticalSwiping:true,
                        infinite: false,
                        focusOnSelect: true,
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 6,
                                    slidesToScroll: 6
                                }
                            },
                            {
                                breakpoint: 991,
                                settings: {
                                    slidesToShow: 4,
                                    slidesToScroll: 4,
                                    vertical: false
                                }
                            }
                        ]
                    });
                    $(document).on('click','#productSlick-thumb .product-thumb__item', function(e){
                        e.preventDefault();
                        $('#productSlick-thumb .product-thumb').removeClass('slick-current');
                        $(this).parent().addClass('slick-current');
                    });
    
                }
            }
            else {
                if (productImg_size > 1 || (productImg_size >= 1 &&  hasVideo) || (productImg_size == 0 &&  hasVideo) || (productImg_size >= 1 && has360) || (hasVideo && has360)){
    
                    var slider = $('#productCarousel-slider');
                    var thumbnailSlider = $('#productCarousel-thumb');
                    var duration = 500;	
                    slider.owlCarousel({
                        items:1,
                        nav: true,
                        dots: true,
                        loop: false,	
                        smartSpeed: 1000,
                        //		touchDrag: false,
                        //		mouseDrag: false
                    })
                    slider.on('changed.owl.carousel', function (e) {
                        thumbnailSlider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                        thumbnailSlider.find(".owl-item").removeClass("current");
                        thumbnailSlider.find('.owl-item:nth-child('+ (e.item.index + 1) +')').addClass('current');
                    });
                    thumbnailSlider.on('initialized.owl.carousel', function() {
                        thumbnailSlider.find(".owl-item").eq(0).addClass("current");
                    })
                    thumbnailSlider.owlCarousel({
                        loop:false,	
                        nav:false,
                        margin:15,
                        center:false,
                        responsive: {
                            0: {
                                items: 5,	
                            },
                            768: {
                                items: 5,
                            },
                            992: {
                                items: 6,
                            },
                            1200: {
                                items: 6,
                            }
                        }
                    })
                    thumbnailSlider.on('changed.owl.carousel', function (e) {
                        slider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                        slider.find(".owl-item").removeClass("current");
                        slider.find('.owl-item:nth-child('+ (e.item.index + 1) +')').addClass('current');
                    });
                    thumbnailSlider.on("click", ".owl-item", function(e) {
                        e.preventDefault();
                        thumbnailSlider.find(".owl-item").removeClass("current");
                        $(this).addClass("current");
                        var number = $(this).index();
                        slider.data('owl.carousel').to(number, duration, true);
                    });
                }
            }
        });
    
    
        var check_variant = true;
        var fIndex = false;
        var check_scrollstyle2 = '';
        var selectCallback = function(variant, selector) {
            if (variant){
                current_id = variant.id;
                if(variant.inventory_management == null){
                    jQuery('.product-available').find(".txt-inventory").html('');
                }
                else{
                    var inventoryQty = variant.inventory_quantity;
                    if(inventoryQty == 0){
                        jQuery('.product-available').find(".txt-inventory").html('Đã bán hết');
                    }else{
                        if (inventoryQty > 10){
                            jQuery('.product-available').find(".txt-inventory").html('');
                        }
                        else{
                            jQuery('.product-available').find(".txt-inventory").html('Đã bán gần hết');
                        }
                    }
                }
                if(variant.featured_image != null){
                    //style 01
                    if (pro_template == "style_01" || pro_template == "style_04"){
                        var indeximg = $(".product-gallery[data-image='"+ Haravan.resizeImage(variant.featured_image.src,'master').replace('https:','')+"']").parent().index();
                        $('#productCarousel-slider').trigger('to.owl.carousel', [indeximg, 500]);
                        $('#productCarousel-thumb').find('.owl-item').removeClass('current');
                        $('#productCarousel-thumb').find('.owl-item:nth-child('+ (indeximg + 1) +')').addClass('current');
                    }		
                    //style 02	
                    if (pro_template == "style_02"){
                        check_scrollstyle2 = Haravan.resizeImage(variant.featured_image.src,'master').replace('https:','');
                        if ($(window).width() < 992){
                            var indeximg_mb = $("#productCarousel-slider-mobile .product-gallery[data-image='"+ Haravan.resizeImage(variant.featured_image.src,'master').replace('https:','')+"']").parent().index();
                            $('#productCarousel-slider-mobile').trigger('to.owl.carousel', [indeximg_mb, 500]);
                        }
                    }
                    //style 03	
                    if (pro_template == "style_03"){
                        var indeximg = $(".product-gallery[data-image='"+ Haravan.resizeImage(variant.featured_image.src,'master').replace('https:','')+"']").index();	
                        $('#productSlick-slider').slick('slickGoTo',indeximg);
                        $('#productSlick-thumb').find('.slick-slide').removeClass('slick-current');
                        $('#productSlick-thumb').find('.slick-slide:nth-child('+ (indeximg + 1) +')').addClass('slick-current');
                    }
                }
                if(variant.sku != null ){
                    jQuery('#pro_sku').html('Mã sản phẩm: ' + '<strong>' + variant.sku + '</strong> ');
                }		
                if(variant.price < variant.compare_at_price){
                    var pro_sold = variant.price ;
                    var pro_comp = variant.compare_at_price / 100;
                    var sale = 100 - (pro_sold / pro_comp) ;
                    var kq_sale = Math.round(sale);
                    jQuery('.product-percent').html('<span class="pro-sale">-' + kq_sale + '%<br> OFF </span>');
                    if(pro_sold > 0){
                        var html = '<span class="pro-price">' + Haravan.formatMoney(pro_sold, "{{amount}}₫") + '</span>' + '<del>' + Haravan.formatMoney(variant.compare_at_price, "{{amount}}₫") + '</del>' + '<span class="pro-percent">-'+ kq_sale +'%</span>';	
                        $('.product-actions .pro-qty,.product-actions .addcart-area').removeClass('hidden');
                    }else{
                        var html = '<a href=""  class="pro-price">Liên hệ báo giá</a>';	
                        $('.product-actions .pro-qty,.product-actions .addcart-area').addClass('hidden');
                    }
                    jQuery('#price-preview').html(html);
    
                    $(".prod-info__price del").removeClass("d-none");
                    $(".prod-info__price .prod-percent").removeClass("d-none");
                    $(".prod-info__price .prod-price").html(Haravan.formatMoney(variant.price, "{{amount}}₫"));
                    $(".prod-info__price del").html(Haravan.formatMoney(variant.compare_at_price, "{{amount}}₫"));
                    $(".prod-info__price .prod-percent").html('-' + kq_sale + '%');
                } 
                else {
                    jQuery('.product-percent').html('');
                    if(variant.price > 0){
                        jQuery('#price-preview').html("<span class='pro-price'>" + Haravan.formatMoney(variant.price, "{{amount}}₫" + "</span>"));
                        $('.product-actions .pro-qty,.product-actions .addcart-area').removeClass('hidden');
                    }else{
                        jQuery('#price-preview').html('<a href=""  class="pro-price">Liên hệ báo giá</a>');
                        $('.product-actions .pro-qty,.product-actions .addcart-area').addClass('hidden');
                    }
                    $(".prod-info__price del").addClass("d-none");
                    $(".prod-info__price .prod-percent").addClass("d-none");
                }
                if (variant.available){
                    jQuery('.productToolbar-addcart .add-to-cartProduct').removeAttr('disabled').removeClass('disabled').html("<span>Thêm vào giỏ</span>");
                    jQuery('.addcart-area .btn-addtocart').removeAttr('disabled').removeClass('disabled').html("<span>Thêm vào giỏ</span>");
                    jQuery('.addcart-area .btn-buynow').removeAttr('disabled').removeClass('disabled').html("<span>Mua ngay</span>");
                    jQuery('#add-to-cart-sticky').removeAttr('disabled').removeClass('disabled').html("<span>Thêm vào giỏ</span>");
    
                    jQuery('#detail-product .pro-soldold strong').text('Còn hàng');
                    check_variant = true;
                } 
                else {
                    jQuery('.productToolbar-addcart .add-to-cartProduct').addClass('disabled').attr('disabled', 'disabled').html("<span>Hết hàng</span>");
                    jQuery('.addcart-area .btn-addtocart').attr('disabled', 'disabled').addClass('disabled').html("<span>Hết hàng</span>");
                    jQuery('.addcart-area .btn-buynow').attr('disabled', 'disabled').addClass('disabled').html("<span>Mua ngay</span>");
                    jQuery('#add-to-cart-sticky').attr('disabled', 'disabled').addClass('disabled').html("<span>Thêm vào giỏ</span>");
    
                    var message = variant ? "Hết hàng" : "Không có hàng";
                    jQuery('#detail-product .pro-soldold strong').text(message);
                    check_variant = false;
                }
            }
            else{
                jQuery('.productToolbar-addcart .add-to-cartProduct').addClass('disabled').attr('disabled', 'disabled').html("<span>Hết hàng</span>");
                jQuery('.addcart-area .btn-addtocart').attr('disabled', 'disabled').addClass('disabled').html("<span>Hết hàng</span>");
                jQuery('.addcart-area .btn-buynow').attr('disabled', 'disabled').addClass('disabled').html("<span>Mua ngay</span>");
                jQuery('#add-to-cart-sticky').attr('disabled', 'disabled').addClass('disabled').html("<span>Thêm vào giỏ</span>");
    
                var message = "Hết hàng";
                jQuery('#detail-product .pro-soldold strong').text(message);
                check_variant = false;
            }
            return check_variant;
        };
        jQuery(document).ready(function($){
            
            //new Haravan.OptionSelectors("product-select", { product: {"available":true,"compare_at_price_max":0.0,"compare_at_price_min":0.0,"compare_at_price_varies":false,"compare_at_price":0.0,"content":null,"description":"<strong>Tạp chí GGWP số 01 (Đã có sẵn)</strong><p>Sau 1 thời gian dài lên ý tưởng thử nghiệm, GGWP 1 chính thức ra mắt – đánh dấu cột mốc mới trên chặng đường đầy tâm huyết của chúng mình, mong muốn tạo ra 1 ấn phẩm đọc thực sự chất lượng, chuyên nghiệp về video games. Với những bài viết được lựa chọn, sáng tác và biên tập kỹ càng về nhiều chủ đề, hy vọng GGWP sẽ trở thành “món ăn tinh thần” không thể thiếu của những người yêu games. Còn giờ thì … Good Game Well Played.<br><br><em><strong>MÔ TẢ</strong></em><br><strong><em>- Kích thước sách: 20x27cm<br>- Số trang: 132 trang in màu</em></strong><br>&nbsp;</p>","featured_image":"https://product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59.jpg","handle":"tap-chi-ggwp-so-01","id":1055345396,"images":["https://product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59.jpg","https://product.hstatic.net/200000249781/product/10_3266eae8fa7d49e1a17fcb3f224508f1.jpg","https://product.hstatic.net/200000249781/product/9_07e8d7093d884b478d0854908b0d1433.jpg","https://product.hstatic.net/200000249781/product/5_e7ac9c2c34294f828a033864ad092e0b.jpg","https://product.hstatic.net/200000249781/product/4_165dc977a61a46a0996d6b9b822f42c9.jpg","https://product.hstatic.net/200000249781/product/3_0a9acaa0388e42d499e799005b0371a9.jpg","https://product.hstatic.net/200000249781/product/1_cb779155692a483c8923e5904777afbf.jpg","https://product.hstatic.net/200000249781/product/6_191ff459c6df4317ad0542cfd0033edb.jpg"],"options":["LOẠI"],"price":13900000.0,"price_max":29800000.0,"price_min":13900000.0,"price_varies":true,"tags":[],"template_suffix":null,"title":"Tạp chí GGWP số 01","type":"Khác","url":"/products/tap-chi-ggwp-so-01","pagetitle":"Tạp chí GGWP số 01","metadescription":"Sau 1 thời gian dài lên ý tưởng thử nghiệm, GGWP 1 chính thức ra mắt – đánh dấu cột mốc mới trên chặng đường đầy tâm huyết của chúng mình, mong muốn tạo ra 1 ấn phẩm đọc thực sự chất lượng, chuyên nghiệp về video games.","variants":[{"id":1124698448,"barcode":null,"available":true,"price":13900000.0,"sku":null,"option1":"Số 1","option2":"","option3":"","options":["Số 1"],"inventory_quantity":2022.0,"old_inventory_quantity":2022.0,"title":"Số 1","weight":1000.0,"compare_at_price":0.0,"inventory_management":"haravan","inventory_policy":"deny","selected":false,"url":null,"featured_image":{"id":1393366841,"created_at":"0001-01-01T00:00:00","position":1,"product_id":1055345396,"updated_at":"0001-01-01T00:00:00","src":"https://product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59.jpg","variant_ids":[1124698448]}},{"id":1124698446,"barcode":null,"available":false,"price":29800000.0,"sku":null,"option1":"Số 0 và 1","option2":"","option3":"","options":["Số 0 và 1"],"inventory_quantity":0.0,"old_inventory_quantity":0.0,"title":"Số 0 và 1","weight":200.0,"compare_at_price":0.0,"inventory_management":"haravan","inventory_policy":"deny","selected":false,"url":null,"featured_image":{"id":1393367054,"created_at":"0001-01-01T00:00:00","position":8,"product_id":1055345396,"updated_at":"0001-01-01T00:00:00","src":"https://product.hstatic.net/200000249781/product/6_191ff459c6df4317ad0542cfd0033edb.jpg","variant_ids":[1124698446]}}],"vendor":"Khác","published_at":"2024-06-14T14:27:38.624Z","created_at":"2024-06-14T14:44:02.423Z","not_allow_promotion":false}, onVariantSelected: selectCallback });
            new Haravan.OptionSelectors("product-select", { product: {"available":true,"compare_at_price_max":0.0,"compare_at_price_min":0.0,"compare_at_price_varies":false,"compare_at_price":0.0,"content":null,"description":"<strong>Tạp chí GGWP số 01 (Đã có sẵn)</strong><p>Sau 1 thời gian dài lên ý tưởng thử nghiệm, GGWP 1 chính thức ra mắt – đánh dấu cột mốc mới trên chặng đường đầy tâm huyết của chúng mình, mong muốn tạo ra 1 ấn phẩm đọc thực sự chất lượng, chuyên nghiệp về video games. Với những bài viết được lựa chọn, sáng tác và biên tập kỹ càng về nhiều chủ đề, hy vọng GGWP sẽ trở thành “món ăn tinh thần” không thể thiếu của những người yêu games. Còn giờ thì … Good Game Well Played.<br><br><em><strong>MÔ TẢ</strong></em><br><strong><em>- Kích thước sách: 20x27cm<br>- Số trang: 132 trang in màu</em></strong><br>&nbsp;</p>","featured_image":"https://product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59.jpg","handle":"tap-chi-ggwp-so-01","id":1055345396,"images":["https://product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59.jpg","https://product.hstatic.net/200000249781/product/10_3266eae8fa7d49e1a17fcb3f224508f1.jpg","https://product.hstatic.net/200000249781/product/9_07e8d7093d884b478d0854908b0d1433.jpg","https://product.hstatic.net/200000249781/product/5_e7ac9c2c34294f828a033864ad092e0b.jpg","https://product.hstatic.net/200000249781/product/4_165dc977a61a46a0996d6b9b822f42c9.jpg","https://product.hstatic.net/200000249781/product/3_0a9acaa0388e42d499e799005b0371a9.jpg","https://product.hstatic.net/200000249781/product/1_cb779155692a483c8923e5904777afbf.jpg","https://product.hstatic.net/200000249781/product/6_191ff459c6df4317ad0542cfd0033edb.jpg"],"options":["LOẠI"],"price":13900000.0,"price_max":29800000.0,"price_min":13900000.0,"price_varies":true,"tags":[],"template_suffix":null,"title":"Tạp chí GGWP số 01","type":"Khác","url":"/products/tap-chi-ggwp-so-01","pagetitle":"Tạp chí GGWP số 01","metadescription":"Sau 1 thời gian dài lên ý tưởng thử nghiệm, GGWP 1 chính thức ra mắt – đánh dấu cột mốc mới trên chặng đường đầy tâm huyết của chúng mình, mong muốn tạo ra 1 ấn phẩm đọc thực sự chất lượng, chuyên nghiệp về video games.","variants":[{"id":1124698448,"barcode":null,"available":true,"price":13900000.0,"sku":null,"option1":"Số 1","option2":"","option3":"","options":["Số 1"],"inventory_quantity":2022.0,"old_inventory_quantity":2022.0,"title":"Số 1","weight":1000.0,"compare_at_price":0.0,"inventory_management":"haravan","inventory_policy":"deny","selected":false,"url":null,"featured_image":{"id":1393366841,"created_at":"0001-01-01T00:00:00","position":1,"product_id":1055345396,"updated_at":"0001-01-01T00:00:00","src":"https://product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59.jpg","variant_ids":[1124698448]}},{"id":1124698446,"barcode":null,"available":false,"price":29800000.0,"sku":null,"option1":"Số 0 và 1","option2":"","option3":"","options":["Số 0 và 1"],"inventory_quantity":0.0,"old_inventory_quantity":0.0,"title":"Số 0 và 1","weight":200.0,"compare_at_price":0.0,"inventory_management":"haravan","inventory_policy":"deny","selected":false,"url":null,"featured_image":{"id":1393367054,"created_at":"0001-01-01T00:00:00","position":8,"product_id":1055345396,"updated_at":"0001-01-01T00:00:00","src":"https://product.hstatic.net/200000249781/product/6_191ff459c6df4317ad0542cfd0033edb.jpg","variant_ids":[1124698446]}}],"vendor":"Khác","published_at":"2024-06-14T14:27:38.624Z","created_at":"2024-06-14T14:44:02.423Z","not_allow_promotion":false}, onVariantSelected: selectCallback, enableHistoryState: false });
    
             
             $('#add-item-form .selector-wrapper:eq(0)').prepend('<label>LOẠI</label>');
                 
                 $('#add-item-form .selector-wrapper select').each(function(){
                     $(this).wrap( '<span class="custom-dropdown custom-dropdown--white"></span>');
                     $(this).addClass("custom-dropdown__select custom-dropdown__select--white");
                 });
                    
                    });
        var swatch_size = parseInt($('#add-item-form .select-swatch .swatch').length);
        jQuery(document).on('click','#add-item-form .swatch input', function(e) { 
            e.preventDefault();
            var $this = $(this);
            var _available = '';
            var valueColor = $this.val();
            $(this).parents(".swatch").find(".pro-title strong").html( valueColor );
    
            $(this).parent().siblings().find('label').removeClass('sd');
            $(this).next().addClass('sd');
            var name = $this.attr('name');
            var value = $this.val();
            var valueHandle = $this.attr('data-vhandle');
            var selectFirst = $('#add-item-form-sb #select-swap-sb option:first').val();
            var checkColor = $(this).parents('.swatch').hasClass('is-color');
            var check_select_vrt = false;
    
            //var check_select_vrt = true;
            $('#add-item-form-sb [data-vhandle='+valueHandle+']').parent().siblings().find('label').removeClass('sd');
            $('#add-item-form-sb [data-vhandle='+valueHandle+']').next().addClass('sd');
    
            $('#add-item-form select[data-option='+name+']').val(value).trigger('change');
            if(!checkColor){$('.sidebar-action-bottom #add-item-form-sb #select-swap-sb').val(value);}
    
            if(swatch_size == 2){
                if(name.indexOf('1') != -1){
                    $('#add-item-form #variant-swatch-1 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-1 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-1 .swatch-element').removeClass('soldout');
    
                    $('#add-item-form-sb #select-swap-sb option').removeClass('disabled');
                    $('#add-item-form-sb #select-swap-sb option').prop("disabled", false);
    
                    $('#add-item-form-sb #variant-swatch-1-sb .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form-sb #variant-swatch-2-sb .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form-sb #variant-swatch-1-sb .swatch-element label').removeClass('sd');
                    $('#add-item-form-sb #variant-swatch-1-sb .swatch-element').removeClass('soldout');
                    $('#add-item-form .selector-wrapper .single-option-selector').eq(1).find('option').each(function(){
                        var _tam = $(this).val();
                        $(this).parent().val(_tam).trigger('change');
                        if(check_variant){
                            if(_available == '' ){
                                _available = _tam;
                            }
                        }else{
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value="'+_tam+'"]').addClass('soldout');
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value="'+_tam+'"]').find('input').prop('disabled', true);
    
                            $('#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value="'+_tam+'"]').addClass('soldout');
                            $('#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value="'+_tam+'"]').find('input').prop('disabled', true);
    
                            $('#add-item-form-sb #select-swap-sb option[value="'+ _tam +'"]').addClass('disabled');
                            $('#add-item-form-sb #select-swap-sb option[value="'+ _tam +'"]').prop("disabled", true);
    
                        }
                    })
                    $('#add-item-form .selector-wrapper .single-option-selector').eq(1).val(_available).trigger('change');
                    $('#add-item-form #variant-swatch-1 .swatch-element[data-value="'+_available+'"] label').addClass('sd');
    
                    $('#add-item-form-sb .selector-wrapper-sb .single-option-selector').eq(1).val(_available).trigger('change');
                    $('#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value="'+_available+'"] label').addClass('sd');
    
                    if(checkColor){
                        $('#add-item-form-sb #select-swap-sb').val(_available);
                    }else{
                        $('#add-item-form-sb #select-swap-sb').eq(1).val(_available);
                    }
                }
                if($('#add-item-form #variant-swatch-0 .swatch-element').find('label.sd').length != 0 && $('#add-item-form #variant-swatch-1 .swatch-element').find('label.sd').length != 0){
                    check_select_vrt = true;
                    check_variant_add = check_select_vrt;
                    $(".check-action-tt").remove();
                    $(".product-variants").removeClass("check-action-variant");
                }
                else{
                    check_select_vrt = false;
                    check_variant_add = check_select_vrt;
                }
            }
            else if (swatch_size == 3){
                var _count_op2 = $('#add-item-form #variant-swatch-1 .swatch-element').length;
                var _count_op3 = $('#add-item-form #variant-swatch-2 .swatch-element').length;
                if(name.indexOf('1') != -1){
                    $('#add-item-form #variant-swatch-1 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-1 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-1 .swatch-element').removeClass('soldout');
                    $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
    
                    $('#add-item-form-sb #variant-swatch-1-sb .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form-sb #variant-swatch-2-sb .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form-sb #variant-swatch-1-sb .swatch-element label').removeClass('sd');
                    $('#add-item-form-sb #variant-swatch-1-sb .swatch-element').removeClass('soldout');
                    $('#add-item-form-sb #variant-swatch-2-sb .swatch-element label').removeClass('sd');
                    $('#add-item-form-sb #variant-swatch-2-sb .swatch-element').removeClass('soldout');
    
                    $('#add-item-form-sb #select-swap-sb option').removeClass('disabled');
                    $('#add-item-form-sb #select-swap-sb option').prop("disabled", false);
    
                    var _avi_op1 = '';
                    var _avi_op2 = '';
                    $('#add-item-form #variant-swatch-1 .swatch-element').each(function(ind,value){
                        var _key = $(this).data('value');
                        var _key2 = '';
                        var _unavi = 0;
                        $('#add-item-form .single-option-selector').eq(1).val(_key).change();
                        $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                        $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                        $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
    
                        $('#add-item-form-sb .single-option-selector').eq(1).val(_key).change();
                        $('#add-item-form-sb #variant-swatch-2-sb .swatch-element label').removeClass('sd');
                        $('#add-item-form-sb #variant-swatch-2-sb .swatch-element').removeClass('soldout');
                        $('#add-item-form-sb #variant-swatch-2-sb .swatch-element').find('input').prop('disabled', false);
    
                        $('#add-item-form #variant-swatch-2 .swatch-element').each(function(i,v){
                            var _val = $(this).data('value');
                            $('#add-item-form .single-option-selector').eq(2).val(_val).change();
                            if(check_variant == true){
                                if(_avi_op1 == ''){
                                    _avi_op1 = _key;
                                }
                                if(_avi_op2 == ''){
                                    _avi_op2 = _val;
                                }
                                //console.log(_avi_op1 + ' -- ' + _avi_op2)
                            }else{
                                _unavi += 1;
                            }
                        })
                        if(_unavi == _count_op3){
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "'+_key+'"]').addClass('soldout');
                            $('#add-item-form #variant-swatch-2 .swatch-element').addClass('soldout');
                            $('#add-item-form #variant-swatch-1 .swatch-element').find('label').removeClass('sd');
                            $('#add-item-form #variant-swatch-2 .swatch-element').find('label').removeClass('sd');
    
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "'+_key+'"] input').prop('disabled', true);
                            $('#add-item-form #variant-swatch-2 .swatch-element input').prop('disabled',true);//add
                            $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
    
                            $('#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value = "'+_key+'"]').addClass('soldout');
                            $('#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value = "'+_key+'"] input').attr('disabled','disabled');
    
                            $('#add-item-form-sb #select-swap-sb option[value="'+ _key +'"]').addClass('disabled');
                            $('#add-item-form-sb #select-swap-sb option[value="'+ _key +'"]').prop("disabled", true);
                        }
                    })
                    $('#add-item-form #variant-swatch-1 .swatch-element[data-value="'+_avi_op1+'"] input').click();
                    $('#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value="'+_avi_op1+'"] input').click();
                }
                else if(name.indexOf('2') != -1){
                    $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                    $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
    
                    $('#add-item-form-sb #variant-swatch-2-sb .swatch-element label').removeClass('sd');
                    $('#add-item-form-sb #variant-swatch-2-sb .swatch-element').removeClass('soldout');
                    $('#add-item-form-sb #variant-swatch-2-sb .swatch-element').find('input').prop('disabled', false);
    
                    $('#add-item-form .selector-wrapper .single-option-selector').eq(2).find('option').each(function(){
                        var _tam = $(this).val();
                        $(this).parent().val(_tam).trigger('change');
                        if(check_variant){
                            if(_available == '' ){
                                _available = _tam;
                            }
                        }else{
                            $('#add-item-form #variant-swatch-2 .swatch-element[data-value="'+_tam+'"]').addClass('soldout');
                            $('#add-item-form #variant-swatch-2 .swatch-element[data-value="'+_tam+'"]').find('input').prop('disabled', true);
    
                            $('#add-item-form-sb #variant-swatch-2-sb .swatch-element[data-value="'+_tam+'"]').addClass('soldout');
                            $('#add-item-form-sb #variant-swatch-2-sb .swatch-element[data-value="'+_tam+'"]').find('input').prop('disabled', true);
    
                        }
                    })
                    $('#add-item-form .selector-wrapper .single-option-selector').eq(2).val(_available).trigger('change');
                    $('#add-item-form #variant-swatch-2 .swatch-element[data-value="'+_available+'"] label').addClass('sd');
    
                    $('#add-item-form-sb .selector-wrapper .single-option-selector').eq(2).val(_available).trigger('change');
                    $('#add-item-form-sb #variant-swatch-2-sb .swatch-element[data-value="'+_available+'"] label').addClass('sd');
                }
                if($('#add-item-form #variant-swatch-0 .swatch-element').find('label.sd').length != 0 && $('#add-item-form #variant-swatch-1 .swatch-element').find('label.sd').length != 0 && $('#add-item-form #variant-swatch-2 .swatch-element').find('label.sd').length != 0){
                    check_select_vrt = true;
                    check_variant_add = check_select_vrt;
                    $(".check-action-tt").remove();
                    $(".product-variants").removeClass("check-action-variant");
                }
                else{
                    check_select_vrt = false;
                    check_variant_add = check_select_vrt;
                }
            }
            else{
                if($('#add-item-form #variant-swatch-0 .swatch-element').find('label.sd').length != 0){
                    check_select_vrt = true;
                    check_variant_add = check_select_vrt;
                    $(".check-action-tt").remove();
                    $(".product-variants").removeClass("check-action-variant");
                }
                else{
                    check_select_vrt = false;
                    check_variant_add = check_select_vrt;
                }
            }
    
    
            if(pro_template == "style_02"){
                //check img style 2
                if(check_scrollstyle2 != '' && $(window).width() > 991 ){
                    var indeximg2 = $(".product-gallery__photo[data-image='"+ check_scrollstyle2 +"']").index();
                    //console.log(indeximg2)
                    window.scrollTo({ top: $('#productScroll-slider .product-gallery__photo:eq('+indeximg2+')').offset().top, behavior: 'smooth' });
                }
            }
    
            if(vrIdParam){	
                var urlsearch = window.location.search;
                if(current_id != selectedVariant.id){
                    selectedVariant.id = current_id;
                    if(urlsearch.indexOf('variant=') > -1 ){
                        var newt = urlsearch.split('variant=');
                        var t = newt[1].split('&');
                        t[0] = current_id;
                        newt[1] = t.join('&');
                        newt = newt.join('variant=');
                        /*	window.history.pushState({}, document.title, newt);	*/
                        var newurl = newt;
                        window.history.replaceState({
                            path: newurl
                        }, '', newurl);
                    }
                    else if(urlsearch != '?' && urlsearch != '' ){
                        //window.history.pushState({}, document.title, urlsearch+"&variant=" + current_id);	
                        var newurl = urlsearch+"&variant=" + current_id;
                        window.history.replaceState({
                            path: newurl
                        }, '', newurl);
                    }	
                    else if(urlsearch == '' ){
                        //window.history.pushState({}, document.title, "?variant=" + current_id);	
                        var newurl = window.location.origin + window.location.pathname + '?variant=' + current_id;
                        window.history.replaceState({
                            path: newurl
                        }, '', newurl);
                    }
                }
                else if(urlsearch == '' ){
                    //window.history.pushState({}, document.title, "?variant=" + current_id);	
                    var newurl = window.location.origin + window.location.pathname + '?variant=' + current_id;
                    window.history.replaceState({
                        path: newurl
                    }, '', newurl);
                }
            }
        })
        jQuery(document).on('click','.sidebar-action-bottom #add-item-form-sb .swatch input', function(e) {
            var valueHandle = $(this).attr('data-vhandle');
            $('#add-item-form .swatch input[data-vhandle="'+ valueHandle + '"]').trigger('click');
        });
        jQuery(document).on('change','.sidebar-action-bottom #add-item-form-sb #select-swap-sb', function(e) {
            var valueSelect = $(this).find("option:selected").attr('value');
            $('#add-item-form .swatch input[value="'+ valueSelect + '"]').trigger('click');
        });
        $(document).ready(function(){
    
            if(vrIdParam){
                var urlsearch2 = window.location.search;
                if(urlsearch2.indexOf('variant=') > -1 ){
                    if(current_id == selectedVariant.id){
                        $('#add-item-form .swatch-element[data-value="'+$('#add-item-form .selector-wrapper .single-option-selector').eq(0).val()+'"]').find('input').click();
                        $('#add-item-form .swatch-element[data-value="'+$('#add-item-form .selector-wrapper .single-option-selector').eq(1).val()+'"]').find('input').click();
                        $('#add-item-form .swatch-element[data-value="'+$('#add-item-form .selector-wrapper .single-option-selector').eq(2).val()+'"]').find('input').click();
                        $('#add-item-form-sb #select-swap-sb').val($('#add-item-form .selector-wrapper .single-option-selector').eq(1).val());
                    }
                    else{
                        $('#add-item-form .swatch-element[data-value="'+selectedVariant.option1+'"]').find('input').click();
                        $('#add-item-form .swatch-element[data-value="'+selectedVariant.option2+'"]').find('input').click();
                        $('#add-item-form .swatch-element[data-value="'+selectedVariant.option3+'"]').find('input').click();
                        $('#add-item-form-sb #select-swap-sb').val(selectedVariant.option2);
                    }
                }
            }
        });
    
        $(document).ready(function(){
            var vl = $('#add-item-form .swatch .color input').val();
            //$('#add-item-form .swatch .color input').parents(".swatch").find(".header strong").html(vl);
            $("#add-item-form .select-swap .color" ).hover(function() { 
                //var value = $( this ).data("value");
                //$(this).parents(".swatch").find(".header strong").html( value );
            },function(){
                var value = $("#add-item-form .select-swap .color label.sd span").html();
                $(this).parents(".swatch").find(".header strong").html( value );
            });
    
            if (has360){
                if(data_360 != null){
                    data_360["image360"].map(x => {
                        $('#div_360,#div_360_mb').append('<img src="'+x+'" />');
    
                    });
                    $('#div_360,#div_360_mb').angle({
                        speed: 3,
                        drag: false
                    });
                }
            }
    
    
        });
        $(document).ready(function(){
            $('.js-btn-preorder-detail').click(function(e){
                e.preventDefault();
                if(!check_variant_add && swatch_size !=0 ){
                    if($(".product-variants.check-action-variant").length == 0){
                        $(".product-variants").prepend("<p class='check-action-tt'>Vui lòng chọn biến thể</p>");
                        $(".sidebar-action-bottom #add-item-form-sb").prepend("<p class='check-action-tt'>Vui lòng chọn biến thể</p>");
                        $(".product-variants").addClass("check-action-variant");
                    }
                    else{
                        $('.check-action-tt').removeClass('text-effect');
                        setTimeout(function(){
                            $('.check-action-tt').addClass('text-effect');
                        }, 100);
                    }
                }
                else{
                    $('#modal-preorder-contact').modal('show');
                }
            });
            $('#modal-preorder-contact form.contact-form').submit(function(e){
                e.preventDefault();
                var self = $(this);
                var vlTextbody = 'Nội dung: '+$('textarea.product-body-val').val();
                var handlePr = window.location.href;
                var vlTextPr = $('input.detailPr').val() + '\n' + 'Link sản phẩm: '+handlePr;		
                var swatchSize = parseInt($('#add-item-form .select-swatch .swatch').length);
                if(swatchSize == 1){
                    var vlVariant = 'Biến thể: '+$('.select-swatch .swatch').find('label.sd span').html();				
                }
                else if(swatchSize == 2){
                    var vlVariant = 'Biến thể: '+$('.select-swatch .swatch').find('label.sd span').html()+' | '+
                            $('.select-swatch .swatch').next().find('label.sd span').html();
                }
                else if(swatchSize == 3){
                    var vlVariant = 'Biến thể: '+$('.select-swatch .swatch').find('label.sd span').html()+' | '+
                            $('.select-swatch .swatch').next().find('label.sd span').html()+' | '+
                            $('.select-swatch .swatch').next().next().find('label.sd span').html();				
                }
                else{
                    var vlVariant = '';
                }
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {
                        self.find('input[name="g-recaptcha-response"]').val(token);
                        $('input.detailPr').val(vlTextPr+'\n'+vlVariant+'\n'+vlTextbody);
                        $.ajax({
                            type: 'POST',
                            url:'/contact',
                            data: $('#modal-preorder-contact form.contact-form').serialize(),			 
                            success:function(data){		
                                $('.success-form-pr-contact').removeClass('d-none');
                                setTimeout(function(){
                                    $('#modal-preorder-contact').modal('hide');
                                    location.reload();
                                },2500)
                            }			
                        })
                    });
                });
            });
    
        });
        $(document).ready(function(){
            $('#add-to-cart').click(function(e){
                e.preventDefault();
                if(!check_variant_add && swatch_size !=0 ){
                    if($(".product-variants.check-action-variant").length == 0){
                        $(".product-variants").prepend("<p class='check-action-tt'>Vui lòng chọn biến thể</p>");
                        $(".sidebar-action-bottom #add-item-form-sb").prepend("<p class='check-action-tt'>Vui lòng chọn biến thể</p>");
                        $(".product-variants").addClass("check-action-variant");
                    }
                    else{
                        $('.check-action-tt').removeClass('text-effect');
                        setTimeout(function(){
                            $('.check-action-tt').addClass('text-effect');
                        }, 100);
                    }
                }
                else{
                    if(comboApp.checkCombo){
                        $('#combo-popup button').removeAttr('data-buynow');
                        $('#combo-popup').modal('show');
                    }
                    else{
                        e.preventDefault();			
                        $(this).addClass('clicked_buy');
                        HRT.All.addItemShowModalCart($('#product-select').val());
                        if($(window).width() < 992){
                            $('body').removeClass('locked-scroll').addClass('body-showcart');
                            $('.sidebar-main').addClass('is-show-right');
                            $('.sidebar-main .sitenav-cart').addClass('show');
                        }
                    }
                }
            });
            $('#buy-now').click(function(e){
                e.preventDefault();
                if(comboApp.checkCombo){
                    $('#combo-popup button').removeAttr('data-buynow');
                    $('#combo-popup').modal('show');
                }
                else{
                    e.preventDefault() ;
                    var id = $('#product-select').val();
                    var quantity = $('#quantity').val();
                    var params = {
                        type: 'POST',
                        url: '/cart/add.js',
                        async : false,
                        data: 'quantity=' + quantity + '&id=' + id,
                        dataType: 'json',
                        success: function(line_item) {
                            window.location = '/cart';
                        },
                        error: function(XMLHttpRequest, textStatus) {
                            Haravan.onError(XMLHttpRequest, textStatus);
                        }
                    };
                    jQuery.ajax(params);
                }
            });
    
            // Nút thêm tất cả vào giỏ
            $('body').on('click', '#discount-promotion-combo-add-btn', function(e){
                e.preventDefault();
                var that = $(this);
                var pid = $('#combo-program').data('id');
                var vid = $('.variant_id[name="id"]').val();//add class variant_id to #product-select
                comboApp.comboAddCart(pid, vid, function(response){
    
                    if(response){
                        if(that.attr('data-buynow') != undefined){
                            window.location = "/checkout";
                        }
                        else{
                            //$('#combo-popup').removeClass('show');
                            $('#combo-popup').modal('hide');
                            HRT.All.getCartModal();
                            $('body').removeClass('locked-scroll').addClass('body-showcart');
                            $('.sidebar-main').addClass('is-show-right');
                            $('.sidebar-main .sitenav-cart').addClass('show');
                        }
                    }
                    else{
                        //alert('fail');
                        $('#combo-popup').modal('hide');
                        alert('Sản phẩm bạn vừa mua đã vượt quá tồn kho');
                    }
                });
    
                /*var html = '';
    
                $('.combo-list .combo-product').each(function(){
                    console.log($(this).data('id'), parseInt($('.firstid').text()), $(this).data('id') != parseInt($('.firstid').text()))
    
                    html += '<div class="media">'+
                        '              <div class="media-left thumb_img">'+
                        '                <div class="thumb-1x1"><img src="'+ $(this).find('.combo-img').attr('src') +'" alt="Tạp chí GGWP số 01"></div>'+
                        '              </div>'+
                        '              <div class="media-body body_content">'+
                        '                <div class="product-title">'+ $(this).find('p:not(".discount-promotion-price") b').text() +'</div>'+
                        '                <div class="variant_title font-weight-light"><span></span></div>'+
                        '              </div>'+
                        '            </div>';
    
                })
    
    
    
                $('#popupCartModal .modal-body').append(html);
    
    
                var seen = {};
                $('#popupCartModal .modal-body .media .product-title').each(function() {
                    var txt = $(this).text();
                    if (seen[txt])
                        $(this).parents('.media').remove();
                    else
                        seen[txt] = true;
                });*/
            });
            // Nút chỉ thêm sản phẩm hiện tại
            $('body').on('click', '#discount-promotion-dismiss-btn', function(e){
                e.preventDefault();
                var that = $(this);
                var qty = $('.prd_quantity[name="quantity"]').val();
                var vid = $('.form-product').attr('data-id');
                $.ajax({
                    type: 'POST',
                    async: false,
                    url:'/cart/add.js',
                    async:false,
                    data: $('form#add-item-form').serialize(),
                    //data: {"quantity": qty, "id": vid},
                    success:function(line){
                        if(that.attr('data-buynow') != undefined){
                            window.location = "/checkout";
                        }
                        else{
                            $('#combo-popup').modal('hide');
                            HRT.All.getCartModal();
                            $('body').removeClass('locked-scroll').addClass('body-showcart');
                            $('.sidebar-main').addClass('is-show-right');
                            $('.sidebar-main .sitenav-cart').addClass('show');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Sản phẩm bạn vừa mua đã vượt quá tồn kho');
                    }
                });
            });
    
            $('.close-modal-app').click(function(){
                $('#combo-popup').modal('hide');
            })
        });
    