<div id="newCategory" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Yeni Ürün Kategorisi Ekle</h4>
            </div>


            <form action="<?= base_url("products/addCategory") ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input value="<?php if (isset($form_error)): echo set_value("name"); endif; ?>" name="name"
                               type="text" class="form-control" placeholder="Kategori Adı">
                    </div>

                   <div class="form-group">
                      <label>Kategori Fotoğrafı</label>
                     <input name="image" class="form-control" type="file">
                     <small><b>Önerilen Kategori Görseli Ölçüleri:</b> <?= "760x600"; ?>
                     </small>
                   </div>

                    <div class="form-group">
                        <label>Varsa Üst Kategori</label>
                        <select name="parent_category_id" class="form-control">
                            <option value="0">Yok</option>
                            <?php foreach ($rows as $row): ?>
                                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- END column -->
                    <div class="alert alert-info" role="alert">
                        <strong>Dikkat! </strong>
                        <span>Aşağıdaki alanları <b>SEO</b> kurallarına uygun şekilde doldurduğunuz da arama motorlarında üst sıralara çıkmanız daha kolay olacaktır.</span>
                    </div>
                    <div class="form-group">
                        <input value="<?php if (isset($form_error)): echo set_value("title"); endif; ?>" name="title"
                                                                                                 type="text"
                                                                                                 class="form-control"
                                                                                                 placeholder="Kategori Başlık">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" type="text"
                                  placeholder="Kategori Açıklama"
                                  style="resize: none"><?php if (isset($form_error)): echo set_value("description"); endif; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input value="<?php if (isset($form_error)): echo set_value("keywords"); endif; ?>"
                               name="keywords" type="text"
                               data-plugin="tagsinput" data-role="tagsinput"
                               class="form-control" placeholder="Virgül ile ayırınız"/>
                    </div>
                </div><!-- .modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Kaydet</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Vazgeç
                    </button>
                </div><!-- .modal-footer -->
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
