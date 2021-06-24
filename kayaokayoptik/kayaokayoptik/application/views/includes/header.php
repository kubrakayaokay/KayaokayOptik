<?php $contact = json_decode(get_settings("contact"), true) ?>
<?php $social = json_decode(get_settings("social_media"), true) ?>
<?php $cats = get_product_category(); ?>
<?php $products = get_product_list();
$logo = script_settings("logo");

?>

<nav>
    <div class="container">
        <a href="<?= base_url(); ?>" class="logo"><img src="<?= base_url("uploads/logo/$logo") ?>" alt="" width="100"
                                                       height="40"/></a>
        <div class="navigation navigation-top clearfix">
            <ul>
                <li class="left-side"><a href="<?= base_url(''); ?>" class="logo-icon"><img
                                src="<?= base_url("uploads/logo/") . script_settings("logo"); ?>"
                                alt="<?= script_settings("company_name"); ?>" width="110"
                                height="55"/></a></li>
                <li><a href="javascript:void(0);" class="open-cart"><i
                                class="icon icon-cart"></i><span><?= $this->cart->total_items(); ?></span></a></li>
            </ul>
        </div>
        <div class="navigation navigation-main">
            <a href="#" class="open-menu"><i class="icon icon-menu"></i></a>
            <div class="floating-menu">
                <div class="close-menu-wrapper">
                    <span class="close-menu"><i class="icon icon-cross"></i></span>
                </div>
                <ul>
                    <li>
                        <a href="<?= base_url(); ?>">Ana Sayfa</a>
                    </li>
                    <?php foreach ($cats as $cat):
                        $sub_cats = get_sub_category($cat->id);
                        ?>
                        <li>
                            <a href="<?= base_url("urunler/$cat->url") ?>"><?= $cat->name ?><span class="open-dropdown"><i
                                            class="fa fa-angle-down"></i></span></a>
                            <div class="navbar-dropdown navbar-dropdown-single">
                                <div class="navbar-box">
                                    <div class="box-full">
                                        <div class="box clearfix">
                                            <ul>

                                                <li class="label"><?= $cat->name ?></li>
                                                <?php
                                                foreach ($sub_cats as $sub): ?>
                                                    <li>
                                                        <a href="<?= base_url("urunler/$sub->url") ?>"><?php $split = explode("-", $sub->name);
                                                            echo $split[1];
                                                            ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="cart-wrapper">
            <div class="checkout">
                <div class="clearfix">
                    <!--cart item-->
                    <div class="row">
                        <?php foreach ($this->cart->contents() as $items): ?>
                            <div class="cart-block cart-block-item clearfix">
                                <div class="image">
                                    <a href="#"><img src="<?= get_product_image($items['id']); ?>" alt=""/></a>
                                </div>
                                <div class="title">
                                    <div><a href="#"><?php echo $items['name']; ?></a></div>
                                </div>
                                <div class="quantity">
                                    <span class="form-control form-quantity"><?= $items['qty']; ?></span>
                                </div>
                                <div class="price">
                                    <span class="final"><?php echo $this->cart->format_number($items['subtotal']); ?></span>
                                </div>
                                <a href="<?= base_url("cart/delete_product/" . $items['rowid']) ?>"><span
                                            class="icon icon-cross icon-delete"></span> </a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <hr/>

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <?php

                            if ($this->cart->total_items() == 0) { ?>
                            <div>
                                <strong>Sepette ürün bulunamadı...</strong>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div>
                        <strong>Sepet Tutarı</strong>
                    </div>
                    <div>
                        <div class="h4 title"><?php echo $this->cart->format_number($this->cart->total()); ?>
                            ₺
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-block-buttons clearfix">
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="<?= base_url("cart") ?>" class="btn btn-outline-warning"><span
                                    class="icon icon-cart"></span> Satın Al</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
    </div>
</nav>
