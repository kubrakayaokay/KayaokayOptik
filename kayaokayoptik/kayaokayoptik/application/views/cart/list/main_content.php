<section class="checkout">
    <header>
        <div class="container">
            <h2 class="title">Sepetim</h2>
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
                        <span style="color:darkred" data-text="Teslimat Bilgileri"></span>
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
        <div class="cart-wrapper">
            <div class="cart-block cart-block-header clearfix">
                <div><span>Ürün</span></div>
                <div><span>&nbsp;&nbsp;</span></div>
                <div><span>  Adet</span></div>
                <div class="text-right"><span>Fiyat</span></div>
            </div>
            <div class="clearfix">
                <?php foreach ($this->cart->contents() as $items): ?>
                <div class="cart-block cart-block-item clearfix">
                    <div class="image">
                        <a href="#"><img src="<?= get_product_image($items['id']); ?>" alt="" /></a>
                    </div>

                    <div class="title">
                        <div class="h4"><a href="product.html"><?php echo $items['name']; ?></a></div>
                    </div>
                    <div class="quantity">
                        <span  class="form-control form-quantity"><?=$items['qty'];?></span>
                    </div>
                    <div class="price">
                        <span class="final h3"><?php echo $this->cart->format_number($items['subtotal']); ?> ₺ </span>
                    </div>
                  <a href="<?=base_url("cart/delete_product/".$items['rowid'])?>"><span class="icon icon-cross icon-delete"></span></a>
                </div>
                <?php endforeach; ?>
            </div>

            <!--cart prices -->

            <div class="clearfix">
                <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                    <div>
                                <span class="checkbox">
                                    <label for="couponCodeID"></label>
                                </span>
                    </div>
                    <div>
                        <div class="h2 title"><?php echo $this->cart->format_number($this->cart->total()); ?> ₺</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <div class="row">
                <div class="col-6">
                    <a href="<?=base_url()?>" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Alışverişe Devam Et</a>
                </div>
                <div class="col-6 text-right">
                    <a href="<?=base_url("cart/address")?>" class="btn btn-clean-dark"><span class="icon icon-cart"></span> Teslimat Bilgileri</a>
                </div>
            </div>
        </div>
    </div>
</section>
