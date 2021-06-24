<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">Ayarlar</h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <?php echo form_error('title', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php echo form_error('description', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php echo form_error('keywords', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php echo form_error('contact[email]', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php echo form_error('smtp_mail[email]', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <div class="widget">
            <div class="m-b-lg nav-tabs-horizontal">
                <!-- tabs list -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-7" aria-controls="tab-7" role="tab"
                                                              data-toggle="tab">Genel</a></li>
                    <li role="presentation"><a href="#tab-1" aria-controls="tab-1" role="tab"
                                                              data-toggle="tab">SEO</a></li>
                    <li role="presentation"><a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Logo</a>
                    </li>
                    <li role="presentation"><a href="#tab-3" aria-controls="tab-3" role="tab" data-toggle="tab">İletişim</a></li>
                    <li role="presentation"><a href="#tab-5" aria-controls="tab-5" role="tab" data-toggle="tab">Sosyal Medya</a></li>
                    <li role="presentation"><a href="#tab-6" aria-controls="tab-6" role="tab" data-toggle="tab">SMTP Mail</a></li>

                </ul><!-- .nav-tabs -->

                <!-- Tab panes -->
                <form action="<?= base_url("settings/update") ?>" method="post" class="form-horizontal"
                      enctype="multipart/form-data">
                    <div class="tab-content p-md">
                        <div role="tabpanel" class="tab-pane in active fade" id="tab-7">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Site URL</label>
                                <div class="col-sm-5">
                                    <input value="<?= $row->site_url ?>" name="site_url" class="form-control" type="text"
                                           placeholder="Site adresini giriniz">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Firma Hakkında Kısa Bilgi</label>
                                <div class="col-sm-5">
                                    <textarea style="resize: none" name="about_us" class="form-control" type="text"
                                              placeholder="Firma hakkında kısa bilgi giriniz"><?= $row->about_us ?></textarea>
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Misyon</label>
                                <div class="col-sm-5">
                                    <textarea style="resize: none" name="mission" class="form-control" type="text"
                                              placeholder="Misyon giriniz"><?= $row->mission ?></textarea>
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Vizyon</label>
                                <div class="col-sm-5">
                                    <textarea style="resize: none" name="vision" class="form-control" type="text"
                                              placeholder="Vizyon giriniz"><?= $row->vision ?></textarea>
                                </div>
                            </div><!-- .form-group -->
                        </div><!-- .tab-pane  -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-1">
                            <div class="alert alert-info" role="alert">
                                <strong>Dikkat! </strong>
                                <span>Aşağıdaki alanları <b>SEO</b> kurallarına uygun şekilde doldurduğunuz da arama motorlarında üst sıralara çıkmanız daha kolay olacaktır.</span>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Başlık</label>
                                <div class="col-sm-5">
                                    <input value="<?= $row->title ?>" name="title" class="form-control" type="text"
                                           placeholder="Site başlığını giriniz">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Açıklama</label>
                                <div class="col-sm-5">
                                    <textarea name="description" class="form-control" type="text"
                                              placeholder="Site açıklamasını giriniz"
                                              style="resize: none"><?= $row->description ?></textarea>
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Anahtar Kelimeler</label>
                                <div class="col-sm-5">
                                    <input value="<?= $row->keywords ?>" name="keywords" type="text"
                                           data-plugin="tagsinput" data-role="tagsinput"
                                           class="form-control" placeholder="Virgül ile ayırınız"/>
                                </div>
                            </div><!-- .form-group -->

                        </div><!-- .tab-pane  -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-2">

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Logo</label>
                                <div class="col-sm-5">
                                    <input name="logo" class="form-control" type="file">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Mevcut Logo</label>
                                <div class="gallery-item">
                                    <div class="col-sm-5">
                                        <a href="<?= base_url("../uploads/logo/").script_settings("logo"); ?>"
                                           data-lightbox="gallery-1"
                                           data-title="Galeri">
                                            <img class="img-responsive"
                                                 src="<?= base_url("../uploads/logo/").script_settings("logo"); ?>">
                                        </a>
                                    </div>
                                </div>
                            </div><!-- .form-group -->
