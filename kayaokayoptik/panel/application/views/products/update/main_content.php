<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Düzenle
            <a href="<?= base_url("products") ?>" class="btn btn-outline btn-purple btn-sm pull-right"> <i
                        class="fa fa-backward"></i> Geri Dön</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <?php echo form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php echo form_error('content', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php echo form_error('title', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php echo form_error('description', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?php echo form_error('keywords', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <div class="widget p-lg">
            <form action="<?= base_url("products/updateProduct/$row->id") ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Ürün Adı</label>
                    <div class="col-sm-5">
                        <input value=" <?= $row->name ?>" name="name"
                               class="form-control" type="text"
                               placeholder="Ürün adını giriniz">
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea id="editor1" name="content" class="form-control" type="text">
                            <?= $row->content ?>
                        </textarea>
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <label for="select2-demo-2" class="col-sm-4 control-label">Kategori</label>
                    <div class="col-sm-5">
                        <select required name="category_id" id="select2-demo-2" class="form-control"
                                data-plugin="select2">
                            <?php foreach ($cats as $cat): ?>
                                <option <?= ($cat->id == $row->category_id) ? "selected" : ""; ?> value="<?= $cat->id  ?>"><?= $cat->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- END column -->
                </div><!-- .form-group -->




                <div class="form-group">
                    <label for="select2-demo-2" class="col-sm-4 control-label">Marka</label>
                    <div class="col-sm-5">
                        <select required name="brand_id" id="select2-demo-2" class="form-control"
                                data-plugin="select2">
                            <?php foreach ($brands as $brand): ?>
                                <option <?= ($brand->id == $row->brand_id) ? "selected" : ""; ?> value="<?= $brand->id  ?>"><?= $brand->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- END column -->
                </div>

                <div class="form-group">
                    <label for="select2-demo-2" class="col-sm-4 control-label">Cinsiyet</label>
                    <div class="col-sm-5">
                        <select required name="sex" id="select2-demo-2" class="form-control"
                                data-plugin="select2">

                            <option    <?= ($row->sex =="male") ? "selected" : ""; ?> value="male">Erkek</option>
                            <option    <?=  ($row->sex =="female") ? "selected" : "";?>  value="female">Kadın</option>
                            <option    <?= ($row->sex =="unisex") ? "selected" : "";  ?>  value="unisex">Unisex</option>
                        </select>
                    </div><!-- END column -->
                </div>
                <div class="form-group">
                    <label for="select2-demo-2" class="col-sm-4 control-label">Degrade</label>
                    <div class="col-sm-5">
                        <select required name="degrade" id="select2-demo-2" class="form-control"
                                data-plugin="select2">
                            <option    <?= ($row->degrade ==="true") ? "selected" : ""; ?> value="true">Var</option>
                            <option    <?=  ($row->degrade ==="false") ? "selected" : "";?>  value="false">Yok</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select2-demo-2" class="col-sm-4 control-label">Polarize</label>
                    <div class="col-sm-5">
                        <select required name="polarize" id="select2-demo-2" class="form-control"
                                data-plugin="select2">
                            <option    <?= ($row->polarize ==="true") ? "selected" : ""; ?> value="true">Var</option>
                            <option    <?=  ($row->polarize ==="false") ? "selected" : "";?>  value="false">Yok</option>
                        </select>
                    </div><!-- END column -->
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Eski Fiyat</label>
                    <div class="col-sm-5">
                        <input value="<?= $row->old_price ?>" name="old_price"
                               class="form-control" type="text"
                               placeholder="Ürünün eski fiyatıni giriniz ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Yeni Fiyat</label>
                    <div class="col-sm-5">
                        <input value="<?= $row->new_price; ?>" name="new_price"
                               class="form-control" type="text"
                               placeholder="Ürünün yeni fiyatıni giriniz  ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Çerçeve Rengi</label>
                    <div class="col-sm-5">
                        <input value="<?= $row->frame_color  ?> " name="frame_color"
                               class="form-control" type="text"
                               placeholder="Rengin hexadecimal kodunu giriniz Örn:#000000 ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Çerçeve Materyali</label>
                    <div class="col-sm-5">
                        <input value="<?= $row->glass_material ?>" name="frame_material"
                               class="form-control" type="text"
                               placeholder="Çerçeve materyalini giriniz. Örn: Organik ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Cam Materyali</label>
                    <div class="col-sm-5">
                        <input value="<?= $row->frame_material ?>" name="glass_material"
                               class="form-control" type="text"
                               placeholder="Cam materyalini giriniz. Örn: Mineral ">
                    </div>
                </div>






                <div class="alert alert-info" role="alert">
                    <strong>Dikkat! </strong>
                    <span>Aşağıdaki alanları <b>SEO</b> kurallarına uygun şekilde doldurduğunuz da arama motorlarında üst sıralara çıkmanız daha kolay olacaktır.</span>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Başlık</label>
                    <div class="col-sm-5">
                        <input value=" <?= $row->title ?>" name="title"
                               class="form-control" type="text"
                               placeholder="İçerik başlığını giriniz">
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Açıklama</label>
                    <div class="col-sm-5">
                                    <textarea name="description" class="form-control" type="text"
                                              placeholder="İçerik açıklamasını giriniz"
                                              style="resize: none"><?= $row->description ?></textarea>
                    </div>
                </div><!-- .form-group -->

                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Anahtar Kelimeler</label>
                    <div class="col-sm-5">
                        <input value="<?= $row->keywords ?>" name="keywords"
                               type="text"
                               data-plugin="tagsinput" data-role="tagsinput"
                               class="form-control" placeholder="Virgül ile ayırınız"/>
                    </div>
                </div><!-- .form-group -->
                <div class="text-center">
                    <button type="submit" class="btn btn-outline mw-md rounded btn-success"><i
                                class="fa fa-save"></i> Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div><!-- END column -->
</div>
<script>
    CKEDITOR.replace('editor1');
</script>