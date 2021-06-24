<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            İçerik Ekle
            <a href="<?= base_url("brand") ?>" class="btn btn-outline btn-purple btn-sm pull-right"> <i
                        class="fa fa-backward"></i> Geri Dön</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <?php echo form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <div class="widget p-lg">
            <form action="<?= base_url("brand/addBrand") ?>" method="post" class="form-horizontal"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Marka Adı</label>
                    <div class="col-sm-5">
                        <input value="<?= (isset($form_error)) ? set_value("name") : ""; ?>" name="name"
                               class="form-control" type="text"
                               placeholder="Marka adını giriniz">
                    </div>
                </div><!-- .form-group -->

                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">İçerik Görseli</label>
                    <div class="col-sm-5">
                        <input name="image" class="form-control" type="file">
                        <small><b>Önerilen İçerik Görseli Ölçüleri:</b> <?= script_settings("brand_image_size"); ?>
                        </small>
                    </div>
                </div><!-- .form-group -->


                <div class="text-center">
                    <button type="submit" class="btn btn-outline mw-md rounded btn-success"><i
                                class="fa fa-save"></i> Kaydet
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