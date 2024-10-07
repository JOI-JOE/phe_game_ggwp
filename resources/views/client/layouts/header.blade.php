<header class="main-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-6 hd-logo">
                <div class="header-wrap-iconav header-wrap-action">
                    <div class="header-action">
                        <div
                            class="header-action-item header-action_menu activeMenuChecked"
                        >
                            <div class="header-action_text">
                                <a
                                    class="header-action__link"
                                    name="icon-menu-mobile"
                                    href="javascript:void(0)"
                                    aria-label="Menu"
                                    title="Menu"
                                >
                                    <span class="box-icon">
                                        <span
                                            class="hamburger-menu"
                                            aria-hidden="true"
                                        >
                                            <span
                                                class="bar"
                                            ></span>
                                        </span>
                                        <span
                                            class="box-icon--close"
                                        >
                                            <svg
                                                viewBox="0 0 19 19"
                                                role="presentation"
                                            >
                                                <path
                                                    d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                    fill-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo">
                    <a href="/" aria-label="Logo Phê Game">
                        <img src="{{asset('client-site/img/logo.png')}}" alt="Phê Game" />
                    </a>
                </div>
            </div>
            <div class="col-8 hd-menu-desktop">
                <div class="list-menu">
                    <nav class="navbar-mainmenu">
                        <ul class="menuList-main">
                            <li class="active menu-item">
                                <a
                                    href="/"
                                    class="menu-item__link"
                                    title="Trang chủ"
                                    ><span>Trang chủ</span></a
                                >
                            </li>

                            <li class="menu-item">
                                <a
                                    href="/collections/all"
                                    class="menu-item__link"
                                    title="Sản phẩm"
                                    ><span>Sản phẩm</span></a
                                >
                            </li>

                            <li class="menu-item">
                                <a
                                    href="/pages/lien-he"
                                    class="menu-item__link"
                                    title="Liên hệ"
                                    ><span>Liên hệ</span></a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="action-header">
                    <!-- Search icon -->
                    <div class="search-header">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            x="0px"
                            y="0px"
                            width="90"
                            height="90"
                            viewBox="0 0 30 30"
                        >
                            <path
                                d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"
                            ></path>
                        </svg>
                    </div>
                    <!-- Account icon -->
                    <div class="account-header action-item">
                        <div class="account-title no-acc">
                            <a href="/account/login">
                                <svg
                                    class="svg-ico-account"
                                    viewBox="0 0 1024 1024"
                                >
                                    <path
                                        class="path1"
                                        d="M486.4 563.2c-155.275 0-281.6-126.325-281.6-281.6s126.325-281.6 281.6-281.6 281.6 126.325 281.6 281.6-126.325 281.6-281.6 281.6zM486.4 51.2c-127.043 0-230.4 103.357-230.4 230.4s103.357 230.4 230.4 230.4c127.042 0 230.4-103.357 230.4-230.4s-103.358-230.4-230.4-230.4z"
                                    ></path>
                                    <path
                                        class="path2"
                                        d="M896 1024h-819.2c-42.347 0-76.8-34.451-76.8-76.8 0-3.485 0.712-86.285 62.72-168.96 36.094-48.126 85.514-86.36 146.883-113.634 74.957-33.314 168.085-50.206 276.797-50.206 108.71 0 201.838 16.893 276.797 50.206 61.37 27.275 110.789 65.507 146.883 113.634 62.008 82.675 62.72 165.475 62.72 168.96 0 42.349-34.451 76.8-76.8 76.8zM486.4 665.6c-178.52 0-310.267 48.789-381 141.093-53.011 69.174-54.195 139.904-54.2 140.61 0 14.013 11.485 25.498 25.6 25.498h819.2c14.115 0 25.6-11.485 25.6-25.6-0.006-0.603-1.189-71.333-54.198-140.507-70.734-92.304-202.483-141.093-381.002-141.093z"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- Cart icon -->
                    <div class="cart-header">
                        <a href="/cart" aria-label="Cart">
                            <svg
                                class="icon icon-cart"
                                aria-hidden="true"
                                focusable="false"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 40 40"
                                fill="none"
                            >
                                <path
                                    fill="currentColor"
                                    fill-rule="evenodd"
                                    d="M20.5 6.5a4.75 4.75 0 00-4.75 4.75v.56h-3.16l-.77 11.6a5 5 0 004.99 5.34h7.38a5 5 0 004.99-5.33l-.77-11.6h-3.16v-.57A4.75 4.75 0 0020.5 6.5zm3.75 5.31v-.56a3.75 3.75 0 10-7.5 0v.56h7.5zm-7.5 1h7.5v.56a3.75 3.75 0 11-7.5 0v-.56zm-1 0v.56a4.75 4.75 0 109.5 0v-.56h2.22l.71 10.67a4 4 0 01-3.99 4.27h-7.38a4 4 0 01-4-4.27l.72-10.67h2.22z"
                                ></path>
                            </svg>
                            <span id="total_cart" class="hd-cart-count">0</span>
                        </a>
                    </div>
                    <!-- Cart notification -->
                    <div id="cart-notification" class="hidden">
                        <div class="cart-notify-button">
                            <button type="button" class="btn-close">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50">
                                <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="cart-notification">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <p class="jGowl-text">Đã thêm vào giỏ hàng thành công!</p>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="/products/tap-chi-ggwp-so-01">
                                        <img width="70px" src="//product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59_small.jpg" alt="Tạp chí GGWP số 01">
                                    </a>
                                </div>
                                <div class="col-md-8 col-xs-8">
                                    <div class="jGrowl-note">
                                        <a class="jGrowl-title" href="/products/tap-chi-ggwp-so-01">Tạp chí GGWP số 01</a>
                                        <ins>139,000₫</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-btn">
                            <a href="/cart" class="btn-cart view-cart">Xem giỏ hàng (<span class="hd-cart-count">6</span>)</a>
                            <a href="/checkout" class="btn-cart check-out">Thanh toán</a>
                            <a href="/collections/all" class="continue-shopping">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search -->
    <div class="search-header-action hidden">		
		<div class="modal-overlay"></div>
		<div class="search-box wpo-wrapper-search">
			<form action="/search" method="GET" class="searchform searchform-categoris ultimate-search">
				<div class="wpo-search-inner">
					<input required="" id="inputSearchAuto" name="valueInput" class="input-search" name="q" maxlength="40" autocomplete="off" type="text" size="20" placeholder="">
				<label class="search-label">Tìm kiếm</label>
				</div>
				<button type="submit" class="btn-search btn" id="search-header-btn" aria-label="button search">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="90" height="90" viewBox="0 0 30 30">
							<path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"></path>
						</svg>
				</button>
				<div class="btn-close-search">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50">
                    <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path>
                    </svg>
				</div>
			</form>
			<div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults">
				<div class="resultsContent" id="resultsContent">
                </div>
			</div>
		</div>
	</div>
