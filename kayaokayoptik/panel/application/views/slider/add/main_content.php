<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Slider Ekle
            <a href="<?= base_url("slider") ?>" class="btn btn-outline btn-purple btn-sm pull-right"> <i
                        class="fa fa-backward"></i> Geri Dön</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <?php echo form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <div class="widget p-lg">
            <form action="<?= base_url("slider/addSlider") ?>" method="post" class="form-horizontal"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Slider Adı</label>
                    <div class="col-sm-5">
                        <input value="<?= (isset($form_error)) ? set_value("name") : ""; ?>" name="name"
                               class="form-control" type="text"
                               placeholder="Slider adını giriniz">
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Slider Görseli</label>
                    <div class="col-sm-5">
                        <input name="image" class="form-control" type="file">
                        <small><b>Önerilen Slider Görseli Ölçüleri:</b> <?= script_settings("slider_image_size"); ?>
                        </small>
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Slider 1. Açıklama Alanı</label>
                    <div class="col-sm-5">
                        <input value="<?= (isset($form_error)) ? set_value("content[one]") : ""; ?>" name="content[one]"
                               class="form-control" type="text"
                               placeholder="1. slider açıklamasını giriniz">
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">Slider 2. Açıklama Alanı</label>
                    <div class="col-sm-5">
                        <input value="<?= (isset($form_error)) ? set_value("content[two]") : ""; ?>" name="content[two]"
                               class="form-control" type="text"
                               placeholder="2. slider açıklamasını giriniz">
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-2 control-label">URL</label>
                    <div class="col-sm-5">
                        <input value="<?= (isset($form_error)) ? set_value("content[three]") : ""; ?>" name="content[three]"
                               class="form-control" type="text"
                               placeholder="3. slider açıklamasını giriniz">
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