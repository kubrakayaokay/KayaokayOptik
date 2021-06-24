<div class="row">

    <div class="col-md-3 col-sm-6">
        <div class="widget stats-widget">
            <div class="widget-body clearfix">
                <div class="pull-left">
                    <h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp"><?= $count["product"] ?></span></h3>
                    <small class="text-color">Toplam Ürün</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fab fa-servicestack"></i></span>
            </div>
            <footer class="widget-footer bg-primary">
                <small><a style="color: white" href="<?= base_url("products") ?>">Ürünler</a></small>
                <span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="15" style="display: inline-block; width: 33px; height: 15px; vertical-align: top;"></canvas></span>
            </footer>
        </div><!-- .widget -->
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget stats-widget">
            <div class="widget-body clearfix">
                <div class="pull-left">
                    <h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp"><?= $count["product_cat"] ?></span></h3>
                    <small class="text-color">Toplam Kategori</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fas fa-blog"></i></span>
            </div>
            <footer class="widget-footer bg-danger">
                <small><a style="color: white" href="<?= base_url("products/categories") ?>">Kategoriler</a></small>
                <span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="15" style="display: inline-block; width: 33px; height: 15px; vertical-align: top;"></canvas></span>
            </footer>
        </div><!-- .widget -->
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget stats-widget">
            <div class="widget-body clearfix">
                <div class="pull-left">
                    <h3 class="widget-title text-deepOrange"><span class="counter" data-plugin="counterUp"><?= $count["brand"] ?></span></h3>
                    <small class="text-color">Toplam Marka</small>
                </div>
                <span class="pull-right big-icon watermark"><i class="fas fa-shopping-bag"></i></span>
            </div>
            <footer class="widget-footer bg-deepOrange">
                <small><a style="color: white" href="<?= base_url("brand") ?>">Markalar</a></small>
                <span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="15" style="display: inline-block; width: 33px; height: 15px; vertical-align: top;"></canvas></span>
            </footer>
        </div><!-- .widget -->
    </div>
</div><!-- .row -->
