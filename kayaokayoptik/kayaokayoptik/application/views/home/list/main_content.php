<section class="header-content">

    <h2 class="d-none">Slider element</h2>

    <div class="container-fluid">

        <div class="owl-slider owl-carousel owl-theme" data-autoplay="true">


            <!--Slide item-->
            <?php foreach ($sliders as $slider): ?>
                <div class="item d-flex align-items-center"
                     style="background-image:url(<?= base_url("uploads") . "/slider/1920x1200/" . $slider->image; ?>)">
                    <div class="container">
                        <div class="caption">
                            <div class="animated" data-start="fadeInUp">
                                <div class="promo pt-3">
                                    <div class="title title-sm p-0"><?= $slider->name ?></div>
                                </div>
                            </div>
                            <?php
                            $category = json_decode($slider->content, true);
                            ?>
                            <div class="animated" data-start="fadeInUp">
                                <p><?php echo $category["one"]; ?></p><br>
                                <p><?php echo $category["two"]; ?></p><br>
                                <p><?php echo $category["three"]; ?></p><br>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div> <!--/owl-slider-->
    </div>
</section>


<?php if ($cats):
    $slider_image_size = script_settings("slider_image_size");
    $slider_image_size_replace = str_replace("*", "x", $slider_image_size); ?>
    <section class="blog blog-block">
        <!--Header-->
        <header>
            <div class="container">
                <h2 class="title">Kategoriler</h2>
            </div>
        </header>
        <div class="container">

            <div class="scroll-wrapper">

                <div class="row scroll text-center">
                    <?php foreach ($cats as $cat):
                        $category_image_size = script_settings("category_image_size");
                        $category_image_size_replace = str_replace("*", "x", $category_image_size);
                        ?>
                        <!--Item-->
                        <div class="col-md-4">
                            <article data-3d>
                                <a href="<?= base_url("products/category/$cat->url") ?>">
                                    <div class="image">
                                        <img
                                                src="<?= get_picture("products/categories", $cat->image, $category_image_size_replace) ?> "
                                                alt="<?= $cat->title ?>"/>
                                    </div>
                                    <div class="entry entry-block">
                                        <div class="title">
                                            <h2 class="h4"><?= $cat->title ?></h2>
                                        </div>
                                    </div>
                                    <div class="show-more">
                                        <span class="btn btn-clean">Ürünleri Gör</span>
                                    </div>
                                </a>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div><!--/row-->
            </div>
        </div>
    </section>
<?php endif; ?>
<section class="blog blog-widget blog-animated">
    <header>
        <div class="container">
            <h2 class="h2 title">Markalar</h2>
            <div class="text">
                <p>
                    <a href="<?= base_url('products/filter') ?>" class="btn btn-main">Tüm ürünleri
                        görüntüle...</a>
                </p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <?php if ($brands):
                $brand_image_size = script_settings("brand_image_size");
                $brand_image_size_replace = str_replace("*", "x", $brand_image_size); ?>
                <?php foreach ($brands as $brand): ?>
                <div class="col-md-12 col-lg-4">
                    <article>
                        <a  style="text-align: center" href="<?= base_url("products/brand/$brand->url") ?>" class="blog-link">
                            <div class="text-center">
                                <img style="filter: grayscale(100%);" src="<?= get_picture("brand", $brand->image, $brand_image_size_replace) ?>" class="rounded" alt="...">
                            </div>
                        </a>
                    </article>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div> <!--/row-->
    </div>
</section>


<!-- ========================  Newsletter ======================== -->

<section class="banner">
    <div class="container-fluid">
        <div class="banner-image"  style="background-image:url(<?= base_url("uploads"); ?>/index/index.jpg)">
            <header>
                <div class="container">
                    <div class="text">
                        <p>Hizmetlerimiz ve ürünlerimiz hakkında daha detaylı bilgi almak ya da sorularınız için
                            iletişime
                            geçebilirsiniz.</p>
                    </div>
                </div>
            </header>
        </div>
    </div>
</section>


<!-- ========================  Benefits ======================== -->

<section class="benefits">
    <header class="d-none">
        <div class="container">
            <h2 class="h2 title">Benefits</h2>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-3" data-tilt>
                <figure>
                    <div class="icon"><i class="icon icon-gift"></i></div>
                    <figcaption>
                                <span>
                                    <strong>Süpriz hediyeler</strong> <br/>
                                    <small>Süpriz hediyeler alanı.</small>
                                </span>
                    </figcaption>
                </figure>
            </div>

            <div class="col-6 col-lg-3" data-tilt>
                <figure>
                    <div class="icon"><i class="icon icon-rocket"></i></div>
                    <figcaption>
                                <span>
                                    <strong>Hızlı teslimat</strong> <br/>
                                    <small>Hızlı teslimat yazı alanı.</small>
                                </span>
                    </figcaption>
                </figure>
            </div>

            <!--Icon-->

            <div class="col-6 col-lg-3" data-tilt>
                <figure>
                    <div class="icon"><i class="icon icon-history"></i></div>
                    <figcaption>
                                <span>
                                    <strong>Para iade garantisi</strong> <br/>
                                    <small>Para iade garantisi yazı alanı</small>
                                </span>
                    </figcaption>
                </figure>
            </div>

            <!--Icon-->

            <div class="col-6 col-lg-3" data-tilt>
                <figure>
                    <div class="icon"><i class="icon icon-diamond"></i></div>
                    <figcaption>
                                <span>
                                    <strong>İnanılmaz indirimler</strong> <br/>
                                    <small>İnanılmaz indirimler alanı</small>
                                </span>
                    </figcaption>
                </figure>
            </div>
        </div> <!--/row-->

    </div> <!--/container-->

</section>

