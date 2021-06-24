<div class="row">
   <div class="col-md-12">
      <h4 class="m-b-lg">
         Ürün Kategorileri
         <a href="#" type="button" data-toggle="modal" data-target="#newCategory"
            class="btn btn-outline btn-primary btn-sm pull-right"> <i
              class="fa fa-plus"></i> Yeni Ekle</a>
      </h4>
   </div><!-- END column -->
   <div class="col-md-12">
     <?php echo form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
     <?php echo form_error('title', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
     <?php echo form_error('description', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
     <?php echo form_error('keywords', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
     <?php echo form_error('image', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <div class="widget p-lg">

        <?php if (empty($rows)) { ?>

           <div class="alert alert-info text-center">
              <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="#" type="button"
                                                                                  data-toggle="modal"
                                                                                  data-target="#newCategory">tıklayınız</a>
              </p>
           </div>

        <?php } else { ?>
           <h3>Hiyerarşi</h3>
           <br>
          <?php productCategoryTreeView(productCategoryList($rows));
          foreach ($rows as $row) { ?>
             <div id="updateCategory<?= $row->id ?>" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                   <div class="modal-content">
                      <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title"><b><?= $row->name ?></b> Kategorisini Düzenliyorsunuz</h4>
                      </div>
                      <form action="<?= base_url("products/updateCategory/$row->id") ?>"
                            method="post" enctype="multipart/form-data">
                         <div class="modal-body">

                            <div class="form-group">
                               <input value="<?= $row->name ?>" name="name" type="text"
                                      class="form-control" placeholder="Kategori Adı">
                            </div>

                            <div class="form-group">
                               <label>Kategori Fotoğrafı</label>
                               <input name="image" class="form-control" type="file">
                               <small><b>Önerilen  Görseli Ölçüleri:</b> <?= "760x600"; ?>
                               </small>
                              <?php if ($row->image == null) {
                                echo "Görsel bulunmuyor.";
                              } else { ?>
                                 <div class="gallery-item">
                                    <div class="col-sm-6">
                                      <?php $category_image_size = script_settings("category_image_size");
                                      $category_image_size_replace = str_replace("*", "x", $category_image_size); ?>
                                       <a href="<?= get_picture("products/categories", $row->image, $category_image_size_replace); ?> "
                                          data-lightbox="gallery-1"
                                          data-title="Galeri">
                                          <img class="img-responsive"
                                               src="<?= get_picture("products/categories", $row->image, $category_image_size_replace); ?>">
                                       </a>
                                    </div>
                                 </div>
                              <?php } ?>
                            </div>


                            <div class="form-group">
                               <label><strong>Üst Kategori</strong></label>
                               <select name="parent_category_id"
                                       class="form-control">
                                  <option <?= $row->parent_category_id == 0 ? "selected" : ""; ?>
                                    value="0">Yok
                                  </option>
                                 <?php

                                 $categories = $this->product_categories_model->get_all(["id !=" => $row->id], "id ASC");

                                 foreach ($categories as $cat): ?>
                                    <option <?= ($row->parent_category_id == $cat->id) ? "selected" : ""; ?>
                                      value="<?= $cat->id ?>"><?= $cat->name ?></option>
                                 <?php endforeach; ?>
                               </select>
                            </div><!-- END column -->
                            <div class="alert alert-info" role="alert">
                               <strong>Dikkat! </strong>
                               <span>Aşağıdaki alanları <b>SEO</b> kurallarına uygun şekilde doldurduğunuz da arama motorlarında üst sıralara çıkmanız daha kolay olacaktır.</span>
                            </div>
                            <div class="form-group">
                               <input value="<?= $row->title ?>" name="title" type="text"
                                      class="form-control" placeholder="Kategori Başlık">
                            </div>
                            <div class="form-group">
                        <textarea name="description" class="form-control" type="text"
                                  placeholder="Kategori Açıklama"
                                  style="resize: none"><?= $row->description ?></textarea>
                            </div>
                            <div class="form-group">
                               <input value="<?= $row->keywords ?>" name="keywords" type="text"
                                      data-plugin="tagsinput" data-role="tagsinput"
                                      class="form-control" placeholder="Virgül ile ayırınız"/>
                            </div>
                         </div><!-- .modal-body -->
                         <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i
                                 class="fa fa-save"></i> Güncelle
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                 class="fa fa-times"></i> Vazgeç
                            </button>
                         </div><!-- .modal-footer -->
                      </form>
                   </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
             </div>
          <?php }
        } ?>
      </div><!-- .widget -->
   </div><!-- END column -->
</div>
<!--new category-->
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/new_category_modal"); ?>
