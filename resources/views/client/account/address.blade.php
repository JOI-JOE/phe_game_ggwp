@section('title', 'Tài khoản')

@extends('client.layouts.app')

@section('content')
<main class="wrapperMain_content">	<div class="layout-account">
	<div class="container">
		<div class="wrapbox-content-account">
			<div class="header-page clearfix">	<h1>Thông tin địa chỉ</h1></div>
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
					<div class="row wrap_content_address">
						<div class="col-lg-6 col-md-12 col-12 wrap_editAddress">
							<div id="address_tables"> 
								<div class="row">
									<div class="col-lg-12 col-xs-12 clearfix">
										<div class="address_title ">
											<h3>
												<strong>Vito Don</strong>									
												<span class="default_address note">(Địa chỉ mặc định)</span>								
											</h3>
											<p class="address_actions text-right">
												<span class="action_link action_edit"><a href="#" onclick="Haravan.CustomerAddress.toggleForm(10203989328);return false"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span>
												<span class="action_link action_delete"><a href="#" onclick="Haravan.CustomerAddress.destroy(10203989328);return false"><i class="fa fa-times" aria-hidden="true"></i></a></span>
											</p>
										</div>
									</div>
								</div>
								<div class="address_table">
									<div id="view_address_10203989328" class="customer_address">
										<div class="view_address row">
											<div class="col-lg-12 col-md-12 large_view">
												<p><strong>Vito Don</strong></p>
											</div>										
											<div class="col-lg-12 col-md-12 large_view">
												<div class="lb-left"><b>Công ty:</b></div>
												<div class="lb-right"><p></p> </div>
											</div>										
											<div class="col-lg-12 col-md-12 large_view">
												<div class="lb-left"><b>Địa chỉ:</b></div>
												<div class="lb-right">
													<p></p>
													<p></p>
													<p>, Vietnam </p>
												</div>
											</div>									
											<div class="col-lg-12 col-md-12 large_view">
												<div class="lb-left"><b>Số điện thoại:</b></div>
												<div class="lb-right"></div>
											</div>
										</div>
									</div>    
									<div id="edit_address_10203989328" class="customer_address edit_address" style="display:none;">
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
</div>

</main>
@endsection