</header>


<script>
    $(document).ready(function() {
        $('#inputSearchAuto').keyup(function() {
            var searchTerm = $(this).val();

            if (searchTerm.length > 2) { // Chỉ thực hiện tìm kiếm khi người dùng nhập ít nhất 3 ký tự
                $.ajax({
                    url: '{{route('search')}}', // Thay thế bằng đường dẫn đến file xử lý tìm kiếm của bạn
                    method: 'GET',
                    data: {searchTerm: searchTerm},
                    success: function(response) {
                        var showSearch = '';
                        var box = response.data;
                        // console.log(response.data);
                        if (box.length === 0) {
                            showSearch = '<div>Không tìm được sản phẩm...</div>';
                        } else {
                            $.each(box, function (index, item) {
                                var url = '{{route("detai_product","ID")}}';
                                var newUrl = url.replace("ID",item.handle);

                                console.log(item.handle);
                                showSearch += '<div class="item-ult">';
                                showSearch += '<div class="thumbs">';
                                showSearch += '<a href="' + newUrl + '" id="item-url" title="' + item.handle + '">';
                                showSearch += '<img alt="' + item.name + '" src="//product.hstatic.net/200000249781/product/8_46e59d9aa2aa45c2a100c6182244dd59_compact.jpg">';
                                showSearch += '</a>';
                                showSearch += '</div>';
                                showSearch += '<div class="title">';
                                showSearch += '<a title="' + item.name + '" id="item-url" href="' + newUrl + '">' + item.name + '</a>';
                                showSearch += '<p class="f-initial ">' + item.price + '</p>';
                                showSearch += '</div>';
                                showSearch += '</div>';
                            });
                        }
                        $('#resultsContent').html(showSearch);
                    }
                });
            } else {
                $('#resultsContent').html(''); // Xóa kết quả khi người dùng xóa từ khóa
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.cart-notify-button button').click(function() {
            $('#cart-notification').addClass('hidden'); // Add 'hidden' class
        });
        $.ajax({
            url: '{{ route('getTotal') }}',
            method: 'GET',
            success: function(response) {
                if (response['status']) {
                    console.log('dữ liệu đã được chuẩn bị')
                    console.log(response['data']);
                    $('#total_cart').html(response['data']);
                }
            }
        });
    });
</script>