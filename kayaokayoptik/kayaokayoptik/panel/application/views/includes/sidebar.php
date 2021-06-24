<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="<?= base_url() ?>"><img class="img-responsive" src="<?= base_url("assets") ?>/images/logo.png" alt="avatar"/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="<?= base_url() ?>" class="username">Kayaokay Optik</a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>Admin</small>
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="<?=script_settings("site_url") ?>" target="_blank">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Ana Sayfa</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?= base_url() ?>">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="<?= base_url("settings") ?>">
                                        <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                        <span>Ayarlar</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="<?= base_url("login/logout")  ?>">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Çıkış Yap</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <li <?= ($this->uri->uri_string() == "dashboard") ? 'class="active"' : "" ?>>
                    <a href="<?= base_url("dashboard") ?>">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Gösterge Paneli</span>
                    </a>
                </li>


                <li <?= ($this->uri->uri_string() == "slider") ? 'class="active"' : "" ?>>
                    <a href="<?= base_url("slider") ?>">
                        <i class="menu-icon zmdi zmdi-slideshow zmdi-hc-lg"></i>
                        <span class="menu-text">Slider İşlemleri</span>
                    </a>
                </li>

                <li <?= ($this->uri->uri_string() == "brand") ? 'class="active"' : "" ?>>
                    <a href="<?= base_url("brand") ?>">
                        <i class="menu-icon zmdi zmdi-shopping-basket zmdi-hc-lg"></i>
                        <span class="menu-text">Marka İşlemleri</span>
                    </a>
                </li>

               <li <?= (($this->uri->uri_string() == "products") || ($this->uri->uri_string() == "products/categories")) ? 'class="open"' : "" ?>>
                  <a href="<?= base_url("products") ?>" class="submenu-toggle">
                     <i class="menu-icon zmdi zmdi-shopping-cart-plus zmdi-hc-lg"></i>
                     <span class="menu-text">Ürün İşlemleri</span>
                     <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                  </a>
                  <ul class="submenu" <?= (($this->uri->uri_string() == "products") || ($this->uri->uri_string() == "products/categories")) ? 'style="display: block;"' : "" ?>>
                     <li <?= ($this->uri->uri_string() == "products")  ? 'class="active"' : "" ?>><a href="<?= base_url("products") ?>"><span class="menu-text">İçerikler</span></a></li>
                     <li <?= ($this->uri->uri_string() == "products/categories")  ? 'class="active"' : "" ?>><a href="<?= base_url("products/categories") ?>"><span class="menu-text">Kategoriler</span></a></li>
                  </ul>
               </li>


                <li class="menu-separator"><hr></li>
                <li>
                    <a href="<?= script_settings("site_url") ?>" target="_blank">
                        <i class="menu-icon zmdi zmdi-view-carousel zmdi-hc-lg"></i>
                        <span class="menu-text">Siteyi Görüntüle</span>
                    </a>
                </li>
                <li <?= ($this->uri->uri_string() == "settings") ? 'class="active"' : "" ?>>
                    <a href="<?= base_url("settings") ?>">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text">Ayarlar</span>
                    </a>
                </li>

            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>
