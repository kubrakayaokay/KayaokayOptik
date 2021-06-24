<section class="products pt-0">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <?php if ($products): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="col-6 col-lg-4">
                                <article>

                                    <div class="btn btn-add">
                                        <a  href="<?= base_url("cart/addCart/$product->url") ?>" >
                                            <i style="color: white" class="icon icon-cart"></i>
                                        </a>
                                    </div>
                                    <div class="figure-grid">
                                        <span class="badge badge-warning">-20%</span>
                                        <div class="image">
                                            <a href="<?= base_url("products/show/$product->url") ?>">
                                                <?php
                                                foreach ($images as $img) {
                                                    if ($img->product_id == $product->id && $img->isCover==1) { ?>
                                                        <img src="<?= base_url("uploads/products/$img->image") ?>"
                                                             alt=""/>
                                                    <?php } } ?>
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h2 class="title h4">
                                                <a href="<?= base_url("products/show/$product->url") ?>"><?= $product->name ?></a>
                                            </h2>
                                            <?php
                                            if($product->old_price){ ?>
                                            <sub><?= $product->old_price . "₺" ?></sub>
                                            <?php } ?>
                                            <?php
                                            if($product->new_price){ ?>
                                                <sup><?= $product->new_price . "₺" ?></sup>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div> <!--/product items-->
        </div><!--/row-->
    </div>
</section>







