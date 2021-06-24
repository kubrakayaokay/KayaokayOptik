<section class="checkout">
    <header>
        <div class="container">
            <h2 class="title">Teslimat Bilgileri</h2>
        </div>
    </header>
    <div class="step-wrapper">
        <div class="container">
            <div class="stepper">
                <ul class="row">
                    <li class="col-3 active">
                        <span style="color:green" data-text="Ürün Seçimi"></span>
                    </li>
                    <li class="col-3 active">
                        <span style="color:green" data-text="Teslimat Bilgileri"></span>
                    </li>
                    <li class="col-3">
                        <span style="color:darkred" data-text="Ödeme"></span>
                    </li>
                    <li class="col-3">
                        <span style="color:darkred" data-text="Fatura"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="post" action="<?=base_url("cart/payment")?>">
        <div class="cart-wrapper">
            <div class="note-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="login-wrapper">

                            <div class="login-block login-block-signup">
                                <div class="h4">Teslimat Bilgileri</div>
                                <hr/>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" value="" class="form-control"
                                                  name="firstname" placeholder="Ad: *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="lastname" type="text" value="" class="form-control" placeholder="Soyad: *">
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <input  name="address" type="text" value="" class="form-control"
                                                   placeholder="Adres: *">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input  name="zipcode" type="text" value="" class="form-control" placeholder="Posta Kodu: *">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input  name="city" type="text" value="" class="form-control" placeholder="İl : *">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input  name="district" type="text" value="" class="form-control" placeholder="İlçe : *">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" type="email" value="" class="form-control" placeholder="Eposta: *">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="phone" type="tel" value="" class="form-control" placeholder="Cep Telefonu: *">
                                        </div>
                                    </div>
                                </div>
                            </div> <!--/signup-->
                        </div> <!--/login-wrapper-->
                    </div> <!--/col-md-6-->
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="row">
                <div class="col-6">
                    <a href="<?=base_url()?>" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Alışverişe Devam Et</a>
                </div>
                <div class="col-6 text-right">

                    <button type="submit" class="btn btn-clean-dark"><span class="icon icon-cart"></span> Ödeme Ekranına Geç</button>
                </div>

            </div>
        </div>
        </form>

    </div> <!--/container-->

</section>