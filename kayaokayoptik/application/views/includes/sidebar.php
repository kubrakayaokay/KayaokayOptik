<div class="box_style_1">
    <div class="widget">
        <h5>Hizmetlerimiz</h5>
        <ul id="cat_nav">
            <?php if (get_services_list()): ?>
                <?php foreach (get_services_list() as $services): ?>
                    <li><a href="<?= base_url("hizmet/$services->url") ?>"><?= $services->name ?></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <hr>
        <h5>Aradığınızı bulamadınız mı?</h5>
        <p class="nopadding">
            Sorularınız için bize ulaşabilirsiniz.<br>
            <a href="<?= base_url("iletisim") ?>" class="link_normal">İletişim</a>
        </p>
    </div><!-- End widget -->

</div><!-- End box style 1 -->
<?php if (get_blog_list()): ?>
    <div class="widget">
        <h4>Son Yazılar</h4>
        <ul class="recent_post">
            <?php foreach (get_blog_list() as $blog): ?>
                <li>
                    <i class="icon-calendar-empty"></i> <?= turkcetarih_formati("d F Y",$blog->createdAt) ?>
                    <div><a href="<?= base_url("detay/$blog->url") ?>"><?= $blog->name ?></a></div>
                </li>
            <?php endforeach;   ?>
        </ul>
    </div><!-- End widget -->
<?php endif; ?>