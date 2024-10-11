@section('title', 'Liên hệ')

@extends('client.layouts.app')

@section('content')

<main class="wrapperMain_content">
    <div class="layout-pageContact">
        <div class="breadcrumb-shop">
            <div class="container">
                <div class="breadcrumb-list">
                    <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="/" target="_self" itemprop="item">
                                <span itemprop="name">Trang chủ</span>
                            </a>
                            <meta itemprop="position" content="1" />
                        </li>

                        <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="item" content="https://www.ggwp.vn/pages/lien-he">
                                <strong itemprop="name">Liên hệ</strong>
                            </span>
                            <meta itemprop="position" content="2" />
                        </li>

                    </ol>
                </div>
            </div>
        </div>

        <div class="wrapper-bodycontact">
            <div class="heading-pageDetail d-none">
                <div class="container">
                    <h1>Liên hệ</h1>
                </div>
            </div>

            <div class="wrapbox-content-contact">
                <div class="container pd-top">
                    <div class="row widthContent">
                        <div class="col-lg-6 col-md-12 col-12 wrapbox-content-left">
                            <div class="box-info-contact">
                                <h2>Thông tin liên hệ</h2>
                                <div class="wrapbox-contact">
                                    <ul class="infoList-contact row">
                                        <li class="col-md-12 col-xs-12">
                                            <span><i class="fa fa-map-marker"></i></span>
                                            <p>
                                                <strong>Địa chỉ</strong>
                                                <br>
                                                No10 LK10-36 Khu Đô Thị Văn Khê, La Khê, Hà Đông, Hà Nội
                                            </p>
                                        </li>
                                        <li class="col-md-12 col-xs-12">
                                            <span><i class="fa fa-phone"></i></span>
                                            <p>
                                                <strong>Điện thoại</strong>
                                                <br>
                                                0943560536
                                            </p>
                                        </li>
                                    </ul>
                                    <ul class="infoList-contact row">
                                        <li class="col-md-12 col-xs-12">
                                            <span><i class="fa fa-calendar"></i></span>
                                            <p>
                                                <strong>Thời gian làm việc</strong>
                                                <br>
                                                Thứ 2 đến Thứ 6:  từ 8h đến 18h;
                                                <br>
                                                Thứ 7 và Chủ nhật:  từ 8h00 đến 17h00
                                            </p>
                                        </li>
                                        <li class="col-md-12 col-xs-12">
                                            <span><i class="fa fa-envelope-o"></i></span>
                                            <p>
                                                <strong>Email</strong>
                                                <br>
                                                merchandise.phegame@gmail.com
                                            </p>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="box-send-contact">
                                <h2>Gửi thắc mắc cho chúng tôi</h2>
                                <p>Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .</p>
                                <div id="col-left contactFormWrapper">
                                    <form accept-charset='UTF-8' action='/contact' class='contact-form' method='post'>
                                        <input name='form_type' type='hidden' value='contact'>
                                        <input name='utf8' type='hidden' value='&#x2713;'>

                                        <div class="contact-form">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="input-group">
                                                        <input required type="text" name="contact[name]" class="form-control" placeholder="Tên của bạn" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="input-group">
                                                        <input required type="text" name="contact[email]" class="form-control" placeholder="Email của bạn" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="input-group">
                                                        <input pattern="[0-9]{10,12}" required type="text" name="contact[phone]" class="form-control" placeholder="Số điện thoại của bạn" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="input-group">
                                                        <textarea required name="contact[body]" placeholder="Nội dung"></textarea>
                                                        <div class="sitebox-recaptcha">
                                                            This site is protected by reCAPTCHA and the Google
                                                            <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
                                                            and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xs-12">
                                                    <button class="button dark">Gửi cho chúng tôi</button>
                                                </div>
                                            </div>
                                        </div>

                                        <input id='23b2fb6ed8b3489ebc8f007f4ec67b6b' name='g-recaptcha-response' type='hidden'>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 wrapbox-content-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