<hr>

                        </div><!-- .tab-pane  -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-3">
                            <?php $contact = json_decode($row->contact, true);  ?>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Telefon</label>
                                <div class="col-sm-5">
                                    <input value="<?= $contact["phone"] ?>" name="contact[phone]" class="form-control" type="text"
                                           placeholder="Telefon numarası giriniz">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">GSM</label>
                                <div class="col-sm-5">
                                    <input value="<?= $contact["gsm"] ?>" name="contact[gsm]" class="form-control" type="text"
                                           placeholder="GSM numarası giriniz">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Eposta</label>
                                <div class="col-sm-5">
                                    <input value="<?= $contact["email"] ?>" name="contact[email]" class="form-control" type="text"
                                           placeholder="Email adresi giriniz">
                                </div>
                            </div><!-- .form-group -->

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Adres</label>
                                <div class="col-sm-5">
                                    <textarea style="resize: none" name="contact[address]" class="form-control" type="text"
                                              placeholder="Adres giriniz"><?= $contact["address"] ?></textarea>
                                </div>
                            </div><!-- .form-group -->

                        </div><!-- .tab-pane  -->

                        <div role="tabpanel" class="tab-pane fade" id="tab-5">
                            <?php $social_media = json_decode($row->social_media, true);  ?>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Facebook</label>
                                <div class="col-sm-5">
                                    <input value="<?= $social_media["facebook"] ?>" name="social_media[facebook]" class="form-control" type="text"
                                              placeholder="Facebook linkinizi giriniz">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Twitter</label>
                                <div class="col-sm-5">
                                    <input value="<?= $social_media["twitter"] ?>" name="social_media[twitter]" class="form-control" type="text"
                                           placeholder="Twitter linkinizi giriniz">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">İnstagram</label>
                                <div class="col-sm-5">
                                    <input value="<?= $social_media["instagram"] ?>" name="social_media[instagram]" class="form-control" type="text"
                                           placeholder="İnstagram linkinizi giriniz">
                                </div>
                            </div><!-- .form-group -->

                        </div><!-- .tab-pane  -->
                        <div role="tabpanel" class="tab-pane fade" id="tab-6">
                            <?php $smtp_mail = json_decode($row->smtp_mail, true);  ?>
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label">Eposta Sunucusu</label>
                                <div class="col-sm-5">
                                    <input value="<?= $smtp_mail["host"] ?>" name="smtp_mail[host]" class="form-control" type="text"
                                              placeholder="Eposta sunucusunu giriniz">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label">Port Numarası</label>
                                <div class="col-sm-5">
                                    <input value="<?= $smtp_mail["port"] ?>" name="smtp_mail[port]" class="form-control" type="text"
                                              placeholder="Port numarasını giriniz">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                    <label class="col-sm-2 col-sm-offset-2 control-label">Eposta</label>
                                <div class="col-sm-5">
                                    <input value="<?= $smtp_mail["email"] ?>" name="smtp_mail[email]" class="form-control" type="text"
                                              placeholder="SMTP eposta adresini giriniz">
                                </div>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-offset-2 control-label">Şifre</label>
                                <div class="col-sm-5">
                                    <input value="<?= $smtp_mail["password"] ?>" name="smtp_mail[password]" class="form-control" type="text"
                                           placeholder="SMTP şifresini giriniz">
                                </div>
                            </div><!-- .form-group -->
                        </div><!-- .tab-pane  -->
                    </div><!-- .tab-content  -->
            </div><!-- .nav-tabs-horizontal -->
        </div><!-- .widget -->
    </div><!-- END column -->
    <div class="col-md-12 text-center" style="margin-bottom: 25px;">
        <div class="panel-heading bg-white" style="padding: 10px">
            <button type="submit" class="btn btn-outline mw-md rounded btn-success"><i class="fa fa-save"></i> Güncelle
            </button>
        </div>
    </div>
    </form>
</div><!-- .row -->