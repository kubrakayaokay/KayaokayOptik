<section class="checkout">
    <header>
        <div class="container">
            <h2 class="title">Siparişiniz Onaylandı</h2>
        </div>
    </header>
    <div class="step-wrapper">
        <div class="container">
            <div class="stepper">
                <ul class="row">
                    <li class="col-3 active">
                        <span style="color:green" data-text="Ürün Seçimi"></span>
                    </li>
                    <li class="col-3">
                        <span style="color:green" data-text="Teslimat Bilgileri"></span>
                    </li>
                    <li class="col-3">
                        <span style="color:green" data-text="Ödeme"></span>
                    </li>
                    <li class="col-3">
                        <span style="color:green" data-text="Fatura"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="cart-wrapper">
        <div class="note-block">
                <div class="row">
                    <div class="col-md-6">
                        <div class="h4">Sipariş Bilgileri</div>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>İsim</strong> <br />
                                    <span><?php echo (!empty($_SESSION["first_name"]) && !empty($_SESSION["last_name"]) ) ? $_SESSION["first_name"] . " " .  $_SESSION["last_name"]: 'Geçersiz isim girdiniz !'  ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>E-posta</strong><br />
                                    <span><?php echo (!empty($_SESSION["email"])) ? $_SESSION["email"]: 'Geçersiz eposta girdiniz !' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Telefon</strong><br />
                                    <span><?php echo (!empty($_SESSION["phone"])) ? $_SESSION["phone"]: 'Geçersiz telefon girdiniz !' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Posta Kodu</strong><br />
                                    <span><?php echo (!empty($_SESSION["zipcode"])) ? $_SESSION["zipcode"]: 'Geçersiz posta kodu girdiniz !' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>İl</strong><br />
                                    <span><?php echo (!empty($_SESSION["city"])) ? $_SESSION["city"]: 'Geçersiz il girdiniz !' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Adres</strong><br />
                                    <span><?php echo (!empty($_SESSION["address"])) ? $_SESSION["address"]: 'Geçersiz adres girdiniz !' ?></span>
                                </div>
                            </div>

                        </div>
                    </div><!--/col-md-6-->
                    <div class="col-md-6">

                        <div class="h4">Ödeme Bilgileri</div>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>İşlem Tarihi</strong> <br />
                                    <span><?php echo (!empty($_SESSION["time"])) ? $_SESSION["time"]: 'Geçersiz zaman bilgisi !' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Tutar</strong><br />
                                    <span><?php echo $this->cart->format_number($this->cart->total()); ?> ₺</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Kart Bilgileri</strong><br />
                                    <span>**** **** **** <?= substr($_SESSION["card_number"], -4); ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Toplam Ürün</strong><br />
                                    <span><?=  $this->cart->total_items(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </div>
</section>
