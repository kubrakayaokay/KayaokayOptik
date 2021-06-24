<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            İçerik Düzenle
            <a href="<?= base_url("brand") ?>" class="btn btn-outline btn-purple btn-sm pull-right"> <i
                        class="fa fa-backward"></i> Geri Dön</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <?php echo form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


        <div class="widget p-lg">
            <form action="<?= base_url("brand/updateBrand/$row->id") ?>" method="post" class="form-horizontal"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Blog Adı</label>
                    <div class="col-sm-5">
                        <input value=" <?= $row->name ?>" name="name"
                               class="form-control" type="text"
                               placeholder="Marka adını giriniz">
                    </div>
                </div><!-- .form-group -->

                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">İçerik Görseli</label>
                    <div class="col-sm-3">
                        <input name="image" class="form-control" type="file">
                        <small><b>Önerilen İçerik Görseli Ölçüleri:</b> <?= script_settings("brand_image_size"); ?>
                        </small>
                    </div>
                    <?php if ($row->image == null) {
                        echo "İçerik görseli bulunmuyor.";
                    } else { ?>
                        <div class="gallery-item">
                            <div class="col-sm-6">
                                <?php $brand_image_size = script_settings("brand_image_size");
                                $brand_image_size_replace = str_replace("*", "x", $brand_image_size); ?>
                                <a href="<?= get_picture("brand", $row->image, $brand_image_size_replace); ?> "
                                   data-lightbox="gallery-1"
                                   data-title="Galeri">
                                    <img class="img-responsive"
                                         src="<?= get_picture("brand", $row->image, $brand_image_size_replace); ?>">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
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