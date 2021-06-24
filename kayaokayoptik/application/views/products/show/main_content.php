<section class="product pt-0">

    <header>
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
            <h2 class="title"><?= $product->name ?></h2>
        </div>
    </header>

    <div class="main">
        <div class="container">
            <div class="row product-flex">

                <div class="col-lg-4 product-flex-info">
                    <div class="clearfix">

                        <div class="clearfix">

                            <div class="price">
                                        <span class="h3">
                                           <?= $product->new_price . "₺ " ?>
                                            <small> <?= $product->old_price . "₺ " ?></small>
                                        </span>
                            </div>

                            <hr/>

                            <!--info-box-->

                            <div class="info-box">
                                <span><strong>Marka</strong></span>
                                <span><?= get_brand_name($product->brand_id); ?></span>
                            </div>
                            <div class="info-box">
                                <span><strong>Cinsiyet</strong></span>
                                <span><?php
                                    if ($product->sex == "female") {
                                        echo "Kadın";
                                    } elseif ($product->sex == "male") {
                                        echo "Erkek";
                                    } else {
                                        echo "Unisex";
                                    }
                                    ?></span>
                            </div>
                            <div class="info-box">
                                <span><strong>Degrade</strong></span>
                                <span><?= ($product->degrade=="true") ? 'Var' : 'Yok'; ?></span>
                            </div>
                            <div class="info-box">
                                <span><strong>Polarize</strong></span>
                                <span><?= ($product->polarize=="true") ? 'Var' : 'Yok'; ?></span>
                            </div>
                            <div class="info-box">
                                <span><strong>Çerçeve Materyali</strong></span>
                                <span><?= $product->frame_material ?></span>
                            </div>
                            <div class="info-box">
                                <span><strong>Cam Materyali</strong></span>
                                <span><?= $product->glass_material ?></span>
                            </div>

                            <hr/>

                            <div class="info-box">
                                <span><strong>Çerçeve Rengi</strong></span>
                                <div class="product-colors clearfix">
                                    <span style="background-color: <?= $product->frame_color ?>"
                                          class="color-btn checked "></span>
                                </div>
                            </div>

                            <hr/>

                            <hr/>

                            <div class="info-box">
                                <a href="<?= base_url("cart/addCart/$product->url") ?>" class="btn btn-danger col-sm-12">Sepete Ekle</a>
                            </div>

                            <hr/>

                            <div class="info-box">
                                        <span>
                                                Ürün Açıklaması: <?= $product->content ?>
                                        </span>
                            </div>

                            <hr/>

                        </div> <!--/clearfix-->
                    </div> <!--/product-info-wrapper-->
                </div> <!--/col-lg-4-->
                <!--product item gallery-->

                <div class="col-lg-8 product-flex-gallery">
                    <div class="owl-product-gallery owl-carousel owl-theme open-popup-gallery">
                        <?php
                        foreach ($images as $img) { ?>
                            <a href="<?= base_url("uploads/products/$img->image"); ?>"><img
                                        src="<?= base_url("uploads/products/$img->image"); ?>" alt=""/></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="products">
    <header>
        <div class="container">
            <h2 class="title">Benzer Ürünler</h2>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <?php if ($similar_products) {
                foreach ($similar_products as $product): ?>
                    <div class="col-6 col-lg-3">
                        <article>
                            <div class="info">
                                <span>
                                    <a href="<?= base_url("products/show/$product->url") ?>" class="mfp-open"
                                       data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span>
                            </div>

                            <div class="btn btn-add">
                                <i class="icon icon-cart"></i>
                            </div>
                            <div class="figure-grid">
                                <div class="image">
                                    <a href="<?= base_url("products/show/$product->url") ?>">
                                        <?php
                                        foreach ($similar_images as $img) {
                                            if ($img->product_id == $product->id) { ?>
                                                <img style="height: 150px"
                                                     src="<?= base_url("uploads/products/$img->image") ?>" alt=""/>
                                            <?php }
                                        } ?>
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a href="<?= base_url("products/show/$product->url") ?>"><?= $product->name ?></a>
                                    </h2>
                                    <?php
                                    if ($product->old_price) { ?>
                                        <sub><?= $product->old_price . "₺" ?></sub>
                                    <?php } ?>
                                    <?php
                                    if ($product->new_price) { ?>
                                        <sup><?= $product->new_price . "₺" ?></sup>
                                    <?php } ?>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach;
            } ?>

        </div>
    </div>
</section>
