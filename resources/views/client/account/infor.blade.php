@section('title', 'Tài khoản')

@extends('client.layouts.app')

@section('content')
<main class="wrapperMain_content">
	<div class="layout-account">
		<div class="container">
			<div class="wrapbox-content-account">
				<div class="header-page clearfix">
					<h1>Tài khoản của bạn </h1>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-12 col-12 sidebar-account">
						<div class="AccountSidebar">
							<h3 class="AccountTitle titleSidebar">Tài khoản</h3>
							<div class="AccountContent">
								<div class="AccountList">
									<ul class="list-unstyled">
										<li class="current"><a href="/account">Thông tin tài khoản</a></li>
										<li><a href="/account/addresses">Danh sách địa chỉ</a></li>
										<li class="last"><a href="/account/logout">Đăng xuất</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-12 col-12">
						<div class="row wrap_content_account">
							<div class="col-12 wrap_inforAccount" id="customer_sidebar">
								<p class="title-detail">Thông tin tài khoản</p>
								<h2 class="name_account">Vito Don</h2>
								<p class="email ">vito@gmail.com</p>
								<div class="address ">
									<p></p>
									<p></p>
									<p> Vietnam</p>
									<p></p>
									<a id="view_address" href="/account/addresses">Xem địa chỉ</a>
								</div>
							</div>
							<div class="col-12 wrap_orderAccount" id="customer_orders">
								<div class="customer-table-wrap">
									<div class="customer_order customer-table-bg">
										<p>Bạn chưa đặt mua sản phẩm.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection

